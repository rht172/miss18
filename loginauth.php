<?php session_start();
header("Access-Control-Allow-Origin: *");
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Object Declarations
$obj_class_main = new czDBAccess();
$obj_class_main->varTableName = 'customer_table';
echo $_SESSION['google_data']['email'];


$without_login = czGet('type');
$wl_email = czGet('wl_email');


if ($without_login == 'without_login') {

    $result_w_c = $obj_class_main->selectData_customqry("SELECT * from customer_table WHERE email = '$wl_email';");


    if ($result_w_c !== false && $result_w_c->num_rows > 0) {
        while ($row_wl = $result_w_c->fetch_assoc()) {
            $_SESSION['customer_name'] = $row_wl['fname'];
            $_SESSION['email'] = $row_wl['email'];
            $_SESSION['tid'] = $row_wl['tid'];

            header("Location: checkout-review.php");
            die();

        }
    } else {

        header("Location: checkout-details.php?key1=invalidlogin");
        die();

    }

} else {
    echo "Invalid Wl Login";
}



if ((isset($_POST['email']) and isset($_POST['password'])) || isset($_SESSION['google_data'])) {



    //Verify User Name and Password and Also Verify that The User Has Mobile Access

    if (isset($_SESSION['google_data'])) {
        $user_name_g = $_SESSION['google_data']['email'];
        $password_g = $_SESSION['google_data']['id'];
        $temp_whereClause = "email = '$user_name_g'";
        $temp_Feilds = "*";
        ob_start();

        $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause);
    } else {
        $user_name = $_POST['email'];
        $password = $_POST['password'];
        $temp_whereClause = "email = '$user_name'  and password = '$password'";
        $temp_Feilds = "*";
        ob_start();

        $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause);
    }

    // $temp_whereClause = "email = '$user_name'  and password = '$password'";
    // $temp_Feilds = "*";
    // ob_start();

    // $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause);


    $checkout_details = czGet('checkout_details');

    // if ($checkout_details == "checkout_details") {


    if ($result !== false && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['customer_name'] = $row['fname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['tid'] = $row['tid'];

            if ($checkout_details == "checkout_details") {
                // not logged ins
                header("Location: checkout-details.php");
                die();
            } else {
                header("Location: index.php");
                die();
            }
        }
    } else {

        if ($checkout_details == "checkout_details") {
            header("Location: checkout-details.php?key1=invalidlogin");
            die();
        } else {
            header("Location: index.php?key1=invalidlogin");
            die();
        }
    }




    // } else {

    //     if ($result !== false && $result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $_SESSION['customer_name'] = $row['fname'];
    //             $_SESSION['email'] = $row['email'];
    //             $_SESSION['tid'] = $row['tid'];

    //             // not logged ins
    //             header("Location: index.php");
    //             die();
    //         }
    //     } else {
    //         header("Location: index.php?key1=invalidlogin");
    //         die();
    //     }

    // }

} else {
    header("Location: index.php?key1=invalidlogin");
    die();
}