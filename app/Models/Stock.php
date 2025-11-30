<?php

namespace App\Models;

use CodeIgniter\Model;

class Stock extends Model
{
    protected $table            = 'existencias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_producto', 'id_ubicacion', 'cantidad'];

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

    public function obtenerStock(){
        $builder =$this->db->table('existencias e');
        $builder->select('
            e.id,
            p.nombre AS producto,
            p.id AS id_producto,
            u.nombre AS ubicacion,
            u.id AS id_ubicacion,
            e.cantidad
        ');
        $builder->join('productos p','e.id_producto = p.id');
        $builder->join('ubicaciones u','e.id_ubicacion = u.id');
        $query = $builder->get();
        return $query->getResultObject();
    }
    
    //Para obtener la cantidad total de un producto por lugar
    public function obtenerCantidadTotalProducto($id){
        return $this->selectSum('cantidad')
                ->where('id_producto', $id)
                ->first();
    }

    
    public function obtenerCantidad($id){
        return $this->selectSum('cantidad')
                ->where('id_ubicacion', $id)
                ->first();
    }

    public function actualizarStock($id_producto, $id_ubicacion, $cantidad)
    {
        $existencia = $this->where('id_producto', $id_producto)
                                 ->where('id_ubicacion', $id_ubicacion)
                                 ->first();
        if ($existencia) {
            $nuevaCantidad = is_null($existencia->cantidad) ? 0 :$existencia->cantidad + $cantidad;
            $data = [
                'cantidad' => max(0, $nuevaCantidad)
            ];
            $this->update($existencia->id, $data);
        }
        else {
            $this->insert([
                'id_producto' => $id_producto,
                'id_ubicacion' => $id_ubicacion,
                'cantidad' => max(0, $cantidad)
            ]);
        }
    }

    public function obtenerProductosPorUbicacion($id_ubicacion)
    {
        $builder = $this->db->table('existencias e');
        $builder->select('
            p.id,
            p.nombre
        ');
        $builder->join('productos p', 'e.id_producto = p.id');
        $builder->where('e.id_ubicacion', $id_ubicacion);
        $builder->groupBy('p.id');

        return $builder->get()->getResultObject();
    }

    public function obtenerCantidadProductoEnUbicacion($id_producto, $id_ubicacion)
    {
        return $this->where('id_producto', $id_producto)
                    ->where('id_ubicacion', $id_ubicacion)
                    ->first();
    }

}
