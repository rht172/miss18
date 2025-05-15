<?php
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


// Storing google recaptcha response
// in $recaptcha variable
$recaptcha = $_POST['g-recaptcha-response'];

// Put secret key here, which we get
// from google console
$secret_key = '6Lf7QQElAAAAACq0HjsNMVu0E0-ejK3YlRztIevP';

// Hitting request to the URL, Google will
// respond with success or error scenario
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
    . $secret_key . '&response=' . $recaptcha;

// Making request to verify captcha
$response = file_get_contents($url);

// Response return by google is in
// JSON format, so we have to parse
// that json
$response = json_decode($response);

// Checking, if response is true or not
if ($response->success == true) {
    echo '<script>alert("Google reCAPTACHA verified")</script>';
} else {
    echo '<script>alert("Error in Google reCAPTACHA")</script>';
}



//Init Variables
$tid = "";
$lead_source = "";
$company_name = "";
$contact_person = "";
$contact_person_designation = "";
$contact_number = "";
$email = "";
$product_name = "";
$category = "";
$qty = "";
$rate = "";
$amount = "";
$city = "";
$state = "";
$agent = "";
$priority = "";
$lead_stage = "";
$assigned_to = "";
$quote_no = "";
$reference_no = "";
$other_details = "";
$appoinment_on = "";
$created_by = "";
$created_on = "";
$last_updated_on = "";
$lead_status = "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if ($response->success == true) {
    if (czGet('key1') == "insert") {
        $email = czPostForSQL('email');
        if (strlen($email) > 0) {

            //Assign values to Variable from Post Method
            $contact_person = czPostForSQL('contact_person');
            $contact_number = czPostForSQL('contact_number');
            $email = czPostForSQL('email');
            $other_details = czPostForSQL('other_details');
            $state = czPostForSQL('state');
            $city = czPostForSQL('city');
            $reference_no = czPostForSQL('reference_no');
            $website = czPostForSQL('website');
            $yourself = czPostForSQL('yourself');



            $mail->setFrom('support@cloudzoo.in.in', 'Zoycare');
            $mail->addReplyTo('support@cloudzoo.in.in', 'Zoycare');
            $mail->addAddress($email, $contact_person);

            $mail->Subject = "Let's Collaborate";

            $mail->isHTML(true);

            $mailContent = "Name : " . $contact_person . "<br> Contact no : " . $contact_number . "<br> Mail : " . $email . "<br> Address : " . $other_details . "<br> State : " . $state . "<br> City : " . $city . "<br> Pin Code : " . $reference_no . "<br> Website : " . $website . "<br> About Your Project : " . $yourself;

            $mail->Body = $mailContent;

            $mail->send();


            if ($mail->send()) {
                header("Location: collaborate-success.php?key=insertSuccess");
                exit();
            } else {
                header("Location: collaborate-success.php?key=insertFailed");
                exit();
            }
        }
    }
}
