<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Warehouse;

class Warehouses extends BaseController
{
    public function index()
    {
        $wareHouse = new Warehouse();
        $result = $wareHouse->findAll();

        $data = ['title' => 'Almacenes', 'warehouses' => $result];
        return view('warehouses/index', $data);
    }

    public function new(){
        $wareHouse = new Warehouse();
        $data = ['title' => 'Almacenes'];
        return view('warehouses/new', $data);
    }

    public function save(){
        $wareHouse = new Warehouse();

        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'codigo'     => $this->request->getPost('codigo'),
            'direccion' => $this->request->getPost('direccion')
        ];

        foreach ($data as $key => $value) {
            if ($value === '') {
                $data[$key] = null;
            }
        }

        $rules = [
            'nombre' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'El nombre es obligatorio',
                    'min_length' => 'El nombre debe tener mínimo 3 caracteres'
                ]
            ],
            'codigo' => [
                'rules'  => 'required|is_unique[almacenes.codigo]',
                'errors' => [
                    'required'  => 'El código es obligatorio',
                    'is_unique' => 'Ya hay un almacen con este código'
                ]
            ],
            'direccion' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'  => 'La dirección es obligatoria',
                    'min_length' => 'La dirección debe tener mínimo 3 caracteres'
                ]
            ]
        ];

        if (!$this->validateData($data,$rules)) {
            return view('warehouses/new', [
                'title' => 'Crear almacen',
                'storages' => model('Storage')->findAll(),
                'validation' => $this->validator
            ]);
        }

        $wareHouse->insert($data);

        session()->setFlashdata('msg', 'Almacen registrado correctamente');
        return redirect()->to('warehouses');
    }

    public function edit($id) {

        if ($id == null){
            return redirect()->to('warehouses');
        }

        $storageModel = new Warehouse();
        $storageResult = $storageModel->find($id);

        $data = [
            "title" => 'Editar Ubicacion',
            "storage" => $storageResult
        ];

        return view('warehouses/edit', $data);

    }

    public function update($id){
        $wareHouse = new Warehouse();

        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'codigo'     => $this->request->getPost('codigo'),
            'direccion' => $this->request->getPost('direccion')
        ];

        foreach ($data as $key => $value) {
            if ($value === '') {
                $data[$key] = null;
            }
        }

        $rules = [
            'nombre' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'El nombre es obligatorio',
                    'min_length' => 'El nombre debe tener mínimo 3 caracteres'
                ]
            ],
            'codigo' => [
                'rules'  => "required|is_unique[almacenes.codigo,id,{$id}]",
                'errors' => [
                    'required'  => 'El código es obligatorio',
                    'is_unique' => 'Ya hay un almacen con este código'
                ]
            ],
            'direccion' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'  => 'La dirección es obligatoria',
                    'min_length' => 'La dirección debe tener mínimo 3 caracteres'
                ]
            ]
        ];

        if (!$this->validateData($data,$rules)) {
            return view('warehouses/edit', [
                'title' => 'Editar almacen',
                'storage' => model('Storage')->find($id),
                'validation' => $this->validator
            ]);
        }

        $wareHouse->update($id,$data);

        session()->setFlashdata('msg', 'Almacen editado correctamente');
        return redirect()->to('warehouses');
    }


    public function delete($id){
        if (!$this->request->is('post')) {
            return redirect()->to('warehouses');
        }

        $wareHouseModel = new Warehouse();
        $location = $wareHouseModel->find($id);

        if (!$location) {
            return redirect()->to('warehouses')->with('error', 'Almacen no encontrado');
        }

        $data = [
            'id' => $id
        ];

        $rules = [
            'id' => [
                'rules'  => 'required|almacenConUbicaciones',
                'errors' => [
                    'required' => 'ID de almacen inválido.',
                    'almacenConUbicaciones' => 'El almacen no puede ser eliminado porque tiene ubicaciones asociadas.'
                ]
            ]
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->to('warehouses')
                ->with('error', $this->validator->getError('id'));
        }

        $wareHouseModel->delete($id);

        return redirect()->to('warehouses')->with('msg', 'Almacen eliminado correctamente');
    }

}
