<?php namespace App\Models;

use CodeIgniter\Model;

class MovingPesertaModel extends Model{
    protected $table = 'moving_peserta';
    protected $primaryKey = 'id_moving';
    protected $returnType = 'object';
    protected $allowedFields = ['id_moving','id_peserta','id_sub_kategori_1', 'id_sub_kategori_2', 'username_leader', 'username_admin', 'created_at', 'approved_at', 'status'];

    public function _get(){
        return $this->findAll();
    }

    public function _findById($id){
        return $this->like('id_kategori', $id.'%')
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

    // public function _getProposal(){
    //     $result = $this->select('*, sub_kategori1')
    //     ->join('peserta', 'peserta.id_peserta = moving_peserta.id_peserta')
    //     ->join('sub_kategori', 'sub_kategori.id_sub_kategori = moving_peserta.id_sub_kategori_1')
    //     ->join('sub_kategori', 'sub_kategori.id_sub_kategori = moving_peserta.id_sub_kategori_2')
    //     ->join('leader', 'leader.username = moving_peserta.username_leader')
    //     ->join('admin', 'admin.username = moving_peserta.username_admin')
    //     ->get()
    //     ->getResult();
    //     return $result;
    // }

    public function _getProposal(){
        $result = $this->select('*')
        ->join('peserta', 'peserta.id_peserta = moving_peserta.id_peserta')
        ->join('leader', 'leader.username = moving_peserta.username_leader')
        ->where('status', 0)
        ->get()
        ->getResult();
        return $result;
    }
}
