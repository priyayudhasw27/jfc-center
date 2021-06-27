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
				$peserta = $pesertaModel->_findByKategori($idKategori);
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
				$peserta = $pesertaModel->_findByKategori($idKategori);
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

			$idLeader = $this->getId($this->session->userData['username']);
			$leaderData = $leaderModel->_findById($idLeader)[0];

			// cek apakah leader ada sub kategori atau tidak
			if ($leaderData->id_sub_kategori != null) {
				$peserta = $pesertaModel->_findBySubKategori($leaderData->id_sub_kategori);
			} else if ($leaderData->id_sub_kategori == null) {
				$peserta = $pesertaModel->_findByKategori($leaderData->id_kategori);
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
			$kategoriData = $kategoriModel->_findById($idKategori)[0];
			$peserta = $pesertaModel->_findByKategori($idKategori);
			$data = [
				'userData' => $this->session->userData,
				'peserta' => $peserta,
				'alert' => $alert,
				'kategoriData' => $kategoriData,
			];
			// print_r($data);
			return view('/Peserta/Level99/Index', $data);
		} else if ($userData['id_level'] == 100) {
			// page untuk admin

			$kategoriModel = new KategoriModel;
			// get berdasarkan kategori
			$idKategori = $this->request->uri->getSegment('3');
			$kategoriData = $kategoriModel->_findById($idKategori)[0];
			$peserta = $pesertaModel->_findByKategori($idKategori);
			$data = [
				'userData' => $this->session->userData,
				'peserta' => $peserta,
				'alert' => $alert,
				'kategoriData' => $kategoriData,
			];
			// print_r($data);
			return view('/Peserta/Level100/Index', $data);
		}
	}

	// VIEW ==============================

	public function View()
	{
		$pesertaModel = new PesertaModel;

		$userData = $this->session->userData;

		$idPeserta = $this->request->uri->getSegment('3');
		$pesertaData = $pesertaModel->_findById($idPeserta)[0];

		$data = [
			'pesertaData' => $pesertaData,
			'userData' => $userData,
		];

		// Cek siapa yg akses

		if ($userData['id_level'] == '99') {
			echo view('/Peserta/Level99/View', $data);
		} else if ($userData['id_level'] == '1') {
			echo view('/Peserta/Level1/View', $data);
		} else if ($userData['id_level'] == '3') {
			echo view('/Peserta/Level3/View', $data);
		} else if ($userData['id_level'] == '100') {
			echo view('/Peserta/Level100/View', $data);
		}
	}

	// =============== CRUD FORM ======================

	// NEW FORM ==============================

	public function NewForm()
	{
		$kategoriModel = new KategoriModel;
		$subKategoriModel = new SubKategoriModel;
		$userData = $this->session->userData;

		$data = [
			'kategori' => $kategoriModel->_get(),
			'subKategori' => $subKategoriModel->_get(),
			'userData' => $userData,
		];


		return view('/Peserta/Level99/NewForm', $data);
	}

	// UPDATE FORM ==============================

	public function updateForm()
	{
		return view('/Peserta/Level99/Insert');
	}

	// ================ CRUD METHOD =================

	// INSERT ==============================

	

	// UPDATE ==============================

	

	// DELETE ==============================

	



	// ADD TO CATEGORY ======================

	
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
