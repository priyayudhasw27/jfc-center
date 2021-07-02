<?php

namespace App\Models;

use CodeIgniter\Model;

class RoadshowModel extends Model
{
    protected $table = 'roadshow';
    protected $primaryKey = 'id_roadshow';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_roadshow',
        'lokasi',
        'tanggal',
        'id_usage',
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
}
