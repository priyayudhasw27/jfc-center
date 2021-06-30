<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{
    protected $table = 'uploads';
    protected $primaryKey = 'id_uploads';
    protected $returnType = 'object';
    protected $allowedFields = ['id_uploads', 'filepath', 'username', 'id_usage', 'uploaded_at'];

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

    public function _getProfilePhoto($username){
        $result = $this->where('username', $username)
            ->where('uploads.id_usage', 'usg_0211')
            ->get()
            ->getResult();
        return $result;
    }

    public function _getByIdUsage($username, $idUsage)
    {
        $where = "username = '" . $username . "' && id_usage = '" . $idUsage . "'";
        $result = $this->where($where)
            ->get()
            ->getResult();
        return $result;
    }

    public function _countPhotoByUsage($idUsage, $username){
        $where = "username = '" . $username . "' && id_usage = '" . $idUsage . "'";
        $result = $this->where($where)
            ->countAllResults();
        return $result;
    }
}
