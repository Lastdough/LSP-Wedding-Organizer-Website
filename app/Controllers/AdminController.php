<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\WeddingPackageModel;
use App\Models\SettingsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    protected $packageModel;
    protected $validation;
    protected $ordersModel;
    protected $settingsModel;


    public function __construct()
    {
        $this->validation = service('validation');
        $this->packageModel = new WeddingPackageModel();
        $this->ordersModel = new OrdersModel();
        $this->settingsModel = new SettingsModel();

    }

    // private function generatePackageId($price, $capacity)
    // {

    //     $class = '';

    //     if ($price < 10000000) {
    //         $class = 'A'; // 10 jt
    //     } elseif ($price < 50000000) {
    //         $class = 'B'; // 10 - 50 jt
    //     } elseif ($price < 100000000) { // 50 - 100 jt
    //         $class = 'C';
    //     } else { // lebih dari 100 jt
    //         $class = 'D';
    //     }

    //     $capacity = str_pad($capacity, 3, '0', STR_PAD_LEFT);


    //     $timestamp = \DateTime::createFromFormat('U.u', microtime(true));


    //     $id = $class . $capacity . $timestamp->format("Hisu");

    //     $id = substr($id, 0, 16);

    //     return $id;
    // }

    public function index()
    {
        $message = session()->getFlashdata('message');
        $error = session()->getFlashdata('error');

        $search = $this->request->getGet('search');
        $packages = $search ?
            $this->packageModel->like('package_name', $search)->findAll() :
            $this->packageModel->findAll();

        return view('admin/package_dashboard', [
            "title" => "Dashboard",
            'adminName' => session()->get('name'),
            'packages' => $packages,
            'message' => $message,
            'error' => $error,
        ]);
    }

    public function createPackage()
    {
        $error = session()->getFlashdata('error');
        return view('admin/package_create', [
            'title' => 'Create Package',
            'adminName' => session()->get('name'),
            'error' => $error
        ]);
    }

    public function storePackage()
    {
        log_message('debug', 'storePackage method called.');

        // Get price and capacity
        $price = $this->request->getPost('price');
        $capacity = $this->request->getPost('capacity');
        log_message('debug', 'Price: ' . $price . ', Capacity: ' . $capacity);

        // Generate ID
        // $generatedId = $this->generatePackageId($price, $capacity);
        // log_message('debug', 'Generated Package ID: ' . $generatedId);

        // Handle file upload
        $file = $this->request->getFile('picture');
        if (isset($file) && $file->getError() === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($file->getRealPath()); // Read file contents
            if ($imageData === false) {
                log_message('error', 'Failed to read uploaded file content.');
                // Handle file read error (e.g., redirect with error message)
                return redirect()->back()->with('error', 'Failed to process image.')->withInput();
            }
        } else {
            // Handle file upload error (e.g., invalid file)
            return redirect()->back()->with('error', 'Invalid file uploaded.')->withInput();
        }

        // Prepare data based on your table structure
        $data = [
            'package_name' => $this->request->getPost('package_name'),
            'description' => $this->request->getPost('description'),
            'price' => $price,
            'capacity' => $capacity,
            'image' =>  file_get_contents($file),
            'status_publish' => $this->request->getPost('status_publish'),
            'user_id' => session()->get('id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        log_message('debug', 'up' . json_encode($data));
        log_message('debug', 'validation');
        log_message('debug', 'down');

        // Validation
        $this->validation->setRules($this->packageModel->validationRules, $this->packageModel->validationMessages);
        if (!$this->validation->run($data)) {
            log_message('debug', 'Something Wrong' . json_encode($this->validation->getErrors()));
            return redirect()->back()->with('error', implode('  ', $this->validation->getErrors()))->withInput();
        }

        // Insert Data
        try {
            $insert = $this->packageModel->insert($data);
            if ($insert) {
                log_message('debug', 'Package created successfully.');
                return redirect()->to('/admin')->with('message', 'Package created successfully');
            } else {
                throw new \Exception('Failed to insert package data.'); // Throw a custom exception
            }
        } catch (\Exception $e) {
            log_message('error', 'Failed to create package: ' . $e->getMessage() . ' (SQL Error: ' . "json_encode(db_connect()->error())" . "$insert" . ')');
            return redirect()->back()->with('error', 'Something Wrong : Failed to create package')->withInput();
        }
    }

    public function editPackage()
    {
        // $uri = service('uri');
        $id = $this->request->getGet('id');
        $error = session()->getFlashdata('error');

        $package = $this->packageModel->find($id);
        return view('admin/package_edit', [
            'title' => 'Edit Package',
            'adminName' => session()->get('name'),
            'package' => $package,
            'error' => $error
        ]);
    }

    public function updatePackage()
    {
        log_message('debug', 'updatePackage method called.');

        $id = $this->request->getGet('id');
        $package = $this->packageModel->find($id);

        $file = $this->request->getFile('picture');
        $fileContent = $file->isValid() ? file_get_contents($file->getTempName()) : $package['image'];

        $data = [
            'package_name' => $this->request->getPost('package_name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'capacity' => $this->request->getPost('capacity'),
            'image' => $fileContent,
            'status_publish' => $this->request->getPost('status_publish'),
            'user_id' => session()->get('id'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Validate data with model validation rules
        if (!$this->packageModel->validate($data)) {
            $validationErrors = $this->packageModel->errors();
            log_message('error', 'Validation failed: ' . json_encode($validationErrors));
            return redirect()
                ->back()
                ->with('error', implode('  ', $validationErrors))
                ->withInput();
        }

        // Update unique ID based on new price and capacity
        if ($this->packageModel->update($id, $data)) {
            log_message('debug', 'Package updated successfully.');
            return redirect()
                ->to('/admin')
                ->with('message', 'Package updated successfully');
        } else {
            log_message('error', 'Failed to update package. Data: ' . json_encode($data));
            return redirect()
                ->to('/admin/package/edit?id=' . $id)
                ->with('error', 'Failed to update package')
                ->withInput();
        }
    }


    public function deletePackage()
    {
        log_message('debug', 'deletePackage method called.');

        $id = $this->request->getPost('id');
        $package = $this->packageModel->find($id);

        if (!$package) {
            session()->setFlashdata('error', 'Package not found');
            return redirect()->to('/admin');
        }

        if ($this->packageModel->delete($id)) {
            log_message('debug', 'Package deleted successfully.');
            session()->setFlashdata('message', 'Package deleted successfully');
            return redirect()->to('/admin');
        } else {
            log_message('error', 'Failed to delete package.');
            session()->setFlashdata('error', 'Failed to delete package');
            return redirect()->to('/admin');
        }
    }

    public function orders()
    {
        $search = $this->request->getGet('search');
        $message = session()->getFlashdata('message');
        $error = session()->getFlashdata('error');

        $orders = $search ?
            $this->ordersModel->like('name', $search)->findAll() :
            $this->ordersModel->findAll();

        return view('admin/order_dashboard', [
            'title' => 'Manage Orders',
            'adminName' => session()->get('name'),
            'orders' => $orders,
            'message' => $message,
            'error' => $error,
        ]);
    }

    public function updateOrderStatus()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        if ($this->ordersModel->update($id, ['status' => $status])) {
            session()->setFlashdata('message', 'Order status updated successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to update order status.');
        }

        return redirect()->to('/admin/orders');
    }

    public function deleteOrder()
    {
        $id = $this->request->getPost('id');

        if ($this->ordersModel->delete($id)) {
            session()->setFlashdata('message', 'Order deleted successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to delete order.');
        }

        return redirect()->to('/admin/orders');
    }


    public function settings()
    {
        $settings = $this->settingsModel->find(1);
        
        return view('admin/settings', [
            'title' => 'About Us',
            'adminName' => session()->get('name'),
            'settings' => $settings,

        ]);
    }

}
