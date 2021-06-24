<?php

namespace App\Controllers;

use App\Models\KategoriEventModel;
use App\Models\KategoriModel;
use App\Models\MovingPesertaModel;
use App\Models\ProvinsiModel;

class MovingPeserta extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function index()
	{
	}

	// Moving Peserta ==============================

	public function Move()
	{
		if ($this->request->getMethod() == 'post') {
			if ($this->request->getVar('action') == 'MovePeserta') {
				$movingPesertaModel = new MovingPesertaModel;
				$id_sub_kategori_1 = $this->request->getVar('id_sub_kategori_1');
				$id_sub_kategori_2 = $this->request->getVar('id_sub_kategori_2');
				$username_leader = $this->session->userData['username'];
				$id_peserta = $this->request->getVar('id_peserta');

				$data = [
					'id_moving' => 'mov'.rand(0123,9999),
					'id_peserta' => $id_peserta,
					'id_sub_kategori_1' => $id_sub_kategori_1,
					'id_sub_kategori_2' => $id_sub_kategori_2,
					'username_leader' => $username_leader,
					'status' => 0,
				];

				// insert to db
				$movingPesertaModel->_insert($data);
			}
			$output = array(
				'status' => 'ok'
			);

			return json_encode($output);
		}
	}

	// Approve Moving Peserta ==============================
}
