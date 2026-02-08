<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUbicacionesTable extends Migration
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

            'id_almacen' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'codigo' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],

            'creado_el' => [
                'type' => 'DATETIME',
            ],

            'modificado_el' => [
                'type' => 'DATETIME',
            ],
        ]);

        
        $this->forge->addKey('id', true);

        
        $this->forge->addKey('codigo', false, true);

        $this->forge->addForeignKey(
            'id_almacen',
            'almacenes',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('ubicaciones', true, [
            'ENGINE' => 'InnoDB',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('ubicaciones');
    }
}
