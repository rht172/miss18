<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_hsn_table';

//Init Variables
$tid  =  "";
$hsn  =  "";
$tax_percentage  =  "";
$describition  =  "";
$created_on  =  "";
$created_by  =  "";
$last_updated_on  =  "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,hsn,tax_percentage,describition,created_on,created_by,last_updated_on";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {
        
        $tid = $row['tid'];
        $hsn = $row['hsn'];
        $tax_percentage = $row['tax_percentage'];
        $describition = $row['describition'];
        $created_on = $row['created_on'];
        $created_by = $row['created_by'];
        $last_updated_on = $row['last_updated_on'];
        
        

        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>HSN Master</h1><br>


    <form action="hsn-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>HSN</label>
                <input type="text" class="form-control" <?php echo 'value="' . $hsn . '"'; ?> id="hsn"
                    name="hsn" autofocus required>
            </div>

            <div class="form-group   col-md-3">
                <label>Tax Percentage</label>
                <input type="text" class="form-control" <?php echo 'value="' . $tax_percentage . '"'; ?> id="tax_percentage"
                    name="tax_percentage">
            </div>

            <div class="form-group   col-md-3">
                <label>Other Details</label>
                <input type="text" class="form-control" <?php echo 'value="' . $describition . '"'; ?> id="describition"
                    name="describition">
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
        $("#hsn").autocomplete({
            source: 'auto-complete.php?type=hsn&tbl=ecom_hsn_tabler&tkn=' +
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