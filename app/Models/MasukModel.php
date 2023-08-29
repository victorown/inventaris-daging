<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table = 'info_daging_masuk';
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
        return $this->table('info_daging_masuk')
            ->select('info_daging_masuk.*, jenis_daging.nama_jenis')
            ->join('jenis_daging', 'jenis_daging.iddaging = info_daging_masuk.id_jenis_daging')
            ->where('info_daging_masuk.id', $id)
            ->get()
            ->getRow();
    }

    public function hapus($id)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $builder->delete(['id' => $id]);
        $query = $builder->get();

        return $query->getResult();
    }

    public function gabs_nama_jenis()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('jenis_daging', 'jenis_daging.iddaging = info_daging_masuk.id_jenis_daging', 'left');
        $builder->select('jenis_daging.nama_jenis');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getTotalDagingMasuk($jenisDagingId)
    {
        return $this->selectSum('jumlah')->where('id_jenis_daging', $jenisDagingId)->get()->getRowArray();
    }
}
