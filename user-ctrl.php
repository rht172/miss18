<?php
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
include 'includes/theme-constants.php';
//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_user = new czDBAccess();
$obj_class_newsletter = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'customer_table';
$obj_class_user->varTableName = 'user_table';
$obj_class_newsletter->varTableName = 'newsletter_table';

//Init Variables
$tid = "";
$fname = "";
$lname = "";
$door_no = "";
$street = "";
$city = "";
$state = "";
$pin_code = "";
$email = "";
$password = "";
$created_on = "";
$last_updated_on = "";
$phone_number = "";
$country = "";

//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Insert Process-----------------------------------------------------------------------------------------------
if (czGet('key1') == "insert") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
    $email = czPostForSQL('email');
    if (strlen($email) > 0) {

        //Assign values to Variable from Post Method
        $tid = czPostForSQL('tid');
        $fname = czPostForSQL('fname');
        $lname = czPostForSQL('lname');
        $door_no = czPostForSQL('door_no');
        $street = czPostForSQL('street');
        $city = czPostForSQL('city');
        $state = czPostForSQL('state');
        $pin_code = czPostForSQL('pin_code');
        $email = czPostForSQL('email');
        $password = czPostForSQL('password');
        $phone_number = czPostForSQL('phone_number');
        $country = czPostForSQL('country');


        //Convert to Numeric
        $created_on = date("Y-m-d");


        //Initilize The File Upload Process

        //Get Value to form Insert Query
        $insertFeilds = "fname,lname,door_no,street,city,state,pin_code,email,password,created_on,phone_number,country";
        $insertValues = "'$fname','$lname','$door_no','$street','$city','$state','$pin_code','$email','$password','$created_on','$phone_number','$country'";
        //Insert Process
        $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
        //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
        if ($insertStatus > 0) {
            header("Location: login.php?key1=insertSuccess");
            exit();
        } else {
            header("Location: login.php?key1=insertFailed");
            exit();
        }
    }
}


if (czGet('key1') == "sign_up") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
    $email = czPostForSQL('email');
    $first_name = czPostForSQL('first_name');
    $last_name = czPostForSQL('last_name');
    $password = czPostForSQL('password');
    $confirm_password = czPostForSQL('confirm_password');

    $checkout_details = czGet('checkout_details');

    echo $checkout_details;


    if ($password == $confirm_password && strlen($email) > 0) {

        // if (strlen($email) > 0) {

        //Assign values to Variable from Post Method


        //Convert to Numeric
        $created_on = date("Y-m-d");
        $reward_points = 50;

        //Initilize The File Upload Process

        //Get Value to form Insert Query
        $insertFeilds = "fname,lname,email,password,created_on,reward_points";
        $insertValues = "'$first_name','$last_name','$email','$password','$created_on','$reward_points'";
        //Insert Process
        $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
        //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
        if ($insertStatus > 0) {
            if ($checkout_details == "checkout_details") {

                header("Location: checkout-details.php?key1=signup_success&reward_points=added");
                exit();

            } else {
                header("Location: index.php?key1=signup_success&reward_points=added");
                exit();
            }
        } else {
            header("Location: 404.php");
            exit();
        }
        // }

    } else {
        if ($checkout_details == "checkout_details") {
            header("Location: checkout-details.php?key1=password_mismatch&fname=" . $first_name . "&lname=" . $last_name . "&email=" . $email);
            exit();
        } else {
            header("Location: index.php?key1=password_mismatch&fname=" . $first_name . "&lname=" . $last_name . "&email=" . $email);
            exit();
        }
    }





}

//Update Process --------------------------------------------------------------------------------------------------------------------
// if (czGet('key1') == "update") {
//     //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

//     //Get Update Key
//     $updateKey = czGet('pk');



//     //Assign values to Variable from Post Method
//     $tid = czPostForSQL('tid');
//     $fname = czPostForSQL('fname');
//     $lname = czPostForSQL('lname');
//     $door_no = czPostForSQL('door_no');
//     $street = czPostForSQL('street');
//     $city = czPostForSQL('city');
//     $state = czPostForSQL('state');
//     $pin_code = czPostForSQL('pin_code');
//     $email = czPostForSQL('email');
//     $password = czPostForSQL('password');
//     $phone_number = czPostForSQL('phone_number');
//     $country = czPostForSQL('country');



