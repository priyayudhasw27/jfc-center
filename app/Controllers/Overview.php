<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\KehadiranPesertaModel;
use App\Models\KeikutsertaanModel;
use App\Models\PesertaModel;
use App\Models\SubKategoriModel;

class Overview extends BaseController
{

    // Method untuk get kuota pendaftaran ====================================

    public function GetKuota()
    {
        if ($this->request->getVar('action') == 'GetKuotaKategori') {
            $idKategori = $this->request->getVar('id_kategori');

            $kategoriModel = new KategoriModel;
            $pesertaModel = new PesertaModel;

            $kuotaKategori = $kategoriModel->_getKuota($idKategori)[0]->kuota;
            $jumlahPeserta = $pesertaModel->_getJumlahPeserta($idKategori);

            $output = array(
                'jumlahPeserta' => $jumlahPeserta,
                'kuotaKategori' => $kuotaKategori,
            );

            return json_encode($output);
        }
        if ($this->request->getVar('action') == 'GetKuotaSubKategori') {
            $idSubKategori = $this->request->getVar('id_sub_kategori');

            $subKategoriModel = new SubKategoriModel;
            $pesertaModel = new PesertaModel;

            $kuotaSubKategori = $subKategoriModel->_getKuota($idSubKategori)[0]->kuota;
            $jumlahPeserta = $pesertaModel->_getJumlahPeserta($idSubKategori);

            $output = array(
                'jumlahPeserta' => $jumlahPeserta,
                'kuotaSubKategori' => $kuotaSubKategori,
            );

            return json_encode($output);
        }
    }

    // Method untuk get jumlah peserta ====================================

    public function GetTotalPeserta()
    {
        // Get Total Peserta Per Kategori
        if ($this->request->getVar('action') == 'GetTotalKategori') {
            $idKategori = $this->request->getVar('id_kategori');

            $pesertaModel = new PesertaModel;

            $jumlahPeserta = $pesertaModel->_getJumlahPeserta($idKategori);

            $output = array(
                'jumlahPeserta' => $jumlahPeserta,
            );

            return json_encode($output);
        }

        // Get Total Peserta Per Sub Kategori
        if ($this->request->getVar('action') == 'GetTotalSubKategori') {
            $idSubKategori = $this->request->getVar('id_sub_kategori');

            $pesertaModel = new PesertaModel;

            $jumlahPeserta = $pesertaModel->_getJumlahPeserta($idSubKategori);

            $output = array(
                'jumlahPeserta' => $jumlahPeserta,
            );

            return json_encode($output);
        }

        // Get Total Peserta Per Kategori Sekaligus
        if ($this->request->getVar('action') == 'GetTotalKategoriSekaligus') {

            $pesertaModel = new PesertaModel;
            $kategoriModel = new KategoriModel;

            $idKategori = $kategoriModel->_get();

            foreach($idKategori as $x => $y){
                $jumlahPeserta[$x] = $pesertaModel->_getJumlahPeserta($y->id_kategori);
                $label[$x] = $y->nama_kategori;
            }

            $output = [
                'label' => $label,
                'jumlahPeserta' => $jumlahPeserta,
            ];

            return json_encode($output);
        }

        // Get Total Peserta Per Tahun
        if ($this->request->getVar('action') == 'GetTotalPesertaPerTahun'){
            $pesertaModel = new PesertaModel;

            $qty = $this->request->getVar('qty');
            $date = date('Y', strtotime('now'));
            $intDate = (int)$date;

            for($x = 0 ; $x < $qty ; $x++){
                $year = $intDate+$x;
                $label[$x] = $year;
                $data[$x] = $pesertaModel->_getTotal($year);
            }

            $output = [
                'data' => $data,
                'label' => $label,
            ];

            return json_encode($output);
        }

        // Get Total Peserta By Jenis Kelamin
        if ($this->request->getVar('action') == 'GetTotalPesertaByJk'){
            $pesertaModel = new PesertaModel;
            $keikutsertaanModel = new KeikutsertaanModel;

            $year = date('Y', strtotime('now'));
            // Data Laki-laki
            $lData = $pesertaModel->_getTotalByJk('Laki - laki');
            // Data Perempuan
            $pData = $pesertaModel->_getTotalByJk('Perempuan');
            // 
            $kData = $keikutsertaanModel->_getTotalByKategori('WK');

            $output = [
                'Laki' => $lData,
                'Perempuan' => $pData,
                'Kids' => $kData,
            ];

            return json_encode($output);
        }
    }

    // Method untuk get jumlah workshop peserta ==============================

    public function GetTotalWorkshop()
    {
        if($this->request->getVar('action') == 'GetTotalWorkshopByPeserta'){
            $kehadiranPesertaModel = new KehadiranPesertaModel;

            $username = $this->request->getVar('username');
            $idPeserta = $this->getId($username);
            
            $result = $kehadiranPesertaModel->_getTotalWorkshopByPeserta($idPeserta);

            return json_encode($result);
        }

        if($this->request->getVar('action') == 'GetTotalWorkshopDoneByPeserta'){
            $kehadiranPesertaModel = new KehadiranPesertaModel;

            $username = $this->request->getVar('username');
            $idPeserta = $this->getId($username);
            
            $result = $kehadiranPesertaModel->_getTotalWorkshopDoneByPeserta($idPeserta);

            return json_encode($result);
        }

        if($this->request->getVar('action') == 'GetTotalWorkshopUndoneByPeserta'){
            $kehadiranPesertaModel = new KehadiranPesertaModel;

            $username = $this->request->getVar('username');
            $idPeserta = $this->getId($username);
            
            $result = $kehadiranPesertaModel->_getTotalWorkshopUndoneByPeserta($idPeserta);

            return json_encode($result);
        }

        if($this->request->getVar('action') == 'GetTotalWorkshopMissedByPeserta'){
            $kehadiranPesertaModel = new KehadiranPesertaModel;

            $username = $this->request->getVar('username');
            $idPeserta = $this->getId($username);
            
            $result = $kehadiranPesertaModel->_getTotalWorkshopMissedByPeserta($idPeserta);

            return json_encode($result);
        }
    }

}
