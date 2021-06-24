<?php namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model{
    protected $table = 'kabupaten';
    protected $primaryKey = 'id_kabupaten';
    protected $returnType = 'object';
    protected $allowedFields = ['id_kabupaten', 'nama_kabupaten', 'id_provinsi'];

    public function _get(){
        return $this->findAll();
    }

    public function _findById($id){
        return $this->find($id);
    }

    public function _findByProvinsi($id_provinsi){
        return $this->where('id_provinsi', $id_provinsi)
        ->get()
        ->getResult();
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