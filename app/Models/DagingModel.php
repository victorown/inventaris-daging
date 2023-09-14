<?php

namespace App\Models;

use CodeIgniter\Model;

class DagingModel extends Model
{
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bahan_baku', 'nama_jenis', 'desc'];

    public function getDaging($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
