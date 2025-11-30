<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;

class Categories extends BaseController
{
    public function index()
    {
        $categoryModel = new Category();
        // $result = $productoModel->findAll();
        $result = $categoryModel->findAll();

        $data = ['title' => 'Categorias', 'categories' => $result];
        return view('categories/index', $data);
    }


    public function new ()
    {
        $data = ['title' => 'Categorias'];
        return view('categories/new', $data);
    }

    public function edit($id) {

        if ($id == null){
            return redirect()->to('products');
        }

        $categoryModel = new Category();
        $category = $categoryModel->find($id);

        $data = [
            "title" => 'Editar Categoria',
            "category" => $category,
        ];

        return view('categories/edit', $data);

    }


    public function update($id){
        $data = [
            'nombre'    => $this->request->getPost('nombre')
        ];

        $categoryModel = new Category();
        $categoryModel->update($id,$data);
        return redirect()->to('categories');
    }


    public function save(){
        $categoryModel = new Category();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
    
        ];

        $categoryModel->insert($data);
        return redirect()->to('categories');
    }
}
