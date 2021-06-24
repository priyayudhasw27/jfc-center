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
			// $mail = new PHPMailer(true);

			// //Server settings
			// // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			// $mail->isSMTP();                                            //Send using SMTP
			// $mail->Host       = 'ssl://official@jfc-center.id';                     //Set the SMTP server to send through
			// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			// $mail->Username   = 'official@jfc-center.id';                     //SMTP username
			// $mail->Password   = '9Cahaya9roup';                               //SMTP password
			// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			// $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			// // $mail->ClearAllRecipients();
			// //Recipients
			// //Set who the message is to be sent from
			// // $mail->setFrom('jfcofficial@example.com', 'JFC Official');

			// //Set an alternative reply-to address
			// // $mail->addReplyTo('jfcofficial@example.com', 'JFC Official');
			// // $mail->setFrom('mywapblok@gmail.com');
			// $mail->addAddress('priyayudha.sw27@gmail.com');

			// //Content
			// $mail->isHTML(true);                                  //Set email format to HTML
			// $mail->Subject = 'Email Verification';
			// $mail->Body    = 'Coba Email';
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			// //Send Email
			// $mail->send();

			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'ssl://mail.jfc-center.id';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'official@jfc-center.id';                     //SMTP username
				$mail->Password   = '9Cahaya9roup';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 465;                              //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				//Recipients  //Add a recipient
				$mail->setFrom('official@jfc-center.id', 'JFC Official');
				$mail->addAddress('priyayudha.sw27@gmail.com');

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Here is the subject';
				$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
}
