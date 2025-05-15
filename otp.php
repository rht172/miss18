<?php
session_start();
?>
<?php



$fname = $_GET['fname'];
$lname = $_GET['lname'];
$street = $_GET['street'];
$city = $_GET['city'];
$state = $_GET['state'];
$pin_code = $_GET['pin_code'];
$country = $_GET['country'];
$email = $_GET['email'];
$phone_number = $_GET['phone_number'];
$password = $_GET['password'];



echo $fname;


?>



<?php 
//    //Get Value to form Insert Query
//    $insertFeilds = "email,time,otp";
//    $insertValues = "";
//    //Insert Process
//    $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $street = $_POST['street'];
//     $city = $_POST['city'];
//     $state = $_POST['state'];
//     $pin_code = $_POST['pin_code'];
//     $country = $_POST['country'];
//     $email = $_POST['email'];
//     $phone_number = $_POST['phone_number'];
//     $password = $_POST['password'];

//     // Now you have the received variables again
//     // You can use them for further processing or display

//     // Example: Display the received data
//     echo "Received Data:<br>";
//     echo "First Name: $fname<br>";
//     echo "Last Name: $lname<br>";
//     echo "Street: $street<br>";
//     // Continue for other variables
// }
?>