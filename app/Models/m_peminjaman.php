<?php

namespace App\Models;

use CodeIgniter\Models;
use CodeIgniter\Model;

class m_peminjaman extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['tanggal_peminjaman', 'id_petugas', 'id_anggota', 'id_buku'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->builder();
    }
    public function getAllData()
    {
        return $this->builder
            ->join('tb_petugas', 'tb_petugas.id_petugas=tb_peminjaman.id_petugas')
            ->join('tb_anggota', 'tb_anggota.id_anggota=tb_peminjaman.id_anggota')
            ->join('tb_buku', 'tb_buku.id_buku=tb_peminjaman.id_buku')
            ->get()->getResultArray();
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
    public function hapus($id)
    {
        return $this->builder->delete(['id_peminjaman' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_peminjaman' => $id]);
    }
}
