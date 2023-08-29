<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $table = 'info_daging_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'jumlah', 'id_jenis_daging'];

    public function gabs_edit($id)
    {
        return $this->table('info_daging_keluar')
            ->select('info_daging_keluar.*, jenis_daging.nama_jenis')
            ->join('jenis_daging', 'jenis_daging.iddaging = info_daging_keluar.id_jenis_daging')
            ->where('info_daging_keluar.id', $id)
            ->get()
            ->getrow();
    }

    public function gabs_show()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('jenis_daging', 'jenis_daging.iddaging = info_daging_keluar.id_jenis_daging', 'left');
        $builder->select('jenis_daging.nama_jenis');

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
