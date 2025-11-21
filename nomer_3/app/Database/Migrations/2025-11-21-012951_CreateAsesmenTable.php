<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAsesmenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kunjunganid'   => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'keluhan_utama' => [
                'type' => 'TEXT'
            ],
            'keluhan_tambahan' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kunjunganid', 'kunjungan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('asesmen');
    }

    public function down()
    {
        $this->forge->dropTable('asesmen');
    }
}
