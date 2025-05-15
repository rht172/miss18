<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();

//Assign Table Name
$obj_class_main->varTableName = 'company_table';

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

<div class="col-md-12 row pr-0">
    <div class="col-md-6">
        <h1>Customer</h1>
    </div>
    <div class="col-md-6 p-0">
        <!-- Add and Delete Buttons -->
        <a class='btn btn-light btn-sm m-1 float-right' data-toggle='modal' data-target='#exampleModal'><img
                src="assets/icons/CommonDelete.png" alt=""><br><small>Delete</small></a>
        <a href="b2b-add.php" class="btn btn-light btn-sm m-1 float-right" id="addBtn"><img
                src="assets/icons/Theam1New.png" alt=""><br><small>Add
                New</small></a>
    </div>
</div>




<div class="container-fluid">


    <!-- Filter section -->
    <h4>Filters</h4>
    <div class="form-row">

        <div class="form-group   col-md-2">
            <label>Customer Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name">
        </div>

        <div class="form-group   col-md-2">
            <label>Contact Type</label>
            <select class="form-control" id="contact_type" name="contact_type">
                <option value=""> </option>
                <?php
                $result = $obj_class_main->selectData_customqry("select distinct contact_type from company_table");
                while ($row = $result->fetch_assoc()) {
                    if ($contact_type == $row['contact_type']) {
                        echo ' <option selected="selected" value="' . $row['contact_type'] . '" >' . $row['contact_type'] . '</option>';
                    } else {
                        echo ' <option value="' . $row['contact_type'] . '" >' . $row['contact_type'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>



        <!-- created on textbox to filter / function to hide created_on datepicker -->

        <div class="form-group   col-md-3">
            <input type="checkbox" id="created" onclick="hideDatePicker('created','created_on_div')">
            <label for="created"> Created On</label><br>
            <div id="created_on_div">
                <div id="created_on"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>
        </div>

        <div class="form-group   col-md-3">
            <input type="checkbox" id="last" onclick="hideDatePicker('last','last_updated_on_div')">
            <label for="last"> Last Updated On</label><br>
            <div id="last_updated_on_div">
                <div id="last_updated_on"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>
        </div>

        <!-- clear filters button and search button  -->
        <div class="form-group col-md-1">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button class="btn btn-secondary " id="reset"><small>Clear Filters</small></button>
        </div>
        <div class="form-group col-md-1">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button id="filterform" class="btn btn-light"><img src="assets/icons/search.png" alt=""></button>
        </div>
    </div>



    <br />


</div>
<!-- filter table to be displayed in my page  -->
<div class="table-responsive" id="filterTableBody">

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
                    onclick="getCheckedValuesForDelete('myTable','#exampleModal','b2b-ctrl.php?key1=delete','#filterTableBody')">yes</a>
            </div>
        </div>
    </div>
</div>

<script>
    var tokenid = "<?php echo session_id(); ?>";

    //empty variables for filter section and we can assign data to the vriables when we select specific data for filter
    function loadTableData(pageNo) {
        varDatePickerValue = $('#created_on span').html();
        varLastPickerValue = $('#last_updated_on span').html();
        varCreateFromDate = "";
        varCreateToDate = "";
        varLastFromDate = "";
        varLastToDate = "";

        // Get Date value from created_on
        div1 = document.getElementById('created_on');
        if (document.getElementById('created').checked) {
            varCreateFromDate = getMySQLDateFromDatePicker("from", varDatePickerValue);
            varCreateToDate = getMySQLDateFromDatePicker("to", varDatePickerValue);
        }

        div3 = document.getElementById('last_updated_on');
        if (document.getElementById('last').checked) {
            varLastFromDate = getMySQLDateFromDatePicker("from", varLastPickerValue);
            varLastToDate = getMySQLDateFromDatePicker("to", varLastPickerValue);
        }

        // Make Sure to remove the Last Feild (,) if you are Pasting from The Excel Sheet
        var formData = {
            company_name: $('#company_name').val(),
            contact_type: $('#contact_type').val(),
            created_on_from: varCreateFromDate,
            created_on_to: varCreateToDate,
            last_updated_on_from: varLastFromDate,
            last_updated_on_to: varLastToDate
        };

        // Table Body ID, URL, 
        loadTableDataFromAjax("#filterTableBody", "b2b-ctrl.php?key1=filter&pageNo=" + pageNo, formData);

    }


    $('#filterform').click(function () {
        loadTableData(1);

    });


    // Auto Complete Code --------------------------------------------------------------

    $(function () {
        $("#company_name").autocomplete({
            source: 'auto-complete.php?type=company_name&tbl=company_table&tkn=' +
                tokenid
        });
    });

    // Auto Complete Code --------------------------------------------------------------

    $(function () {
        $("#contact_type").autocomplete({
            source: 'auto-complete.php?type=contact_type&tbl=company_table&tkn=' +
                tokenid
        });
    });

    // Form Resubmmison
    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
        location.reload();
    }

    // For clear filters
    const company_name = document.getElementById("company_name");
    const contact_type = document.getElementById("contact_type");
    const created_on = document.getElementById("created_on");
    const last_updated_on = document.getElementById("last_updated_on");
    const clearButton = document.getElementById("reset");

    clearButton.addEventListener("click", function () {
        company_name.value = "";
        contact_type.value = "";
        created_on.value = "";
        last_updated_on.value = "";
    });


    // For Date range
    $(function () {

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


    // For Date range
    $(function () {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#last_updated_on span').html(start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
        }

        $('#last_updated_on').daterangepicker({
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
</script>

<?php include 'includes/footer.php'; ?>