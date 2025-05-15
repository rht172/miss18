<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_product = new czDBAccess();

//Assign Table Name
$obj_class_main->varTableName = 'size_table';
$obj_class_product->varTableName = 'product_table_ecom';


//Init Variables
$tid = "";
$size = "";
$product_name = "";
$sort_order = "";
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
    $select_Feilds = "tid,product_name,size,sort_order,created_on,created_by,last_updated_on,last_created_by";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $size = $row['size'];
        $sort_order = $row['sort_order'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}


?>


<div class="container-fluid">
    <h1>Size Master</h1><br>


    <form action="size-master-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>Product</label>
                <input type="text" class="form-control" <?php echo 'value="' . $product_name . '"'; ?> id="product_name"
                    name="product_name" autofocus required>
            </div>

            <div class="form-group   col-md-3">
                <label>Size</label>
                <input type="text" class="form-control" <?php echo 'value="' . $size . '"'; ?> id="size" name="size"
                    autofocus required>
            </div>

            <div class="form-group   col-md-3">
                <label>Size Order</label>
                <input type="text" class="form-control" <?php echo 'value="' . $sort_order . '"'; ?> id="sort_order"
                    name="sort_order">
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
    $(function () {
        $("#product_name").autocomplete({
            source: 'auto-complete.php?type=sku&tbl=product_table_ecom&tkn=' +tokenid});
    });



    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


<?php include 'includes/footer.php'; ?>