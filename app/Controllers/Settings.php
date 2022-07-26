<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingsModel;
use App\Libraries\Utils;

class Settings extends BaseController
{
    public function postApiKey()
    {
        $api_key = $this->request->getPost('api-key');
         $data = [
            'paystack_api_key'=>$api_key,
         ];
         $settingsModel= new SettingsModel();
        $check_title =  $settingsModel->where('paystack_api_key', $api_key)
            ->first();

        if ($check_title) {
            return redirect()->back()->with('fail', 'old key is same as new ');
        } {
            $query = $settingsModel->update('1',$data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to(base_url('/admin/settings'))->with('success', 'Api key Registered');
            }
        }
    }
    public function postLogo()
    {
        $logo = Utils::uploadImage($this->request->getFile('logo'));
        $data = [
            'logo' => $logo,
        ];
        $settingsModel = new SettingsModel();
        $check_title =  $settingsModel->where('logo', $logo)
            ->first();

        if ($check_title) {
            return redirect()->back()->with('fail', 'Logo is the same');
        } {
            $query = $settingsModel->update('1', $data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to(base_url('/admin/settings'))->with('success', 'Logo Registered');
            }
        }
    }
    public function postSecretKey()
    {
        $api_key = $this->request->getPost('secret-key');
        $data = [
            'paystack_secret_key' => $api_key,
        ];
        $settingsModel = new SettingsModel();
        $check_title =  $settingsModel->where('paystack_secret_key', 1)
            ->first();

        if ($check_title) {
            return redirect()->back()->with('fail', 'old key is same as new ');
        } {
            $query = $settingsModel->update('1', $data);

            if (!$query) {
                return redirect()->back()->with('fail', 'Registration Failed');
            } else {
                return redirect()->to(base_url('/admin/settings'))->with('success', 'Api key Registered');
            }
        }
    }
}
