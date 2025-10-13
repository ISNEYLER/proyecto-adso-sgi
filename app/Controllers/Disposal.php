<?php

namespace App\Controllers;

//Controlador de desecho
class Disposal extends BaseController
{
    public function index(): string
    {
        $data = ['title'=> 'Desecho de Inventario'];
        return view('disposal/index', $data);
    }
}
