<?php

namespace App\Models;

use CodeIgniter\Model;

class KeikutsertaanModel extends Model
{
    protected $table = 'keikutsertaan';
    protected $primaryKey = 'id_keikutsertaan';
    protected $returnType = 'object';
    protected $allowedFields = ['id_keikutsertaan', 'id_peserta', 'id_kategori', 'id_sub_kategori', 'keterangan', 'created_at'];

    public function _get()
    {
        return $this->findAll();
    }

    public function _findById($id)
    {
        return $this->find($id);
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

    public function _getAllInfoByIdPeserta($id_peserta)
    {
        $result = $this->where('keikutsertaan.id_peserta', $id_peserta)
            ->join('peserta', 'peserta.id_peserta = keikutsertaan.id_peserta')
            ->join('kategori', 'kategori.id_kategori = keikutsertaan.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = keikutsertaan.id_sub_kategori', 'left')
            ->get()
            ->getResult();

        return $result;
    }
}
