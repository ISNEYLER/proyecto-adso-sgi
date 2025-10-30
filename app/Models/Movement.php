<?php

namespace App\Models;

use CodeIgniter\Model;

class Movement extends Model
{
    protected $table            = 'movimientos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_producto','id_ubicacion_origen','id_ubicacion_destino','cantidad','id_tipo_movimiento','fecha'];

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

    //Método principal para registrar movimientos y actualizar existencias
    public function registrarMovimiento($data)
    {
        $stockModel = new Stock();
        // Insertamos el movimiento
        $this->insert($data);

        // Según el tipo de movimiento actuamos sobre existencias
        switch ($data['id_tipo_movimiento']) {
            case 1: // ENTRADA
                $stockModel->actualizarStock(
                    $data['id_producto'],
                    $data['id_ubicacion_destino'],
                    $data['cantidad']
                );
                break;

            case 2: // TRASLADO
                // Restar de origen
                $stockModel->actualizarStock(
                    $data['id_producto'],
                    $data['id_ubicacion_origen'],
                    -$data['cantidad']
                );
                // Sumar en destino
                $stockModel->actualizarStock(
                    $data['id_producto'],
                    $data['id_ubicacion_destino'],
                    $data['cantidad']
                );
                break;

            case 3: // DESECHO
                // Restar de la ubicación de origen
                $stockModel->actualizarStock(
                    $data['id_producto'],
                    $data['id_ubicacion_origen'],
                    -$data['cantidad']
                );
                break;
        }
    }

    public function obtenerMovimientosConNombres()
    {
        $builder = $this->db->table('movimientos m');
        $builder->select('
            m.id,
            p.nombre AS producto,
            uo.nombre AS ubicacion_origen,
            ud.nombre AS ubicacion_destino,
            m.cantidad,
            m.fecha
        ');
        $builder->join('productos p', 'm.id_producto = p.id');
        $builder->join('ubicaciones uo', 'm.id_ubicacion_origen = uo.id');
        $builder->join('ubicaciones ud', 'm.id_ubicacion_destino = ud.id');

        $query = $builder->get();
        return $query->getResultObject();
    }
}
