<?php

namespace App\Controllers;

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
		$kategoriModel = new KategoriModel;
		$subKategoriModel = new SubKategoriModel;

		$data = [
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
			$tanggalLahir = $this->request->getPost('tanggal_lahir');
			$email = $this->request->getPost('email');
			$nomorHp = $this->request->getPost('nomor_hp');
			$alamat = $this->request->getPost('alamat');
			$provinsi = $this->request->getPost('provinsi');
			$kabupaten = $this->request->getPost('kabupaten');
			$kecamatan = $this->request->getPost('kecamatan');
			$asal = $this->request->getPost('asal');
			$idKategori = $this->request->getPost('id_kategori');
			$keterangan = $this->request->getPost('keterangan');
			$createdAt = $this->nowDate;
			$hash = md5(uniqid(rand(), true));

			// get File
			// $file = $this->request->getFile('profilePhoto');
			// $fileName = $idPeserta . '-' . rand(0123, 9999) . '-profile.jpg';
			// $file->move('assets/profile-photos/', $fileName);

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
				'active' => 1,
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
				'provinsi' => $provinsi,
				'kabupaten' => $kabupaten,
				'kecamatan' => $kecamatan,
				'asal' => $asal,
				'username' => $username,
				'created_at' => $createdAt,
			];

			$keikutsertaanData = [
				'id_keikutsertaan' => 'ke_' . rand(0123, 9999),
				'id_peserta' => $idPeserta,
				'id_kategori' => $idKategori,
				'id_sub_kategori' => $idSubKategori,
				'keterangan' => $keterangan,
			];

			// id for profile photos is usg_0211
			$data = [
				'id_uploads' => 'up' . rand(0123, 9999),
				// 'filepath' => $fileName,
				'id_peserta' => $idPeserta,
				'id_usage' => 'usg_0211',
			];

			// Insertion to Database ==========================

			// $uploadsModel->_Insert($data);
			$userModel->_Insert($userData);
			$pesertaModel->_Insert($pesertaData);
			$keikutsertaanModel->_Insert($keikutsertaanData);

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

			// // Send Email Function =============================
			// $mail = new PHPMailer(true);

			// try {
			// //Server settings
			// $mail->isSMTP();                                            //Send using SMTP
			// $mail->Host       = 'ssl://mail.jfc-center.id';                     //Set the SMTP server to send through
			// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			// $mail->Username   = 'admin@jfc-center.id';                     //SMTP username
			// $mail->Password   = '9Cahaya9roup';                               //SMTP password
			// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			// $mail->Port       = 465;                              //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			// //Recipients  //Add a recipient
			// $mail->setFrom('admin@jfc-center.id', 'JFC-Center Official');
			// $mail->addAddress(strval($email));

			// 	//Attachments
			// 	$mail->addAttachment($qrcodePath);         //Add attachment

			// 	//Content
			// 	$mail->isHTML(true);                                  //Set email format to HTML
			// 	$mail->Subject = 'Buka dong, ini QR-Codemu  ' . $namaPeserta;
			// 	$mail->Body    =
			// 		'
			// 	<h2> Hai ' . $namaPeserta . '! <br> </h2>

			// 	<h4>Simpan QR-Code dengan baik</h4> <br>
			// 	QR-Code ini digunakan sebagai identitas anda. dan digunakan untuk absensi pada saat workshop. <br>
			// 	<hr>
			// 	<br>
			// 	<hr>
			// 	<h3>Terimakasih, dan selamat bergabung!</h3>
			// 	';
			// 	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			// 	//Send Email
			// 	$mail->send();
			// 	echo 'Message has been sent';
			// } catch (Exception $e) {
			// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			// }
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
