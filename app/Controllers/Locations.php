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
            'nombre' => $this->request->getPost('nombre'),
            'codigo' => $this->request->getPost('codigo'),
            'id_almacen' => $this->request->getPost('id_almacen')
        ];

        $LocationModel->insert($data);
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


    public function update($id){
        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'codigo'    => $this->request->getPost('codigo'),
            'id_almacen'    => $this->request->getPost('id_almacen')
        ];

        $locationModel = new Location();
        $locationModel->update($id,$data);
        return redirect()->to('locations');
    }
}
