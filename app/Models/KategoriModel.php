<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $returnType = 'object';
    protected $allowedFields = ['id_kategori', 'nama_kategori', 'kuota'];

    public function _get()
    {
        return $this->findAll();
    }

    public function _findById($id)
    {
        return $this->like('id_kategori', $id . '%')
            ->get()
            ->getResult();
    }

    public function _insert($data)
    {
        $this->insert($data);
    }

    public function _update($id, $data)
    {
        $this->update($id, $data);
    }

    public function _delete($id)
    {
        $this->delete($id);
    }

    public function _getKuota($idKategori)
    {
        $result = $this->select('kuota')
        ->where('id_kategori', $idKategori)
        ->get()
        ->getResult();

        return $result;
    }
}
