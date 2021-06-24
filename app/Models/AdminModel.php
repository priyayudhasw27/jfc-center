<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_admin',
        'nama_admin',
        'jenis_kelamin',
        'email',
        'nomor_hp',
        'alamat',
        'asal',
        'username',
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
        return $this->find($id);
    }

    public function _findByUsername($username)
    {
        return $this->where('username', $username)
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


}