//     //Convert to Numeric
//     $last_updated_on = date("Y-m-d");

//     //Initilize The File Upload Process

//     //Get Value to form Update Query
//     $updateValueAndFeilds = "fname = '$fname',lname = '$lname',door_no = '$door_no',street = '$street',city = '$city',state = '$state',pin_code = '$pin_code',email = '$email',phone_number = '$phone_number',country = '$country'";
//     $updateWhereClasuse = "tid = '$updateKey'";
//     //Update Process
//     $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

//     //Redirect URL after update
//     if ($UpdateStatus == "Success") {
//         header("Location: login.php?key1=updateSuccess");
//         exit();
//     } else {
//         header("Location: login.php?key1=updateFailed");
//         exit();
//     }
// }

if (czGet('key1') == "account_profile_update") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

    //Get Update Key
    $updateKey = czGet('pk');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            echo "Attachment selected";
            $result = $obj_class_main->selectData_customqry("SELECT ext_file from user_table where tid = $updateKey");
            while ($row = $result->fetch_assoc()) {
                if (strlen($row['ext_file']) > 0) {
                    $file_path = constant("Base_URL") . "img/shop/account/" . 'tid-' . $updateKey . '.' . $row['ext_file'];

                    if (file_exists($file_path)) {
                        unlink($file_path);
                    } else {
                        // File doesn't exist, you may choose to log this or handle it as needed.
                        // For now, I'm echoing a message to the browser.
                        echo "File does not exist: $file_path";
                    }
                }
            }
        } else {
            echo "No file photo selected.";
        }
    }



    //Assign values to Variable from Post Method
    $fname = czPostForSQL('account_fname');
    $lname = czPostForSQL('account_lname');
    $email = czPostForSQL('account_email');
    $password = czPostForSQL('account_password');
    $phone_number = czPostForSQL('account_phone_number');




    //Convert to Numeric
    $last_updated_on = date("Y-m-d");

    //Initilize The File Upload Process

    //Get Value to form Update Query
    $updateValueAndFeilds = "fname = '$fname',lname = '$lname',phone_number = '$phone_number',password = '$password'";
    $updateWhereClasuse = "tid = '$updateKey'";
    //Update Process
    $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            // Get Extension Code
            $path_parts1 = pathinfo($_FILES["profile_image"]["name"]);
            $profile_image_extension = isset($path_parts1['extension']) ? $path_parts1['extension'] : '';


            // Check if extension is set and not empty
            if (!empty($profile_image_extension)) {
                $updateValueAndFields_1 = "ext_file = '$profile_image_extension'";
                $updateWhereClause_1 = "tid = '$updateKey'";

                FileUpload("profile_image", 'tid-' . $updateKey, "img/shop/account/", $profile_image_extension);

                // Update Process
                $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFields_1, $updateWhereClause_1);
                echo "not empty.";
            } else {
                // Echo something when extension is empty
                echo "File extension is empty!";
            }
        } else {
            echo "No file selected or an error occurred during upload.";
        }
    }

    // echo $fname;
    $_SESSION['customer_name'] = $fname;


    //Redirect URL after update
    if ($UpdateStatus == "Success") {

        header("Location: account-profile.php?key1=updateSuccess");
        exit();
    } else {
        header("Location: account-profile.php?key1=updateFailed");
        exit();
    }
}



if (czGet('key1') == "insertNewsLetter") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
    $email = czPostForSQL('email');
    if (strlen($email) > 0) {

        //Assign values to Variable from Post Method
        $tid = czPostForSQL('tid');
        $name = czPostForSQL('name');
        $email = czPostForSQL('email');

        $created_on = date("Y-m-d");


        //Get Value to form Insert Query
        $insertFeilds = "name,email,created_on";
        $insertValues = "'$name','$email','$created_on'";
        //Insert Process
        $insertStatus = $obj_class_newsletter->insertDataWithReturnValue($insertFeilds, $insertValues);
        //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
        if ($insertStatus > 0) {
            header("Location: index.php?key1=insertSuccess");
            exit();
        } else {
            header("Location: index.php?key1=insertFailed");
            exit();
        }
    }
}



