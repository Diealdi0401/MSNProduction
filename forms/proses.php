<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


        //sesuaikan name dengan di form nya ya
          $email = 'msn.production01@gmail.com' ; // email penerima pesan
          $user_email = $_POST['user_email'];
          $subject = $_POST['subject'];
          $message = $_POST['message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ramdanialdi0104';                     //SMTP username
    $mail->Password   = 'sovcyhlygbwzneet';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //pengirim
    $mail->setFrom('ramdanialdi0104@gmail.com', 'user');
    $mail->addAddress($email,'ramdanialdi889@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message." Nama Constumer : ".$user_email;
    $mail->AltBody = '';
    //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
    //$mail->addAttachment('');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
          //redirect ke halaman index.php
        echo "<script>alert('Email berhasil terkirim!');window.location='index.html';</script>";

        ?>