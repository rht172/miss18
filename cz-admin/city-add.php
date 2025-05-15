<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'city_state_table';

//Init Variables
$tid = "";
$state = "";
$city = "";
$unavailable_pincode = "";
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
    $select_Feilds = "tid,state,city,unavailable_pincode,created_on,created_by,last_updated_on,last_updated_by";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $state = $row['state'];
        $city = $row['city'];
        $unavailable_pincode = $row['unavailable_pincode'];
        $created_on = $row['created_on'];
        $created_by = $row['created_by'];
        $last_updated_on = $row['last_updated_on'];
        $last_updated_by = $row['last_updated_by'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>City Entry</h1><br>


    <form action="city-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>City</label>
                <input type="text" class="form-control" <?php echo 'value="' . $city . '"'; ?> id="city" name="city"
                    autofocus required>
            </div>

            <div class="form-group   col-md-3">
                <label>State</label>
                <input type="text" class="form-control" <?php echo 'value="' . $state . '"'; ?> id="state" name="state">
            </div>

            <div class="form-group   col-md-3">
                <label>Unavailable Pincode</label>
                <input type="text" class="form-control" <?php echo 'value="' . $unavailable_pincode . '"'; ?>
                    id="unavailable_pincode" name="unavailable_pincode">
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
        $("#city").autocomplete({
            source: 'auto-complete.php?type=city&tbl=city_state_table&tkn=' +
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