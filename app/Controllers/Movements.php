<?php
namespace App\Controllers;
use App\Models\Movement;
use App\Models\Location;
use App\Models\MovementType;
use App\Models\Product;

//Controlador de transferencias
class Movements extends BaseController
{

    protected $helpers = ['form'];

    public function index(): string
    {   
        $movementModel = new Movement();
        $result = $movementModel->obtenerMovimientosConNombres();
        

        $data = ["title"=> "Movimientos", "movements" => $result];
        return view('movements/index', $data);
    }

    public function new(): string
    {
        $locationModel = new Location();
        $locations = $locationModel->getLocationsWithWarehouse();

        $movementTypeModel = new MovementType();
        $movementtypes = $movementTypeModel->findAll();
        unset($movementtypes[3]);

        $productModel = new Product();
        $products = $productModel->findAll();

        $data = [
            "title"=> "Crear Movimiento",
            "locations"=> $locations, 
            "types" => $movementtypes,
            "products" => $products
        ];

        return view('movements/new', $data);
    }

    public function save()
    {
        $data = [
            'id_producto'           => $this->request->getPost('producto'),
            'id_ubicacion_origen'   => $this->request->getPost('ubicacion_origen'),
            'id_ubicacion_destino'  => $this->request->getPost('ubicacion_destino'),
            'cantidad'              => $this->request->getPost('cantidad'),
            'id_tipo_movimiento'    => $this->request->getPost('tipo_movimiento'),
            'fecha'                 => date('Y-m-d H:i:s')
        ];

        // Reemplazar valores vacíos por null
        foreach ($data as $key => $value) {
            if ($value === '') {
                $data[$key] = null;
            }
        }

        // Reglas de validación
        $rules = [
            'cantidad' => [
                'rules' => 'required|greater_than_equal_to[0]|greater_than[0]',
                'errors' => [
                    'required' => 'La cantidad es obligatoria',
                    'greater_than_equal_to' => 'La cantidad no puede ser negativa',
                    'greater_than' => 'La cantidad debe ser mayor a 0'
                ]
            ],
        ];

        // Validar reglas básicas
        if (!$this->validateData($data, $rules)) {
            return view('movements/new', [
                'title'      => 'Crear movimiento',
                'locations'  => model('Location')->findAll(),
                'types'      => model('MovementType')->findAll(),
                'products'   => model('Product')->findAll(),
                'validation' => $this->validator
            ]);
        }

        //Pendiente añadir validaciones
        $movementModel = new Movement();
        $movementModel->registrarMovimiento($data);
        return redirect()->route('movements');
    }
}
