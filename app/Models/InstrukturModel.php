<?php

namespace App\Models;

use CodeIgniter\Model;

class InstrukturModel extends Model
{
    protected $table = 'instruktur';
    protected $primaryKey = 'id_instruktur';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_instruktur',
        'nama_instruktur',
        'jenis_kelamin',
        'email',
        'nomor_hp',
        'alamat',
        'asal',
        'prestasi',
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

    public function _findByUsername($username)
    {
        return $this->where('username', $username)
            ->get()
            ->getResult();
    }

    public function _getAllInfo()
    {
        $result = $this->join('kehadiran_instruktur', 'kehadiran_instruktur.id_instruktur = instruktur.id_instruktur')
            ->join('workshop', 'workshop.id_workshop = kehadiran_instruktur.id_workshop')
            ->get()
            ->getResult();

        return $result;
    }

    public function _findByIdWithUsername($id_instruktur){
        $result = $this->where('id_instruktur', $id_instruktur)
        ->join('user', 'user.username = instruktur.username')
        ->get()
        ->getResult();

        return $result;
    }

}
