<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email'    => 'superadmin@gmail.com',
                'nama'     => 'Superadmin1',
                'password' => password_hash('superadmin123', PASSWORD_DEFAULT),
                'role'     => 'superadmin'
            ],
            [
                'email'    => 'admisi@gmail.com',
                'nama'     => 'Admisi1',
                'password' => password_hash('admisi123', PASSWORD_DEFAULT),
                'role'     => 'admisi'
            ],
            [
                'email'    => 'perawat@gmail.com',
                'nama'     => 'Perawat1',
                'password' => password_hash('perawat123', PASSWORD_DEFAULT),
                'role'     => 'perawat'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
