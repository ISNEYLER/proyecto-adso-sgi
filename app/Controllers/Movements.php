<?php

namespace App\Controllers;
use App\Models\Movement;
use App\Models\Location;
use App\Models\MovementType;

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
        $locationModel = new Location();
        $locations = $locationModel->findAll();

        $movementTypeModel = new MovementType();
        $movementtypes = $movementTypeModel->findAll();

        $data = ["title"=> "Crear Movimiento", "locations"=> $locations, "types" => $movementtypes];
        return view('movements/create', $data);
    }
}
