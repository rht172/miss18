<!DOCTYPE html>
<html lang="en">

<?php
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_customer = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_order_main_table';
$obj_class_customer->varTableName = 'customer_table';

$street = "";
$tot = 0;

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">
    <title>CloudZoo</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


</head>

<body class="theme-color-1 bg-light">


    <!-- invoice start -->
    <section class="theme-invoice-4 section-b-space">
        <!-- <a class="btn btn-success btn-sm m-1 float-right" id="pdf_download_Btn"><br><small>Download</small></a> -->
        <div class="container">

            <div class="row" id="invoice">
                <div class="col-xl-9 m-auto">
                    <div class="invoice-wrapper">
                        <div class="invoice-header">
                            <img src="../assets/images/invoice/bg3.jpg" class="background-invoice">
                            <img src="../assets/images/icon/logo.jpg" class="img-fluid" alt="logo">
                        </div>

                        <?php

                        $result_1 = $obj_class_main->selectData_customqry("SELECT * from ecom_order_main_table where tid = '" . czGet('updateKey') . "';");
                        while ($row_1 = $result_1->fetch_assoc()) {

                            $customer_id = $row_1['customer_id'];
                            $order_date = $row_1['order_date'];
                            $order_tid = $row_1['tid'];
                            $shipping_fee = $row_1['shipping_fee'];
                        }

                        $result = $obj_class_customer->selectData_customqry("SELECT * from customer_table where tid = '$customer_id';");
                        while ($row = $result->fetch_assoc()) {

                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $street = $row['street'];
                            $city = $row['city'];
                            $state = $row['state'];
                            $pin_code = $row['pin_code'];
                            $country = $row['country'];
                            $email = $row['email'];
                        }

                        ?>


                        <div class="invoice-body">
                            <div class="top-sec">
                                <!-- <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-xxl-7 col-md-6">
                                        <div class="address-detail">
                                            <div class="mt-2">
                                                <h4 class="mb-2">
                                                    <?php echo $street ?>
                                                </h4>
                                                <h4 class="mb-2">
                                                    <?php echo $city ?>
                                                </h4>
                                                <h4 class="mb-0">
                                                    <?php echo $state ?> -
                                                    <?php echo $pin_code ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-5 col-md-6">
                                        <ul class="date-detail">
                                            <li><span>issue date :</span>
                                                <h4>
                                                    <?php echo $order_date ?>
                                                </h4>
                                            </li>
                                            <li><span>invoice no :</span>
                                                <h4>
                                                    <?php echo $order_tid ?>
                                                </h4>
                                            </li>
                                            <li><span>email :</span>
                                                <h4>
                                                    <?php echo $email ?>
                                                </h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="title-sec">
                                <h2 class="title">invoice</h2>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="#" class="btn black-btn btn-solid" onclick="window.print();">export as
                                            PDF</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="#" class="btn btn-solid" onclick="window.print();">print</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-sec">
                                <div class="table-responsive-md">
                                    <table class="table table-borderless table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Prodect Name</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable" class="tbody_filter_reports">

                                            <?php
                                            //ini value for Select Query
                                            
                                            $result = $obj_class_main->selectData_customqry("SELECT ecom_order_main_table.* , ecom_order_product_table.* from ecom_order_main_table left join ecom_order_product_table on ecom_order_product_table.main_id_fk = ecom_order_main_table.tid where ecom_order_product_table.main_id_fk = '$order_tid'");



                                            // $obj_class_main->errorLog($temp_whereClause, "posted_date Verify TEst");
                                            
                                            $qty = 0;
                                            $rate = 0;
                                            $amount = 0;
                                            //Loop Through Select Result
                                            while ($row = $result->fetch_assoc()) {
                                                $shipping_fee = $row['shipping_fee'];
                                                $qty += $row['qty'];
                                                $rate += $row['rate'];
                                                $amount += $row['amount'];
                                                ?>
                                                <tr class='tr_filter_reports'>
                                                    <td class='td_filter_reports' data-label="Product_Name : ">
                                                        <?php echo $row['product'] ?>
                                                    </td>
                                                    <td class='td_filter_reports' data-label="Size : ">
                                                        <?php echo $row['size'] ?>
                                                    </td>
                                                    <td class='td_filter_reports' data-label="Qty : ">
                                                        <?php echo round($row['qty']) ?>
                                                    </td>
                                                    <td class='td_filter_reports' data-label="Rate : ">
                                                        <?php echo $row['rate'] ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot class="tfoot_filter_reports">
                                            <tr class='tr_filter_reports table-success'>
                                                <td class='reportstotal'>
                                                    <center>
                                                        <b>
                                                            TOTAL
                                                        </b>
                                                    </center>
                                                </td>
                                                <td></td>
                                                <td class='td_filter_reports' data-label="Qty : "><b>
                                                        <?php echo number_format($qty, 0); ?>
                                                    </b>
                                                </td>
                                                <td class='td_filter_reports' data-label="Bill Value : "> <b>
                                                        <?php echo number_format($rate, 2); ?>
                                                    </b>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <h4>
                                            Shipping Fee : <b> ₹
                                                <?php echo $shipping_fee ?>
                                            </b>
                                        </h4>
                                    </div>
                                    <?php
                                    $tot = $shipping_fee + $rate;
                                    ?>
                                    <div class="col-md-6 mt-4">
                                        <div class="text-end">
                                            <h4>
                                                Grand Total : <b style="color : green;"> ₹
                                                    <?php echo $tot ?>
                                                </b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="invoice-footer">
                            <img src="../assets/images/invoice/shape.png" class="img-fluid design-shape" alt="">
                            <ul>
                                <li>
                                    <i class="fa fa-map" aria-hidden="true"></i>
                                    <div>
                                        <h4>Miss 18</h4>
                                        <h4>USA, 362351</h4>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div>
                                        <h4>+1-202-555-0144</h4>
                                        <h4>+1-202-555-0117</h4>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <div>
                                        <h4>support@multikart.com</h4>
                                        <h4>miss18.com</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button id="download-pdf" class="btn black-btn btn-solid">Download PDF</button> -->


        </div>
    </section>
    <!-- invoice end -->


    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>




    <script>
        // document.getElementById('download-pdf').addEventListener('click', function () {
        //     const element = document.querySelector('.invoice-wrapper'); // Choose the parent element containing the content you want to convert to PDF
        //     const opt = {
        //         margin: 10,
        //         filename: 'invoice.pdf',
        //         image: { type: 'jpeg', quality: 0.98 },
        //         html2canvas: { scale: 2 },
        //         jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        //     };

        //     html2pdf().from(element).set(opt).outputPdf().then(function (pdf) {
        //         const blob = new Blob([pdf], { type: 'application/pdf' });
        //         const url = URL.createObjectURL(blob);
        //         const a = document.createElement('a');
        //         a.href = url;
        //         a.download = 'invoice.pdf';
        //         a.click();
        //         URL.revokeObjectURL(url);
        //     });
        // });


        // // Download Pivot table in Pdf
        // document.getElementById('pdf_download_Btn').addEventListener('click', function () {
        //     // Select the element containing the pivot table
        //     var pivotTable = document.getElementById('invoice');

        //     // Set the options for PDF generation
        //     var options = {
        //         filename: 'invoice.pdf',
        //         margin: 2,
        //         image: { type: 'jpeg', quality: 0.98 },
        //         html2canvas: { scale: 2, logging: true },
        //         jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        //     };

        //     // Generate PDF from the pivot table element
        //     html2pdf().set(options).from(pivotTable).save();
        // });
    </script>




</body>

</html>