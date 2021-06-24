<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\KabupatenModel;
use App\Models\KategoriModel;
use App\Models\KecamatanModel;
use App\Models\KehadiranPesertaModel;
use App\Models\PesertaModel;
use App\Models\ProvinsiModel;
use App\Models\SubKategoriModel;
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
		$kategoriModel = new KategoriModel;
		$subKategoriModel = new SubKategoriModel;
		$provinsiModel = new ProvinsiModel;

		$data = [
			'provinsi' => $provinsiModel->_get(),
			'kategori' => $kategoriModel->_get(),
			'subKategori' => $subKategoriModel->_get(),
		];

		return view('/Registrasi/Index', $data);
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

		if ($this->request->getMethod() === 'post') {
			$idPeserta = 'jfc_' . rand(0123, 9999);
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');
			$namaPeserta = $this->request->getPost('nama_peserta');
			$jenisKelamin = $this->request->getPost('jenis_kelamin');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$provinsi = $this->request->getPost('provinsi');
			$kabupaten = $this->request->getPost('kabupaten');
			$kecamatan = $this->request->getPost('kecamatan');
			$asal = $this->request->getPost('asal');
			$idKategori = $this->request->getPost('id_kategori');
			$createdAt = $this->nowDate;
			$tanggalLahir = $this->request->getPost('tanggal_lahir');

			$keterangan = $this->request->getPost('keterangan');
			$hash = md5(uniqid(rand(), true));

			// cek apakah subkategori ada atau tidak
			if ($this->request->getPost('id_sub_kategori') == '') {
				$idSubKategori = NULL;
			} else {
				$idSubKategori = $this->request->getPost('id_sub_kategori');
			}

			$userData = [
				'username' => $username,
				'password' => md5($password),
				'hash' => $hash,
				'id_level' => 0
			];

			$pesertaData = [
				'id_peserta' => $idPeserta,
				'nama_peserta' => $namaPeserta,
				'jenis_kelamin' => $jenisKelamin,
				'tanggal_lahir' => $tanggalLahir,
				'email' => $email,
				'nomor_hp' => $nomorHp,
				'alamat' => $alamat,
				'id_provinsi' => $provinsi,
				'id_kabupaten' => $kabupaten,
				'id_kecamatan' => $kecamatan,
				'asal' => $asal,
				'username' => $username,
				'id_kategori' => $idKategori,
				'id_sub_kategori' => $idSubKategori,
				'keterangan' => $keterangan,
				'created_at' => $createdAt,
			];

			// Insertion to Database ==========================
			$userModel->_Insert($userData);
			$pesertaModel->_Insert($pesertaData);

			// get Workshop setelah tanggal daftar peserta
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

			$result->saveToFile(ROOTPATH . '/public/assets/qrcode/' . $idPeserta . '.png');
			$qrcodePath = ROOTPATH . '/public/assets/qrcode/' . $idPeserta . '.png';

			// Send Email Function =============================
			$mail = new PHPMailer(true);

			//Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'ssl://official@jfc-center.id';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'official@jfc-center.id';                     //SMTP username
			$mail->Password   = '9Cahaya9roup';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			$mail->ClearAllRecipients();
			//Recipients
			//Set who the message is to be sent from
			// $mail->setFrom('jfcofficial@example.com', 'JFC Official');

			//Set an alternative reply-to address
			// $mail->addReplyTo('jfcofficial@example.com', 'JFC Official');
			// $mail->setFrom('mywapblok@gmail.com');
			// $mail->addAddress($email);

			//Attachments
			$mail->addAttachment($qrcodePath);         //Add attachment

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Email Verification ' . $namaPeserta;
			$mail->Body    =
				'
				<h2> Hai ' . $namaPeserta . '! <br> </h2>
				
				Buka link di bawah untuk verifikasi email anda <br>
				<a href="' . base_url() . '/Registrasi/Verification/' . $hash . '">link verifikasi</a>
				<br> 
				Simpan QR Code dengan baik. <br>
				QR Code ini digunakan untuk absensi pada saat workshop. <br>
				<img src="' . $qrcodePath . '"/>
				<br>
				<hr>
				<h3>Terimakasih, dan selamat bergabung!</h3>
				';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			//Send Email
			$mail->send();

			return view('/Registrasi/Success');
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
