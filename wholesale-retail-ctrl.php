<?php
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'crm_lead_main_table';


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
        $contact_person = czPostForSQL('contact_person');
        if (strlen($contact_person) > 0) {

            //Assign values to Variable from Post Method
            $contact_person = czPostForSQL('contact_person');
            $contact_number = czPostForSQL('contact_number');
            $email = czPostForSQL('email');
            $other_details = czPostForSQL('other_details');
            $state = czPostForSQL('state');
            $city = czPostForSQL('city');
            $reference_no = czPostForSQL('reference_no');
            $category = czPostForSQL('category');
            $lead_source = czPostForSQL('lead_source');
            $lead_status = czPostForSQL('lead_status');




            //Convert to Numeric
            $created_on = date("Y-m-d");
            $last_updated_on = date("Y-m-d");
            // $created_by = $_SESSION['customer_name'];


            //Get Value to form Insert Query
            $insertFeilds = "contact_person,company_name,contact_number,created_on,created_by,email,other_details,state,city,reference_no,category,lead_source,lead_status";
            $insertValues = "'$contact_person','$company_name','$contact_number','$created_on','$contact_person','$email','$other_details','$state','$city','$reference_no','$category','$lead_source','$lead_status'";
            //Insert Process
            $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);


            if ($insertStatus > 0) {
                header("Location: wholesale-retail-s-add.php?key=insertSuccess");
                exit();
            } else {
                header("Location: wholesale-retail-s-add.php?key=insertFailed");
                exit();
            }
        }
    }
}
