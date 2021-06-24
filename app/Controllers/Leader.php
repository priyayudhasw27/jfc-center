<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KategoriModel;
use App\Models\KecamatanModel;
use App\Models\LeaderModel;
use App\Models\ProvinsiModel;
use App\Models\SubKategoriModel;
use App\Models\InstrukturModel;
use App\Models\UserModel;

class Leader extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{
		$leaderModel = new LeaderModel;

		$alert = $this->session->getFlashdata('alert');

		$leaderData = $leaderModel->_getWithKategori();
		$userData = $this->session->userData;

		$data = [
			'leader' => $leaderData,
			'userData' => $userData,
			'alert' => $alert,
		];

		echo view('/Leader/Level99/Index', $data);
	}

	// VIEW ==============================
	public function View()
	{
		$leaderModel = new LeaderModel;

		$idLeader = $this->request->uri->getSegment('3');

		$leaderData  = $leaderModel->_getAllInfoById($idLeader)[0];
		$userData = $this->session->userData;
		$data = [
			'leaderData' => $leaderData,
			'userData' => $userData,
		];

		echo view('/Leader/Level99/View', $data);
	}

	// VALIDATION ==============================

	public function ValidateUsername()
	{
		if ($this->request->getVar('action') == 'validate') {
			$userModel = new UserModel;
			$username = $this->request->getVar('username');
			if ($userModel->_findById($username) != null) {
				return json_encode('fail');
			} else {
				return json_encode('success');
			}
		}
	}

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

		return view('/Leader/Level99/Insert', $data);
	}


	// SAVE ==============================
	public function Save()
	{
		$userModel = new UserModel;
		$leaderModel = new LeaderModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');

			// Data Tabel Leader
			$idLeader = 'leader_' . rand(01234, 9999);
			$namaLeader = $this->request->getPost('nama_leader');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$asal = $this->request->getPost('asal');
			$kecamatan = $this->request->getPost('kecamatan');
			$kabupaten = $this->request->getPost('kabupaten');
			$provinsi = $this->request->getPost('provinsi');
			$hash = md5(uniqid(rand(), true));
			$idKategori = $this->request->getPost('id_kategori');

			if($this->request->getPost('id_sub_kategori') == ''){
				$idSubKategori = NULL;
			}else{
				$idSubKategori = $this->request->getPost('id_sub_kategori');
			}
			

			$userData = [
				'username' => $username,
				'password' => md5($password),
				'id_level' => 3,
				'hash' => $hash,
				'active' => 1,
			];

			$instrukturData = [
				'id_leader' => $idLeader,
				'nama_leader' => $namaLeader,
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten,
				'provinsi' => $provinsi,
				'asal' => $asal,
				'username' => $username,
				'id_kategori' => $idKategori,
				'id_sub_kategori' => $idSubKategori,
			];


			// Insertion to Database ==========================
			$userModel->_Insert($userData);
			$leaderModel->_Insert($instrukturData);

			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil menambah Leader',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Leader');
		}
	}


	// SECONDARY FUNCTION
	// ===================================================================================

	// get kabupaten untuk update di dropdown registrasi
	public function getKabupaten()
	{
		$KabupatenModel = new KabupatenModel;
		if ($this->request->getVar('action') == 'getKabupaten') {
			$idProvinsi = $this->request->getVar('idProvinsi');
			$kabupaten = $KabupatenModel->_findByProvinsi($idProvinsi);
			$output = array(
				'kabupaten' => $kabupaten,
			);

			return json_encode($output);
		}
	}

	// get kecamatan untuk update di dropdown registrasi
	public function getKecamatan()
	{
		$kecamatanModel = new KecamatanModel;
		if ($this->request->getVar('action') == 'getKecamatan') {
			$idKabupaten = $this->request->getVar('idKabupaten');
			$kecamatan = $kecamatanModel->_findByKabupaten($idKabupaten);
			$output = array(
				'kecamatan' => $kecamatan,
			);

			return json_encode($output);
		}
	}
}
