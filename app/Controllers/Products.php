<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class Products extends BaseController
{
    public function index(): string
    {   
        // $db = \Config\Database::connect();
        // $query = $db->query("SELECT * FROM productos");
        // $result = $query->getResult();

        $productoModel = new Product();
        $result = $productoModel->findAll();

        $data = ["title" => 'Productos', "products" => $result];
        return view('products/index', $data);
    }

    public function create(): string{
        //Se crea una instancia de Categoria
        $categoryModel = new Category();
        //Se consultan las categorias
        $result = $categoryModel->findAll();

        $data = ["title" => 'Crear producto', "categories" => $result];
        return view('products/create',$data);
    }
}
