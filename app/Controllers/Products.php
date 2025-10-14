<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class Products extends BaseController
{
    protected $helpers = ['form'];

    public function index(): string
    {
        $productoModel = new Product();
        $result = $productoModel->findAll();

        $data = ['title' => 'Productos', 'products' => $result];
        return view('products/index', $data);
    }

    public function new(): string
    {
        $categoryModel = new Category();
        $result = $categoryModel->findAll();

        $data = [
            "title" => 'Crear producto',
            "categories" => $result,
        ];

        return view('products/new', $data);
    }

    public function save()
    {
        $data = [
            'nombre'         => $this->request->getPost('nombre'),
            'descripcion'    => $this->request->getPost('descripcion'),
            'valor'          => $this->request->getPost('valor'),
            'costo'          => $this->request->getPost('costo'),
            'sku'            => $this->request->getPost('sku'),
            'codigo_barras'  => $this->request->getPost('codigo_barras'),
            'id_categoria'   => $this->request->getPost('categoria')
        ];

        foreach ($data as $key => $value) {
            if ($value === '') {
                $data[$key] = null;
            }
        }

        $rules = [
            'nombre' => [
                'rules' => 'required|min_length[3]|max_length[30]',
                'errors' => [
                    'required'   => 'El nombre del producto es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    'max_length' => 'El nombre no puede superar los 30 caracteres.'
                ]
            ],
            'descripcion' => [
                'rules' => 'permit_empty|max_length[65535]',
                'errors' => [
                    'max_length' => 'La descripción es demasiado larga.'
                ]
            ],
            'valor' => [
                'rules' => 'permit_empty|decimal|greater_than_equal_to[0]',
                'errors' => [
                    'decimal'  => 'El valor debe ser numérico.',
                    'greater_than_equal_to' => 'El valor no puede ser negativo.'
                ]
            ],
            'costo' => [
                'rules' => 'permit_empty|decimal|greater_than_equal_to[0]',
                'errors' => [
                    'decimal'  => 'El costo debe ser numérico.',
                    'greater_than_equal_to' => 'El costo no puede ser negativo.'
                ]
            ],
            'sku' => [
                'rules' => 'permit_empty|is_unique[productos.sku]|max_length[30]',
                'errors' => [
                    'is_unique' => 'El SKU ya existe en otro producto.',
                    'max_length' => 'El SKU no puede superar los 30 caracteres.'
                ]
            ],
            'codigo_barras' => [
                'rules' => 'permit_empty|is_unique[productos.codigo_barras]|integer|max_length[40]',
                'errors' => [
                    'is_unique' => 'El código de barras ya está registrado.',
                    'integer'   => 'El código de barras debe ser numérico.',
                    'max_length'=> 'El código de barras no puede superar los 40 caracteres.'
                ]
            ]
        ];

        if (!$this->validateData($data,$rules)) {
            return view('products/new', [
                'title' => 'Crear producto',
                'categories' => model('Category')->findAll(),
                'validation' => $this->validator
            ]);
        }

        $productModel = new Product();  
        $productModel->insert($data);
        return redirect()->to('products');
    }

    public function edit($id) {

        if ($id == null){
            return redirect()->to('products');
        }

        $categoryModel = new Category();
        $categories = $categoryModel->findAll();

        $productModel = new Product();
        $product = $productModel->find($id);

        $data = [
            "title" => 'Editar Producto',
            "categories" => $categories,
            "product" => $product
        ];

        return view('products/edit', $data);

    }

    public function update($id) {
        $data = [
            'nombre'         => $this->request->getPost('nombre'),
            'descripcion'    => $this->request->getPost('descripcion'),
            'valor'          => $this->request->getPost('valor'),
            'costo'          => $this->request->getPost('costo'),
            'sku'            => $this->request->getPost('sku'),
            'codigo_barras'  => $this->request->getPost('codigo_barras'),
            'id_categoria'   => $this->request->getPost('categoria')
        ];

        foreach ($data as $key => $value) {
            if ($value === '') {
                $data[$key] = null;
            }
        }

        $rules = [
            'nombre' => [
                'rules' => 'required|min_length[3]|max_length[30]',
                'errors' => [
                    'required'   => 'El nombre del producto es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    'max_length' => 'El nombre no puede superar los 30 caracteres.'
                ]
            ],
            'descripcion' => [
                'rules' => 'permit_empty|max_length[65535]',
                'errors' => [
                    'max_length' => 'La descripción es demasiado larga.'
                ]
            ],
            'valor' => [
                'rules' => 'permit_empty|decimal|greater_than_equal_to[0]',
                'errors' => [
                    'decimal'  => 'El valor debe ser numérico.',
                    'greater_than_equal_to' => 'El valor no puede ser negativo.'
                ]
            ],
            'costo' => [
                'rules' => 'permit_empty|decimal|greater_than_equal_to[0]',
                'errors' => [
                    'decimal'  => 'El costo debe ser numérico.',
                    'greater_than_equal_to' => 'El costo no puede ser negativo.'
                ]
            ],
            'sku' => [
                'rules' => "permit_empty|is_unique[productos.sku,id,{$id}]|max_length[30]",
                'errors' => [
                    'is_unique' => 'El SKU ya existe en otro producto.',
                    'max_length' => 'El SKU no puede superar los 30 caracteres.'
                ]
            ],
            'codigo_barras' => [
                'rules' => "permit_empty|is_unique[productos.codigo_barras,id,{$id}]|integer|max_length[40]",
                'errors' => [
                    'is_unique' => 'El código de barras ya está registrado.',
                    'integer'   => 'El código de barras debe ser numérico.',
                    'max_length'=> 'El código de barras no puede superar los 40 caracteres.'
                ]
            ]
        ];

        if (!$this->validateData($data,$rules)) {
            return view('products/new', [
                'title' => 'Crear producto',
                'categories' => model('Category')->findAll(),
                'validation' => $this->validator
            ]);
        }

        $productModel = new Product();  
        $productModel->update($id,$data);
        return redirect()->to('products');
    }
}
