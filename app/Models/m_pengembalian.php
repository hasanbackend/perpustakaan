<?php

namespace App\Models;

use CodeIgniter\Models;
use CodeIgniter\Model;

class m_pengembalian extends Model
{
    protected $table = 'tb_pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $allowedFields = ['tanggal_pengembalian', 'id_petugas', 'id_anggota', 'id_buku', 'denda'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getAllData()
    {
        return $this->builder
            ->join('tb_petugas', 'tb_petugas.id_petugas=tb_pengembalian.id_petugas')
            ->join('tb_buku', 'tb_buku.id_buku=tb_pengembalian.id_buku')
            ->join('tb_anggota', 'tb_anggota.id_anggota=tb_pengembalian.id_anggota')
            ->get()->getResultArray();
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
    public function hapus($id)
    {
        return $this->builder->delete(['id_pengembalian' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_pengembalian' => $id]);
    }
}
