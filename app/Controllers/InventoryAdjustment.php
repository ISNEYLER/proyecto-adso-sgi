<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\Location;
use App\Models\Stock;
use App\Models\Movement;

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
        $locations = $locationModel->getLocationsWithWarehouse();

        $data = ["title" => 'Crear ajuste de inventario','locations'=> $locations,'products'=> $products];
        return view('inventory_adjustment/create',$data);
    }

    
    public function obtenerProductosPorUbicacion($id)
    {
        $stockModel = new Stock();
        $productos = $stockModel->obtenerProductosPorUbicacion($id);

        return $this->response->setJSON($productos);
    }

    
    public function obtenerCantidadPorProductoYUbicacion($id_producto, $id_ubicacion)
    {
        $stockModel = new Stock();
        $stock = $stockModel->obtenerCantidadProductoEnUbicacion($id_producto, $id_ubicacion);

        if ($stock) {
            return $this->response->setJSON([
                'cantidad' => $stock->cantidad
            ]);
        }

        return $this->response->setJSON([
            'cantidad' => 0
        ]);
    }

    public function save() {

        $data = [
            'id_producto'           => $this->request->getPost('producto'),
            'id_ubicacion_origen'   => $this->request->getPost('ubicacion_origen'),
            'id_ubicacion_destino'  => $this->request->getPost('ubicacion_origen'),
            'cantidad'              => $this->request->getPost('cantidad'),
            'id_tipo_movimiento'    => 4,
            'fecha'                 => date('Y-m-d H:i:s')
        ];

        //Pendiente añadir validaciones
        $movementModel = new Movement();
        $movementModel->registrarMovimiento($data);

        return redirect()->route('stocks');
    }

}

