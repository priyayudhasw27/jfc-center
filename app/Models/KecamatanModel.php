<?php namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $returnType = 'object';
    protected $allowedFields = ['id_kecamatan', 'nama_kecamatan', 'id_kabupaten'];

    public function _get(){
        return $this->findAll();
    }

    public function _findById($id){
        return $this->find($id);
    }

    public function _findByKabupaten($id_kabupaten){
        return $this->where('id_kabupaten', $id_kabupaten)
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