<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_sub_category_master';


$sub_category = "";
$category = "";
$describition = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";



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

    <h1>Sub Category
        <a class='btn btn-light btn-sm m-1 float-right' data-toggle='modal' data-target='#exampleModal'><img
                src="assets/icons/CommonDelete.png" alt=""><br><small> Delete</small></a>
        <a href="sub-category-add.php" class="btn btn-light btn-sm m-1 float-right"><img
                src="assets/icons/Theam1New.png" alt=""><br> <small>Add New</small></a>
    </h1>



    <!-- Change The action URL -->
    <div class="form-row">
        <div class="form-group   col-md-3">
            <label>Sub Category</label>
            <select class="form-control" <?php echo 'value="' . $sub_category . '"'; ?> id="sub_category"
                name="sub_category">
                <option value=""></option>
                <?php
                $result = $obj_class_main->selectData_customqry("select distinct sub_category from ecom_sub_category_master");
                while ($row = $result->fetch_assoc()) {
                    if ($sub_category == $row['sub_category']) {
                        echo ' <option selected="selected" value="' . $row['sub_category'] . '" >' . $row['sub_category'] . '</option>';
                    } else {
                        echo ' <option value="' . $row['sub_category'] . '" >' . $row['sub_category'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- created on textbox to filter / function to hide created_on and last_updated_on datepicker -->

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



        <div class="form-group ">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button class="btn btn-light" id="reset"><small><img src="assets/icons/clear-filter.png"
                        alt=""></small></button>
        </div>

        <div class="form-group ml-2">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button id="filterform" class="btn btn-light"><img src="assets/icons/search.png" alt=""></button>
        </div>

    </div>



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
                    onclick="getCheckedValuesForDelete('myTable','#exampleModal','sub-category-ctrl.php?key1=delete','#filterTableBody')">yes</a>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    var tokenid = "<?php echo session_id(); ?>";


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
            sub_category: $('#sub_category').val(),
            created_on_from: varCreateFromDate,
            created_on_to: varCreateToDate,
            last_updated_on_from: varLastFromDate,
            last_updated_on_to: varLastToDate
        };

        // Table Body ID, URL, 
        loadTableDataFromAjax("#filterTableBody", "sub-category-ctrl.php?key1=filter&pageNo=" + pageNo, formData);

    }


    $('#filterform').click(function () {
        loadTableData(1);

    });


    // Auto Complete Code --------------------------------------------------------------

    $(function () {
        $("#sub_category").autocomplete({
            source: 'auto-complete.php?type=sub_category&tbl=ecom_sub_category_master&tkn=' +
                tokenid
        });
    });


    // For clear filters
    const sub_category = document.getElementById("sub_category");
    const clearButton = document.getElementById("reset");

    clearButton.addEventListener("click", function () {
        sub_category.value = "";

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