<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\WeddingPackageModel;
use App\Models\OrdersModel;


class OrderController extends BaseController
{
    protected $orderModel;
    protected $packageModel;
    protected $validation;


    public function __construct()
    {
        $this->orderModel = new OrdersModel();
        $this->packageModel = new WeddingPackageModel();
        $this->validation = service('validation');

    }

    public function orderForm()
    {
        $id = $this->request->getGet('id');
        $package = $this->packageModel->find($id);

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to place an order.');
        }

        return view('home/order_form', [
            'title' => 'Order Wedding Package',
            'package' => $package,
        ]);
    }

    public function submit()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to place an order.');
        }

        $data = [
            'package_id' => $this->request->getPost('package_id'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('address'),
            'number_of_guests' => $this->request->getPost('number_of_guests'),
            'wedding_date' => $this->request->getPost('wedding_date'),
            'notes' => $this->request->getPost('notes'),
            'user_id' => session()->get('id'),
            'status' => 'requested',
            'created_at' => date('Y-m-d H:i:s')
        ];

        log_message('debug', json_encode($data) . db_connect()->error_get_last);


        $package = $this->packageModel->find($data['package_id']);
        if ($data['number_of_guests'] > $package['capacity']) {
            return redirect()->back()->withInput()->with('error', 'Number of guests exceeds the package capacity.');
        }


        $this->validation->setRules($this->orderModel->validationRules, $this->orderModel->validationMessages);
        if (!$this->validation->run($data)) {
            log_message('debug', 'Something Wrong' . json_encode($this->validation->getErrors()));
            return redirect()->back()->with('error', implode('  ', $this->validation->getErrors()))->withInput();
        }

        // Insert the order
        try {
            $insert = $this->orderModel->insert($data);
            if ($insert) {
                log_message('debug', 'Package created successfully.');
                return redirect()->to('/packages')->with('message', 'Order placed successfully.');
            } else {
                throw new \Exception('Failed to insert package data.'); // Throw a custom exception
            }
        } catch (\Exception $e) {
            log_message('error', 'Failed to create package: ' . $e->getMessage() . ' (SQL Error: ' . json_encode(db_connect()->error()) . "$insert" . ')');
            return redirect()->back()->withInput()->with('error', 'Failed to place order.');
        }
    }

    public function viewOrders()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to view your orders.');
        }

        $userId = session()->get('id');
        $orders = $this->orderModel->where('user_id', $userId)->findAll();

        $data = [
            'title' => 'My Orders',
            'orders' => $orders,
        ];

        return view('home/orders', $data);
    }

   
}
