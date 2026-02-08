<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MovementTypeSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                'nombre'        => 'Entrada',
            ],
            [
                'nombre'        => 'Traslado',
            ],
            [
                'nombre'        => 'Desecho',
            ],
            [
                'nombre'        => 'Ajuste de Stock',
            ],
        ];

        $this->db->table('tipos_movimientos')->insertBatch($data);
    }
}
