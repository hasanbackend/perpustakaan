<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_petugas;
// use CodeIgniter\Validation\Validation;

class petugas extends Controller
{
    public function __construct()
    {
        $this->model = new m_petugas;
    }
    public function index()
    {
        // $model = new m_petugas();
        $data = [
            'judul' => 'Data Petugas',
            'petugas' => $this->model->getAllData()
        ];

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_topbar');
        echo view('petugas/index', $data);
        echo view('layout/v_footer');
    }
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nama_petugas' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required'
                ],
                'jabatan_petugas' => [
                    'label' => 'Penulis Buku',
                    'rules' => 'required'
                ],
                'no_telp_petugas' => [
                    'label' => 'Penerbit Buku',
                    'rules' => 'required'
                ],
                'alamat_petugas' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Petugas',
                    'petugas' => $this->model->getAllData()
                ];

                echo view('layout/v_header', $data);
                echo view('layout/v_sidebar');
                echo view('layout/v_topbar');
                echo view('petugas/index', $data);
                echo view('layout/v_footer');
            } else {
                $data = [
                    'nama_petugas' => $this->request->getPost('nama_petugas'),
                    'jabatan_petugas' => $this->request->getPost('jabatan_petugas'),
                    'no_telp_petugas' => $this->request->getPost('no_telp_petugas'),
                    'alamat_petugas' => $this->request->getPost('alamat_petugas'),
                ];
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to('/petugas');
                }
            }
        } else {
            return redirect()->to('/petugas');
        }
    }
    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to('/petugas');
        }
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate(
                [
                    'nama_petugas' => [
                        'label' => 'Nama PEtugas',
                        'rules' => 'required'
                    ],
                    'jabatan_petugas' => [
                        'label' => 'Jabatan Petugas',
                        'rules' => 'required'
                    ],
                    'no_telp_petugas' => [
                        'label' => 'No Telp Petugas',
                        'rules' => 'required'
                    ],
                    'alamat_petugas' => [
                        'label' => 'Alamat Petugas',
                        'rules' => 'required'
                    ]
                ]
            );
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Petugas',
                    'petugas' => $this->model->getAllData()
                ];

                echo view('layout/v_header', $data);
                echo view('layout/v_sidebar');
                echo view('layout/v_topbar');
                echo view('petugas/index', $data);
                echo view('layout/v_footer');
            } else {
                $id = $this->request->getPost('id');

                $data = [
                    'nama_petugas' => $this->request->getPost('nama_petugas'),
                    'jabatan_petugas' => $this->request->getPost('jabatan_petugas'),
                    'no_telp_petugas' => $this->request->getPost('no_telp_petugas'),
                    'alamat_petugas' => $this->request->getPost('alamat_petugas'),
                ];
                $success = $this->model->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to('/petugas');
                }
            }
        } else {
            return redirect()->to('/petugas');
        }
    }
}
