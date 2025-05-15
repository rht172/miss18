<?php include 'includes/validateSession.php';
include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'shipping_fee_table';

//Init Variables
$tid = "";
$zip_code = "";
$shipping_fee = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";
$last_created_by = "";


//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,zip_code,shipping_fee,created_on,created_by,last_updated_on,last_created_by";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $zip_code = $row['zip_code'];
        $shipping_fee = $row['shipping_fee'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}


?>


<div class="container-fluid">
    <h1>Shipping Fee</h1><br>


    <form action="shipping-fee-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>Zip Code</label>
                <input type="text" class="form-control" <?php echo 'value="' . $zip_code . '"'; ?> id="zip_code"
                    name="zip_code" autofocus required>
            </div>

            <!-- <div class="form-group col-md-6">
              <label>Zip Code</label>
              <textarea class="form-control" name="zip_code" id="zip_code" cols="30"
                rows="5"> <?php echo $zip_code; ?> </textarea>
            </div> -->

            <div class="form-group   col-md-3">
                <label>Shipping Fee</label>
                <input type="text" class="form-control" <?php echo 'value="' . $shipping_fee . '"'; ?> id="shipping_fee"
                    name="shipping_fee">
            </div>
        </div>
        <div class="float-right">
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