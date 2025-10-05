<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
