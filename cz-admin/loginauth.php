<?php session_start();
header("Access-Control-Allow-Origin: *");
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Object Declarations
$obj_class_main = new czDBAccess();
$obj_class_main->varTableName = 'user_table';
if (isset($_POST['user_name']) and isset($_POST['password'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    //Verify User Name and Password and Also Verify that The User Has Mobile Access
    $temp_whereClause = "email_address = '$user_name'  and password = '$password'";
    $temp_Feilds = "*";
    ob_start();

    $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause);

    if ($result !== false && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['user_name'] = $row['email_address'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['tid'] = $row['tid'];
            $_SESSION['ext_file'] = $row['ext_file'];
            $user_status = $row['user_status'];
            $_SESSION['zoy'] = 'zoy';
            // not logged ins

            if ($user_status == 'Active') {
                header("Location: index.php");
                die();
            } else {
                header("Location: login.php?key1=notActive");
                die();
            }
        }
    } else {
        header("Location: login.php?key1=invalidlogin");
        die();
    }
} else {
    header("Location: login.php?key1=invalidlogin");
    die();
}
