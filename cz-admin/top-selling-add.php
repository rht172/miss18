<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'top_selling_table';

//Init Variables
$tid = "";
$sku = "";
$other_details = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";
$last_updated_by = "";

//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,sku,other_details,created_on,created_by,last_updated_on,last_updated_by";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $sku = $row['sku'];
        $other_details = $row['other_details'];
        $created_on = $row['created_on'];
        $created_by = $row['created_by'];
        $last_updated_on = $row['last_updated_on'];
        $last_updated_by = $row['last_updated_by'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>Top Selling</h1><br>


    <form action="top-selling-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>Sku</label>
                <input type="text" class="form-control" <?php echo 'value="' . $sku . '"'; ?> id="sku" name="sku"
                    autofocus required>
            </div>

            <div class="form-group   col-md-3">
                <label>Other Details</label>
                <input type="text" class="form-control" <?php echo 'value="' . $other_details . '"'; ?>
                    id="other_details" name="other_details">
            </div>
        </div>
        <div class="float-right">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button type="submit" class="btn btn-success ">Save</button>
        </div>
    </form>
</div>


<script>
    var tokenid = "<?php echo session_id(); ?>";
    // Auto Complete Code --------------------------------------------------------------
    $(function () {
        $("#sku").autocomplete({
            source: 'auto-complete.php?type=sku&tbl=product_table_ecom&tkn=' +
                tokenid
        });
    });


    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


<?php include 'includes/footer.php'; ?>