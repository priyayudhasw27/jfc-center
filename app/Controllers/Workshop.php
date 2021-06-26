<?php

namespace App\Controllers;

use App\Models\KehadiranPesertaModel;
use App\Models\JadwalModel;
use App\Models\KehadiranInstrukturModel;
use App\Models\PesertaModel;
use App\Models\InstrukturModel;
use App\Models\VenueModel;
use App\Models\WorkshopModel;

class Workshop extends BaseController
{

	// INDEX ==============================

	public function Index()
	{
		$userData = $this->session->userData;
		$workshopModel = new WorkshopModel;

		$alert = $this->session->getFlashdata('alert');

		// cek level untuk redirect page
		if ($userData['id_level'] == 0) {

			// page untuk peserta
			$workshop = $workshopModel->_getIncomingAllInfo();
			$data = [
				'userData' => $this->session->userData,
				'workshop' => $workshop,
				'alert' => $alert,
			];
			return view('/Workshop/Level0/Index', $data);
		} else if ($userData['id_level'] == 1) {

			// page untuk operator

			$kehadiranPesertaModel = new KehadiranPesertaModel;

			// get all info workshop
			$workshop = $workshopModel->_getAllInfo();
			$pesertaHadir = [];
			$pesertaTidakHadir = [];

			if ($workshop != '') {
				// get total peserta hadir dan tidak hadir
				foreach ($workshop as $x) {
					$pesertaHadir[$x->id_workshop] = $kehadiranPesertaModel->_countHadirByWorkshop($x->id_workshop);
					$pesertaTidakHadir[$x->id_workshop] = $kehadiranPesertaModel->_countTidakHadirByWorkshop($x->id_workshop);
				}
			}

			$data = [
				'userData' => $this->session->userData,
				'workshop' => $workshop,
				'pesertaHadir' => $pesertaHadir,
				'pesertaTidakHadir' => $pesertaTidakHadir,
				'alert' => $alert,
			];

			return view('/Workshop/Level1/Index', $data);
		} else if ($userData['id_level'] == 2) {

			// page untuk instruktur

			$kehadiranPesertaModel = new KehadiranPesertaModel;

			$kehadiranInstrukturModel = new KehadiranInstrukturModel;
			$instrukturModel = new InstrukturModel;
			$idInstruktur = $instrukturModel->_findByUsername($this->session->userData['username'])[0];
			$workshop = $kehadiranInstrukturModel->_getWorkshopByInstruktur($idInstruktur->id_instruktur);

			$pesertaHadir = [];
			$pesertaTidakHadir = [];

			if ($workshop != '') {
				// get total peserta hadir dan tidak hadir
				foreach ($workshop as $x) {
					$pesertaHadir[$x->id_workshop] = $kehadiranPesertaModel->_countHadirByWorkshop($x->id_workshop);
					$pesertaTidakHadir[$x->id_workshop] = $kehadiranPesertaModel->_countTidakHadirByWorkshop($x->id_workshop);
				}
			}
			$data = [
				'userData' => $this->session->userData,
				'workshop' => $workshop,
				'pesertaHadir' => $pesertaHadir,
				'pesertaTidakHadir' => $pesertaTidakHadir,
				'alert' => $alert,
			];
			// print_r($idInstruktur);
			return view('/Workshop/Level2/Index', $data);
		} else if ($userData['id_level'] == 99) {

			// page untuk operator
			$kehadiranPesertaModel = new KehadiranPesertaModel;

			$workshop = $workshopModel->_getAllInfo();
			$pesertaHadir = [];
			$pesertaTidakHadir = [];

			if ($workshop != '') {
				// get total peserta hadir dan tidak hadir
				foreach ($workshop as $x) {
					$pesertaHadir[$x->id_workshop] = $kehadiranPesertaModel->_countHadirByWorkshop($x->id_workshop);
					$pesertaTidakHadir[$x->id_workshop] = $kehadiranPesertaModel->_countTidakHadirByWorkshop($x->id_workshop);
				}
			}

			$data = [
				'userData' => $this->session->userData,
				'workshop' => $workshop,
				'pesertaHadir' => $pesertaHadir,
				'pesertaTidakHadir' => $pesertaTidakHadir,
				'alert' => $alert,
			];
			return view('/Workshop/Level99/Index', $data);
		} else if ($userData['id_level'] == 100) {

			// page untuk operator
			$kehadiranPesertaModel = new KehadiranPesertaModel;

			$workshop = $workshopModel->_getAllInfo();
			$pesertaHadir = [];
			$pesertaTidakHadir = [];

			if ($workshop != '') {
				// get total peserta hadir dan tidak hadir
				foreach ($workshop as $x) {
					$pesertaHadir[$x->id_workshop] = $kehadiranPesertaModel->_countHadirByWorkshop($x->id_workshop);
					$pesertaTidakHadir[$x->id_workshop] = $kehadiranPesertaModel->_countTidakHadirByWorkshop($x->id_workshop);
				}
			}

			$data = [
				'userData' => $this->session->userData,
				'workshop' => $workshop,
				'pesertaHadir' => $pesertaHadir,
				'pesertaTidakHadir' => $pesertaTidakHadir,
				'alert' => $alert,
			];
			return view('/Workshop/Level100/Index', $data);
		}
	}

