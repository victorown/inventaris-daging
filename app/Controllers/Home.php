<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\DagingModel;
use App\Models\MasukModel;
use App\Models\KeluarModel;
use App\Models\StokModel;

class Home extends BaseController
{
    protected $laporan;
    protected $dagingmodel;
    protected $masukmodel;
    protected $keluarmodel;
    protected $stokmodel;
    public function __construct()
    {
        $this->laporan = new LaporanModel();
        $this->dagingmodel = new DagingModel();
        $this->masukmodel = new MasukModel();
        $this->keluarmodel = new KeluarModel();
        $this->stokmodel = new StokModel();
    }
    public function index(): string
    {

        $daging = $this->dagingmodel->findAll();

        $data = [
            'menu' => 'dashboard',
            'page' => 'Dashboard',
            'subtitle' => 'Dashboard',
            'title' => 'Dashboard',
            'laporan_bulanan' => $this->laporan->ambilLaporan(),
            'jumlah_daging' => $this->dagingmodel->countAllResults(),
            'masuk' => $this->masukmodel->countAllResults(),
            'keluar' => $this->keluarmodel->countAllResults(),
            'stoks' => $this->stokmodel->countAllResults(),
            'jenis_daging' => $daging,
        ];

        // ini foreach untuk alert stok dalam gudang daging
        foreach ($daging as $jenis) {
            $total_masuk = $this->masukmodel->where('id_jenis_daging', $jenis['iddaging'])->selectSum('jumlah')->get()->getRow()->jumlah;
            $total_keluar = $this->keluarmodel->where('id_jenis_daging', $jenis['iddaging'])->selectSum('jumlah')->get()->getRow()->jumlah;

            $data['total_daging_masuk'][$jenis['iddaging']] = $total_masuk;
            $data['total_daging_keluar'][$jenis['iddaging']] = $total_keluar;

            $stokmin = 20;
            $stok = $total_masuk - $total_keluar;
            if ($stok <= $stokmin) {
                $data['alert'][$jenis['iddaging']] = "Stok jenis daging <b>{$jenis['nama_jenis']}</b> di bawah <b>$stokmin</b>";
            }
        }

        // dd($data['laporan_bulanan']);
        return view('dashboard', $data);
    }
}
