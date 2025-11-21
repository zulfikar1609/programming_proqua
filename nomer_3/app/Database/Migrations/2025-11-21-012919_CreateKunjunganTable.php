<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKunjunganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pendaftaranpasienid'  => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'jenis_kunjungan'      => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'tglkunjungan'         => [
                'type' => 'DATE'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pendaftaranpasienid', 'pendaftaran', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kunjungan');
    }

    public function down()
    {
        $this->forge->dropTable('kunjungan');
    }
}
