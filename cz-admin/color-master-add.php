<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'color_master_table';

//Init Variables
$tid = "";
$color_name = "";
$color_code = "";
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
    $select_Feilds = "tid,color_name,color_code,created_on,created_by,last_updated_on,last_created_by";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $color_name = $row['color_name'];
        $color_code = $row['color_code'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>Color Master</h1><br>


    <form action="color-master-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>Color Name</label>
                <input type="text" class="form-control" <?php echo 'value="' . $color_name . '"'; ?> id="color_name"
                    name="color_name" autofocus required>
            </div>

            <div class="form-group   col-md-1">
                <label>Color Code</label>
                <input type="color" class="form-control" <?php echo 'value="' . $color_code . '"'; ?> id="color_code"
                    name="color_code">
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