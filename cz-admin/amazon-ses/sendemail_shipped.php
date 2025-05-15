<?php
include '../includes/validateSession.php';
// include 'includes/header.php';
include '../includes/dbAccessClass.php';
include '../includes/myFunctions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
echo 'So Far Good';


//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_desc = new czDBAccess();

//Assign Table Name
$obj_class_main->varTableName = 'ecom_order_main_table';
$obj_class_desc->varTableName = 'ecom_order_product_table';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'email-smtp.ap-south-1.amazonaws.com';
$mail->SMTPAuth = true;
$mail->Port = 25;
$mail->Username = 'AKIAYMRCLYHNQRZJHX2Q';
$mail->Password = 'BExA43hwG02yKjiRE7JiP5yBxpBGVkFmI9CvBkTvYpmv';

//get The Process Name -insert or delete or update
$processName = czGet('key1');

if (strlen($processName) > 0) {
    //Notify Based On Insert Status
    if ($processName == "updateSuccess") {
        $whereTid = czGet('updateKey');
    }

    $select_Feilds = "tid,customer_id,order_date,order_status,order_type,order_payment_status,order_details,despatch_details,payment_details,shipping_fee,track_id,mode_of_payment";
    $select_whereClause = "tid = '" . $whereTid . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $customer_id = $row['customer_id'];
        $order_date = $row['order_date'];
        $order_status = $row['order_status'];
        $order_type = $row['order_type'];
        $order_payment_status = $row['order_payment_status'];
        $order_details = $row['order_details'];
        $despatch_details = $row['despatch_details'];
        $payment_details = $row['payment_details'];
        $shipping_fee = $row['shipping_fee'];
        $track_id = $row['track_id'];
        $mode_of_payment = $row['mode_of_payment'];


    }




    $result1 = $obj_class_desc->selectData_customqry("SELECT tid,main_id_fk,product,qty,rate,amount,discount_percent,tax_percentage,total_amount,size,color FROM ecom_order_product_table where main_id_fk = '$whereTid';");

    $body = "<div class='col-md-10'><table class='table table-bordered text-center'><thead><tr>
        <th style='min-width: 50px'>Product</th>
        <th >Size</th>
        <th style='min-width: 70px'>Qty</th>
        <th style='min-width: 100px'>Rate Name</th>
        <th style='min-width: 70px'>Amount</th>
        </thead></tr><tbody><tr>";

        $t_amt = 0;
    while ($row1 = $result1->fetch_assoc()) {

        $product = $row1['product'];
        $qty = $row1['qty'];
        $rate = $row1['rate'];
        $total_amount = $row1['total_amount'];
        $size = $row1['size'];
        $t_amt += $row1['total_amount'];

        $row = "<tr><td>" . $product . "</td><td>" . $size . "</td><td>" . $qty . "</td><td>" . $rate . "</td><td>" . $total_amount . "</td></tr>";

        $body = $body . $row;
    }

    $mail_body .= $body . "</tbody></table></div>";

    $result3 = $obj_class_desc->selectData_customqry("SELECT email,fname FROM customer_table where tid = '$customer_id';");

    while ($row3 = $result3->fetch_assoc()) {

        $email = $row3['email'];
        $fname = $row3['fname'];

    }

    echo 'PHP Mailer Initiated';
    $mail->setFrom('support@cloudzoo.in', 'CloudZoo');
    $mail->addReplyTo('support@cloudzoo.in', 'CloudZoo');
    $mail->addAddress($email, $fname);
    // $mail->addCC($mail_cc, $cc_name);


    $mail_b = "<b>Order ID : </b>" . $whereTid . "<br><b>Order Status : </b>" . $order_status . "<br><b>Despatch details : </b>" . $despatch_details . "<br><b>Track ID : </b>" . $track_id . "<br><b>Shipping Fee : </b>" . $shipping_fee . "<br><br>";


    echo 'Mail Content Set';

    $mail->Subject = "Your Order has been Shipped.";


    $mail->isHTML(true);

    $g_total = $shipping_fee + $t_amt;

    $mailContent = $mail_b . $mail_body . "<br><br><b>Grand Total : </b>" . $g_total;

    $mail->Body = $mailContent;

    echo 'Went Up to Send';

    if ($mail->send()) {
        header("Location: ../order-my.php?key1=" . $processName . "&insertID=" . $whereTid);
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

}