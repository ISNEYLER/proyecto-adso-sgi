<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Movement;
use App\Models\Stock;


class Dashboard extends BaseController
{
    public function index(): string
    {
        $productModel = new Product();
        $movementModel = new Movement();
        $stockModel = new Stock();
        

        // Contar productos
        $totalProductos = $productModel->countAll();

        // Contar movimientos
        $totalMovimientos = $movementModel->countAll();

        // Usamos tu método
        $existencias = $stockModel->obtenerStock();

        // FILTRAR PRODUCTOS CON STOCK BAJO ( <= 5 )
        $stockBajo = array_filter($existencias, function($item) {
            return $item->cantidad <= 5;
        });

        $ultimosMovimientos = $movementModel->obtenerMovimientosConNombresDash();

        $productossinStock = $productModel->productosSinStock();
        $totalsinStock = $productModel->totalSinStock();
        // $productosBajoStock = $productModel->productosBajoStock();

        $data = [
            "title"            => "Dashboard",
            "totalProductos"   => $totalProductos,
            "totalMovimientos" => $totalMovimientos,
            'totalStockBajo'  => count($stockBajo),
            'stockBajo'       => $stockBajo,
            'ultimosMovimientos' => $ultimosMovimientos,
            'productosSinStock' => $productossinStock,
            'totalSinStock' => $totalsinStock
        ];

        return view('dashboard', $data);
    }
}
