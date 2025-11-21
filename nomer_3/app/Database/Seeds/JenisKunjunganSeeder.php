<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisKunjunganSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis'        => 'Kunjungan Baru',
                'keterangan'   => 'Pasien pertama kali ke poli/layanan tersebut'
            ],
            [
                'jenis'        => 'Kunjungan Lama',
                'keterangan'   => 'Pasien sudah pernah sebelumnya'
            ],
            [
                'jenis'        => 'Kontrol / Follow Up',
                'keterangan'   => 'Pasien datang untuk tindak lanjut kontrol'
            ],
            [
                'jenis'        => 'UGD',
                'keterangan'   => 'Datang lewat Unit Gawat Darurat'
            ],
            [
                'jenis'        => 'Rawat Inap',
                'keterangan'   => 'Untuk rawat inap'
            ],
            [
                'jenis'        => 'Rawat Jalan',
                'keterangan'   => 'Untuk rawat jalan'
            ],
        ];

        $this->db->table('jenis_kunjungan')->insertBatch($data);
    }
}
