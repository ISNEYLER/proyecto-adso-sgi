<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExistenciasTable extends Migration
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

            'id_producto' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'id_ubicacion' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'cantidad' => [
                'type'    => 'FLOAT',
                'default' => 0,
            ],

            'creado_el' => [
                'type' => 'DATETIME',
            ],

            'modificado_el' => [
                'type' => 'DATETIME',
            ],
        ]);

        // 🔑 Primary Key
        $this->forge->addKey('id', true);

        // 🔗 Foreign Keys
        $this->forge->addForeignKey(
            'id_producto',
            'productos',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'id_ubicacion',
            'ubicaciones',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->forge->createTable('existencias', true, [
            'ENGINE' => 'InnoDB',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('existencias');
    }
}
