<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisKunjunganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'jenis'      => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'keterangan'      => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_kunjungan');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_kunjungan');
    }
}
