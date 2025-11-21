<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pasienid'      => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'noregistrasi'  => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tglregistrasi' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pasienid', 'pasien', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pendaftaran');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftaran');
    }
}
