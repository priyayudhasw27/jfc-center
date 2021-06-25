<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KategoriModel;
use App\Models\KecamatanModel;
use App\Models\ProvinsiModel;
use App\Models\InstrukturModel;
use App\Models\UserModel;

class Instruktur extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{
		$instrukturModel = new InstrukturModel;

		$alert = $this->session->getFlashdata('alert');

		$instrukturData  = $instrukturModel->_get();
		$userData = $this->session->userData;
		$data = [
			'instruktur' => $instrukturData,
			'userData' => $userData,
			'alert' => $alert,
		];

		echo view('/Instruktur/Level99/Index', $data);
	}

	// VIEW ==============================
	public function View()
	{
		$instrukturModel = new InstrukturModel;

		$idInstruktur = $this->request->uri->getSegment('3');

		$alert = $this->session->getFlashdata('alert');

		$instrukturData  = $instrukturModel->_findById($idInstruktur);
		$userData = $this->session->userData;
		$data = [
			'instrukturData' => $instrukturData,
			'userData' => $userData,
			'alert' => $alert,
		];

		echo view('/Instruktur/Level99/View', $data);
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

	public function NewForm()
	{

		$userData = $this->session->userData;

		$data = [
			'userData' => $userData,
		];

		return view('/Instruktur/Level99/Insert', $data);
	}

	// UPDATE FORM ==============================

	public function UpdateForm()
	{
		$instrukturModel = new InstrukturModel;

		$userData = $this->session->userData;

		$idInstruktur = $this->request->uri->getSegment('3');

		$data = [
			'userData' => $userData,
			'instrukturData' => $instrukturModel->_findByIdWithUsername($idInstruktur)[0],
		];

		return view('/Instruktur/Level99/Update', $data);
	}


	// SAVE ==============================
	public function Save()
	{
		$userModel = new UserModel;
		$instrukturModel = new InstrukturModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');

			// Data Tabel Instruktur
			$idInstruktur = 'tut_' . rand(26451645, 99999999);
			$namaInstruktur = $this->request->getPost('nama_instruktur');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$asal = $this->request->getPost('asal');
			$prestasi = $this->request->getPost('prestasi');
			$kecamatan = $this->request->getPost('kecamatan');
			$kabupaten = $this->request->getPost('kabupaten');
			$provinsi = $this->request->getPost('provinsi');
			$hash = md5(uniqid(rand(), true));

			$userData = [
				'username' => $username,
				'password' => md5($password),
				'id_level' => 2,
				'hash' => $hash,
				'active' => 1,
			];

			$instrukturData = [
				'id_instruktur' => $idInstruktur,
				'nama_instruktur' => $namaInstruktur,
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'asal' => $asal,
				'username' => $username,
				'prestasi' => $prestasi,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten,
				'provinsi' => $provinsi,
			];

			// Insertion to Database ==========================
			$userModel->_Insert($userData);
			$instrukturModel->_Insert($instrukturData);

			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil menambah instruktur',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Instruktur');
		}
	}

	// UPDATE ==============================
	public function Update()
	{
		$userModel = new UserModel;
		$instrukturModel = new InstrukturModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->GetMd5($this->request->getPost('password'));

			// Data Tabel Instruktur
			$idInstruktur = $this->request->getPost('id_instruktur');
			$namaInstruktur = $this->request->getPost('nama_instruktur');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$asal = $this->request->getPost('asal');
			$prestasi = $this->request->getPost('prestasi');
			$kecamatan = $this->request->getPost('kecamatan');
			$kabupaten = $this->request->getPost('kabupaten');
			$provinsi = $this->request->getPost('provinsi');

			$userData = [
				'password' => $password,
			];

			$instrukturData = [
				'nama_instruktur' => $namaInstruktur,
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'asal' => $asal,
				'username' => $username,
				'prestasi' => $prestasi,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten,
				'provinsi' => $provinsi,
			];

			// Insertion to Database ==========================
			$userModel->_update($username, $userData);
			$instrukturModel->_update($idInstruktur, $instrukturData);

			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil mengupdate instruktur',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Instruktur');
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
