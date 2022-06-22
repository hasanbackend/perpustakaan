<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_anggota;
// use CodeIgniter\Validation\Validation;

class anggota extends Controller
{
    public function __construct()
    {
        $this->model = new m_anggota;
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Anggota',
            'anggota' => $this->model->getAllData()
        ];

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_topbar');
        echo view('anggota/index', $data);
        echo view('layout/v_footer');
    }
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nama_anggota' => [
                    'label' => 'Anggota',
                    'rules' => 'required'
                ],
                'no_telp_anggota' => [
                    'label' => 'No Telp Anggota',
                    'rules' => 'required'
                ],
                'alamat_anggota' => [
                    'label' => 'Alamat Anggota',
                    'rules' => 'required'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Anggota',
                    'anggota' => $this->model->getAllData()
                ];

                echo view('layout/v_header', $data);
                echo view('layout/v_sidebar');
                echo view('layout/v_topbar');
                echo view('anggota/index', $data);
                echo view('layout/v_footer');
            } else {
                $data = [
                    'nama_anggota' => $this->request->getPost('nama_anggota'),
                    'no_telp_anggota' => $this->request->getPost('no_telp_anggota'),
                    'alamat_anggota' => $this->request->getPost('alamat_anggota'),
                ];
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to('/anggota');
                }
            }
        } else {
            return redirect()->to('/anggota');
        }
    }
    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to('/anggota');
        }
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'nama_anggota' => [
                    'label' => 'Anggota',
                    'rules' => 'required'
                ],
                'no_telp_anggota' => [
                    'label' => 'No Telp Anggota',
                    'rules' => 'required'
                ],
                'alamat_anggota' => [
                    'label' => 'Alamat Anggota',
                    'rules' => 'required'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Anggota',
                    'anggota' => $this->model->getAllData()
                ];

                echo view('layout/v_header', $data);
                echo view('layout/v_sidebar');
                echo view('layout/v_topbar');
                echo view('anggota/index', $data);
                echo view('layout/v_footer');
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'nama_anggota' => $this->request->getPost('nama_anggota'),
                    'no_telp_anggota' => $this->request->getPost('no_telp_anggota'),
                    'alamat_anggota' => $this->request->getPost('alamat_anggota'),
                ];
                $success = $this->model->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to('/anggota');
                }
            }
        } else {
            return redirect()->to('/anggota');
        }
    }
}
