<?php include 'includes/validateSession.php'; 
include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_uom_master_table';

//Init Variables
$uom = "";
$notes = "";





//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "uom,notes";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
    //$result = $obj_class_main->selectData_customqry("select sku,product_name,category,sub_category,super_sub_category,brand_name,selling_price from product_table where tid = '" . czGet('updateKey') . "' ");
    while ($row = $result->fetch_assoc()) {

        $uom = $row['uom'];
        $notes = $row['notes'];



        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>UOM Master</h1><br>


    <form action="uom-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>UOM</label>
                <input type="text" class="form-control" <?php echo 'value="' . $uom . '"'; ?> id="uom" name="uom" autofocus required>
            </div>

            <div class="form-group   col-md-3">
                <label>Notes</label>
                <input type="text" class="form-control" <?php echo 'value="' . $notes . '"'; ?> id="notes"
                    name="notes">
            </div>

            <div class="form-group   col-md-1">
                <label>&nbsp;&nbsp;&nbsp;</label><br />
                <button type="submit" class="btn btn-success ">Save</button>
            </div>
        </div>
    </form>
</div>


<script>
    var tokenid = "<?php echo session_id(); ?>";



    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });





</script>


<?php include 'includes/footer.php'; ?>
