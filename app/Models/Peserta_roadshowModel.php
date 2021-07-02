<?php

namespace App\Models;

use CodeIgniter\Model;

class Peserta_roadshowModel extends Model
{
    protected $table = 'peserta_roadshow';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'id_peserta',
        'id_roadshow',
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

    public function _findByIdPeserta($id_peserta){
        $result = $this->where('id_peserta', $id_peserta)
        ->join('roadshow', 'roadshow.id_roadshow = peserta_roadshow.id_roadshow')
        ->get()
        ->getResult();

        return $result;
    }

    public function _findByIdRoadshow($id_roadshow){
        $result = $this->where('id_roadshow', $id_roadshow)
        ->join('roadshow', 'roadshow.id_roadshow = peserta_roadshow.id_roadshow')
        ->get()
        ->getResult();

        return $result;
    }
}
