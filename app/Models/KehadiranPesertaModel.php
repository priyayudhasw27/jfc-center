<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranPesertaModel extends Model
{
    protected $table = 'kehadiran_peserta';
    protected $primaryKey = 'id_kehadiran';
    protected $returnType = 'object';
    protected $allowedFields = ['id_kehadiran', 'id_peserta', 'id_workshop', 'inclass', 'keterlambatan'];

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

    public function _getPeserta($id_workshop)
    {
        $result = $this->where('id_workshop', $id_workshop)
            ->join('peserta', 'peserta.id_peserta = kehadiran_peserta.id_peserta')
            ->get()
            ->getResult();
        return $result;
    }

    public function _deleteByWorkshop($id_workshop)
    {
        $this->where('id_workshop', $id_workshop)->delete();
    }

    public function _findId($idPeserta, $idWorkshop)
    {
        return $this->where("id_peserta = '" . $idPeserta . "' && id_workshop = '" . $idWorkshop . "'")
            ->get()
            ->getResult();
    }

    public function _countHadirByWorkshop($id_workshop)
    {
        return $this->where("id_workshop = '" . $id_workshop . "' && inclass = 1")->countAllResults();
    }

    public function _countTidakHadirByWorkshop($id_workshop)
    {
        return $this->where("id_workshop = '" . $id_workshop . "' && inclass = 0")->countAllResults();
    }

    public function _getTotalWorkshopByPeserta($id_peserta)
    {
        $result = $this->where('id_peserta', $id_peserta)
            ->countAllResults();
        return $result;
    }

    public function _getTotalWorkshopDoneByPeserta($id_peserta)
    {
        $result = $this->where("id_peserta = '".$id_peserta."' && inclass = 1")
            ->countAllResults();
        return $result;
    }

    public function _getTotalWorkshopUndoneByPeserta($id_peserta)
    {
        $result = $this->where('kehadiran_peserta.id_peserta', $id_peserta)
        ->join('workshop', 'workshop.id_workshop = kehadiran_peserta.id_workshop')
        ->join('jadwal', 'jadwal.id_jadwal = workshop.id_jadwal')
        ->where('jadwal.tanggal >= CURDATE()')
        ->where('inclass = 0')
        ->countAllResults();
        return $result;
    }

    public function _getTotalWorkshopMissedByPeserta($id_peserta)
    {
        $result = $this->where('kehadiran_peserta.id_peserta', $id_peserta)
        ->join('workshop', 'workshop.id_workshop = kehadiran_peserta.id_workshop')
        ->join('jadwal', 'jadwal.id_jadwal = workshop.id_jadwal')
        ->where('jadwal.tanggal <= CURDATE()')
        ->where('inclass = 0')
        ->countAllResults();
        return $result;
    }
}
