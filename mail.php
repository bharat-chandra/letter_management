<?php

  require("PHPMailer/src/PHPMailer.php");
  require("PHPMailer/src/SMTP.php");
  class sendMail
  {
      function send($id){
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP(); // enable SMTP

      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465; // or 587
      $mail->IsHTML(true);
      $mail->Username = "id@gmail.com";
      $mail->Password = "password";
      $mail->SetFrom("from@gmail.com");
      $mail->Subject = "DLS : action required";
      $mail->Body = "<h1><i>ACTION REQUIRED!!,  you have new documents📃🧻 to be verified🧐</i></h1>";
      $mail->AddAddress($id);

      if(!$mail->Send()) {
         echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
         echo "Message has been sent";
      }
      }
}
?>
