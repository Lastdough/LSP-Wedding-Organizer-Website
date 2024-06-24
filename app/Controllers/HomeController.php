<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\WeddingPackageModel;
use App\Models\SettingsModel;


class HomeController extends BaseController
{
    protected $packageModel;
    protected $settingsModel;


    public function __construct()
    {
        $this->packageModel = new WeddingPackageModel();
        $this->settingsModel = new SettingsModel();

    }

    public function index()
    {
        return view('home/index', [
            'title' => 'Home',
        ]);
    }

    public function packages()
    {
        $packages = $this->packageModel->where('status_publish', 'publish')->findAll();

        return view('home/packages', [
            'title' => 'Packages',
            'packages' => $packages,
        ]);
    }

    public function viewPackage()
    {
        $id = $this->request->getGet('id');
        $package = $this->packageModel->find($id);
        return view('home/package_view', [
            'title' => $package['package_name'],
            'package' => $package
        ]);
    }

    public function about()
    {
        $settings = $this->settingsModel->find(1);

        $data = [
            'title' => 'About Us',
            'settings' => $settings,
        ];

        return view('home/about', $data);
    }
}
