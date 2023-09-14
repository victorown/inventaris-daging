<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DagingModel;
use App\Models\KeluarModel;
use App\Models\MasukModel;
use App\Models\StokModel;
// use App\Models\DagingModel;

class StokController extends BaseController
{
    protected $dagingkeluar;
    protected $dagingmasuk;
    protected $stokmodel;

    public function __construct()
    {
        $this->stokmodel = new StokModel();
        $this->dagingkeluar = new KeluarModel();
        $this->dagingmasuk = new MasukModel();
    }

    public function index()
    {


        $data = [
            'title' => 'Stok Bahan Baku',
            'menu' => 'stok',
            'page' => 'Stok Bahan Baku',
            'subtitle' => 'Data Stok Bahan Baku',
            'stok' => $this->stokmodel->findAll()
        ];

        // dd($data['stok']);

        return view('stok', $data);
    }

    public function updateStok()
    {
        $stokModel = new StokModel();
        $jenisDagingModel = new DagingModel();

        $jenisDaging = $jenisDagingModel->findAll();

        foreach ($jenisDaging as $jenis) {
            $stokModel->updateStokByJenisDaging($jenis['id']);
        }
    }
}
