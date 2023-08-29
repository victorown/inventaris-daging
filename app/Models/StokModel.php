<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\DagingModel;

class StokModel extends Model
{
    protected $table = 'stok_view';
    protected $primaryKey = 'iddaging';
    protected $allowedFields = ['iddaging', 'nama_jenis', 'stok'];


    public function getStokByJenisDaging($jenisDagingId)
    {
        return $this->where('id_jenis_daging', $jenisDagingId)->first();
    }

    public function getStokDagingData()
    {
        $dagingmodel = new DagingModel();

        $stokDagingData = [];

        $jenisDaging = $dagingmodel->findAll();

        foreach ($jenisDaging as $jenis) {
            $stok = $this->getStokByJenisDaging($jenis['iddaging']);
            if ($stok !== null) {
                $stokDagingData[] = [
                    'nama_jenis' => $jenis['nama_jenis'],
                    'stok' => $stok['stok']
                ];
            }
        }

        return $stokDagingData;
    }

    public function getDataStok()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stok_daging');

        return $builder->get();
    }
}
