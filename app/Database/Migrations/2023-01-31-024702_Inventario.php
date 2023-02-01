<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventario extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'idEquipo' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'folio' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'nombreEquipo' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'descripcionEquipo' => [
                'type' => 'TEXT'
            ],
            'fechaIngreso' => [
                'type' => 'DATE'
            ],
            'status' => [
                'type' => 'INT',
                //'constraint' => [0,1],
                //'default' => 1
            ]
        ]);
        $this->forge->addKey('idEquipo',true);
        $this->forge->addUniqueKey('folio');
        $this->forge->createTable('equipos');
    }

    public function down()
    {
        //
        $this->forge->dropTable('equipos');
    }
}