	// VIEW ==============================

	public function View()
	{
		$userData = $this->session->userData;
		$workshopModel = new WorkshopModel;
		$kehadiranInstrukturModel = new KehadiranInstrukturModel;
		$kehadiranPesertaModel = new KehadiranPesertaModel;

		$id_workshop = $this->request->uri->getSegment('3');

		// get data workshop, jadwal, venue
		$workshop = $workshopModel->_getAllInfoById($id_workshop);

		// get data peserta
		$peserta = $kehadiranPesertaModel->_getPeserta($id_workshop);

		// get data pengampu
		$instrukturPengampu = $kehadiranInstrukturModel->_getInstrukturByWorkshop($id_workshop);
		$data = [
			'userData' => $this->session->userData,
			'workshop' => $workshop[0],
			'instruktur' => $instrukturPengampu,
			'peserta' => $peserta,
		];

		// cek level untuk redirect page
		if ($userData['id_level'] == 0) {

			// page untuk peserta
			return view('/Workshop/Level0/View', $data);
		} else if ($userData['id_level'] == 1) {

			// page untuk operator			
			return view('/Workshop/Level1/View', $data);
		} else if ($userData['id_level'] == 2) {

			// page untuk instruktur
			return view('/Workshop/Level2/View', $data);
		} else if ($userData['id_level'] == 99) {

			// page untuk instruktur
			return view('/Workshop/Level99/View', $data);
		}
	}

	// =============== CRUD FORM ======================

	// NEW FORM ==============================

	public function newForm()
	{
		$instrukturModel = new InstrukturModel;
		$venueModel = new VenueModel;

		$userData = $this->session->userData;

		$data = [
			'instrukturData' => $instrukturModel->_get(),
			'venueData' => $venueModel->_get(),
			'userData' => $userData,
		];

		if ($userData['id_level'] == 1) {
			return view('/Workshop/Level1/Insert', $data);
		} else if ($userData['id_level'] == 99) {
			return view('/Workshop/Level99/Insert', $data);
		}
	}

	// UPDATE FORM ==============================

	public function UpdateForm()
	{
		$instrukturModel = new InstrukturModel;
		$venueModel = new VenueModel;
		$workshopModel = new WorkshopModel;
		$kehadiranInstrukturModel = new KehadiranInstrukturModel;

		$idWorkshop = $this->request->uri->getSegment('3');
		$workshopData = $workshopModel->_getAllInfoById($idWorkshop)[0];
		// get instruktur instruktur pengampu
		$instrukturPengampuData = $kehadiranInstrukturModel->_getInstrukturByWorkshop($idWorkshop);

		$userData = $this->session->userData;

		$data = [
			'instrukturData' => $instrukturModel->_get(),
			'venueData' => $venueModel->_get(),
			'userData' => $userData,
			'workshop' => $workshopData,
			'instrukturPengampu' => $instrukturPengampuData,
		];

		if ($userData['id_level'] == 1) {
			// print_r($data['instrukturData']);
			return view('/Workshop/Level1/Update', $data);
		} else if ($userData['id_level'] == 99) {
			return view('/Workshop/Level99/Update', $data);
		}
	}

	// ================ CRUD METHOD =================

	// INSERT ==============================

