<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table = 'bb_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'jumlah', 'id_jenis_daging'];

    public function getDagingMasuk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function gabs($id)
    {
        return $this->table('bb_masuk')
            ->select('bb_masuk.*, bahan_baku.bahan_baku, bahan_baku.nama_jenis')
            ->join('bahan_baku', 'bahan_baku.id = bb_masuk.id_jenis_daging')
            ->where('bb_masuk.id', $id)
            ->get()
            ->getRow();
    }

    public function hapus($id)
    {
        // $this->db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        dd($id);
        $builder->delete(['id' => $id]);
        $query = $builder->get();

        return $query->getResult();
    }

    public function gabs_nama_jenis()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('bahan_baku', 'bahan_baku.id = bb_masuk.id_jenis_daging', 'left');
        $builder->select('bb_masuk.*, bahan_baku.bahan_baku, bahan_baku.nama_jenis');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getTotalDagingMasuk($jenisDagingId)
    {
        return $this->selectSum('jumlah')->where('id_bahan_baku', $jenisDagingId)->get()->getRowArray();
    }
}
