<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{
    protected $table = 'uploads';
    protected $primaryKey = 'id_uploads';
    protected $returnType = 'object';
    protected $allowedFields = ['id_uploads', 'filepath', 'id_peserta', 'id_usage', 'uploaded_at'];

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

    public function _getByIdUsage($idPeserta, $idUsage)
    {
        $where = "id_peserta = '" . $idPeserta . "' && id_usage = '" . $idUsage . "'";
        $result = $this->where($where)
            ->get()
            ->getResult();
        return $result;
    }
}
