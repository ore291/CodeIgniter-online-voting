<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Utils;
use App\Libraries\Hash;

class User extends BaseController
{
    public function getindex()
    {

        $data['title'] = ucfirst('user');


        return  view('user_profile', $data);
    }
    public function postUpdate_picture(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        $cove = $this->request->getFile('picture');

        if (file_exists($cove)) {
            $picture = Utils::uploadImage($this->request->getFile('picture'));
            $data = [
                'picture' => $picture,
            ];
        }

        $check_title =  $userModel->where('picture', $picture)
            ->first();

        if ($check_title) {
            return redirect()->back()->with('fail', 'Update failed');
        } {
            $query = $userModel->update($id, $data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to(base_url(base_url('dashboard')))->with('success', 'Profile Picture Update Successfully');
            }
        }
    }
    public function postupdate_password(int $id)
    {
        $newPassword = $this->request->getPost('newPassword');
        $oldPassword = $this->request->getPost('oldPassword');
        $userModel = new UserModel();
        $user = $userModel->find($id);
        $checkPassword = Hash::check($oldPassword, $user->password);

        if (!$checkPassword) {
            session()->setFlashdata("fail", "Old password is not correct");
            return redirect()->to(base_url(base_url('dashboard')));
        }

        if (isset($newPassword)) {

            $data = [
                'password' => Hash::encrypt($newPassword)
            ];
        }
        $check_title =  $userModel->where('password', Hash::encrypt($newPassword))
            ->first();

        if ($check_title) {
            return redirect()->back()->with('fail', 'Update failed');
        } {
            $query = $userModel->update($id, $data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to(base_url(base_url('dashboard')))->with('success', 'Password changed Successfully');
            }
        }
    }

    public function postsendContactUs()
    {
        $to = "info@faceofmoa.com";
        $subject = 'Contact us Form';
        $message = $this->request->getVar('message');
        $user_email = $this->request->getVar('email');
        $name = $this->request->getVar('name');




        $body =
            <<< HTML
        <html>
            <head>
            <style>
            dt {
                font-weight: bold;
            }
            </style>
            </head>
            <body>
                <h1 style="text-align: center;">$subject</h1>
                <dl>
                    <dt>Name</dt>
                    <dd>{$name}</dd>
                    <dt>Email</dt>
                    <dd>{$user_email}</dd>
                    <dt>Message</dt>
                    <dd>{$message}</dd>
                </dl>
            </body>
        </html>
        HTML;

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom($user_email, 'Contact Form');

        $email->setSubject($subject);
        $email->setMessage($body);
        if ($email->send()) {
            return redirect()->back()->with('success', 'Email successfully sent, we will contact you shortly.');
        } else {
            $data = $email->printDebugger(['headers']);
            return redirect()->back()->with('fail', 'Email sending failed');
        }
    }

    public function postreset_password()
    {
        $email = $this->request->getPost('email');


        $user_model = new UserModel();

        $check_email =  $user_model->where('email', $email)
            ->first();

        if (!$check_email) {
            return redirect()->back()->with("fail", "Email is not registered");
        } else {
            $new_password = uniqid();

            $data = [
                'password' => Hash::encrypt($new_password),
            ];

            $query = $user_model->update($check_email->id, $data);

            if ($query) {
                $body =
                    <<< HTML
            <html>
                <head>
                <style>
                dt {
                    font-weight: bold;
                }
                </style>
                </head>
                <body>
                    <h1 style="text-align: center;">Password Reset</h1>
                    <dl>
                        <dt>Your password has been reset.</dt>
                        <p>Please login and change your password</p>
                        <dt>New Password : </dt>
                        <dd>{$new_password}</dd>
                    </dl>
                </body>
            </html>
            HTML;

                $semail = \Config\Services::email();
                $semail->setTo($email);
                $semail->setFrom('info@faceofmoa.com', 'Password Reset');

                $semail->setSubject('password reset');
                $semail->setMessage($body);
                if ($semail->send()) {
                    return redirect()->back()->with('success', 'please check your email for your temporary password.');
                } else {
                    $data = $semail->printDebugger(['headers']);
                    return redirect()->back()->with('fail', 'Password reset failed');
                }
            } else {
                return redirect()->back()->with('fail', 'Password update failed');
            }
        }
    }
}
