<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    protected $authm;
    public function __construct()
    {
        $this->authm = new AuthModel();
        helper('form');
    }

    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        if (session('id')) {
            return redirect()->to(site_url('home'));
        }
        $data = [
            'title' => 'Login',
            'login' => \Config\Services::validation(),
        ];

        return view('login', $data);
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();

        $username = $post['username'];
        $password = $post['password'];
        $user = $this->authm->getUser($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                ];

                session()->set($data);
                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->remove('id');
        return redirect()->to(site_url('/login'));
    }
}
