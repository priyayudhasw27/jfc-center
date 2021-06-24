<?php namespace App\Models;

use CodeIgniter\Model;

class DirektoratModel extends Model{
    protected $table = 'direktorat';
    protected $primaryKey = 'id_direktorat';
    protected $returnType = 'object';
    protected $allowedFields = ['id_direktorat', 'nama_direktorat'];

    public function _get(){
        return $this->findAll();
    }

    public function _findById($id){
        return $this->find($id);
    }

    public function _insert($data){
        $this->insert($data);
    }

    public function _update($id, $data){
        $this->update($id, $data);
    }

    public function _delete($id){
        $this->delete($id);
    }
}

?>