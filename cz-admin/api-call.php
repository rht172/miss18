<?php session_start();
ob_start();
header("Access-Control-Allow-Origin: *");
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

if (session_id() == czGet("tkn")) {
    $varType = czGet("type");
    if ($varType == 'singleData') {
        $tableName = czGet('tbl');
        $feildName = czGet('feildName');
        $WhereFeildName = czGet('whereFeildName');
        $whereValue = czGet('whereValue');
        $obj_class_main = new czDBAccess();
        $query = "select  $feildName from $tableName where $WhereFeildName = '" . $whereValue . "'";
        $result = $obj_class_main->selectData_customqry($query);
        $returnValue = '';
        while ($row = $result->fetch_assoc()) {
            $returnValue = $row[$feildName];

        }
        echo $returnValue;
    }

    if ($varType == 'DeleteData') {
        $tableName = czGet('tbl');
        $WhereFeildName = czGet('whereFeildName');
        $whereValue = czGet('whereValue');
        $obj_class_main = new czDBAccess();
        $obj_class_main->varTableName = $tableName;
        $result = $obj_class_main->deleteData("$WhereFeildName = '" . $whereValue . "'");

        echo $returnValue;
    }

    if ($varType == 'multiData') {

        $tableName = czGet('tbl');
        $feildName = czGet('feildName');
        $WhereFeildName = czGet('whereFeildName');
        $whereValue = czGet('whereValue');
        $obj_class_main = new czDBAccess();

        if ($whereValue == 0) {
            $query = "select  $feildName from $tableName";
        } else {
            $query = "select  $feildName from $tableName where $WhereFeildName = '" . $whereValue . "'";
        }


        $result = $obj_class_main->selectData_customqry($query);
        $returnValue = '';
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            if ($i = 0) {
                $returnValue = $row[$feildName];
            } else {
                $returnValue = $returnValue . "," . $row[$feildName];
            }

            $i = 1;
        }
        echo $returnValue;
    }


    if ($varType == 'update_profile_img') {

        $obj_class_main = new czDBAccess();
        $obj_class_main->varTableName = 'user_table';

        $result_1 = "";

        $result = $obj_class_main->selectData_customqry("SELECT tid,email_address,account_name,user_type,m_access,email_account,staff_name,ext_file from user_table;");
        while ($row = $result->fetch_assoc()) {

            $tid = $row['tid'];
            $email_address = $row['email_address'];
            $account_name = $row['account_name'];
            $user_type = $row['user_type'];
            $m_access = $row['m_access'];
            $email_account = $row['email_account'];
            $staff_name = $row['staff_name'];
            $ext_file = $row['ext_file'];


            if (strlen($ext_file) == 0) {

                // Extract the first letter from the user's name and convert to uppercase
                $firstLetter = strtoupper(substr($email_address, 0, 1));

                // Create a blank image with dimensions 100x100
                $imageWidth = 100;
                $imageHeight = 100;
                $image = imagecreate($imageWidth, $imageHeight);

                // Set the background color (here, we use a White color)
                $bgColor = imagecolorallocate($image, 255, 255, 255);

                // Set the text color (Light Blue)
                $textColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));

                // Set the font (you can adjust the path and size to your preference)
                $font = 'assets\fonts\segoe\Segoe UI Bold.ttf'; // Replace with your font path
                $fontSize = 60;

                // Calculate the position to center the text in the image
                // $textWidth = imagefontwidth($fontSize) * strlen($firstLetter);
                $textWidth = imagettfbbox($fontSize, 0, $font, $firstLetter)[4] - imagettfbbox($fontSize, 0, $font, $firstLetter)[0];
                $textX = ($imageWidth - $textWidth) / 2;
                $textY = ($imageHeight - $fontSize) / 2;

                // Add the first letter to the image
                imagettftext($image, $fontSize, 0, $textX, $textY + $fontSize, $textColor, $font, $firstLetter);

                $filePath = 'attachments/profile/' . 'tid-' . $tid . '.jpg';
                imagejpeg($image, $filePath);

                // Your SQL query
                $sql = "UPDATE user_table SET ext_file = 'jpg' WHERE tid = '$tid';";

                // Execute the SQL query
                $result_1 = $obj_class_main->selectData_customqry($sql);

            }

        }

        // Check if the query was successful
        if ($result_1) {
            $success = "true";
        } else {
            $success = "false";
        }

        // Return the value as JSON response
        echo $success;


    }

    if ($varType == 'delete_image_fun') {


        $ext = $_GET['ext'];
        $field = $_GET['field'];
        $update_id = $_GET['update_id'];

        $obj_class_main = new czDBAccess();

        $result = $obj_class_main->selectData_customqry("UPDATE product_table_ecom set $field = '' where tid = '$update_id';");

        if ($result) {

            unlink("attachments/product/product_thumb/{$update_id}.{$ext}");

        }

    }

}
?>