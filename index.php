<?php 
require_once './vendor/autoload.php';

$xjudul = 'Ini Judul';
$xuser = 'alannnuari@gmail.com';
$xpass = '';
$xisi = file_get_contents('contents.html');
$xEmailpengirim = 'alannnuari@gmail.com';
$xNamapengirim = 'Aplikasi ABC';
$xEmailtujuan = 'tugas.alan@gmail.com';
$xNamatujuan = 'Nama Tujuan';



// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587 , "tls"))
  ->setUsername($xuser)
  ->setPassword($xpass)
  ;
// Sendmail
//$transport = new Swift_SendmailTransport('C:\xampp\sendmail\sendmail.exe -t');
// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
// Create a message
$message = (new Swift_Message($xjudul))
  ->setFrom([$xEmailpengirim => $xNamapengirim])
  ->setTo([$xEmailtujuan => $xNamatujuan])
  ->setBody($xisi, 'text/html')
  ;

// Send the message
$result = $mailer->send($message);
?>