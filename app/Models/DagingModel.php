<?php

namespace App\Models;

use CodeIgniter\Model;

class DagingModel extends Model
{
    protected $table = 'jenis_daging';
    protected $primaryKey = 'iddaging';
    protected $allowedFields = ['nama_jenis', 'desc'];

    public function getDaging($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['iddaging' => $id])->first();
    }
}
