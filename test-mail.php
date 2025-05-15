<?php
session_start();
ob_start();
header("Access-Control-Allow-Origin: *");
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'amazon-ses/PHPMailer/src/Exception.php';
require 'amazon-ses/PHPMailer/src/PHPMailer.php';
require 'amazon-ses/PHPMailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'email-smtp.ap-south-1.amazonaws.com';
$mail->SMTPAuth = true;
$mail->Port = 25;
$mail->Username = 'AKIAYMRCLYHNQRZJHX2Q';
$mail->Password = 'BExA43hwG02yKjiRE7JiP5yBxpBGVkFmI9CvBkTvYpmv';





    $email = 'mohan@cloudzoo.in';
    $first_name = 'Mohan';



    $mail->setFrom('support@cloudzoo.in.in', 'Zoycare');
    $mail->addReplyTo('support@cloudzoo.in.in', 'Zoycare');
    $mail->addAddress($email, $first_name);

    $mail->Subject = "The Verification OTP for Zoycare";

    $mail->isHTML(true);

    $mailContent = "Hii";

    $mail->Body = $mailContent;

    $mail->send();

    echo "Mail Sent";

