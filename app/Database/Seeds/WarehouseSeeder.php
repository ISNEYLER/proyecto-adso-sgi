<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Tienda 1',
                'codigo' => 'TD1'
            ]
        ];

        $this->db->table('almacenes')->insertBatch($data);
    }
}