	public function Insert()
	{
		if ($this->request->getMethod() == 'post') {

			$jadwalModel = new JadwalModel;
			$workshopModel = new WorkshopModel;
			$kehadiranInstrukturModel = new KehadiranInstrukturModel;

			$namaWorkshop = $this->request->getPost('nama_workshop');
			$materi = $this->request->getPost('materi');
			$tanggal = $this->request->getPost('tanggal');
			$waktuMulai = $this->request->getPost('waktu_mulai');
			$waktuSelesai = $this->request->getPost('waktu_selesai');
			$dresscode = $this->request->getPost('dresscode');
			$idVenue = $this->request->getPost('id_venue');
			$idInstruktur = $this->request->getPost('id_instruktur');
			$idJadwal = 'j' . rand(0312, 9999);
			$idWorkshop = 'ws' . rand(0123, 9999);

			// INSERT JADWAL
			$jadwalData = [
				'id_jadwal' => $idJadwal,
				'waktu_mulai' => $waktuMulai,
				'waktu_selesai' => $waktuSelesai,
				'tanggal' => $tanggal,
			];
			$jadwalModel->_Insert($jadwalData);

			// INSERT WORKSHOP
			$workshopData = [
				'id_workshop' => $idWorkshop,
				'nama_workshop' => $namaWorkshop,
				'materi' => $materi,
				'id_jadwal' => $idJadwal,
				'id_venue' => $idVenue,
				'dresscode' => $dresscode,
			];
			$workshopModel->_Insert($workshopData);

			// INSERT KEHADIRAN TUTOR
			foreach ($idInstruktur as $x) {
				$kehadiranInstrukturData = [
					'id_kehadiran' => 'kt_' . rand(0123, 9999),
					'id_instruktur' => $x,
					'id_workshop' => $idWorkshop,
					'inclass' => 0,
				];
				$kehadiranInstrukturModel->_Insert($kehadiranInstrukturData);
			}


			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Workshop berhasil ditambahkan',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Workshop');
		}
	}

	// UPDATE ==============================

	public function update()
	{
		$userData = $this->session->userData;
		$jadwalModel = new JadwalModel;
		$workshopModel = new WorkshopModel;
		$kehadiranInstrukturModel = new KehadiranInstrukturModel;

		$idWorkshop = $this->request->getPost('id_workshop');
		$namaWorkshop = $this->request->getPost('nama_workshop');
		$materi = $this->request->getPost('materi');
		$tanggal = $this->request->getPost('tanggal');
		$waktuMulai = $this->request->getPost('waktu_mulai');
		$waktuSelesai = $this->request->getPost('waktu_selesai');
		$dresscode = $this->request->getPost('dresscode');
		$idVenue = $this->request->getPost('id_venue');
		$idInstruktur = $this->request->getPost('id_instruktur');
		$idJadwal = $this->request->getPost('id_jadwal');

		// UPDATE JADWAL
		$jadwalData = [
			'waktu_mulai' => $waktuMulai,
			'waktu_selesai' => $waktuSelesai,
			'tanggal' => $tanggal,
		];
		$jadwalModel->_update($idJadwal, $jadwalData);

		// UPDATE WORKSHOP
		$workshopData = [
			'nama_workshop' => $namaWorkshop,
			'materi' => $materi,
			'id_jadwal' => $idJadwal,
			'id_venue' => $idVenue,
			'dresscode' => $dresscode,
		];
		$workshopModel->_update($idWorkshop, $workshopData);

		// UPDATE KEHADIRAN TUTOR
		$kehadiranInstrukturModel->_deleteByWorkshop($idWorkshop);
		foreach ($idInstruktur as $x) {
			$kehadiranInstrukturData = [
				'id_kehadiran' => 'kt_' . rand(0123, 9999),
				'id_instruktur' => $x,
				'id_workshop' => $idWorkshop,
				'inclass' => 0,
			];
			$kehadiranInstrukturModel->_Insert($kehadiranInstrukturData);
		}

		$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Workshop berhasil diupdate',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
		return redirect()->to('/Workshop');
	}

	// DELETE ==============================

	public function delete()
	{
		$workshopModel = new WorkshopModel;
		$jadwalModel = new jadwalModel;
		$kehadiranInstrukturModel = new KehadiranInstrukturModel;
		$kehadiranPesertaModel = new KehadiranPesertaModel;

		$idWorkshop = $this->request->uri->getSegment('3');
		$idJadwal = $workshopModel->_findById($idWorkshop)->id_jadwal;

		// Delete dari tabel workshop ===========================
		$workshopModel->_delete($idWorkshop);

		// Delete dari tabel jadwal ===========================
		$jadwalModel->_delete($idJadwal);

		// Delete dari tabel Kehadiran instruktur ===========================
		$kehadiranInstrukturModel->_deleteByWorkshop($idWorkshop);

		// Delete dari tabel kehadiran peserta ===========================
		$kehadiranPesertaModel->_deleteByWorkshop($idWorkshop);

		$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Workshop berhasil dihapus',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");

		return redirect()->to('/Workshop');
	}
}
