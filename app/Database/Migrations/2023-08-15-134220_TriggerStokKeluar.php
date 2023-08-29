<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TriggerStokKeluar extends Migration
{
    public function up()
    {
        $query = "CREATE TRIGGER trigger_stok_keluar
                AFTER INSERT ON info_daging_keluar
                FOR EACH ROW
                BEGIN
                    UPDATE stok_daging
                    SET stok = stok - NEW.jumlah
                    WHERE id_jenis_daging = NEW.id_jenis_daging;
                END;";
        $this->db->query($query);
    }

    public function down()
    {
        $query = 'DROP TRIGGER IF EXISTS trigger_stok_keluar';
        $this->db->query($query);
    }
}
