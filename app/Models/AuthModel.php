<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    public function getUser($username)
    {
        return $this->where('username', $username)
            ->first();
    }
}
