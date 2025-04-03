<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class UsersController extends BaseController
{
    public function register()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ];

            if (!$this->validate($rules)) {
                return view('auth/register', [
                    'validation' => $this->validator
                ]);
            }

            $model = new UsersModel();
            $model->save([
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'     => 'user'
            ]);

            return redirect()->to('/login')->with('success', 'Registration successful! You can now login.');
        }

        return view('auth/register');
    }

    public function login()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new UsersModel();
            $user = $model->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to('dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid email or password');
            }
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logged out successfully.');
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('dashboard');
    }
}
