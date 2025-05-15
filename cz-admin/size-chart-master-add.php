<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_size_chart_master';

//Init Variables
$tid = "";
$size_chart_name = "";
$describition = "";
$attach_file = "";
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
    
    $select_Feilds = "tid,size_chart_name,describition,attach_file,created_on,created_by,last_updated_on,last_updated_by";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $size_chart_name = $row['size_chart_name'];
        $describition = $row['describition'];
        $created_on = $row['created_on'];
        $created_by = $row['created_by'];
        $last_updated_on = $row['last_updated_on'];
        $last_updated_by = $row['last_updated_by'];
        $attach_file = $row['attach_file'];


        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>Size Chart Master</h1><br>


    <form action="size-chart-master-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>Size Chart Name</label>
                <input type="text" class="form-control" <?php echo 'value="' . $size_chart_name . '"'; ?> id="size_chart_name" name="size_chart_name"    autofocus required>
            </div>

            <div class="form-group   col-md-3">
                <label>Notes</label>
                <input type="text" class="form-control" <?php echo 'value="' . $describition . '"'; ?> id="describition"
                    name="describition">
            </div>
            <div class="col-md-3">
                <p class="mb-2">Attachments</p>
                <div class="form-group col-md-12">
                    <input type="file" class="custom-file-input" id="attach_file" name="attach_file"
                        accept=".png, .jpg, .jpeg">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

            <?php

            if (strlen($attach_file) > 0) {
                ?>
                <div class="col-md-6">
                    <img src="attachments/size-chart/<?php echo 'tid-' . $tid ?>.<?php echo $attach_file ?>" alt="img" class="img-thumbnail">
                </div>
                <?php
            }
            ?>


        </div>
        <div class="float-right mb-5">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button type="submit" class="btn btn-success ">Save</button>
        </div>
    </form>
</div>


<script>
    var tokenid = "<?php echo session_id(); ?>";
    // Auto Complete Code --------------------------------------------------------------
    $(function () {
        $("#size_chart_name").autocomplete({
            source: 'auto-complete.php?type=size_chart_name&tbl=ecom_size_chart_master&tkn=' +
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