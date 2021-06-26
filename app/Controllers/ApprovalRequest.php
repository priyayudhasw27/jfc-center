<?php

namespace App\Controllers;

use App\Models\KehadiranPesertaModel;
use App\Models\KehadiranInstrukturModel;
use App\Models\MovingPesertaModel;
use App\Models\PesertaModel;
use App\Models\SubKategoriModel;
use App\Models\InstrukturModel;

class ApprovalRequest extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// Absensi Instruktur ==============================
	public function AbsensiInstruktur()
	{
		$kehadiranInstrukturModel = new KehadiranInstrukturModel;

		$alert = $this->session->getFlashdata('alert');

		$userData = $this->session->userData;
		$proposal = $kehadiranInstrukturModel->_getProposal();

		$data = [
			'proposalData' => $proposal,
			'userData' => $userData,
			'alert' => $alert,
		];

		echo view('/ApprovalRequest/Level1/AbsensiInstrukturView', $data);
	}

	// MOVING PESERTA ==============================
	public function MovingPeserta()
	{
		$movingPesertaModel = new MovingPesertaModel;
		$subKategoriModel = new SubKategoriModel;

		$alert = $this->session->getFlashdata('alert');

		$userData = $this->session->userData;
		$proposal = $movingPesertaModel->_getProposal();

		$subKategori1 ='';
		$subKategori2 ='';

		foreach ($proposal as $x => $y) {
			$subKategori1[$x] = $subKategoriModel->_findById($y->id_sub_kategori_1);
			$subKategori2[$x] = $subKategoriModel->_findById($y->id_sub_kategori_2);
		}

		$data = [
			'proposalData' => $proposal,
			'subKategori1' => $subKategori1,
			'subKategori2' => $subKategori2,
			'userData' => $userData,
			'alert' => $alert,
		];

		if($this->session->userData['id_level'] == 99){
			echo view('/ApprovalRequest/Level99/MovingPesertaView', $data);
		}else if($this->session->userData['id_level'] == 100){
			echo view('/ApprovalRequest/Level100/MovingPesertaView', $data);
		}
	}

	// APPROVE MOVING PESERTA ==============================
	public function ApproveMovingPeserta()
	{
		$movingPesertaModel = new MovingPesertaModel;
		$pesertaModel = new PesertaModel;

		if ($this->request->getMethod() == 'post') {
			if ($this->request->getVar('action') == 'approve') {
				$idPeserta = $this->request->getVar('id_peserta');
				$idMoving = $this->request->getVar('id_moving');
				$idSubKategori = $this->request->getVar('id_sub_kategori_2');

				$dataPeserta = [
					'id_sub_kategori' => $idSubKategori
				];
				$dataMoving = [
					'status' => 1
				];

				$pesertaModel->_update($idPeserta, $dataPeserta);
				$movingPesertaModel->_update($idMoving, $dataMoving);
				$output = array(
					'result' => 'success'
				);
				return json_encode($output);
			}
		}
	}
}
