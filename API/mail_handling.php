<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'getconfig.php';

function send_mail($username,$user_mail){
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = getconfig(key:"email",key2:"sender_mail");
        $mail->Password = getconfig(key:'email',key2:'mail_password');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $get_server_mail = getconfig(key:'email',key2:'sender_mail');
        $mail->setFrom($get_server_mail, 'Password Manager');

        $mail->addAddress($user_mail, $username);
        $mail->isHTML(true);                                  
        $mail->Subject = 'Thanks';
        $mail->Body    = 'This is a <b>test email</b> sent using PHPMailer.';
        $mail->AltBody = 'This is the plain text version.';

        $mail->send();
    } catch (Exception $e){
        return 101;
    }
}

// $email = "mohamedhathim628@gmail.com";
// $response = file_get_contents("https://api.zerobounce.net/v2/validate?api_key=28e391d0362540d78ac02b78a42f1c02&email=mohamedhathim628@gmail.com");
// $data = json_decode($response,true);


?>