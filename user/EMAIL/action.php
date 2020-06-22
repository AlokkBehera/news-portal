<?php

/*$mailto=$_POST['email'];
$mailsubject=$_POST['sub'];
$mailmsg=$_POST['msg'];*/




$mailto=$email;

$mailsubject="OTP";

$mailmsg='<h1>YOUR OTP=</h1>'.$code.'<br><br><br><p>*this is a verify otpgenereted output.</p>';




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              //Passing `true` enables exceptions
   //Server settings
 $mail->SMTPDebug = 0;                                 // Enable verbose debug output by value 2
 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username = 'kumaralok.odisha@gmail.com';                 // SMTP username
 $mail->Password = 'iamalokkumar';   
                         // SMTP password
 $mail->SMTPSecure = 'tls'; //or ssl                           // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 587;   // or 465                                 // TCP port to connect to

//Recipients
 $mail->setFrom('kumaralok.odisha@gmail.com', 'kumaralok');
 
 $mail->addAddress($mailto); 

// $addr = explode(',',$mailto);
// echo $ok=count($addr);e

// foreach($addr as $address){
// $mail->AddAddress($address);

// }

// $mail->AddAttachment($phototmpname, $photoname);
 
 //Content
 $mail->isHTML(true);                                  // Set email format to HTML
 $mail->Subject = $mailsubject;
 $mail->Body    = $mailmsg;

 if(!$mail->send())
 {
 	echo"mail not send";
 }
 else{
 	header("location:otp.php");
 }
 ?>









