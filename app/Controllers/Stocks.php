<?php

namespace App\Controllers;
use App\Models\Stock;

class Stocks extends BaseController
{
    function index(){
        $stockModel = new Stock();
        $result = $stockModel->obtenerStock();
        $data = ['title' => 'Existencias', 'stocks' => $result];
        return view('stocks/index', $data);
    }
}
