<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prestamos extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'idPrestamo' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'folio' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'matricula' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'alumno' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'gradoGrupo' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'fechaPrestamo' => [
                'type' => 'DATETIME'
            ],
            'fechaDevolucion' => [
                'type' => 'DATETIME'
            ],
            'incidencia' => [
                'type' => 'INT'
            ],
            'status' => [
                'type' => 'INT'
            ]
        ]);

        $this->forge->addKey('idPrestamo',true);
        $this->forge->createTable('prestamos');
    }

    public function down()
    {
        //
        $this->forge->dropTable('prestamos');
    }
}
