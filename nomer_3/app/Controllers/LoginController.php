<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{

    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        session()->set([
            'logged_in' => true,
            'user_id'   => $user['id'],
            'email'     => $user['email'],
            'nama'     => $user['nama'],
            'role'      => $user['role'],
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

}
