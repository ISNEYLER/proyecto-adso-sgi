<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index(): string
    {   
        $data = ["title" => 'Productos'];
        return view('products/index', $data);
    }
}
