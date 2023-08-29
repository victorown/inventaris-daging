<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TriggerStokMasuk extends Migration
{
    public function up()
    {
        $query = "CREATE TRIGGER trigger_stok_masuk
                AFTER INSERT ON info_daging_masuk
                FOR EACH ROW
                BEGIN
                    UPDATE stok_daging
                    SET stok = stok + NEW.jumlah
                    WHERE id_jenis_daging = NEW.id_jenis_daging;
                END;";
        $this->db->query($query);
    }

    public function down()
    {
        $query = "DROP TRIGGER IF EXISTS trigger_stok_masuk";
        $this->db->query($query);
    }
}
