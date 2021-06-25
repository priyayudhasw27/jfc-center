<?php

namespace App\Models;

use CodeIgniter\Model;

class OperatorModel extends Model
{
    protected $table = 'operator';
    protected $primaryKey = 'id_operator';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_operator',
        'nama_operator',
        'jenis_kelamin',
        'email',
        'nomor_hp',
        'alamat',
        'asal',
        'id_direktorat',
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

    public function _getWithDirektorat()
    {
        $result = $this->join('direktorat', 'direktorat.id_direktorat = operator.id_direktorat')
            ->get()
            ->getResult();

        return $result;
    }

    public function _getAllInfoById($id_operator)
    {
        $result = $this->where('id_operator', $id_operator)
            ->join('direktorat', 'direktorat.id_direktorat = operator.id_direktorat')
            ->join('user', 'user.username = operator.username')
            ->get()
            ->getResult();

        return $result;
    }
}
