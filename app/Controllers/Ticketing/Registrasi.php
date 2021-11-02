<?php

namespace App\Controllers\Ticketing;
use App\Controllers\BaseController;


use App\Models\PenontonModel;
use App\Models\UserModel;

class Registrasi extends BaseController
{

	// MAIN FUNCTION
	// ===================================================================================

	// INDEX ==============================
	public function Index()
	{
		return view('/Ticketing/Registrasi');
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
				return json_encode('Success');
			}
		}
	}

	// SAVE ==============================
	public function Save()
	{
		$userModel = new UserModel;
		$penontonModel = new PenontonModel();

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');

			// Data Tabel Penonton
			$idPenonton = 'audience_' . rand(0123, 9999);
			$namaPenonton = $this->request->getPost('nama_penonton');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$createdAt = $this->nowDate;
			$hash = md5(uniqid(rand(), true));


			$userData = [
				'username' => $username,
				'password' => md5($password),
				'hash' => $hash,
				'active' => 1,
				'id_level' => 4,
			];

			$penontonData = [
				'id_penonton' => $idPenonton,
				'nama_lengkap' => ucwords($namaPenonton),
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'username' => $username,
				'created_at' => $createdAt,
			];


			// Insertion to Database ==========================

			$userModel->insert($userData);
			$penontonModel->insert($penontonData);

			
			return redirect()->to('/Authentication');
		}
	}
}
