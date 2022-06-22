<?php

namespace App\Models;

use CodeIgniter\Models;
use CodeIgniter\Model;

class m_petugas extends Model
{
    protected $table = 'tb_petugas';

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
        return $this->builder->delete(['id_petugas' => $id]);
    }
    public function ubah($data, $id_petugas)
    {
        return $this->builder->update($data, ['id_petugas' => $id_petugas]);
    }
}
