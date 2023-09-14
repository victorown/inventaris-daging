<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DagingModel;

class DagingController extends BaseController
{
    protected $dagingModel;
    protected $session;
    public function __construct()
    {
        $this->dagingModel = new DagingModel();
        $this->session = session();
    }

    public function index()
    {
        $daging = $this->dagingModel->findAll();
        $data = [
            'title' => 'Data Bahan Baku',
            'menu' => 'bahan baku',
            'page' => 'Bahan Baku',
            'subtitle' => 'Data Bahan Baku',
            'daging' => $daging
        ];


        return view('daging/daging', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Bahan Baku',
            'menu' => 'bahan baku',
            'page' => 'Bahan Baku',
            'subtitle' => 'Tambah Data Bahan Baku',
        ];

        return view('daging/addDaging', $data);
    }

    public function save()
    {
        $this->dagingModel->save([
            'bahan_baku' => $this->request->getVar('bahan_baku'),
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'desc' => $this->request->getVar('desc')
        ]);
        $this->session->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('daging');
    }

    public function delete($id)
    {
        $this->dagingModel->delete($id);
        $this->session->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Bahan Baku',
            'menu' => 'bahan baku',
            'page' => 'Bahan Baku',
            'subtitle' => 'Edit Data Bahan Baku',
            'daging' => $this->dagingModel->getDaging($id)
        ];

        return view('daging/editDaging', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'bahan_baku' => $this->request->getVar('bahan_baku'),
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'desc' => $this->request->getVar('desc')
        ];
        $this->dagingModel->update($id, $data);
        $this->session->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('daging');
    }
}
