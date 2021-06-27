<?php

namespace App\Models;

use CodeIgniter\Model;

class LeaderModel extends Model
{
    protected $table = 'leader';
    protected $primaryKey = 'id_leader';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_leader',
        'nama_leader',
        'jenis_kelamin',
        'email',
        'nomor_hp',
        'alamat',
        'asal',
        'username',
        'id_kategori',
        'id_sub_kategori',
        'kecamatan',
        'kabupaten',
        'provinsi',
    ];

    public function _get()
    {
        return $this->findAll();
    }

    public function _findById($id)
    {
        return $this->where('id_leader', $id)
            ->join('kategori', 'kategori.id_kategori = leader.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = leader.id_sub_kategori', 'left')
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

    public function _getOnlyId()
    {
        return $this->select('id_peserta')
            ->get()
            ->getResult();
    }

    public function _getWithKategori()
    {
        $result = $this->select('*')
            ->join('kategori', 'kategori.id_kategori = leader.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = leader.id_sub_kategori', 'left')
            ->get()
            ->getResult();
        return $result;
    }
    public function _getAllInfoById($idleader)
    {
        $result = $this->select('*')
            ->where('id_leader', $idleader)
            ->join('kategori', 'kategori.id_kategori = leader.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = leader.id_sub_kategori')
            ->join('user', 'user.username = leader.username')
            ->get()
            ->getResult();
        return $result;
    }

    public function _getByKategori($id_kategori)
    {
        $result = $this->where('peserta.id_kategori', $id_kategori)
            ->join('kategori', 'kategori.id_kategori = peserta.id_kategori')
            ->get()
            ->getResult();
        return $result;
    }

    public function _findByUsername($username)
    {
        $result = $this->where('username', $username)
            ->join('kategori', 'kategori.id_kategori = leader.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = leader.id_sub_kategori', 'left')
            ->get()
            ->getResult();

        return $result;
    }
}
