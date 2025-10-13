<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Location;

//Controlador de ajuste de inventario
class InventoryAdjustment extends BaseController
{
    public function index(): string
    {
        $data =['title'=> 'Ajuste de Inventario'];
        return view('inventory_adjustment/index',$data);
    }

    public function create(): string{
        $productoModel = new Product();
        $products = $productoModel->findAll();
        $locationModel = new Location();
        $locations = $locationModel->findAll();

        $data = ["title" => 'Crear ajuste de inventario','locations'=> $locations,'products'=> $products];
        return view('inventory_adjustment/create',$data);
    }
}

