<?php
session_start();
/**
 * This example shows sending a message using PHP's mail() function.
 */

require 'PHPMailerAutoload.php';
require_once '../Objetos/Gestion.php';

$gestion = new Gestion();

$gestion->vaciar();

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('mail.speedy.com.ar', 'Cecilia Schwarz');
//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($_REQUEST['mail'], $_REQUEST['nombre']);
//Set the subject line
$mail->Subject = 'Tu compra en Cecilia Schwarz';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML('hola', dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

