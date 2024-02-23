<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller {

    public function index() {
        $this->view('login');
    }

    public function sign_in() {
        $validation = $this->request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4'],
        ]);

        if (!$validation) {
            $this->session()->set('error', 'Неверный логин или пароль');
            $this->redirect('login');
        }
        $email = $this->request()->input('email');
        $password = $this->request()->input('password');
        if ($this->auth()->attempt($email, $password)) {
            $this->redirect('/');
        }
        $this->session()->set('error', 'Неверный логин или пароль');
        $this->redirect('login');
    }

    public function logout() {
        $this->auth()->logout();
        return $this->redirect('/login');
    }

}