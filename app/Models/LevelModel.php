<?php namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model{
    protected $table = 'course';
    protected $primaryKey = 'id_level';
    protected $returnType = 'object';
    protected $allowedFields = ['id_level', 'keterangan'];

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