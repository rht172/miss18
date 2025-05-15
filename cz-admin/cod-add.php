<?php include 'includes/validateSession.php';
include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'cod_table';

//Init Variables
$tid = "";
$status = "";
$status_name = "";


//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,status";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $status = $row['status'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}


?>


<div class="container-fluid">
    <h1>Cash On Delivery</h1>


    <form action="cod-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
         
        <div class="form-group   col-md-3">
                <label>Cod</label>
                <select class="form-control" id="status" name="status">
                    <option value="<?php echo $status ?>"><?php echo $status ?></option>
                    <option value="Enable">Enable</option>
                    <option value="Disable">Disable</option>
                </select>
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