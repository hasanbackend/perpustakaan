<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_peminjaman;
use App\Models\m_petugas;
use App\Models\m_anggota;
use App\Models\m_buku;
use CodeIgniter\Validation\Validation;

class peminjaman extends Controller
{
    public function __construct()
    {
        $this->model = new m_peminjaman;
        $this->petugas = new m_petugas;
        $this->anggota = new m_anggota;
        $this->buku = new m_buku;
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Peminjaman',
            'peminjaman' => $this->model->getAllData(),
            'petugas' => $this->petugas->getAllData(),
            'anggota' => $this->anggota->getAllData(),
            'buku' => $this->buku->getAllData()
        ];

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_topbar');
        echo view('peminjaman/index', $data);
        echo view('layout/v_footer');
    }
    public function tambah()
    {
        $data = [
            'tanggal_peminjaman' => $this->request->getPost('tanggal_peminjaman'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_buku' => $this->request->getPost('id_buku'),
        ];
        $success = $this->model->tambah($data);
        if ($success) {
            session()->setFlashdata('message', 'Ditambahkan');
            return redirect()->to('/peminjaman');
        }
    }

    public function hapus($id)
    {
        var_dump($id);
        // die;
        $success = $this->model->hapus($id);

        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to('/peminjaman');
        }
    }
    public function ubah()
    {
        $id = $this->request->getPost('id');
        $data = [
            'tanggal_peminjaman' => $this->request->getPost('tanggal_peminjaman'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_buku' => $this->request->getPost('id_buku'),
        ];
        $success = $this->model->ubah($data, $id);
        if ($success) {
            session()->setFlashdata('message', 'Diubah');
            return redirect()->to('/peminjaman');
        }
    }
}
