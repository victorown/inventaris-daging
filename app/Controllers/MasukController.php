<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasukModel;
use App\Models\DagingModel;
use App\Models\StokModel;

class MasukController extends BaseController
{
    protected $dagingmasuk;
    protected $dagingModel;
    protected $session;
    protected $stokModel;
    public function __construct()
    {
        $this->dagingmasuk = new MasukModel();
        $this->dagingModel = new DagingModel();
        $this->stokModel = new StokModel();
        $this->session = session();
    }

    public function index()
    {

        $masuk = $this->dagingmasuk->gabs_nama_jenis();
        $data = [
            'title' => 'Bahan Baku Masuk',
            'menu' => 'masuk',
            'page' => 'Info Bahan Baku Masuk',
            'subtitle' => 'Data Bahan Baku Masuk',
            'masuk' => $masuk,
        ];

        return view('masuk/masuk', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Daging Masuk',
            'menu' => 'masuk',
            'page' => 'Info Masuk',
            'subtitle' => 'Tambah Data Daging Masuk',
            'jenis' => $this->dagingModel->findAll(),
        ];

        return view('masuk/addMasuk', $data);
    }

    public function save()
    {
        $date = $this->request->getVar('tanggal');
        if (!$date) {
            $date = date('y-m-d');
        }

        $this->dagingmasuk->save([
            'tanggal' => $date,
            'jumlah' => $this->request->getVar('jumlah'),
            'id_jenis_daging' => $this->request->getVar('id_jenis_daging')
        ]);

        $this->session->setFlashdata('pesan', 'Data berhasil disimpan');

        return redirect()->to('masuk');
    }

    public function delete($id)
    {
        // $this->dagingmasuk->hapus($id);
        $this->dagingmasuk->delete($id);
        $this->session->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->back();
    }

    public function edit($id)
    {

        $data = [
            'title' => 'Edit Bahan Baku Masuk',
            'menu' => 'masuk',
            'page' => 'Info Bahan Baku Masuk',
            'subtitle' => 'Edit Data Bahan Baku Masuk',
            'masuk' => $this->dagingmasuk->gabs($id),
            'daging' => $this->dagingModel->findAll()
        ];


        return view('masuk/editMasuk', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'id_jenis_daging' => $this->request->getVar('id_jenis_daging'),
            'jumlah' => $this->request->getVar('jumlah'),
            'tanggal' => $this->request->getVar('tanggal')
        ];

        $this->dagingmasuk->update($id, $data);
        $this->session->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('masuk');
    }
}
