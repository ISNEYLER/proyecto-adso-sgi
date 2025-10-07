<?php

namespace App\Controllers;
//Controlador de ajuste de inventario
class InventoryAdjustment extends BaseController
{
    public function index(): string
    {
        $data =['title'=> 'Ajuste de Inventario'];
        return view('inventory_adjustment/index',$data);
    }
}
