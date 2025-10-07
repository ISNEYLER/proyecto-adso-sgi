<?php

namespace App\Controllers;
use App\Models\Movement;

//Controlador de transferencias
class Movements extends BaseController
{
    public function index(): string
    {   
        $movementModel = new Movement();
        $result = $movementModel->findAll();

        $data = ["title"=> "Movimientos", "movements" => $result];
        return view('movements/index', $data);
    }

    public function create(): string
    {
        $data = ["title"=> "Crear Movimiento"];
        return view('movements/create', $data);
    }
}
