<?php
include 'includes/validateSession.php';
include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_desc = new czDBAccess();

//Main Table
$tid = "";


//get The Process Name -insert or delete or update
$processName = czGet('key1');

//Message For Display

if (strlen($processName) > 0) {
    //Notify Based On Insert Status
    if ($processName == "insertSuccess") {
        // If Inserted Successfull
        echo '<div class="alert alert-success" id="success-alert">
                    <strong>Cool!</strong> ' . ' #' . czGet('insertID') . ' Data Inserted Successfully.
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
                  <strong>Cool!</strong> ' . ' #' . czGet('updateKey') . ' Data Updated Successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    } elseif ($processName == "updateFailed") {
        // If Update Failed
        echo '<div class="alert alert-danger" id="success-alert">
  <strong>Oops!</strong> Something Went Wrong, Data Not Updated Properly.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    }


    if ($processName == "exists") {

        echo '<div class="alert alert-warning" id="success-alert">
        <strong>Oops!</strong> Entered Barcode ' . czGet('exist_barcode') . 'already exists!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}


?>

<div class="container-fluid">

    <div class="row d-flex justify-content-between">
        <div>
            <h1 class="head-my d-inline pl-2">Promo Code</h1>
        </div>
        <div>
            <!-- clear filters button and search button  -->
            <a id="filterform" class="btn btn-light btn-sm "><img src="assets/icons/search.png" alt=""><br><small>Search</small></a>

            <!-- Add and Delete Buttons -->
            <a href="promocode-add.php" class="btn btn-light btn-sm"><img src="assets/icons/Theam1New.png" alt=""><br><small>Add New</small></a>
            <?php
            if ($_SESSION['user_type'] != "User") {
            ?>
                <a class='btn btn-light btn-sm mr-1' data-toggle='modal' data-target='#exampleModal'><img src="assets/icons/CommonDelete.png" alt=""><br><small>Delete</small></a>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="form-row">
        <!-- created on textbox to filter / function to hide created_on datepicker -->
        <div class="form-group   col-md-2">
            <!-- <input type="checkbox" id="created" onclick="hideDatePicker('created','created_on_div')"> -->
            <label for="created"> Created On</label><br>
            <div id="">
                <div id="created_on" style="background: #fff; cursor: pointer; padding: 8px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>
        </div>
    </div>


    <div id="filterTableBody">

    </div>
</div>






<!-- Modal Yes No Before Delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a id="modelYesButton" type="button" class="btn btn-primary" onclick="getCheckedValuesForDelete('myTable','#exampleModal','promocode-ctrl.php?key1=delete','#filterTableBody')">yes</a>
            </div>
        </div>
    </div>
</div>

<script>
    var tokenid = "<?php echo session_id(); ?>";

    //empty variables for filter section and we can assign data to the vriables when we select specific data for filter
    function loadTableData(pageNo) {
        varDatePickerValue = $('#created_on span').html();
        varCreateFromDate = "";
        varCreateToDate = "";
        varLastFromDate = "";
        varLastToDate = "";
        varFactoryFromDate = "";
        varFactoryToDate = "";

        // Get Date value from created_on
        // div1 = document.getElementById('created_on');
        // if (document.getElementById('created').checked) {
            varCreateFromDate = getMySQLDateFromDatePicker("from", varDatePickerValue);
            varCreateToDate = getMySQLDateFromDatePicker("to", varDatePickerValue);
        // }


        // Make Sure to remove the Last Feild (,) if you are Pasting from The Excel Sheet
        var formData = {
            // order_id: $('#order_id').val(),
            created_on_from: varCreateFromDate,
            created_on_to: varCreateToDate
        };

        // Table Body ID, URL, 
        loadTableDataFromAjax("#filterTableBody", "promocode-ctrl.php?key1=filter&pageNo=" + pageNo, formData);
    }


    $('#filterform').click(function() {
        loadTableData(1);
    });




    // Form Resubmmison
    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
        location.reload();
    }


    $(document).ready(function() {
        $("#reset").click(function() {
            $("input").val('');
            $("select").val('');

            loadTableData(1);
        });
    });



    // For Date range
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#created_on span').html(start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
        }

        $('#created_on').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf(
                        'month')
                ]
            }
        }, cb);

        cb(start, end);

    });

    // Destroy key1 parameter after loading
    var myParamKey1 = getUrlParameter('key1');
    if (myParamKey1.length > 0) {
        // Get the current URL
        var url = window.location.href;

        // Remove the parameters by creating a new URL without them
        var updatedURL = url
            .replace(/([?&])key1=.*?(&|$)/, '$1')
            .replace(/([?&])updateKey=.*?(&|$)/, '$1')
            .replace(/([?&])insertID=.*?(&|$)/, '$1')
            .replace(/([?&])exist_barcode=.*?(&|$)/, '$1')
            .replace(/(&|\?)$/, '');

        // Replace the current URL with the updated one
        window.history.replaceState({}, document.title, updatedURL);
    }

    $(document).ready(function() {
        $('title').html('Promo Code');
    });
</script>

<?php include 'includes/footer.php'; ?>