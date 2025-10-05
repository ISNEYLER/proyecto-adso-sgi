<?php

namespace App\Controllers;

//Controlador de desecho
class Disposal extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
