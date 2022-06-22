<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_buku;
// use CodeIgniter\Validation\Validation;

class buku extends Controller
{
    public function __construct()
    {
        $this->model = new m_buku;
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Buku',
            'buku' => $this->model->getAllData()
        ];

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_topbar');
        echo view('buku/index', $data);
        echo view('layout/v_footer');
    }
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'judul_buku' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required'
                ],
                'penulis_buku' => [
                    'label' => 'Penulis Buku',
                    'rules' => 'required'
                ],
                'penerbit_buku' => [
                    'label' => 'Penerbit Buku',
                    'rules' => 'required'
                ],
                'tahun_terbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required'
                ],
                'stok' => [
                    'label' => 'Stok',
                    'rules' => 'required'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Buku',
                    'buku' => $this->model->getAllData()
                ];

                echo view('layout/v_header', $data);
                echo view('layout/v_sidebar');
                echo view('layout/v_topbar');
                echo view('buku/index', $data);
                echo view('layout/v_footer');
            } else {
                $data = [
                    'judul_buku' => $this->request->getPost('judul_buku'),
                    'penulis_buku' => $this->request->getPost('penulis_buku'),
                    'penerbit_buku' => $this->request->getPost('penerbit_buku'),
                    'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                    'stok' => $this->request->getPost('stok'),
                ];
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to('/buku');
                }
            }
        } else {
            return redirect()->to('/buku');
        }
    }
    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to('/buku');
        }
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'judul_buku' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required'
                ],
                'penulis_buku' => [
                    'label' => 'Penulis Buku',
                    'rules' => 'required'
                ],
                'penerbit_buku' => [
                    'label' => 'Penerbit Buku',
                    'rules' => 'required'
                ],
                'tahun_terbit' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required'
                ],
                'stok' => [
                    'label' => 'Stok',
                    'rules' => 'required'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data buku',
                    'buku' => $this->model->getAllData()
                ];

                echo view('layout/v_header', $data);
                echo view('layout/v_sidebar');
                echo view('layout/v_topbar');
                echo view('buku/index', $data);
                echo view('layout/v_footer');
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'judul_buku' => $this->request->getPost('judul_buku'),
                    'penulis_buku' => $this->request->getPost('penulis_buku'),
                    'penerbit_buku' => $this->request->getPost('penerbit_buku'),
                    'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                    'stok' => $this->request->getPost('stok'),
                ];
                $success = $this->model->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to('/buku');
                }
            }
        } else {
            return redirect()->to('/buku');
        }
    }
}
