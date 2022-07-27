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


return  view('user_profile',$data);
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
        $user=$userModel->find($id);
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
}