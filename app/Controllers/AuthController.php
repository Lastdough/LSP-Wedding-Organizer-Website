<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    private $userModel;
    protected $validation;

    public function __construct()
    {
        $this->validation = service('validation');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        //
    }

    public function register()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'password_confirm' => $this->request->getPost('password_confirm'),
        ];

        $this->validation->setRules($this->userModel->validationRules, $this->userModel->validationMessages);

        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->back()->withInput();
        }

        // Debugging: Log the data before saving
        log_message('debug', 'Registering user: ' . json_encode($data));

        $this->userModel->save([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => $data['password'],
            'password_confirm' => $data['password_confirm'],
            'role' => 'customer',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Check if the user is saved
        if ($this->userModel->errors()) {
            session()->setFlashdata('errors', $this->userModel->errors());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/login')->with('message', 'Registration successful. Please login.');
    
    }

    public function registerView()
    {
        return view('auth/register');
    }

    public function login()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];

        $loginRules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $loginErrorMessage = [   // Errors
            'username' => [
                'required' => 'Usernames is required',
            ],
            'password' => [
                'required' => 'Password is required',
            ],
        ];

        $this->validation->setRules($loginRules, $loginErrorMessage);

        if (!$this->validation->run($data)) {
            // return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->back()->withInput();
        }

        $user = $this->userModel->where('username', $data['username'])->first();
        if (is_null($user)) {
            session()->setFlashdata('errors', 'Invalid Username or Password');
            return redirect()->back()->withInput();
        }

        $pwd_verify = password_verify($data['password'], $user['password']);
        if (!$pwd_verify) {
            session()->setFlashdata('errors', 'Invalid Username or Password');
            return redirect()->back()->withInput();
        }

        $this->setUserSession($user);
        
        // Redirect based on role
        if ($user['role'] == 'admin') {
            return redirect()->to('/admin');
        } else {
            return redirect()->to('/');
        }
    }

    public function loginView()
    {
        return view('auth/login');
    }

    public function Unauthorized()
    {
        return view('auth/unauthorized');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'username' => $user['username'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
    }

    public function logout()
    {
        $_SESSION = array();
        session()->destroy();
        return redirect()->to('/');
    }
}
