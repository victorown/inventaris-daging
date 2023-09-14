<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan_bulanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bulan', 'bahan_baku', 'nama_jenis', 'total_daging_masuk', 'total_daging_keluar'];

    public function ambilLaporan()
    {
        $data = $this->db->query("
            SELECT bulan, bahan_baku, nama_jenis, 
                    SUM(total_daging_masuk) AS total_daging_masuk, 
                    SUM(total_daging_keluar) AS total_daging_keluar
            FROM laporan_bulanan
            GROUP BY bulan, nama_jenis, bahan_baku
            ORDER BY bulan DESC
        ");

        return $data->getResultArray();
    }
}
