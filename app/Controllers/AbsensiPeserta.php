<?php

namespace App\Controllers;

use App\Models\KehadiranPesertaModel;
use App\Models\KehadiranInstrukturModel;
use App\Models\PesertaModel;
use App\Models\InstrukturModel;

class AbsensiPeserta extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function index()
	{
	}

	// SCANNER ==============================
	public function Scanner()
	{
		
        // print_r($this->nowTime);
		$kehadiranInstrukturModel = new KehadiranInstrukturModel;
		$instrukturModel = new InstrukturModel;

		// get user data
		$userData = $this->session->userData;

		// get id instruktur
		$idInstruktur = $instrukturModel->_findByUsername($userData['username'])[0]->id_instruktur;

		// get id workshop
		$idWorkshop = $this->request->uri->getSegment('3');

		// get kehadiran instruktur data
		$kehadiranInstrukturData = $kehadiranInstrukturModel->_findBy($idInstruktur, $idWorkshop)[0];

		// get inclass
		$inclass = $kehadiranInstrukturData->inclass;

		$data = [
			'idInstruktur' => $idInstruktur,
			'idWorkshop' => $idWorkshop,
			'kehadiranInstrukturData' => $kehadiranInstrukturData,
			'userData' => $userData,
		];

		if ($inclass == 0) {
			// load view awal sebelum klik mulai workshop
			echo view('/AbsensiPeserta/ProposalView', $data);
		} else if ($inclass == 2) {
			// load view waiting approval
			echo view('/AbsensiPeserta/WaitingApprovalView', $data);
		} else if ($inclass == 1) {
			// Instruktur bisa melakukan absensi
			return view('/AbsensiPeserta/ScannerView', $data);
		}
	}


	public function ApprovalInstruktur()
	{
		if ($this->request->getMethod() == 'post') {
			// PROPOSAL BUKA WORKSHOP =============================
			// Mengubah inclass menjadi 2
			// data akan muncul di approval request Operator
			if ($this->request->getVar('action') == 'propose') {
				$kehadiranInstrukturModel = new KehadiranInstrukturModel;
				$idKehadiran = $this->request->getVar('id_kehadiran');

				$data = [
					'inclass' => 2,
				];

				$kehadiranInstrukturModel->_update($idKehadiran, $data);
				$output = array(
					'result' => 'success'
				);
				return json_encode($output);
			};
			// APPROVAL DARI OPERATOR =============================
			// merubah inclass menjadi 1
			// instruktur sudah bisa melakukan absensi
			if ($this->request->getVar('action') == 'approve') {
				$kehadiranInstrukturModel = new KehadiranInstrukturModel;
				$idKehadiran = $this->request->getVar('id_kehadiran');

				$data = [
					'inclass' => 1,
				];

				$kehadiranInstrukturModel->_update($idKehadiran, $data);
				$output = array(
					'result' => 'success'
				);
				return json_encode($output);
			}
		};
	}

	// ENROLL ==============================
	// enroll peserta, function untuk mengubah inclass peserta menjadi 1
	// artinya peserta sudah melakukan absen
	public function Enroll()
	{
		if ($this->request->getMethod() == 'post') {

			// Enroll peserta, ubah status jadi inclass
			if ($this->request->getVar('action') == "enroll") {
				$kehadiranPesertaModel = new KehadiranPesertaModel;
				$pesertaModel = new PesertaModel;

				// get id workshop
				$idWorkshop = $this->request->getVar('id_workshop');

				// get id peserta
				$idPeserta = $this->request->getVar('id_peserta');

				// get data peserta
				$pesertaData = $pesertaModel->_findById($idPeserta);

				// get id kehadiran
				$idKehadiran = $kehadiranPesertaModel->_findId($idPeserta, $idWorkshop)[0]->id_kehadiran;

				// ubah status inclass
				$kehadiranPesertaData = [
					'inclass' => 1,
				];
				$kehadiranPesertaModel->_update($idKehadiran, $kehadiranPesertaData);

				$output = array(
					'result' => $pesertaData,
				);

				return json_encode($output);
			}
		}
	}
}
