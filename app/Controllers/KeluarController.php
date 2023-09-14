<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeluarModel;
use App\Models\DagingModel;
use App\Models\StokModel;

class KeluarController extends BaseController
{
    protected $dagingkeluar;
    protected $dagingmodel;
    protected $session;
    protected $stokModel;
    public function __construct()
    {
        $this->dagingkeluar = new KeluarModel();
        $this->dagingmodel = new DagingModel();
        $this->session = session();
        $this->stokModel = new StokModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Bahan Baku Keluar',
            'menu' => 'keluar',
            'page' => 'Info Bahan Baku Keluar',
            'subtitle' => 'Data Bahan Baku Keluar',
            'keluar' => $this->dagingkeluar->gabs_show()
        ];

        return view('keluar/keluar', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Bahan Baku Keluar',
            'menu' => 'keluar',
            'page' => 'Info Bahan Baku Keluar',
            'subtitle' => 'Tambah Data Bahan Baku Keluar',
            'jenis' => $this->dagingmodel->findAll(),
        ];

        return view('keluar/addKeluar', $data);
    }

    public function save()
    {
        $date = $this->request->getVar('tanggal');
        if (!$date) {
            $date = date('y-m-d');
        }

        // $jumlahs = $this->request->getVar('jumlah');
        // $minjumlah = -1 * abs($jumlahs);

        $this->dagingkeluar->save([
            'tanggal' => $date,
            'jumlah' => $this->request->getVar('jumlah'),
            'id_jenis_daging' => $this->request->getVar('id_jenis_daging')
        ]);
        $this->session->setFlashdata('pesan', 'Data berhasil disimpan');

        return redirect()->to('keluar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Bahan Baku Keluar',
            'menu' => 'keluar',
            'page' => 'Info Bahan Baku Keluar',
            'subtitle' => 'Edit Data Bahan Baku Keluar',
            'keluar' => $this->dagingkeluar->gabs_edit($id),
            'daging' => $this->dagingmodel->findAll()
        ];

        return view('keluar/editKeluar', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'id_jenis_daging' => $this->request->getVar('id_jenis_daging'),
            'jumlah' => $this->request->getVar('jumlah'),
            'tanggal' => $this->request->getVar('tanggal')
        ];

        $this->dagingkeluar->update($id, $data);
        $this->session->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/keluar');
    }

    public function delete($id)
    {
        $this->dagingkeluar->hapus($id);
        $this->session->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
