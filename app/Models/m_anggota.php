<?php

namespace App\Models;

use CodeIgniter\Models;
use CodeIgniter\Model;

class m_anggota extends Model
{
    protected $table = 'tb_anggota';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getAllData()
    {
        return $this->builder->get()->getResultArray();
    }
    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
    public function hapus($id)
    {
        return $this->builder->delete(['id_anggota' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_anggota' => $id]);
    }
}
