<?php

namespace App\Controllers\Ticketing;
use App\Controllers\BaseController;

use App\Models\JadwalModel;
use App\Models\KabupatenModel;
use App\Models\KategoriModel;
use App\Models\KecamatanModel;
use App\Models\KehadiranPesertaModel;
use App\Models\KeikutsertaanModel;
use App\Models\PesertaModel;
use App\Models\ProvinsiModel;
use App\Models\SubKategoriModel;
use App\Models\UploadsModel;
use App\Models\UserModel;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
		$pesertaModel = new PesertaModel;
		$kehadiranPesertaModel = new KehadiranPesertaModel;
		$jadwalModel = new JadwalModel;
		$uploadsModel = new UploadsModel;
		$keikutsertaanModel = new KeikutsertaanModel;

		if ($this->request->getMethod() === 'post') {
			// Data Tabel User
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');

			// Data Tabel Peserta
			$idPeserta = 'jfc_' . rand(0123, 9999);
			$namaPeserta = $this->request->getPost('nama_peserta');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$createdAt = $this->nowDate;
			$hash = md5(uniqid(rand(), true));

			// get File
			$file = $this->request->getFile('profilePhoto');
			$fileName = $idPeserta . '-' . rand(0123, 9999) . '-profile.jpg';
			$file->move('assets/profile-photos/', $fileName);


			$userData = [
				'username' => $username,
				'password' => md5($password),
				'hash' => $hash,
				'active' => 1,
				'id_level' => 0,
			];

			$pesertaData = [
				'id_peserta' => $idPeserta,
				'nama_peserta' => ucwords($namaPeserta),
				'jenis_kelamin' => $jenisKelamin,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'username' => $username,
				'created_at' => $createdAt,
			];

			// Insertion to Database ==========================

			$userModel->_Insert($userData);
			$pesertaModel->_Insert($pesertaData);

			// Get Workshop setelah tanggal daftar peserta
			$workshopData = $jadwalModel->_getWorkshopAfterCurrentDate();

			// INSERT KEHADIRAN PESERTA
			// atau mendaftarkan peserta ke workshop
			foreach ($workshopData as $x) {
				$kehadiranPesertaData = [
					'id_kehadiran' => 'kp_' . rand(0123, 9999),
					'id_peserta' => $idPeserta,
					'id_workshop' => $x->id_workshop,
					'inclass' => 0,
				];
				$kehadiranPesertaModel->_Insert($kehadiranPesertaData);
			}

			// QR Code generation =============================
			$result = Builder::create()
				->writer(new PngWriter)
				->writerOptions([])
				->data($idPeserta)
				->encoding(new Encoding('UTF-8'))
				->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
				->size(300)
				->margin(10)
				->roundBlockSizeMode(new RoundBlockSizeModeMargin())
				->build();

			$result->saveToFile(FCPATH . 'assets/qrcode/' . $idPeserta . '.png');
			$qrcodePath = FCPATH . 'assets/qrcode/' . $idPeserta . '.png';


			$output = [
				'namaLengkap' => $namaPeserta,
			];
			return view('/Registrasi/Success', $output);
		}
	}

	// VERIFICATION ==============================
	public function Verification()
	{
		$userModel = new UserModel;
		$hash = $this->request->uri->getSegment(3);

		// update status aktivasi akun
		if ($userModel->_findByHash($hash)) {
			$username = $userModel->_findByHash($hash)[0]->username;
			$data = [
				'active' => 1
			];
			$userModel->_update($username, $data);

			return view('/Verification/Success');
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
