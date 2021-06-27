<?php

namespace App\Controllers;

use App\Models\DirektoratModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\OperatorModel;
use App\Models\UserModel;

class Operator extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{
		$operatorModel = new OperatorModel;

		$alert = $this->session->getFlashdata('alert');
		$userData = $this->session->userData;
		$operatorData = $operatorModel->_getWithDirektorat();
		$data = [
			'operator' => $operatorData,
			'userData' => $userData,
			'alert' => $alert,
		];
		
		if($this->session->userData['id_level'] == 99){
			echo view('/Operator/Level99/Index', $data);
		}else if($this->session->userData['id_level'] == 100){
			echo view('/Operator/Level100/Index', $data);
		}
	}

	// VIEW ==============================
	public function View()
	{
		$operatorModel = new OperatorModel;

		$userData = $this->session->userData;

		$idOperator = $this->request->uri->getSegment('3');

		$operatorData = $operatorModel->_getAllInfoById($idOperator)[0];
		$data = [
			'operatorData' => $operatorData,
			'userData' => $userData,
		];
		
		if($this->session->userData['id_level'] == 99){
			echo view('/Operator/Level99/View', $data);
		}else if($this->session->userData['id_level'] == 100){
			echo view('/Operator/Level100/View', $data);
		}
	}

	// NEW FORM ==============================

	public function NewForm()
	{
		$direktoratModel = new DirektoratModel;

		$userData = $this->session->userData;

		$data = [
			'direktorat' => $direktoratModel->_get(),
			'userData' => $userData,
		];

		if($this->session->userData['id_level'] == 99){
			echo view('/Operator/Level99/Insert', $data);
		}else if($this->session->userData['id_level'] == 100){
			echo view('/Operator/Level100/Insert', $data);
		}
	}

	// UPDATE FORM ==============================

	public function UpdateForm()
	{
		$operatorModel = new OperatorModel;
		$direktoratModel = new DirektoratModel;

		$idOperator = $this->request->uri->getSegment('3');

		$userData = $this->session->userData;
		$operatorData = $operatorModel->_getAllInfoById($idOperator)[0];

		$data = [
			'operatorData' => $operatorData,
			'direktoratData' => $direktoratModel->_get(),
			'userData' => $userData,
		];

		// print_r($idOperator);

		if($this->session->userData['id_level'] == 99){
			echo view('/Operator/Level99/Update', $data);
		}else if($this->session->userData['id_level'] == 100){
			echo view('/Operator/Level100/Update', $data);
		}
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

	// SAVE ==============================
	public function Save()
	{
		$userModel = new UserModel;
		$operatorModel = new OperatorModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');

			// Data Tabel Operator
			$idOperator = 'opt_' . rand(0123, 9999);
			$namaOperator = $this->request->getPost('nama_operator');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$asal = $this->request->getPost('asal');
			$direktorat = $this->request->getPost('id_direktorat');
			$kecamatan = $this->request->getPost('kecamatan');
			$kabupaten = $this->request->getPost('kabupaten');
			$provinsi = $this->request->getPost('provinsi');
			$hash = md5(uniqid(rand(), true));

			$userData = [
				'username' => $username,
				'password' => md5($password),
				'id_level' => 1,
				'hash' => $hash,
				'active' => 1,
			];

			$operatorData = [
				'id_operator' => $idOperator,
				'nama_operator' => $namaOperator,
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'asal' => $asal,
				'id_direktorat' => $direktorat,
				'username' => $username,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten,
				'provinsi' => $provinsi,
			];

			// Insertion to Database ==========================
			$userModel->_insert($userData);
			$operatorModel->_insert($operatorData);

			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil menambah operator',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Operator');
		}
	}

	// UPDATE ==============================
	public function Update()
	{
		$userModel = new UserModel;
		$operatorModel = new OperatorModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->GetMd5($this->request->getPost('password'));

			// Data Tabel Operator
			$idOperator = $this->request->getPost('id_operator');
			$namaOperator = $this->request->getPost('nama_operator');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$asal = $this->request->getPost('asal');
			$direktorat = $this->request->getPost('id_direktorat');
			$kecamatan = $this->request->getPost('kecamatan');
			$kabupaten = $this->request->getPost('kabupaten');
			$provinsi = $this->request->getPost('provinsi');

			$userData = [
				'password' => $password,
			];

			$operatorData = [
				'nama_operator' => $namaOperator,
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'asal' => $asal,
				'id_direktorat' => $direktorat,
				'username' => $username,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten,
				'provinsi' => $provinsi,
			];


			// Insertion to Database ==========================
			$userModel->_update($username,$userData);
			$operatorModel->_update($idOperator, $operatorData);

			$this->session->setFlashdata("alert", "<!-- javascript -->
			<script>
				$(document).ready(
					Swal.fire({
						title: 'Berhasil!',
						text: 'Berhasil mengupdate operator',
						icon: 'success',
						confirmButtonText: 'Ok'
					})
				)
			</script>");
			return redirect()->to('/Operator');
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
