<?php

namespace App\Kernel\Controller;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Storage\StorageInterface;
use App\Kernel\View\ViewInterface;

abstract class Controller {

    private ViewInterface $view;

    private RequestInterface $request;

    private RedirectInterface $redirect;

    private SessionInterface $session;

    private DatabaseInterface $database;

    private AuthInterface $auth;

    private StorageInterface $storage;

    public function view(string $name, array $data = [], string $title = '') {
        $this->view->page($name, $data, $title);
    }

    public function setView(ViewInterface $view) {
        $this->view = $view;
    }

    public function setRequest(RequestInterface $request) {
        $this->request = $request;
    }

    public function request() {
        return $this->request;
    }

    public function redirect(string $url) {
        return $this->redirect->to($url);
    }

    public function setRedirect(RedirectInterface $redirect): void {
        $this->redirect = $redirect;
    }

    public function session(): SessionInterface {
        return $this->session;
    }

    public function setSession(SessionInterface $session): void {
        $this->session = $session;
    }

    public function db(): DatabaseInterface {
        return $this->database;
    }

    public function setDatabase(DatabaseInterface $database): void {
        $this->database = $database;
    }

    public function auth(): AuthInterface {
        return $this->auth;
    }

    public function setAuth(AuthInterface $auth): void {
        $this->auth = $auth;
    }

    public function storage(): StorageInterface {
        return $this->storage;
    }

    public function setStorage(StorageInterface $storage): void {
        $this->storage = $storage;
    }

}