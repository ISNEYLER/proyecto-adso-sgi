<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Location;
use App\Models\Storage;

class Locations extends BaseController
{
    public function index()
    {
        $locationModel = new Location();
        // $result = $productoModel->findAll();
        $result = $locationModel->findAll();

        $data = ['title' => 'Ubicaciones', 'locations' => $result];
        return view('locations/index', $data);
    }

    public function new()
    {
        $storageModel = new Storage();
        $result = $storageModel->findAll();

        $data = [
            'title'=>'Ubicaciones',
            'storages' => $result,
        ];
        return view('locations/new', $data);
    }


    public function save(){
        $LocationModel = new Location();

        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'codigo'     => $this->request->getPost('codigo'),
            'id_almacen' => $this->request->getPost('id_almacen')
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
                'rules'  => 'required|is_unique[ubicaciones.codigo]',
                'errors' => [
                    'required'  => 'El código es obligatorio',
                    'is_unique' => 'Ya hay una ubicación con este código'
                ]
            ],
            'id_almacen' => [
                'rules'  => 'required|is_not_unique[almacenes.id]',
                'errors' => [
                    'required'  => 'Debes seleccionar un almacén válido',
                    'is_unique' => 'El almacén seleccionado no es válido'
                ]
            ]
        ];

        if (!$this->validateData($data,$rules)) {
            return view('locations/new', [
                'title' => 'Crear ubicacion',
                'storages' => model('Storage')->findAll(),
                'validation' => $this->validator
            ]);
        }

        $LocationModel->insert($data);

        session()->setFlashdata('msg', 'Ubicación registrada correctamente');
        return redirect()->to('locations');
    }



    public function edit($id) {

        if ($id == null){
            return redirect()->to('locations');
        }

        $LocationModel = new Location();
        $locationResult = $LocationModel->find($id);

        $storageModel = new Storage();
        $storageResult = $storageModel->findAll();

        $data = [
            "title" => 'Editar Ubicacion',
            "location" => $locationResult,
            "storages" => $storageResult
        ];

        return view('locations/edit', $data);

    }

    public function delete($id){
        if (!$this->request->is('post')) {
            return redirect()->to('locations');
        }

        $locationModel = new Location();
        $location = $locationModel->find($id);

        if (!$location) {
            return redirect()->to('locations')->with('error', 'Ubicación no encontrada');
        }

        $data = [
            'id' => $id
        ];

        $rules = [
            'id' => [
                'rules'  => 'required|ubicacionConMovimientos',
                'errors' => [
                    'required' => 'ID de ubicación inválido.',
                    'ubicacionConMovimientos' => 'Esta ubicación no puede ser eliminada porque tiene movimientos asociados.'
                ]
            ]
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->to('locations')
                ->with('error', $this->validator->getError('id'));
        }

        $locationModel->delete($id);

        return redirect()->to('locations')->with('msg', 'Ubicación eliminada correctamente');
    }



    public function update($id){
        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'codigo'    => $this->request->getPost('codigo'),
            'id_almacen'    => $this->request->getPost('id_almacen')
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
                'rules'  => 'required|is_unique[ubicaciones.codigo]',
                'errors' => [
                    'required'  => 'El código es obligatorio',
                    'is_unique' => 'Ya hay una ubicación con este código'
                ]
            ],
            'id_almacen' => [
                'rules'  => 'required|is_not_unique[almacenes.id]',
                'errors' => [
                    'required'  => 'Debes seleccionar un almacén válido',
                    'is_unique' => 'El almacén seleccionado no es válido'
                ]
            ]
        ];

        if (!$this->validateData($data,$rules)) {
            return view('locations/edit', [
                'title' => 'Crear ubicacion',
                'storages' => model('Storage')->findAll(),
                'location' => model('Location')->find($id),
                'validation' => $this->validator
            ]);
        }

        $locationModel = new Location();
        $locationModel->update($id,$data);
        return redirect()->to('locations');
    }
}
