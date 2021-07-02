<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranInstrukturModel extends Model
{
    protected $table = 'kehadiran_instruktur';
    protected $primaryKey = 'id_kehadiran';
    protected $returnType = 'object';
    protected $allowedFields = ['id_kehadiran', 'id_instruktur', 'id_workshop', 'inclass',];

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

    public function _getInstrukturByWorkshop($id_workshop)
    {
        $result = $this->select('instruktur.*')
            ->where('id_workshop', $id_workshop)
            ->join('instruktur', 'instruktur.id_instruktur = kehadiran_instruktur.id_instruktur')
            ->get()
            ->getResult();
        return $result;
    }

    public function _getWorkshopByInstruktur($id_instruktur)
    {
        $result = $this->select('workshop.*, jadwal.*')
            ->where('id_instruktur', $id_instruktur)
            ->join('workshop', 'workshop.id_workshop = kehadiran_instruktur.id_workshop')
            ->join('jadwal', 'jadwal.id_jadwal = workshop.id_jadwal')
            ->get()
            ->getResult();
        return $result;
    }

    public function _getInclass($idInstruktur, $idWorkshop)
    {
        return $this->select('kehadiran_instruktur.inclass')
            ->where("id_instruktur = '" . $idInstruktur . "' && id_workshop = '" . $idWorkshop . "'")
            ->get()
            ->getResult();
    }

    public function _findId($idInstruktur, $idWorkshop)
    {
        return $this->select('kehadiran_instruktur.id_kehadiran')
            ->where("id_instruktur = '" . $idInstruktur . "' && id_workshop = '" . $idWorkshop . "'")
            ->get()
            ->getResult();
    }

    public function _findBy($idInstruktur, $idWorkshop)
    {
        return $this->where("id_instruktur = '" . $idInstruktur . "' && id_workshop = '" . $idWorkshop . "'")
            ->get()
            ->getResult();
    }

    public function _deleteByWorkshop($id_workshop)
    {
        $this->where('id_workshop', $id_workshop)->delete();
    }

    public function _getProposal()
    {
        $result = $this->where('inclass', 2)
            ->join('instruktur', 'instruktur.id_instruktur = kehadiran_instruktur.id_instruktur')
            ->join('workshop', 'workshop.id_workshop = kehadiran_instruktur.id_workshop')
            ->join('jadwal', 'jadwal.id_jadwal = workshop.id_jadwal')
            ->get()
            ->getResult();

        return $result;
    }
}
