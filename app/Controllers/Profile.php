<?php

namespace App\Controllers;

use App\Models\KeikutsertaanModel;
use App\Models\PesertaModel;

class Profile extends BaseController
{
	public function index()
	{
		if($this->session->userData['id_level'] == 0){
			$pesertaModel = new PesertaModel;
			$keikutsertaanModel = new KeikutsertaanModel;
			
			$userData = $this->session->userData;
			$username = $userData['username'];
			$idPeserta = $this->getId($username);
			$pesertaData = $keikutsertaanModel->_getAllInfoByIdPeserta($idPeserta)[0];

			$data = [
				'pesertaData' => $pesertaData,
				'userData' => $userData,
			];
			echo view('/Profile/Level0/Index', $data);
		}else{
			
		}
	}
}
