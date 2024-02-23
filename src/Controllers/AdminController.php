<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\MovieService;

class AdminController extends Controller {

    public function index() {
        $categoryService = new CategoryService($this->db());
        $movieService = new MovieService($this->db());

        $categories = $categoryService->all();
        $movies = $movieService->all();

        $this->view('admin/index', [
            'categories' => $categories,
            'movies' => $movies,
        ]);
    }

}