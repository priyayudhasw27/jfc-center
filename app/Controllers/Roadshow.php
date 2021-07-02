<?php

namespace App\Controllers;

use App\Models\Peserta_roadshowModel;
use App\Models\PesertaModel;
use App\Models\RoadshowModel;
use App\Models\UploadsModel;
use App\Models\UploadsUsageModel;

class Roadshow extends BaseController
{
    public function index()
    {
        $roadshowModel = new RoadshowModel;

        $userData = $this->session->userData;
        $alert = $this->session->getFlashdata('alert');

        $data = [
            'userData' => $userData,
            'roadshowData' => $roadshowModel->_get(),
            'alert' => $alert,
        ];

        $level = $userData['id_level'];
        if ($level == 99) {
            echo view('/Roadshow/Level99/Index', $data);
        } else if ($level == 100) {
            echo view('/Roadshow/Level100/Index', $data);
        }
    }

    public function View(){
        $roadshowModel = new RoadshowModel;
        $peserta_roadshowModel = new Peserta_roadshowModel;

        $idRoadshow = $this->request->uri->getSegment('3');

        $userData = $this->session->userData;
        $roadshowData = $roadshowModel->_findById($idRoadshow);
        $pesertaData = $peserta_roadshowModel->_findByIdRoadshow($idRoadshow);
        $totalPesertaData = $peserta_roadshowModel->_countByIdRoadshow($idRoadshow);

        $data = [
            'userData' => $userData,
            'roadshowData' => $roadshowData,
            'pesertaData' => $pesertaData,
            'totalPesertaData' => $totalPesertaData,
        ];

        $level = $userData['id_level'];
        if ($level == 99) {
            echo view('/Roadshow/Level99/View', $data);
        } else if ($level == 100) {
            echo view('/Roadshow/Level100/View', $data);
        }
    }

    public function NewForm(){
        $pesertaModel = new PesertaModel;
        
        $pesertaData = $pesertaModel->_get();
        $userData = $this->session->userData;

        $data = [
            'userData' => $userData,
            'pesertaData' => $pesertaData,
        ];

        $level = $userData['id_level'];
        if ($level == 99) {
            echo view('/Roadshow/Level99/Insert', $data);
        } else if ($level == 100) {
            echo view('/Roadshow/Level100/Insert', $data);
        }
    }

    public function Save(){
        $roadshowModel = new RoadshowModel;
        $peserta_roadshowModel = new Peserta_roadshowModel;
        $uploadsUsageModel = new UploadsUsageModel;

        $idRoadshow = 'rs_'.rand(01111111, 99999999);
        $lokasi = $this->request->getPost('lokasi');
        $tanggal = $this->request->getPost('tanggal');
        $idPeserta = explode(',', $this->request->getPost('id_peserta'));
        $idUsage = 'usg_'.rand(0123, 9999);

        // Data untuk tabel UploadUsage
        $usageData = [
            'id_usage' => $idUsage,
            'nama_usage' => 'Roadshow'.$lokasi,
        ];

        // Data untuk tabel roadshow
        $roadshowData = [
            'id_roadshow' => $idRoadshow,
            'lokasi' => $lokasi,
            'tanggal' => $tanggal,
            'id_usage' => $idUsage,
        ];

        // Inserting data to database
        $uploadsUsageModel->_insert($usageData);
        $roadshowModel->_insert($roadshowData);

        // Data untuk tabel peserta_roadshow
        foreach($idPeserta as $x){
            $peserta_roadshowData = [
                'id' => 'pr'.rand(01111111, 99999999),
                'id_peserta' => $x,
                'id_roadshow' => $idRoadshow
            ];
            $peserta_roadshowModel->_insert($peserta_roadshowData);
        }

        $this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil menambah roadshow',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Roadshow');
    }

    public function ViewPhoto(){
        
        $uploadsModel = new UploadsModel;
        $pesertaModel = new PesertaModel;


        $idUsage = $this->request->uri->getSegment('3');
        $idPeserta = $this->request->uri->getSegment('4');
        $username = $pesertaModel->_findById($idPeserta)[0]->username;


        $userData = $this->session->userData;
        $photoData = $uploadsModel->_getByIdUsage($username, $idUsage);

        $data = [
            'userData' => $userData,
            'photoData' => $photoData,
        ];

        // print_r($data);

        echo view('/Roadshow/Level99/ViewPhoto', $data);
    }
}
