<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Incidencias extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'idIncidencia' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'idPrestamo' => [
                'type' => 'INT'
            ],
            'folio' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'desReporte' => [
                'type' => 'TEXT'
            ],
            'fechaReporte' => [
                'type' => 'DATETIME'
            ],
            'fechaSolucion' => [
                'type' => 'DATETIME'
            ],
            'desSolucion' => [
                'type' => 'TEXT'
            ],
            'status' => [
                'type' => 'INT'
            ]
        ]);
        $this->forge->addKey('idIncidencia',true);
        $this->forge->createTable('incidencias');
    }

    public function down()
    {
        //
        $this->forge->dropTable("incidencias");
    }
}