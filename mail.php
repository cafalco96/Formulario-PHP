<?php
require("vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;

function sendMail ($email, $subject = "Contact", $name, $body, $html = false){
  $phpmailer = new PHPMailer();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '41f69e40087f06';
  $phpmailer->Password = 'c534bcae58c44d';

  $phpmailer->setFrom($email, $name);
  $phpmailer->addAddress('carlos@yomismo.com', 'Carlos Company'); 

  $phpmailer->isHTML($html);                                  //Set ephpmailer format to HTML
  $phpmailer->Subject = $subject;
  $phpmailer->Body    = $body;

  $phpmailer->send();

};

function resMail($name, $lastname,$mail,$subject) {
  $mess = "Hola $name $lastname, gracias por cominucarte";

  // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
  $mess = wordwrap($mess, 70, "\r\n");
  
  mail($mail, $subject, $mess);
};
?>