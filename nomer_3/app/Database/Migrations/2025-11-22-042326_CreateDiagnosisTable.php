<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiagnosisTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'asesmenid'   => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'diagnosa' => [
                'type' => 'TEXT'
            ],
            'tindakan_penanganan' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('asesmenid', 'asesmen', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('diagnosis');
    }

    public function down()
    {
        $this->forge->dropTable('diagnosis');
    }
}
