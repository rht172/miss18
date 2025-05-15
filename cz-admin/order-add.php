<?php include 'includes/validateSession.php';
include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_customer = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_order_main_table';
$obj_class_customer->varTableName = 'customer_table';

//Init Variables
$tid = "";
$order_status = "";
$despatch_details = "";
$track_id = "";
$customer_id = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";
$last_created_by = "";

$fname = "";
$lname = "";
$street = "";
$city = "";
$state = "";
$country = "";
$pin_code = "";

$tot = 0;


//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,order_status,despatch_details,customer_id,track_id,mode_of_payment";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $order_status = $row['order_status'];
        $despatch_details = $row['despatch_details'];
        $customer_id = $row['customer_id'];
        $track_id = $row['track_id'];
        $mode_of_payment = $row['mode_of_payment'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}
$result_1 = $obj_class_customer->selectData_customqry("SELECT * from customer_table where tid = '$customer_id';");

while ($row_1 = $result_1->fetch_assoc()) {

    $fname = $row_1['fname'];
    $lname = $row_1['lname'];
    $street = $row_1['street'];
    $city = $row_1['city'];
    $state = $row_1['state'];
    $pin_code = $row_1['pin_code'];
    $country = $row_1['country'];

}


?>


<div class="container-fluid">
    <!-- <h1>Order</h1><br> -->
    <?php
    if (czGet('key1') == "update") {
        ?>
        <h1 class="head-my">Order # <?php echo $tid ?>
        </h1>
        <?php
    } else {
        ?>
        <h1 class="head-my">Order</h1>
        <?php
    }
    ?>


    <p><b>Customer Name </b>&nbsp; :
        <?php echo $fname ?>
        <?php echo $lname ?>
    </p>
    <div class="row">
        <div class="col-md-1">
            <p><b>Street <br>
                    City <br>
                    State <br>
                    Pin Code <br>
                    Country </b>
            </p>
        </div>
        <div class="col-md-6">
            <p>
                :
                <?php echo $street ?><br>
                :
                <?php echo $city ?><br>
                :
                <?php echo $state ?><br>
                :
                <?php echo $pin_code ?><br>
                :
                <?php echo $country ?>

            </p>
        </div>
    </div>

    <p><b>Mode of Payment </b>&nbsp; :
        <?php echo $mode_of_payment ?>
    </p>
   


    <div class="table-responsive-md table-responsive-xs" id="tab_filter">
        <table class="table_filter_reports table table-striped p-0 table-bordered" id="reportTable">
            <thead class="thead_filter_reports">
                <tr>
                    <th class="th_filter_reports">Product Name</th>
                    <th class="th_filter_reports">Size</th>
                    <th class="th_filter_reports">Qty</th>
                    <th class="th_filter_reports">Rate</th>

                </tr>
            </thead>
            <tbody id="myTable" class="tbody_filter_reports">

                <?php
                //ini value for Select Query
                
                $result = $obj_class_main->selectData_customqry("SELECT ecom_order_main_table.* , ecom_order_product_table.* from ecom_order_main_table left join ecom_order_product_table on ecom_order_product_table.main_id_fk = ecom_order_main_table.tid where ecom_order_product_table.main_id_fk = '$tid'");



                // $obj_class_main->errorLog($temp_whereClause, "posted_date Verify TEst");
                
                $qty = 0;
                $rate = 0;
                $amount = 0;
                $shipping_fee = 0;
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
                        <td class='td_filter_reports text-right' data-label="Size : ">
                            <?php echo $row['size'] ?>
                        </td>
                        <td class='td_filter_reports text-right' data-label="Qty : ">
                            <?php echo $row['qty'] ?>
                        </td>
                        <td class='td_filter_reports text-right' data-label="Rate : ">
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
                    <td class='td_filter_reports' data-label="Qty : " style="text-align : right"><b>
                            <?php echo number_format($qty, 3); ?>
                        </b>
                    </td>
                    <td class='td_filter_reports' data-label="Bill Value : " style="text-align : right"> <b>
                            <?php echo number_format($rate, 2); ?>
                        </b>
                    </td>
                    <!-- <td class='td_filter_reports' data-label="Total Tax : " style="text-align : right"><b>
                            <?php echo number_format($amount, 2); ?>
                        </b>
                    </td> -->
                </tr>
            </tfoot>
        </table>
    </div>
    <?php


    ?>

    <p><b>Shipping Fee : </b><?php echo $shipping_fee ?></p>
    <?php $tot = $rate + $shipping_fee; ?>
    <h4> Total : <span style = "color : green;"><?php echo $tot ?></span></h4>

    <form action="order-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">

            <div class="form-group   col-md-3">
                <label>Order Status</label>
                <select class="form-control" id="order_status" name="order_status" value = "<?php echo $order_status ?>">
                <!-- <option value=""></option> -->
                    <option value="<?php echo $order_status ?>"><?php echo $order_status ?></option>
                    <option value="Open">Open</option>
                    <option value="Preparing To Ship">Preparing To Ship</option>
                    <option value="Shipped">Shipped</option>
                    <!-- <option value="Delivered">Delivered</option> -->
                </select>
            </div>

            <!-- <div class="form-group   col-md-3">
                <label>Order Status</label>
                <input type="text" class="form-control" <?php echo 'value="' . $order_status . '"'; ?> id="order_status"
                    name="order_status" autofocus required>
            </div> -->

            <div class="form-group   col-md-3">
                <label>Despatch Details</label>
                <input type="text" class="form-control" <?php echo 'value="' . $despatch_details . '"'; ?>
                    id="despatch_details" name="despatch_details">
            </div>

            <div class="form-group   col-md-3">
                <label>Track ID</label>
                <input type="text" class="form-control" <?php echo 'value="' . $track_id . '"'; ?>
                    id="track_id" name="track_id">
            </div>
        </div>
        <div class="float-right mb-3">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button type="submit" class="btn btn-success ">Save</button>
        </div>
    </form>
</div>


<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


<?php include 'includes/footer.php'; ?>