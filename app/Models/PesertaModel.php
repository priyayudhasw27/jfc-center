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
        'created_at',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'prestasi',
    ];

    // public function _get()
    // {
    //     return $this->findAll();
    // }

    // public function _findById($id)
    // {
    //     return $this->find($id);
    // }

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

    public function _get()
    {
        $result = $this->join('keikutsertaan', 'keikutsertaan.id_peserta = peserta.id_peserta')
            ->join('kategori', 'kategori.id_kategori = keikutsertaan.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = keikutsertaan.id_sub_kategori', 'left')
            ->orderBy('nama_peserta', 'ASC')
            ->get()
            ->getResult();
        return $result;
    }

    public function _findById($id_peserta)
    {
        $result = $this->where('peserta.id_peserta', $id_peserta)
            ->join('keikutsertaan', 'keikutsertaan.id_peserta = peserta.id_peserta')
            ->join('kategori', 'kategori.id_kategori = keikutsertaan.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = keikutsertaan.id_sub_kategori', 'left')
            ->orderBy('nama_peserta', 'ASC')
            ->get()
            ->getResult();
        return $result;
    }

    public function _findByKategori($id_kategori)
    {
        $result = $this->join('keikutsertaan', 'keikutsertaan.id_peserta = peserta.id_peserta')
            ->join('kategori', 'kategori.id_kategori = keikutsertaan.id_kategori')
            ->where('kategori.id_kategori', $id_kategori)
            ->orderBy('nama_peserta', 'ASC')
            ->get()
            ->getResult();
        return $result;
    }

    public function _findBySubKategori($id_sub_kategori)
    {
        $result = $this->join('keikutsertaan', 'keikutsertaan.id_peserta = peserta.id_peserta')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = keikutsertaan.id_sub_kategori')
            ->where('sub_kategori.id_sub_kategori', $id_sub_kategori)
            ->orderBy('nama_peserta', 'ASC')
            ->get()
            ->getResult();
        return $result;
    }

    // Get total peserta dengan kategori dan sub kategori
    public function _getJumlahPeserta($id_kategori = '', $id_sub_kategori = '')
    {
        $yearNow = date('Y', strtotime("now"));
        if ($id_kategori != '' && $id_sub_kategori == '') {
            $result = $this->join('keikutsertaan', 'keikutsertaan.id_peserta = peserta.id_peserta')
                ->where('id_kategori', $id_kategori)
                ->where("peserta.created_at >= '".$yearNow."-01-01' && peserta.created_at <= '".$yearNow."-12-31'")
                ->countAllResults();
        } else if ($id_sub_kategori != '') {
            $result = $this->join('keikutsertaan', 'keikutsertaan.id_peserta = peserta.id_peserta')
                ->where('id_sub_kategori', $id_sub_kategori)
                ->where("peserta.created_at >= '".$yearNow."-01-01' && peserta.created_at <= '".$yearNow."-12-31'")
                ->countAllResults();
        }
        return $result;
    }

    // Get Total Peserta Per Tahun
    public function _getTotal($year = '')
    {
        if (isset($year)) {
            $result = $this->where('created_at >= "' . $year . '-01-01" && created_at <= "' . $year . '-12-31"')
                ->CountAllResults();
        } else {
            $result = $this->select('*')
                ->CountAllResults();
        }

        return $result;
    }

    public function _findByUsername($username)
    {
        $result = $this->where('username', $username)
            ->join('keikutsertaan', 'keikutsertaan.id_peserta = peserta.id_peserta')
            ->join('kategori', 'kategori.id_kategori = keikutsertaan.id_kategori')
            ->join('sub_kategori', 'sub_kategori.id_sub_kategori = keikutsertaan.id_sub_kategori', 'left')
            ->orderBy('nama_peserta', 'ASC')
            ->get()
            ->getResult();
        return $result;
    }

    public function _findProfilePhotosByUsername($username)
    {
        $result = $this->select('uploads.filepath')
            ->join('uploads', 'uploads.id_peserta = peserta.id_peserta')
            ->where('username', $username)
            ->where('uploads.id_usage', 'usg_0211')
            ->get()
            ->getResult();

        return $result;
    }

    public function _getTotalByJk($jk)
    {
        $result = $this->where('jenis_kelamin', $jk)
            ->CountAllResults();

        return $result;
    }
}
