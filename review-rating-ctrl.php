<?php
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();

//Assign Table Name
$obj_class_main->varTableName = 'review_rating_table';


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
$sku = "";
$cus_id = "";
$customer_name = "";
$customer_email = "";
$ratings = "";
$reviews = "";
$pros = "";
$cons = "";
$created_date = "";



//get The Process Name -insert or delete or update
$processName = czGet('key2');

// echo $processName;

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if ($response->success == true) {
    if (czGet('key2') == "insert") {
        $customer_name = czPostForSQL('customer_name');
        if (strlen($customer_name) > 0) {

            //Assign values to Variable from Post Method
            $sku = czPostForSQL('sku');
            $cus_id = czPostForSQL('cus_id');
            $customer_name = czPostForSQL('customer_name');
            $customer_email = czPostForSQL('customer_email');
            $ratings = czPostForSQL('ratings');
            $reviews = czPostForSQL('reviews');
            $pros = czPostForSQL('pros');
            $cons = czPostForSQL('cons');

            $created_date = date("Y-m-d");

            //Get Value to form Insert Query
            $insertFeilds = "sku,cus_id,customer_name,customer_email,ratings,reviews,pros,cons,created_date";
            $insertValues = "'$sku','$cus_id','$customer_name','$customer_email','$ratings','$reviews','$pros','$cons','$created_date'";
            //Insert Process
            $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);


            if ($insertStatus > 0) {
                header("Location: review-rating-add.php?key=insertSuccess");
                exit();
            } else {
                header("Location: review-rating-add.php?key=insertFailed");
                exit();
            }
        }
    }
}

if ($response->success == true) {
    if (czGet('key2') == "update") {
        //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

        //Get Update Key
        $updateKey = czGet('pk');

        $sku = czPostForSQL('sku');
        $cus_id = czPostForSQL('cus_id');
        $customer_name = czPostForSQL('customer_name');
        $customer_email = czPostForSQL('customer_email');
        $ratings = czPostForSQL('ratings');
        $reviews = czPostForSQL('reviews');
        $pros = czPostForSQL('pros');
        $cons = czPostForSQL('cons');

        $created_date = date("Y-m-d");

        "sku,cus_id,customer_name,customer_email,ratings,reviews,pros,cons,created_date";
        //Get Value to form Update Query
        $updateValueAndFeilds = "sku = '$sku',cus_id = '$cus_id',customer_name = '$customer_name',customer_email = '$customer_email',ratings = '$ratings',reviews = '$reviews',pros = '$pros',cons = '$cons',created_date = '$created_date'";

        $updateWhereClasuse = "tid = '$updateKey'";
        //Update Process
        $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

        //Redirect URL after update
        if ($UpdateStatus == "Success") {
            header("Location: review-rating-add.php?key2=updateSuccess");
            exit();
        } else {
            header("Location: review-rating-add.php?key2=updateFailed");
            exit();
        }
    }
}


//Delete Process------------------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "delete") {


    //Delete Query call
    $deleteKeyValue = czPostForSQL('delete_key');

    if (substr($deleteKeyValue, 0, 1) === ",") {
        $deleteKeyValue = substr($deleteKeyValue, 1);
    }
    if (strpos($deleteKeyValue, ',')) {
        $temp_whereClause = "tid in (" . $deleteKeyValue . ")";
    } else {
        $temp_whereClause = "tid  = '" . $deleteKeyValue . "'";
    }

    $curdStatus = $obj_class_main->deleteData($temp_whereClause);

    //Notify Based On Delete Status
    if ($curdStatus == "Success") {
        // If Delete Successfull
        echo '<div class="alert alert-success" id="success-alert">
                <strong>Cool!</strong>  Data Delete Successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
            </div>';
    } else {
        // If Delete Failed
        echo '<div class="alert alert-danger" id="success-alert">
<strong>Oops!</strong> Something Went Wrong, Data Not Delete Properly.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
    }
}
