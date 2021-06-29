<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KabupatenModel;
use App\Models\KategoriModel;
use App\Models\KecamatanModel;
use App\Models\ProvinsiModel;
use App\Models\UserModel;

class Admin extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{
		$adminModel = new AdminModel;

		$alert = $this->session->getFlashdata('alert');

		$adminData  = $adminModel->_get();
		$userData = $this->session->userData;
		$data = [
			'admin' => $adminData,
			'userData' => $userData,
			'alert' => $alert,
		];

		// print_r($data);

		if ($this->session->userData['id_level'] == 99) {
			echo view('/Admin/Level99/Index', $data);
		} else if ($this->session->userData['id_level'] == 100) {
			echo view('/Admin/Level100/Index', $data);
		}
	}

	// VIEW ==============================
	public function View()
	{
		$adminModel = new AdminModel;

		$idAdmin = $this->request->uri->getSegment('3');

		$alert = $this->session->getFlashdata('alert');

		$adminData  = $adminModel->_findById($idAdmin);
		$userData = $this->session->userData;
		$data = [
			'adminData' => $adminData,
			'userData' => $userData,
			'alert' => $alert,
		];

		echo view('/Admin/Level100/View', $data);
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

		if ($this->session->userData['id_level'] == 99) {
			echo view('/Admin/Level99/Insert', $data);
		} else if ($this->session->userData['id_level'] == 100) {
			echo view('/Admin/Level100/Insert', $data);
		}
	}

	// UPDATE FORM ==============================

	public function UpdateForm()
	{
		$adminModel = new AdminModel;

		$userData = $this->session->userData;

		$idAdmin = $this->request->uri->getSegment('3');

		$data = [
			'userData' => $userData,
			'adminData' => $adminModel->_findByIdWithUsername($idAdmin)[0],
		];

		return view('/Admin/Level100/Update', $data);
	}


	// SAVE ==============================
	public function Save()
	{
		$userModel = new UserModel;
		$adminModel = new AdminModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');

			// Data Tabel Admin
			$idAdmin = 'adm_' . rand(26451645, 99999999);
			$namaAdmin = $this->request->getPost('nama_admin');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$jabatanJfc = $this->request->getPost('jabatan_jfc');
			$hash = md5(uniqid(rand(), true));

			$userData = [
				'username' => $username,
				'password' => md5($password),
				'id_level' => 99,
				'hash' => $hash,
				'active' => 1,
			];

			$adminData = [
				'id_admin' => $idAdmin,
				'nama_admin' => $namaAdmin,
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'jabatan_jfc' => $jabatanJfc,
				'username' => $username,
			];

			// Insertion to Database ==========================
			$userModel->_Insert($userData);
			$adminModel->_Insert($adminData);

			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil menambah admin',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Admin');
		}
	}

	// UPDATE ==============================
	public function Update()
	{
		$userModel = new UserModel;
		$adminModel = new AdminModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->GetMd5($this->request->getPost('password'));

			// Data Tabel Admin
			$idAdmin = $this->request->getPost('id_admin');
			$namaAdmin = $this->request->getPost('nama_admin');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$jabatanJfc = $this->request->getPost('jabatan_jfc');

			$userData = [
				'password' => $password,
			];

			$adminData = [
				'nama_admin' => $namaAdmin,
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'jabatan_jfc' => $jabatanJfc,
				'username' => $username,
			];

			// Insertion to Database ==========================
			$userModel->_update($username, $userData);
			$adminModel->_update($idAdmin, $adminData);

			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil mengupdate admin',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Admin');
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
