<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $table = 'bb_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'jumlah', 'id_jenis_daging'];

    public function gabs_edit($id)
    {
        return $this->table('bb_keluar')
            ->select('bb_keluar.*, bahan_baku.bahan_baku, bahan_baku.nama_jenis')
            ->join('bahan_baku', 'bahan_baku.id = bb_keluar.id_jenis_daging')
            ->where('bb_keluar.id', $id)
            ->get()
            ->getrow();
    }

    public function gabs_show()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('bahan_baku', 'bahan_baku.id = bb_keluar.id_jenis_daging', 'left');
        $builder->select('bb_keluar.*, bahan_baku.bahan_baku, bahan_baku.nama_jenis');

        $query = $builder->get();
        return $query->getResult();
    }

    public function hapus($id)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $builder->delete(['id' => $id]);
        $query = $builder->get();

        return $query->getResult();
    }

    public function getTotalDagingKeluar($jenisDagingId)
    {
        return $this->selectSum('jumlah')->where('id_jenis_daging', $jenisDagingId)->get()->getRowArray();
    }
}
