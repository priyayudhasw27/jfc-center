<?php namespace App\Models;

use CodeIgniter\Model;

class WorkshopModel extends Model{
    protected $table = 'workshop';
    protected $primaryKey = 'id_workshop';
    protected $returnType = 'object';
    protected $allowedFields = ['id_workshop', 'nama_workshop', 'id_instruktur', 'materi', 'id_jadwal', 'id_venue', 'dresscode'];

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

    public function _getAllInfo(){
        $result = $this->select('*')
        ->join('jadwal', 'jadwal.id_jadwal = workshop.id_jadwal')
        ->join('venue', 'venue.id_venue = workshop.id_venue')
        ->orderBy('tanggal', 'ASC')
        ->get()
        ->getResult();

        return $result;
    }

    public function _getIncomingAllInfo(){
        $where = "tanggal >= CURDATE()";

        $result = $this->select('*')
        ->join('jadwal', 'jadwal.id_jadwal = workshop.id_jadwal')
        ->join('venue', 'venue.id_venue = workshop.id_venue')
        ->where($where)
        ->get()
        ->getResult();

        return $result;
    }

    public function _getAllInfoById($id_workshop){
        $result = $this->select('*')
        ->join('jadwal', 'jadwal.id_jadwal = workshop.id_jadwal')
        ->join('venue', 'venue.id_venue = workshop.id_venue')
        ->where('id_workshop', $id_workshop)
        ->get()
        ->getResult();

        return $result;
    }
}

?>