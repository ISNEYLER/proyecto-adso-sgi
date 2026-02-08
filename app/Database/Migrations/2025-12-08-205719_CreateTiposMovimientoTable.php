<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTiposMovimientoTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'creado_el' => [
                'type' => 'DATETIME',
            ],

            'modificado_el' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('tipos_movimientos', true, [
            'ENGINE' => 'InnoDB',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('tipos_movimientos');
    }
}
