<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class RegisterController extends Controller {

    public function index() {
        $this->view('register');
    }

    public function sign_up() {
        $validation = $this->request()->validate([
            'email' => ['required', 'email', 'min:8'],
            'name' => ['required', 'min:4'],
            'password' => ['required', 'min:4', 'confirmed'],
            'password_confirmation' => ['required', 'min:4'],
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('register');
        }

        $user = $this->db()->insert('users', [
            'name' => $this->request()->input('name'),
            'email' => $this->request()->input('email'),
            'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT),
        ]);
        $this->redirect('/');
    }

}