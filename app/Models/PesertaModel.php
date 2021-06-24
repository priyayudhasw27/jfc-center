<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_peserta',
        'nama_peserta',
        'jenis_kelamin', 
        'tanggal_lahir', 
        'email', 
        'nomor_hp', 
        'alamat',  
        'asal', 
        'username',
        'id_kategori', 
        'keterangan',
        'id_sub_kategori', 
        'created_at',
        'kecamatan', 
        'kabupaten',
        'provinsi',
        'prestasi',
    ];

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

    public function _getOnlyId()
    {
        return $this->select('id_peserta')
            ->get()
            ->getResult();
    }

    public function _getWithKategori()
    {
        $result = $this->select('*')
            ->join('kategori', 'kategori.id_kategori, peserta.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = peserta.id_sub_kategori')
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

    public function _getBySubKategori($id_sub_kategori)
    {
        $result = $this->where('peserta.id_sub_kategori', $id_sub_kategori)
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = peserta.id_sub_kategori')
            ->get()
            ->getResult();
        return $result;
    }

    public function _getHollowPeserta($idKategori = '', $idSubKategori = '')
    {
        if (($idKategori != null) && ($idSubKategori != null)) {
            $where = "id_kategori = '" . $idKategori . "' && id_sub_kategori IS NULL";
        } else if ($idKategori != null) {
            $where = "id_kategori IS NULL";
        }
        $result = $this->select('*')
            ->where($where)
            ->get()
            ->getResult();

        return $result;
    }

    public function _getAllInfoById($id_peserta)
    {
        $result = $this->where('id_peserta', $id_peserta)
            ->join('kategori', 'kategori.id_kategori = peserta.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = peserta.id_sub_kategori', 'left')
            ->get()
            ->getResult();
        return $result;
    }

    public function _getJumlahPeserta($id_kategori = '', $id_sub_kategori = '')
    {
        if ($id_kategori != '') {
            $result = $this->where('id_kategori', $id_kategori)
                ->countAllResults();
        } else if ($id_sub_kategori != '') {
            $result = $this->where('id_kategori', $id_kategori)
                ->countAllResults();
        }

        return $result;
    }

    public function _findByUsername($username)
    {
        $result = $this->where('username', $username)
            ->get()
            ->getResult();
        return $result;
    }

    public function _getProfilePhotosByUsername($username){
        $result = $this->select('uploads.filepath')
        ->join('uploads', 'uploads.id_peserta = peserta.id_peserta')
        ->where('username', $username)
        ->where('uploads.id_usage', 'usg_0211')
        ->get()
        ->getResult();

        return $result;
    }
}
