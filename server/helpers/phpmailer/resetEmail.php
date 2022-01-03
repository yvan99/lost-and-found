<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';
function resetpasswordmail($userEmail, $userBody, $userSubject)
{
   $developmentMode = FALSE;
   $mail = new PHPMailer($developmentMode);
   // Passing `true` enables exceptions
   try {
      //Server settings
      $mail->SMTPDebug = false;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'emateduc250@gmail.com';                 // SMTP username
      $mail->Password = 'Emate250@git';                           // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                              // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('emateduc250@gmail.com', 'lost and found');
      $mail->addAddress($userEmail);     // Add a recipient
      $body = $userBody;

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $userSubject;
      $mail->Body    = $body;
      $mail->AltBody = strip_tags($body);

      $mail->send();
      // echo 'Message has been sent';

   } catch (Exception $e) {
      // echo 'Message could not be sent.';
      // echo 'Mailer Error: ' . $mail->ErrorInfo;
   }
}
