<?php

namespace App\Controllers;

use App\Models\SettingsModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class SettingsController extends BaseController
{
    protected $settingsModel;

    public function __construct()
    {
        $this->settingsModel = new SettingsModel();
    }

    public function update()
    {
        $data = [
            'website_name' => $this->request->getPost('website_name'),
            'phone_number1' => $this->request->getPost('phone_number1'),
            'phone_number2' => $this->request->getPost('phone_number2'),
            'email1' => $this->request->getPost('email1'),
            'email2' => $this->request->getPost('email2'),
            'address' => $this->request->getPost('address'),
            'maps' => $this->request->getPost('maps'),
            'logo' => $this->request->getPost('logo'),
            'facebook_url' => $this->request->getPost('facebook_url'),
            'instagram_url' => $this->request->getPost('instagram_url'),
            'youtube_url' => $this->request->getPost('youtube_url'),
            'header_business_hour' => $this->request->getPost('header_business_hour'),
            'time_business_hour' => $this->request->getPost('time_business_hour'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->settingsModel->update(1, $data)) {
            return redirect()->to('/admin/settings')->with('message', 'Settings updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update settings.');
        }
    }
}
