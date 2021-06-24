<?php

namespace App\Controllers;

use App\Models\KehadiranPesertaModel;
use App\Models\JadwalModel;
use App\Models\KategoriModel;
use App\Models\KehadiranInstrukturModel;
use App\Models\PesertaModel;
use App\Models\LeaderModel;
use App\Models\ProvinsiModel;
use App\Models\SubKategoriModel;
use App\Models\VenueModel;
use App\Models\WorkshopModel;

class Peserta extends BaseController
{

	// INDEX ==============================

	public function Index()
	{
		$userData = $this->session->userData;
		$pesertaModel = new PesertaModel;

		$alert = $this->session->getFlashdata('alert');

		// cek level untuk redirect page
		if ($userData['id_level'] == 0) {
			// page untuk peserta
		} else if ($userData['id_level'] == 1) {

			// page untuk operator
			if ($userData['id_direktorat'] == 'dir1') {

				// get berdasarkan kategori
				$idKategori = $this->request->uri->getSegment('2');
				$peserta = $pesertaModel->_getByKategori($idKategori);
				$data = [
					'userData' => $this->session->userData,
					'peserta' => $peserta,
					'alert' => $alert,
				];
				// print_r($data);
				return view('/Peserta/Level1/Index', $data);
			}
		} else if ($userData['id_level'] == 2) {
			// page untuk instruktur
		}
	}

	// LIST PESERTA PER KATEGORI ======================

	public function DaftarPeserta()
	{
		$userData = $this->session->userData;
		$pesertaModel = new PesertaModel;

		$alert = $this->session->getFlashdata('alert');

		// cek level untuk redirect page
		if ($userData['id_level'] == 0) {
			// page untuk peserta
		} else if ($userData['id_level'] == 1) {

			// page untuk operator
			if ($userData['id_direktorat'] == 'dir1') {

				// get berdasarkan kategori
				$idKategori = $this->request->uri->getSegment('3');
				$peserta = $pesertaModel->_getByKategori($idKategori);
				$data = [
					'userData' => $this->session->userData,
					'peserta' => $peserta,
					'alert' => $alert,
				];
				// print_r($data);
				return view('/Peserta/Level1/Index', $data);
			}
		} else if ($userData['id_level'] == 2) {
			// page untuk instruktur
		} else if ($userData['id_level'] == 3) {
			// page untuk leader
			$leaderModel = new LeaderModel;

			$username = $this->session->userData['username'];
			$leaderData = $leaderModel->_findByUsername($username)[0];

			// cek apakah leader ada sub kategori atau tidak
			if ($leaderData->id_sub_kategori != null) {
				$peserta = $pesertaModel->_getBySubKategori($leaderData->id_sub_kategori);
			} else if ($leaderData->id_sub_kategori == null) {
				$peserta = $pesertaModel->_getByKategori($leaderData->id_kategori);
			}

			$data = [
				'userData' => $this->session->userData,
				'peserta' => $peserta,
				'leaderData' => $leaderData,
				'alert' => $alert,
			];
			// print_r($data);
			return view('/Peserta/Level3/Index', $data);
		} else if ($userData['id_level'] == 99) {
			// page untuk admin

			$kategoriModel = new KategoriModel;
			// get berdasarkan kategori
			$idKategori = $this->request->uri->getSegment('3');
			$kategoriData = $kategoriModel->_findById($idKategori);
			$peserta = $pesertaModel->_getByKategori($idKategori);
			$data = [
				'userData' => $this->session->userData,
				'peserta' => $peserta,
				'alert' => $alert,
				'kategoriData' => $kategoriData,
			];
			// print_r($data);
			return view('/Peserta/Level99/Index', $data);
		}
	}

	// VIEW ==============================

	public function View()
	{
		$pesertaModel = new PesertaModel;

		$userData = $this->session->userData;

		$idPeserta = $this->request->uri->getSegment('3');
		$pesertaData = $pesertaModel->_getAllInfoById($idPeserta)[0];

		$data = [
			'pesertaData' => $pesertaData,
			'userData' => $userData,
		];

		// Cek siapa yg akses

		if($userData['id_level']=='99'){
			echo view('/Peserta/Level99/View', $data);
		}else if($userData['id_level']=='3'){
			echo view('/Peserta/Level3/View', $data);
		}
	}

	// =============== CRUD FORM ======================

	// NEW FORM ==============================

	public function newForm()
	{
		$kategoriModel = new KategoriModel;
		$subKategoriModel = new SubKategoriModel;

		$userData = $this->session->userData;

		$data = [
			'kategori' => $kategoriModel->_get(),
			'subKategori' => $subKategoriModel->_get(),
			'userData' => $userData,
		];

		return view('/Peserta/Level3/NewForm', $data);
	}

	// UPDATE FORM ==============================

	public function updateForm()
	{
		return view('/Workshop/Level1/Update');
	}

	// ================ CRUD METHOD =================

	// INSERT ==============================

