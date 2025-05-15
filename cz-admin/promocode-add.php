<?php
include 'includes/validateSession.php';
include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();


//Assign Table Name
$obj_class_main->varTableName = 'promo_code_master_table';

//Main Table
$tid  =  "";
$promo_code  =  "";
$msg  =  "";
$create_date  =  "";
$from_date  =  date('Y-m-d');
$to_date  =  date('Y-m-d');
$created_by  =  "";
$created_on  =  "";
$percentage = "";


//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}



if (czGet('key1') == "update") {
    $select_Feilds = "tid,promo_code,percentage,from_date,to_date,created_by,created_on";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

    while ($row = $result->fetch_assoc()) {
        $tid = $row['tid'];
        $promo_code = $row['promo_code'];
        $from_date = $row['from_date'];
        $to_date = $row['to_date'];
        $created_by = $row['created_by'];
        $created_on = $row['created_on'];
        $percentage = $row['percentage'];

        $processName = 'update&pk=' . czGet('updateKey');
    }
}


// Delete Process
if (czGet('key1') == "delete") {

    //Delete Query call
    $temp_whereClause = "tid = '" . czGet('deleteKey') . "'";
    $curdStatus = $obj_class_main->deleteData($temp_whereClause);

    //Redirect URL after Delete
    if ($curdStatus == "Success") {
        // header("Location: tna-add.php?key1=deleteSuccess");
        echo '<div class="alert alert-success" id="success-alert">
                    <strong>Cool!</strong>  Data Delete Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>';
        exit();
    } else {
        // header("Location: tna-add.php?key1=deleteFailed");
        echo '<div class="alert alert-danger" id="success-alert">
    <strong>Oops!</strong> Something Went Wrong, Data Not Delete Properly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
        exit();
    }
}


?>
<script>
    // Initilize the Session Token ID 
    var tokenid = "<?php echo session_id(); ?>";

    // Only For Auto Complete Data Call
    function autoCompleteProduct(varID) {
        $("#" + varID).autocomplete({
            source: 'auto-complete.php?type=sku&tbl=product_table&tkn=' +
                tokenid
        });
    }
</script>

<div class="container-fluid">

    <div class="row d-flex justify-content-between">
        <div class="div">
            <h1 class="head-my d-inline ml-3">Promo Code</h1>
        </div>
        <div>

        </div>
    </div>


    <form action="promocode-ctrl.php?key1=<?php echo $processName; ?>" id="myForm" method="post" enctype="multipart/form-data">
        <div class="form-row">

            <div class="form-group   col-md-3">
                <label>Promo Code</label>
                <input type="text" class="form-control" <?php echo 'value="' . $promo_code . '"'; ?> id="promo_code" name="promo_code" required>
            </div>

            <div class="form-group   col-md-3">
                <label>Percentage</label>
                <input type="text" class="form-control" <?php echo 'value="' . $percentage . '"'; ?> id="percentage" name="percentage" required>
            </div>

            <div class="form-group   col-md-2">
                <label>From Date</label>
                <input type="date" class="form-control" <?php echo 'value="' . $from_date . '"'; ?> id="from_date" name="from_date" required>
            </div>

            <div class="form-group   col-md-2">
                <label>To Date</label>
                <input type="date" class="form-control" <?php echo 'value="' . $to_date . '"'; ?> id="to_date" name="to_date" required>
            </div>

        </div>

        <div class="float-right">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button type="submit" class="btn btn-success mb-5" id="submitButton">Save</button>
        </div>
    </form>
</div>




<script>
    var tokenid = "<?php echo session_id(); ?>";



    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent the default behavior
            // Your custom code here
        }
    });



    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


    // Form Resubmmison
    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
        location.reload();
    }



    $("body").on("click", "#generate-product", function() {
        loadTableData(1);
    });


    var myParamKey1 = getUrlParameter('key2');
    if (myParamKey1 == "insertSuccess") {
        cznotifytimeout("Cool!", "Data Inserted Successfully.", "success", 2000);
    } else if (myParamKey1 == "insertFailed") {
        cznotifytimeout("Cool!", "Something Went Wrong, Data Not Inserted Properly.", "warning", 2000);
    }


    $(document).ready(function() {
        $('title').html('Promo Code');
    });
</script>


<?php include 'includes/footer.php'; ?>