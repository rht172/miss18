<?php
session_start();
?>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
// include 'header.php';
include '../includes/dbAccessClass.php';
include '../includes/myFunctions.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// echo 'So Far Good';

$email = czPostForSQL('email');

$otp = random_int(100000, 999999); // Generate a 6-digit OTP
// Store $otp, user's email, and timestamp in the database

$current_time = time();
// $expiryTime = time() + (10 * 60);
$expiryTime = time() + 200;

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'otp_table';

$fetch_email = "";

$query_2 = "SELECT email from otp_table where email = '$email';";
$result_2 = $obj_class_main->selectData_customqry($query_2);
while ($row_2 = $result_2->fetch_assoc()) {
    $fetch_email = $row_2['email'];
}

if (strlen($fetch_email) > 0) {
    $updateValueAndFeilds = "otp = '$otp',time = '$current_time'";
  $updateWhereClasuse = "email='$email'";
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
} else {
    $query = "INSERT INTO otp_table (email, time, otp) VALUES ('$email', '$current_time', '$otp');";
    $result = $obj_class_main->selectData_customqry($query);
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'email-smtp.ap-south-1.amazonaws.com';
$mail->SMTPAuth = true;
$mail->Port = 25;
$mail->Username = 'AKIAYMRCLYHNQRZJHX2Q';
$mail->Password = 'BExA43hwG02yKjiRE7JiP5yBxpBGVkFmI9CvBkTvYpmv';


// echo 'PHP Mailer Initiated';
$mail->setFrom('support@cloudzoo.in', 'CloudZoo');
$mail->addReplyTo('support@cloudzoo.in', 'CloudZoo');
$mail->addAddress($email, 'Dear Customer');
// $mail->addCC('developer3cloudzoo@gmail.com', 'Subaash');


// echo 'Mail Content Set';

$mail->Subject = 'OTP Verification Code';


$mail->isHTML(true);

$mailContent = "Your OTP is $otp";
$mail->Body = $mailContent;

// echo 'Went Up to Send';

if ($mail->send()) {
    // header("Location: ../otp.php");
    // echo 'Message has been sent';
} else {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

$query_1 = "SELECT otp,time from otp_table where email = '$email';";
$result_1 = $obj_class_main->selectData_customqry($query_1);
while ($row_1 = $result_1->fetch_assoc()) {
    $fetch_otp = $row_1['otp'];
    $fetch_time = $row_1['time'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .otp-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input {
            width: 80%;
            padding: 10px;
            font-size: 1.2rem;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        p {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="otp-container">
        <h2>OTP Verification</h2>
        <p>An OTP has been sent to your e-mail address. Please enter the OTP below:</p>
        <input type="text" id = "otp" placeholder="Enter OTP">
        <button onclick="verify_otp ()" >Verify OTP</button>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var tokenid = "<?php echo session_id(); ?>";


    var fetch_otp = <?php echo $fetch_otp ?>;
    var fetch_time = <?php echo $fetch_time ?>;
// console.log(new Date().getTime());


let expiryTime = new Date().getTime() + 60000;

    function verify_otp () {
        var entered_otp = document.getElementById('otp').value;

        if (entered_otp == fetch_otp && new Date().getTime() <= expiryTime) {
            window.location.href = '../register.php';
        } else if (entered_otp != fetch_otp) {
            Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Incorrect OTP!',
            confirmButtonColor: '#3085d6',
        });
        }
         else if (new Date().getTime() > expiryTime) {
            Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Timed Out!',
            confirmButtonColor: '#3085d6',
        });
        }

    }
</script>