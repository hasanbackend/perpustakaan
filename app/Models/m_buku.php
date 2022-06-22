<?php

namespace App\Models;

use CodeIgniter\Models;
use CodeIgniter\Model;

class m_buku extends Model
{
    protected $table = 'tb_buku';

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
        return $this->builder->delete(['id_buku' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id_buku' => $id]);
    }
}
