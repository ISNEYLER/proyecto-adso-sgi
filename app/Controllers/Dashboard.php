<?php

namespace App\Controllers;

//Controlador de Dashboard
class Dashboard extends BaseController
{
    public function index(): string
    {
        $data = ["title"=>"Dashboard"];
        return view('dashboard',$data);
    }
}
