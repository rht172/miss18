<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_uom_master_table';


$uom = "";




//get The Process Name -insert or delete or update
$processName = czGet('key1');

//Message For Display

if (strlen($processName) > 0) {
    //Notify Based On Insert Status
    if ($processName == "insertSuccess") {
        // If Inserted Successfull
        echo '<div class="alert alert-success" id="success-alert">
                    <strong>Cool!</strong>  Data Inserted Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>';
    } elseif ($processName == "insertFailed") {
        // If Insert Failed
        echo '<div class="alert alert-danger" id="success-alert">
    <strong>Oops!</strong> Something Went Wrong, Data Not Inserted Properly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }



    //Notify Based On Update Status
    if ($processName == "updateSuccess") {
        // If Update Successfull
        echo '<div class="alert alert-success" id="success-alert">
                  <strong>Cool!</strong>  Data Update Successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
              </div>';
    } elseif ($processName == "updateFailed") {
        // If Update Failed
        echo '<div class="alert alert-danger" id="success-alert">
  <strong>Oops!</strong> Something Went Wrong, Data Not Update Properly.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

}




?>


<div class="container-fluid">
    <div class="row d-flex justify-content-between">
        <div class="div">
            <h1 class="head-my d-inline ml-3">UOM Master</h1>
        </div>
        <!-- Add and Delete Buttons -->
        <div>
            <a class='btn btn-light btn-sm m-1 float-right' data-toggle='modal' data-target='#exampleModal'><img
                    src="assets/icons/CommonDelete.png" alt=""><br><small> Delete</small></a>
            <a href="uom-add.php" class="btn btn-light btn-sm m-1 float-right"><img
                    src="assets/icons/Theam1New.png" alt=""><br> <small>Add New</small></a>
        </div>
    </div>

    <!-- <div class="form-group col-md-12 p-0"> -->


        <div class="form-row">

            <div class="form-group   col-md-3">
                <label>UOM</label>
                <input type="text" class="form-control" id="uom" name="uom">
            </div>



            <div class="form-group ml-2">
                <label>&nbsp;&nbsp;&nbsp;</label><br />
                <button id="filterform" class="btn btn-light"><img src="assets/icons/search.png" alt=""></button>
            </div>

        </div>


    <!-- </div> -->


</div>
<div class="col-md-12">
    <div id="filterTableBody">

    </div>
</div>

<!-- Modal Yes No Before Delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Want to Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure that you want to delete the Selected?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a id="modelYesButton" type="button" class="btn btn-primary"
                    onclick="getCheckedValuesForDelete('myTable','#exampleModal','category-ctrl.php?key1=delete','#filterTableBody')">yes</a>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    var tokenid = "<?php echo session_id(); ?>";


    function loadTableData(pageNo) {

        // Make Sure to remove the Last Feild (,) if you are Pasting from The Excel Sheet
        var formData = {
            uom: $('#uom').val()
        }; //Array 

        // Table Body ID, URL, 
        loadTableDataFromAjax("#filterTableBody", "uom-ctrl.php?key1=filter&pageNo=" + pageNo, formData);

    }


    $('#filterform').click(function () {
        loadTableData(1);

    });


    // Auto Complete Code --------------------------------------------------------------


    //City Auto Complete
    $(function () {
        $("#uom").autocomplete({
            source: 'auto-complete.php?type=uom&tbl=ecom_uom_master_table&tkn=' +
                tokenid
        });
    });

//Product name Auto Complete

// $(function() {
//   $("#city").autocomplete({
//     source: 'auto-complete.php?type=b_city&tbl=company_table&tkn=' + tokenid
//   });
// });
</script>

<?php include 'includes/footer.php'; ?>