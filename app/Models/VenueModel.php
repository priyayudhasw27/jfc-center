<?php namespace App\Models;

use CodeIgniter\Model;

class VenueModel extends Model{
    protected $table = 'venue';
    protected $primaryKey = 'id_venue';
    protected $returnType = 'object';
    protected $allowedFields = ['id_venue', 'nama_venue', 'alamat',];

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