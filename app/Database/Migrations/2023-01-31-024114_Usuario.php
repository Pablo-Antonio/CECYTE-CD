<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'usr' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ]

        ]);

        $this->forge->addKey('usr',true);
        $this->forge->createTable('usuario');
    }

    public function down()
    {
        //
        $this->forge->dropTable('usuario');
    }
}
