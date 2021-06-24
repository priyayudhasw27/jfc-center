<?php namespace App\Models;

use CodeIgniter\Model;

class SubKategoriModel extends Model{
    protected $table = 'sub_kategori';
    protected $primaryKey = 'id_sub_kategori';
    protected $returnType = 'object';
    protected $allowedFields = ['id_sub_kategori', 'nama_sub_kategori', 'id_kategori', 'kuota'];

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

    public function _getKuota($idSubKategori)
    {
        $result = $this->select('kuota')
        ->where('id_kategori', $idSubKategori)
        ->get()
        ->getResult();

        return $result;
    }
}