if (czGet('key1') == "address_update") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

    //Get Update Key
    $updateKey = czGet('pk');



    //Assign values to Variable from Post Method
    $door_no = czPostForSQL('door_no');
    $street = czPostForSQL('street');
    $city = czPostForSQL('city');
    $state = czPostForSQL('state');
    $pin_code = czPostForSQL('zip_code');
    $country = czPostForSQL('country');



    //Convert to Numeric
    $last_updated_on = date("Y-m-d");

    //Initilize The File Upload Process

    //Get Value to form Update Query
    $updateValueAndFeilds = "door_no = '$door_no',street = '$street',city = '$city',state = '$state',pin_code = '$pin_code',country = '$country'";
    $updateWhereClasuse = "tid = '$updateKey'";
    //Update Process
    $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

    //Redirect URL after update
    if ($UpdateStatus == "Success") {
        header("Location: account-address.php?key1=updateSuccess");
        exit();
    } else {
        header("Location: account-address.php?key1=updateFailed");
        exit();
    }
}





if (czGet('key1') == "checkout_update") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
    $updateKey = '';
    //Get Update Key
    $updateKey = czGet('pk');






    //Assign values to Variable from Post Method
    $fname = czPostForSQL('account_fname');
    $lname = czPostForSQL('account_lname');
    $phone_number = czPostForSQL('account_phone_number');
    $door_no = czPostForSQL('account_door_no');
    $street = czPostForSQL('account_street');
    $city = czPostForSQL('account_city');
    $state = czPostForSQL('account_state');
    $pin_code = czPostForSQL('account_pin_code');
    $country = czPostForSQL('account_country');
    $email = czPostForSQL('account_email');

    $created_on = date("Y-m-d");

    //Convert to Numeric
    $last_updated_on = date("Y-m-d");

    //Initilize The File Upload Process

    if (strlen($updateKey) > 0) {

        //Get Value to form Update Query
        $updateValueAndFeilds = "fname = '$fname',lname = '$lname',phone_number = '$phone_number',door_no = '$door_no',street = '$street',city = '$city',state = '$state',pin_code = '$pin_code',country = '$country'";
        $updateWhereClasuse = "tid = '$updateKey'";
        //Update Process
        $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);


    } else {

        $result_user = $obj_class_main->selectData_customqry("SELECT tid from customer_table where email = '$email';");

        while ($row_user = $result_user->fetch_assoc()) {
            $account_tid = $row_user['tid'];
        }

        if (strlen($account_tid) > 0) {

            $updateValueAndFeilds_wl = "fname = '$fname',lname = '$lname',phone_number = '$phone_number',door_no = '$door_no',street = '$street',city = '$city',state = '$state',pin_code = '$pin_code',country = '$country'";
            $updateWhereClasuse_wl = "tid = '$account_tid'";
            //Update Process
            $UpdateStatus_wl = $obj_class_main->updateData($updateValueAndFeilds_wl, $updateWhereClasuse_wl);
        } else {

            $insertFeilds = "fname,lname,door_no,street,city,state,pin_code,email,phone_number,country,created_on";
            $insertValues = "'$fname','$lname','$door_no','$street','$city','$state','$pin_code','$email','$phone_number','$country','$created_on'";
            //Insert Process
            $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);

        }

    }

    //Redirect URL after update
    if ($UpdateStatus == "Success") {
        header("Location: checkout-review.php?key1=updateSuccess");
        exit();
    } else if ($insertStatus > 0 || $UpdateStatus_wl == "Success") {
        header("Location: loginauth.php?wl_email=$email&type=without_login");
        exit();
    } else {
        header("Location: checkout-review.php?key1=updateFailed");
        exit();
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
