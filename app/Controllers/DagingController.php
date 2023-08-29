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
            'title' => 'Data Daging',
            'menu' => 'daging',
            'page' => 'Daging',
            'subtitle' => 'Data Daging',
            'daging' => $daging
        ];


        return view('daging/daging', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Daging',
            'menu' => 'daging',
            'page' => 'Daging',
            'subtitle' => 'Tambah Data Daging',
        ];

        return view('daging/addDaging', $data);
    }

    public function save()
    {
        $this->dagingModel->save([
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
            'title' => 'Edit Daging',
            'menu' => 'Daging',
            'page' => 'Daging',
            'subtitle' => 'Edit Data Daging',
            'daging' => $this->dagingModel->getDaging($id)
        ];

        return view('daging/editDaging', $data);
    }

    public function update($id)
    {
        $data = [
            'iddaging' => $id,
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'desc' => $this->request->getVar('desc')
        ];
        $this->dagingModel->update($id, $data);
        $this->session->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('daging');
    }
}
