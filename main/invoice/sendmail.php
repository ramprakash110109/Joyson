<?php
require "Mailer/PHPMailerAutoload.php";
include("Mailer/class.phpmailer.php");
function sendMail($to,$subject,$body){
 $mail = new PHPMailer();
   $mail->SMTPDebug = 2;
   $mail->IsSMTP();
   $mail->Mailer = 'smtp';
   $mail->SMTPAuth = true;
   $mail->Host = 'ssl://smtp.gmail.com';
   $mail->Username = 'radarinfosolutions@gmail.com';
   $mail->Password = 'mepco123';
   $mail->Port = 465;
   $mail->SMTPSecure = 'ssl';
   $mail->IsHTML(true); 
   $mail->SingleTo = true; 
   $mail->From = 'radarinfosolutions@gmail.com'; 
   $mail->FromName = 'RADAR Info Solutions';
   $mail->addAddress($to,'cfripbs');
   $mail->Subject = $subject;
	 $mail->Body =$body;
     if (!$mail->Send())
    {
      return false;
    }
	   else
      return true;
}
function sendBillMail($to,$toname,$subject,$body){
 $mail = new PHPMailer();
   $mail->SMTPDebug = 2;
   $mail->IsSMTP();
   $mail->Mailer = 'smtp';
   $mail->SMTPAuth = true;
   $mail->Host = 'ssl://smtp.gmail.com';
   $mail->Username = 'radarinfosolutions@gmail.com';
   $mail->Password = 'mepco123';
   $mail->Port = 465;
   $mail->SMTPSecure = 'ssl';
   $mail->IsHTML(true); 
   $mail->AddEmbeddedImage("logo.jpg", "my-attach", "logo.jpg");
   $mail->SingleTo = true; 
   $mail->From = 'radarinfosolutions@gmail.com'; 
   $mail->FromName = 'Joyson Apparels';
   $recipients = array(
   'soundar706@gmail.com' => 'Person One',
   'ramprakash110109@gmail.com' => 'Person Two',
   // ..
    );
    foreach($recipients as $email => $name)
    {
      $mail->AddCC($email, $name);
    }
   $mail->addAddress($to,$toname);
   $mail->Subject = $subject;
   $mail->Body =$body;
     if (!$mail->Send())   
    {
      return false;
    }
  else
      return true;
  }
?>