	public function insert()
	{
		if ($this->request->getMethod() == 'post') {

			$jadwalModel = new JadwalModel;
			$workshopModel = new WorkshopModel;
			$pesertaModel = new PesertaModel;
			$kehadiranInstrukturModel = new KehadiranInstrukturModel;
			$kehadiranPesertamodel = new KehadiranPesertaModel;

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
			$jadwalModel->_insert($jadwalData);

			// INSERT WORKSHOP
			$workshopData = [
				'id_workshop' => $idWorkshop,
				'nama_workshop' => $namaWorkshop,
				'materi' => $materi,
				'id_jadwal' => $idJadwal,
				'id_venue' => $idVenue,
				'dresscode' => $dresscode,
			];
			$workshopModel->_insert($workshopData);

			// INSERT KEHADIRAN TUTOR
			foreach ($idInstruktur as $x) {
				$kehadiranInstrukturData = [
					'id_kehadiran' => 'kt_' . rand(0123, 9999),
					'id_instruktur' => $x,
					'id_workshop' => $idWorkshop,
					'inclass' => 0,
				];
				$kehadiranInstrukturModel->_insert($kehadiranInstrukturData);
			}

			// INSERT KEHADIRAN PESERTA
			$idPeserta = $pesertaModel->_getOnlyId();
			foreach ($idPeserta as $z) {
				$kehadiranPesertaData = [
					'id_kehadiran' => 'kp_' . rand(0123, 9999),
					'id_peserta' => $z->id_peserta,
					'id_workshop' => $idWorkshop,
					'inclass' => 0
				];
				$kehadiranPesertamodel->_insert($kehadiranPesertaData);
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
		$workshopModel = new WorkshopModel;
		$kehadiranInstrukturModel = new KehadiranInstrukturModel;
		$venueModel = new VenueModel;

		$id_workshop = $this->request->uri->getSegment('3');

		// page untuk operator
		// get data workshop, jadwal, venue
		$workshop = $workshopModel->_getAllInfoById($id_workshop);
		// get data pengampu
		$instrukturPengampu = $kehadiranInstrukturModel->_getInstruktur($id_workshop);
		$data = [
			'userData' => $userData,
			'workshop' => $workshop[0],
			'instrukturPengampu' => $instrukturPengampu,
			'venueData' => $venueModel->_get(),
		];
		return view('/Workshop/Level1/update', $data);
	}

	// DELETE ==============================

	public function DeleteFromKategori()
	{
		$pesertaModel = new PesertaModel;
		$leaderModel = new LeaderModel;

		$idPeserta = $this->request->uri->getSegment('3');

		// cek leader apakah memiliki subkategori atau tidak

		$username = $this->session->userData['username'];
		$leaderData = $leaderModel->_findByUsername($username)[0];

		// cek apakah leader ada sub kategori atau tidak
		if ($leaderData->id_sub_kategori != null) {
			$data = [
				'id_sub_kategori' => null,
			];

			$pesertaModel->_update($idPeserta, $data);
		} else if ($leaderData->id_sub_kategori == null) {
			$data = [
				'id_kategori' => null,
			];
			$pesertaModel->_update($idPeserta, $data);
		}
		$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Peserta berhasil dihapus',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
		return redirect()->back();
	}

	

	// ADD TO CATEGORY ======================

	public function AddToCategory()
	{
		$pesertaModel = new PesertaModel;
		$leaderModel = new LeaderModel;

		$idPeserta = $this->request->uri->getSegment('3');

		// cek leader apakah memiliki subkategori atau tidak

		$username = $this->session->userData['username'];
		$leaderData = $leaderModel->_findByUsername($username)[0];

		// cek apakah leader ada sub kategori atau tidak
		if ($leaderData->id_sub_kategori != null) {
			$data = [
				'id_sub_kategori' => $leaderData->id_sub_kategori,
			];

			$pesertaModel->_update($idPeserta, $data);
		} else if ($leaderData->id_sub_kategori == null) {
			$data = [
				'id_kategori' => $leaderData->id_kategori,
			];
			$pesertaModel->_update($idPeserta, $data);
		}
		$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Peserta berhasil ditambahkan',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
		return redirect()->back();
	}
}



// ABANDONED METHOD ===============================================================================
// form tambah peserta ======================

// public function AddExistedPeserta()
// {
// 	$userData = $this->session->userData;
// 	$pesertaModel = new PesertaModel;
// 	$leaderModel = new LeaderModel;

// 	$alert = $this->session->getFlashdata('alert');

// 	// cek leader apakah memiliki subkategori atau tidak

// 	$username = $this->session->userData['username'];
// 	$leaderData = $leaderModel->_findByUsername($username)[0];

// 	// cek apakah leader ada sub kategori atau tidak
// 	if ($leaderData->id_sub_kategori != null) {
// 		$pesertaData = $pesertaModel->_getHollowPeserta($leaderData->id_kategori, $leaderData->id_sub_kategori);
// 	} else if ($leaderData->id_sub_kategori == null) {
// 		$pesertaData = $pesertaModel->_getHollowPeserta($leaderData->id_kategori);
// 	}

// 	$data = [
// 		'pesertaData' => $pesertaData,
// 		'userData' => $userData,
// 		'alert' => $alert,
// 	];

// 	echo view('/Peserta/Level3/addPeserta', $data);
// }
