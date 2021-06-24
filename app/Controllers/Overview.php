<?php

namespace App\Controllers;

use App\Models\KategoriModel;
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
        if ($this->request->getVar('action') == 'GetTotalKategori') {
            $idKategori = $this->request->getVar('id_kategori');

            $pesertaModel = new PesertaModel;

            $jumlahPeserta = $pesertaModel->_getJumlahPeserta($idKategori);

            $output = array(
                'jumlahPeserta' => $jumlahPeserta,
            );

            return json_encode($output);
        }
        if ($this->request->getVar('action') == 'GetTotalSubKategori') {
            $idSubKategori = $this->request->getVar('id_sub_kategori');

            $pesertaModel = new PesertaModel;

            $jumlahPeserta = $pesertaModel->_getJumlahPeserta($idSubKategori);

            $output = array(
                'jumlahPeserta' => $jumlahPeserta,
            );

            return json_encode($output);
        }
    }
}
