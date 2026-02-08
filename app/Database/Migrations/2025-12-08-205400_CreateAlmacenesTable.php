<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlmacenesTable extends Migration
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
                'constraint' => 20,
            ],

            'direccion' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
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

        $this->forge->createTable('almacenes', true, [
            'ENGINE' => 'InnoDB',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('almacenes');
    }
}
