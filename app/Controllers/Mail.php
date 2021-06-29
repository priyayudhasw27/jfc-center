<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail extends BaseController
{
	public function index()
	{
		echo view('sendmail');
	}

	public function Send()
	{
		if ($this->request->getVar('action') == 'send') {
			// // Send Email Function =============================
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'ssl://mail.jfc-center.id';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'official-admin@jfc-center.id';                     //SMTP username
				$mail->Password   = '9CahayaM4il';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 465;                              //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				//Recipients  //Add a recipient
				$mail->setFrom('admin@jfc-center.id', 'JFC-Center Official');
				$mail->addAddress('mywapblok@gmail.com');

				//Attachments
				// $mail->addAttachment($qrcodePath);         //Add attachment

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Buka dong, ini QR-Codemu ';
				$mail->Body    =
					'
				<h2> Hai ! <br> </h2>

				<h4>Simpan QR-Code dengan baik</h4> <br>
				QR-Code ini digunakan sebagai identitas anda. dan digunakan untuk absensi pada saat workshop. <br>
				<hr>
				<br>
				<hr>
				<h3>Terimakasih, dan selamat bergabung!</h3>
				';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				//Send Email
				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
}
