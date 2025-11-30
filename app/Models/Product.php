<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table            = 'productos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre','descripcion','valor','costo','sku','codigo_barras','id_categoria'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'modificado_el';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function obtenerProductos()
    {
        $builder = $this->db->table('productos p');
        $builder->select('
            p.id,
            p.nombre,
            p.valor,
            p.costo,
            COALESCE(SUM(e.cantidad), 0) AS cantidad
        ');
        $builder->join('existencias e', 'p.id = e.id_producto', 'left'); // LEFT para incluir productos sin stock
        $builder->groupBy('p.id, p.nombre, p.valor, p.costo');

        $query = $builder->get();
        return $query->getResultObject();
    }


    public function productosBajoStock()
    {
        return $this->where('stock_actual < stock_minimo')->findAll();
    }

}
