<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsUsageModel extends Model
{
    protected $table = 'uploads_usage';
    protected $primaryKey = 'id_usage';
    protected $returnType = 'object';
    protected $allowedFields = ['id_usage', 'nama_usage'];

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

    public function _getWithoutProfilePhoto()
    {
        $where = "id_usage != 'usg_0211'";
        return $this->where($where)->get()->getResult();
    }

    public function _getOnlyRoadshow()
    {
        $result = $this->like('nama_usage', 'Roadshow')
            ->get()
            ->getResult();

        return $result;
    }
}
