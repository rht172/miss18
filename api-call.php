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


$varType = czGet("type");
if (session_id() == czGet("tkn")) {

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

    if ($varType == 'switch_count') {

        $whereValue = czGet('whereValue');
        $obj_class_main = new czDBAccess();
        $inw = $whereValue;
        $query = "SELECT count(inward_no) as num FROM receipe_main_table where inward_no = $inw GROUP BY inward_no";
        $result = $obj_class_main->selectData_customqry($query);
        $returnValue = '';
        while ($row = $result->fetch_assoc()) {
            $returnValue = $row['num'];
        }
        echo $returnValue;
    }

    if ($varType == 'multiply_value') {

        $whereValue = czGet('whereValue');
        $obj_class_main = new czDBAccess();
        $query = "SELECT dyeing_from FROM lab_inward_product_table where main_id_fk = '" . $whereValue . "'";
        $result = $obj_class_main->selectData_customqry($query);
        $returnValue = '';
        while ($row = $result->fetch_assoc()) {
            $returnValue = $row['dyeing_from'];
        }

        if ($returnValue == 'Softflow') {
            $returnValue = 100;
        } elseif ($returnValue == 'Continuous') {
            $returnValue = 1000;
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



    if ($varType == 'fetch_product_for_cart') {

        $sku = $_GET['sku'];
        $rate = $_GET['rate'];
        $size = $_GET['size'];

        $obj_class_main = new czDBAccess();

        $sql = "SELECT * from product_table_ecom where sku = '$sku' and selling_price = '$rate' and size = '$size'";
        $result = $obj_class_main->selectData_customqry($sql);

        // echo $sql;
        // Fetch the options from the query result
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }


        // Return the value as JSON response
        echo json_encode($data);
    }


    if ($varType == 'fetch_product_for_wishlist') {

        $sku = $_GET['sku'];
        $rate = $_GET['rate'];

        $obj_class_main = new czDBAccess();

        $sql = "SELECT * from product_table_ecom where sku = '$sku' and selling_price = '$rate';";
        $result = $obj_class_main->selectData_customqry($sql);

        // echo $sql;
        // Fetch the options from the query result
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }


        // Return the value as JSON response
        echo json_encode($data);
    }


    if ($varType == 'fetch_sku_qty') {

        $sku = czGet('sku');

        $obj_class_main = new czDBAccess();
        $sql = "SELECT sku,stock from product_table where sku = '$sku';";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = "";

        while ($row = $result->fetch_assoc()) {
            $data = $row['stock'];
        }

        // Return the value as JSON response
        echo $data;
    }

    if ($varType == 'fetch_size') {

        $colour = czGet('colour');
        $product_name = czGet('product_name');
        $obj_class_main = new czDBAccess();
        $sql = "SELECT product_table_ecom.size from product_table_ecom left join size_table on product_table_ecom.size = size_table.size where product_table_ecom.colour = '$colour' and product_table_ecom.product_name = '$product_name' order by size_table.sort_order ASC";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }


        // Return the value as JSON response
        echo json_encode($data);
    }



    if ($varType == 'fetch_selling_price') {

        $size = czGet('size');
        $colour = czGet('colour');
        $product_name = czGet('product_name');
        $obj_class_main = new czDBAccess();
        $sql = "SELECT selling_price from product_table_ecom where size = '$size' and colour = '$colour' and product_name = '$product_name'";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = "";

        while ($row = $result->fetch_assoc()) {
            $data = $row['selling_price'];
        }


        // Return the value as JSON response
        echo $data;
    }

    if ($varType == 'fetch_mrp') {

        $size = czGet('size');
        $colour = czGet('colour');
        $product_name = czGet('product_name');
        $obj_class_main = new czDBAccess();
        $sql = "SELECT mrp from product_table_ecom where size = '$size' and colour = '$colour' and product_name = '$product_name'";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = "";

        while ($row = $result->fetch_assoc()) {
            $data = $row['mrp'];
        }

        // Return the value as JSON response
        echo $data;
    }


    if ($varType == 'place_order') {

        //     $g_t_v = 0;
        // $g_d = 0;
        $obj_class_main = new czDBAccess();
        $obj_class_order = new czDBAccess();
        $obj_class_main->varTableName = 'customer_table';
        $obj_class_order->varTableName = 'ecom_order_main_table';
        $customer_id = $_SESSION['tid'];
        $g_t_v = $_GET['g_t_v'];
        $g_d = $_GET['g_d'];
        $promo_code = $_GET['promo_code'];
        $reward_points = $_GET['reward_points'];

        $sql = "SELECT * from customer_table where tid = '$customer_id';";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;


        while ($row = $result->fetch_assoc()) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $address = $row['street'];
            $town_city = $row['city'];
            $state = $row['state'];
            $postal_code = $row['pin_code'];
            $email = $row['email'];
            $phone_number = $row['phone_number'];
            $country = $row['country'];
        }
        $shipping_fee = 0;

        //Assign values to Variable from Post Method

        $insertId = 0;

        $checked_value = $_GET['checked_value'];
        $order_date = date('Y-m-d');
        $order_status = 'Open';
        $order_type = '';
        $order_payment_status = 'Pending';
        $order_details = '';
        $despatch_details = '';
        $payment_details = '';

        $failure = "failure";

        if (strlen($checked_value) > 0) {

            //Get Value to form Update Query
            $updateValueAndFeilds = "fname = '$fname',lname = '$lname',street = '$address',city = '$town_city',state = '$state',pin_code = '$postal_code',phone_number = '$phone_number',country = '$country'";

            $updateWhereClasuse = "email = '$email'";

            //Update Process
            $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

            //Redirect URL after update

            if ($UpdateStatus == "Success") {

                //Get Value to form Insert Query
                $insertFeilds = "customer_id,order_date,order_status,order_type,order_payment_status,order_details,despatch_details,payment_details,shipping_fee,mode_of_payment,grand_total,grand_discount,promo_code";
                $insertValues = "'$customer_id','$order_date','$order_status','$order_type','$order_payment_status','$order_details','$despatch_details','$payment_details','$shipping_fee','$checked_value','$g_t_v','$g_d','$promo_code'";

                //Insert Process
                $insertId = $obj_class_order->insertDataWithReturnValue($insertFeilds, $insertValues);

                if ($insertId > 0) {


                    // $result = $obj_class_order->selectData_customqry("SELECT reward_factor FROM reward_points_factor_table where type = 'Reward';");
                    // while ($row = $result->fetch_assoc()) {
                    //     $reward_factor = $row['reward_factor'];
                    // }

                    // $points = $g_t_v * $reward_factor;

                    // $UpdateStatus = $obj_class_main->selectData_customqry("UPDATE customer_table SET reward_points = reward_points + '$points' WHERE tid = '$customer_id';");

                    // if ($reward_points > 0) {
                    //     $UpdateStatus = $obj_class_main->selectData_customqry("UPDATE customer_table SET reward_points = reward_points - '$reward_points' WHERE tid = '$customer_id';");
                    // }



                    // $mail->setFrom('support@cloudzoo.in', 'CloudZoo');
                    // $mail->addReplyTo('support@cloudzoo.in', 'CloudZoo');
                    // $mail->addAddress($email, $fname);

                    // $mail->Subject = "Your Order Has Been Placed";

                    // $mail->isHTML(true);

                    // $mailContent = "<b>Order ID : </b>" . $insertId . "<br><b>Order Date : </b>" . $order_date . "<br><b>Order Status : </b>" . $order_status;

                    // $mail->Body = $mailContent;

                    // $mail->send();

                    echo $insertId;
                } else {
                    echo $insertId;
                }

                // echo 'Success';
            } else {
                echo $insertId;
            }
        } else {
            echo $failure;
        }
    }


    if ($varType == 'place_order_2') {

        $obj_class_order_desc = new czDBAccess();
        $obj_class_order_desc->varTableName = 'ecom_order_product_table';

        $product = $_GET['sku'];
        $qty = $_GET['qty'];
        $main_id_fk = $_GET['main_id_fk'];
        $subscribe = $_GET['subscribe'];
        $insertId = 0;

        $obj_class_main = new czDBAccess();
        $sql = "SELECT product_table_ecom.tid,product_table_ecom.sku,product_table_ecom.selling_price,product_table_ecom.mrp,product_table_ecom.ext_file_1,product_table_ecom.ext_file_2,product_table_ecom.ext_file_3,product_table_ecom.ext_file_4,product_table.size,product_table.colour from product_table_ecom left join product_table on product_table_ecom.sku = product_table.sku where product_table.sku = '$product'";
        $result = $obj_class_main->selectData_customqry($sql);
        while ($row = $result->fetch_assoc()) {
            $rate = $row['selling_price'];
            $size = $row['size'];
            $color = $row['colour'];
        }

        $amount = (float) $rate * (float) $qty;
        $discount_percent = 0;
        $tax_percentage = 0;
        $total_amount = $amount + (($amount) * ($tax_percentage / 100));
        if ($subscribe > 0) {
            $qty = floatval($qty) * floatval($subscribe);
        }

        //Get Value to form Insert Query
        $insertFeilds = "main_id_fk,product,qty,rate,amount,discount_percent,tax_percentage,total_amount,size,color";
        $insertValues = "'$main_id_fk','$product','$qty','$rate','$amount','$discount_percent','$tax_percentage','$total_amount','$size','$color'";

        //Insert Process
        $insertId = $obj_class_order_desc->insertDataWithReturnValue($insertFeilds, $insertValues);

        echo $insertId;
    }


    if ($varType == 'fetch_pin_code') {

        $pin_code = czGet('pin_code');
        $obj_class_main = new czDBAccess();
        $sql = "SELECT shipping_fee from shipping_fee_table where zip_code = '$pin_code'";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = "";
        $zip = "";
        while ($row = $result->fetch_assoc()) {
            $data = $row['shipping_fee'];
        }

        if (strlen($data) > 0) {
            $zip = $data;
        } else {
            $sql_1 = "SELECT shipping_fee from shipping_fee_table where zip_code = 'all'";
            $result_1 = $obj_class_main->selectData_customqry($sql_1);

            while ($row_1 = $result_1->fetch_assoc()) {
                $zip = $row_1['shipping_fee'];
            }
        }

        // Return the value as JSON response
        echo $zip;
    }

    if ($varType == 'myaccount') {

        $fname = czGet('fname');
        $lname = czGet('lname');
        $door_no = czGet('door_no');
        $street = czGet('street');
        $city = czGet('city');
        $state = czGet('state');
        $pin_code = czGet('pin_code');
        $email = czGet('email');
        $password = czGet('password');
        $phone_number = czGet('phone_number');
        $country = czGet('country');


        $obj_class_main = new czDBAccess();
        $sql = "UPDATE customer_table SET fname = '$fname', lname = '$lname', street = '$street', city = '$city', state = '$state', pin_code = '$pin_code', phone_number = '$phone_number', country = '$country' WHERE email = '$email';";
        $result = $obj_class_main->selectData_customqry($sql);

        $success = "";

        if ($result) {
            echo $success = 1;
        }
    }


    if ($varType == 'success_place_order') {

        $obj_class_main = new czDBAccess();
        $obj_class_order = new czDBAccess();
        $obj_class_main->varTableName = 'customer_table';
        $obj_class_order->varTableName = 'ecom_order_main_table';

        //Assign values to Variable from Post Method

        $insertId = 0;

        $shipping_fee = czGet('shipping_fee');
        $customer_id = $_SESSION['tid'];
        $order_date = date('Y-m-d');
        $order_status = 'Open';
        $order_type = '';
        $order_payment_status = '';
        $order_details = '';
        $despatch_details = '';
        $payment_details = '';
        $email = $_SESSION['email'];

        //Get Value to form Insert Query
        $insertFeilds = "customer_id,order_date,order_status,order_type,order_payment_status,order_details,despatch_details,payment_details,shipping_fee,mode_of_payment";
        $insertValues = "'$customer_id','$order_date','$order_status','$order_type','$order_payment_status','$order_details','$despatch_details','$payment_details','$shipping_fee','Online'";

        //Insert Process
        $insertId = $obj_class_order->insertDataWithReturnValue($insertFeilds, $insertValues);

        if ($insertId > 0) {

            // $mail->setFrom('support@cloudzoo.in', 'CloudZoo');
            // $mail->addReplyTo('support@cloudzoo.in', 'CloudZoo');
            // $mail->addAddress($email, "Customer");

            // $mail->Subject = "Your Order Has Been Placed";

            // $mail->isHTML(true);

            // $mailContent = "<b>Order ID : </b>" . $insertId . "<br><b>Order Date : </b>" . $order_date . "<br><b>Order Status : </b>" . $order_status;

            // $mail->Body = $mailContent;

            // $mail->send();

            echo $insertId;
        } else {
            echo $insertId;
        }
    }



    if ($varType == 'update_profile') {

        $obj_class_main = new czDBAccess();
        $obj_class_order = new czDBAccess();
        $obj_class_main->varTableName = 'customer_table';
        $obj_class_order->varTableName = 'ecom_order_main_table';

        //Assign values to Variable from Post Method
        $fname = czGet('fname');
        $lname = czGet('lname');
        $address = czGet('address');
        $town_city = czGet('town_city');
        $state = czGet('state');
        $postal_code = czGet('postal_code');
        $email = czGet('email');
        $phone_number = czGet('phone_number');
        $country = czGet('country');
        $result = "success";


        //Get Value to form Update Query
        $updateValueAndFeilds = "fname = '$fname',lname = '$lname',street = '$address',city = '$town_city',state = '$state',pin_code = '$postal_code',phone_number = '$phone_number',country = '$country'";

        $updateWhereClasuse = "email = '$email'";

        //Update Process
        $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

        //Redirect URL after update

        if ($UpdateStatus == "Success") {

            echo $result;
        }
    }



    if ($varType == 'variant_select_from_variant') {

        if (isset($_GET['color'])) {
            $color = $_GET['color'];
            $product_name = $_GET['product_name'];

            $obj_class_main = new czDBAccess();
            // Prepare and execute a query using the selected value
            $sql = "SELECT distinct size FROM product_table WHERE product_name = '$product_name' and colour = '$color';";
            // echo $sql;
            $result = $obj_class_main->selectData_customqry($sql);


            // Fetch the options from the query result
            $options = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $options[] = $row['size'];
                }
            }
            // Return the options as JSON response
            echo json_encode($options);
        }
    }



    if ($varType == 'fetch_sku') {

        $size = czGet('size');
        $colour = czGet('colour');
        $product_name = czGet('product_name');
        $obj_class_main = new czDBAccess();
        $sql = "SELECT product_table_ecom.product_display_name,product_table_ecom.sub_category, product_table_ecom.sub_save_1,product_table_ecom.sub_save_2,product_table_ecom.sub_save_3,product_table_ecom.tid,product_table_ecom.sku,product_table_ecom.selling_price,product_table_ecom.mrp,product_table_ecom.ext_file_1,product_table_ecom.ext_file_2,product_table_ecom.ext_file_3,product_table_ecom.ext_file_4 from product_table_ecom left join product_table on product_table_ecom.sku = product_table.sku where product_table.colour = '$size' and product_table_ecom.product_name = '$product_name'";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Return the value as JSON response
        echo json_encode($data);
    }



    if ($varType == 'fetch_sku_color') {

        $sku = czGet('sku');
        $obj_class_main = new czDBAccess();
        $sql = "SELECT * from product_table_ecom where sku = '$sku'";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Return the value as JSON response
        echo json_encode($data);
    }


    if ($varType == 'get_sku_from_order') {

        $id = $_GET['dfid'];

        $obj_class_main = new czDBAccess();
        $obj_class_order = new czDBAccess();
        $obj_class_order->varTableName = 'ecom_order_main_table';
        $customer_id = $_SESSION['tid'];

        $sql = "SELECT product from ecom_order_product_table where main_id_fk = '$id';";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;

        $myArray = [];
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }

        echo json_encode($myArray);
    }


    if ($varType == 'check_promo_code') {

        $promo_code = $_GET['promo_code'];

        $obj_class_main = new czDBAccess();
        $obj_class_promo = new czDBAccess();
        $obj_class_promo->varTableName = 'promo_code_master_table';
        $date = date('Y-m-d');


        $customer_id = $_SESSION['tid'];

        $sql = "SELECT * from customer_table where tid = '$customer_id';";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;


        while ($row = $result->fetch_assoc()) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $address = $row['street'];
            $town_city = $row['city'];
            $state = $row['state'];
            $postal_code = $row['pin_code'];
            $email = $row['email'];
            $phone_number = $row['phone_number'];
            $country = $row['country'];
        }


        $percentage = 0;

        $sql = "SELECT * from `customer_promo_code_table` where promo_code = '$promo_code' and customer_name = '$email';";
        $result_1 = $obj_class_main->selectData_customqry($sql);
        // echo $sql;

        if ($result_1->num_rows == 0) {
            $sql_1 = "SELECT * from promo_code_master_table where promo_code = '$promo_code' and (('$date' between from_date and to_date) or cus_id > '0');";
            $result = $obj_class_main->selectData_customqry($sql_1);
            // echo $sql_1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $percentage = $row['percentage'];
                }

                echo $percentage;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }



    if ($varType == 'get_sku_details') {

        $sku = czGet('sku');

        $obj_class_main = new czDBAccess();
        $sql = "SELECT * from product_table_ecom where sku = '$sku'";
        $result = $obj_class_main->selectData_customqry($sql);
        // echo $sql;
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Return the value as JSON response
        echo json_encode($data);
    }





    if ($varType == 'fetch_order_details') {


        $tid = $_GET['tid'];

        $obj_class_main = new czDBAccess();
        // Prepare and execute a query using the selected value
        $sql = "SELECT ecom_order_main_table.grand_total, ecom_order_product_table.*, product_table_ecom.tid as product_tid, product_table_ecom.ext_file_1, ecom_order_main_table.grand_discount as disc from ecom_order_product_table left join product_table_ecom on ecom_order_product_table.product = product_table_ecom.sku left join ecom_order_main_table on ecom_order_product_table.main_id_fk = ecom_order_main_table.tid where main_id_fk = '$tid' ;";
        // echo $sql;

        $result = $obj_class_main->selectData_customqry($sql);

        // Fetch the options from the query result
        $order = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order[] = $row;
            }
        }
        // Return the order as JSON response
        echo json_encode($order);
    }




    if ($varType == 'fetch_product_card') {


        $pname = $_GET['pname'];
        $variant = $_GET['variant'];

        $obj_class_main = new czDBAccess();
        // Prepare and execute a query using the selected value
        $sql = "SELECT product_table_ecom.flow,product_table.colour,product_table_ecom.selling_price,product_table_ecom.mrp, product_table.size, product_table_ecom.product_card from product_table_ecom left join product_table on product_table_ecom.sku = product_table.sku where product_table.product_name = '$pname' and product_table.colour = '$variant';";
        // echo $sql;

        $result = $obj_class_main->selectData_customqry($sql);

        // Fetch the options from the query result
        $order = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order[] = $row;
            }
        }
        // Return the order as JSON response
        echo json_encode($order);
    }



    if ($varType == 'fetch_product_normal') {


        $pname = $_GET['pname'];
        $variant = $_GET['variant'];

        $obj_class_main = new czDBAccess();
        // Prepare and execute a query using the selected value
        $sql = "SELECT product_table_ecom.flow,product_table.colour,product_table_ecom.selling_price,product_table_ecom.mrp, product_table.size, product_table_ecom.product_card from product_table_ecom left join product_table on product_table_ecom.sku = product_table.sku where product_table.product_name = '$pname' and product_table.colour = '$variant';";
        // echo $sql;

        $result = $obj_class_main->selectData_customqry($sql);

        // Fetch the options from the query result
        $order = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order[] = $row;
            }
        }
        // Return the order as JSON response
        echo json_encode($order);
    }



    if ($varType == 'verify_otp') {

        $email = $_GET['email'];
        $first_name = $_GET['first_name'];



        $otp = random_int(100000, 999999); // Generate a 6-digit OTP
        // Store $otp, user's email, and timestamp in the database

        $current_time = time();
        // $expiryTime = time() + (10 * 60);
        $expiryTime = time() + 200;


        // $otpData = array(
        //     'otp' => $otp,
        //     'email' => $email,
        //     'expiryTime' => $expiryTime
        // );

        // $otpDataJson = json_encode($otpData);

        // echo "<script>
        //         localStorage.setItem('otpData', '$otpDataJson');
        //       </script>";



        $mail->setFrom('support@cloudzoo.in', 'CloudZoo');
        $mail->addReplyTo('support@cloudzoo.in', 'CloudZoo');
        $mail->addAddress($email, $first_name);

        $mail->Subject = "The Verification OTP for CloudZoo";

        $mail->isHTML(true);

        $mailContent = "Your OTP is : <b>" . $otp . "</b>";

        $mail->Body = $mailContent;

        $mail->send();

        echo $otp;
    }





    if ($varType == 'verify_email') {

        $email = $_GET['email'];



        $obj_class_main = new czDBAccess();
        // Prepare and execute a query using the selected value
        $sql = "SELECT email FROM customer_table WHERE email = '$email';";
        // echo $sql;
        $result = $obj_class_main->selectData_customqry($sql);


        // Fetch the options from the query result
        $options = '';
        if ($result->num_rows > 0) {
            $options = "already exists";
        }


        echo $options;
    }




    if ($varType == 'check_stock') {

        $sku = $_GET['sku'];

        $obj_class_main = new czDBAccess();
        // Prepare and execute a query using the selected value
        $sql = "SELECT sum(stock) as stock from product_table_ecom where sku = '$sku';";
        // echo $sql;

        $result = $obj_class_main->selectData_customqry($sql);

        // Fetch the options from the query result
        $order = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order = $row['stock'];
            }
        }
        // Return the order as JSON response
        echo $order;
    }


    if ($varType == 'get_review_details') {

        $seleted_tid = $_GET['tid'];

        $obj_class_review_rate = new czDBAccess();
        // Prepare and execute a query using the selected value
        $sql = "SELECT * FROM review_rating_table where tid = '$seleted_tid';";
        // echo $sql;

        $result = $obj_class_review_rate->selectData_customqry($sql);

        // Fetch the options from the query result
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Return the value as JSON response
        echo $data;
    }
}
