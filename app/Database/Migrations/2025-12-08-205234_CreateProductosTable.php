<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductosTable extends Migration
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
                'constraint' => 60,
            ],

            'descripcion' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'valor' => [
                'type' => 'FLOAT',
                'null' => true,
            ],

            'costo' => [
                'type' => 'FLOAT',
                'null' => true,
            ],

            'sku' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],

            'codigo_barras' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => true,
            ],

            'id_categoria' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],

            'creado_el' => [
                'type' => 'DATETIME',
            ],

            'modificado_el' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addKey('sku', false, true);
        $this->forge->addKey('codigo_barras', false, true);

        $this->forge->addForeignKey(
            'id_categoria',
            'categorias',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->forge->createTable('productos', true, [
            'ENGINE' => 'InnoDB',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('productos');
    }
}
