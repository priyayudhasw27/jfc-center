<?php namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $returnType = 'object';
    protected $allowedFields = ['id_jadwal', 'waktu_mulai', 'waktu_selesai', 'tanggal'];

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

    public function _deleteByWorkshop($id_workshop){
        $this->where('id_workshop', $id_workshop)->delete();
    }

    public function _getWorkshopAfterCurrentDate(){
        $where = "tanggal >= CURDATE()";
        
        return $this->where($where)
        ->join('workshop', 'workshop.id_jadwal = jadwal.id_jadwal')
        ->get()
        ->getResult();
    }

}
