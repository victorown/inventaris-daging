<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'Admin',
            'password' => password_hash('Admin07#', PASSWORD_BCRYPT),
        ];

        $this->db->table('user')->insert($data);
    }
}
