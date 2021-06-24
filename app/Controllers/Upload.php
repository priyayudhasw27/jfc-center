<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use App\Models\UploadsModel;
use App\Models\UploadsUsageModel;

class Upload extends BaseController
{
	public function Store()
	{
		if ($this->request->getMethod() == 'post') {
			$pesertaModel = new PesertaModel;
			$uploadsModel = new UploadsModel;

			// get ID peserta dan Usage
			$idUsage = $this->request->getPost('id_usage');
			$idPeserta = $pesertaModel->_findByUsername($this->userData['username'])[0]->id_peserta;
			// get File
			$file = $this->request->getFile('userFile');
			$fileName = $idPeserta . '-' . rand(0123, 9999) . '.jpg';
			$file->move('assets/uploaded/', $fileName);

			$data = [
				'id_uploads' => 'up'.rand(0123,9999),
				'filepath' => $fileName,
				'id_peserta' => $idPeserta,
				'id_usage' => $idUsage,
			];

			$uploadsModel->_Insert($data);

			return redirect()->to('/Galeri');
		}
	}

	public function GetPhotos()
	{
		if ($this->request->getVar('action') == 'GetPhotos') {
			$uploadsModel = new UploadsModel;
			$pesertaModel = new PesertaModel;

			if($this->request->getVar('id_peserta') != null){
				$idPeserta = $this->request->getVar('id_peserta');
			}else{
				$idPeserta = $pesertaModel->_findByUsername($this->session->userData['username'])[0]->id_peserta;
			}
			$idUsage = $this->request->getVar('id_usage');

			$photos = $uploadsModel->_getByIdUsage($idPeserta, $idUsage);

			return json_encode($photos);
		}
	}

	public function GetTotal(){
		if($this->request->getVar('action') == 'getTotal'){
			$uploadsModel = new UploadsModel;

			$idUsage = $this->request->getVar('id_usage');
			$idPeserta = $this->getId($this->session->userData['username']);

			$count = $uploadsModel->_countPhotoByUsage($idUsage, $idPeserta);

			return json_encode($count);
		}
	}
}
