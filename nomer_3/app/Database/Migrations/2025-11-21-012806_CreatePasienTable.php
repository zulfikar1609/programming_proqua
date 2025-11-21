<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePasienTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama'      => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'norm'      => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'alamat'    => [
                'type' => 'TEXT'
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pasien');
    }

    public function down()
    {
        $this->forge->dropTable('pasien');
    }
}
