<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'user_table';


$email_address = "";
$password = "";
$account_name = "";
$user_type = "";
$m_access = "";
$email_account = "";
$staff_name = "";



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
        <h1>User Settings</h1>
    </div>
    <div class="col-md-6 p-0">
        <!-- Add and Delete Buttons -->
        <a class='btn btn-light btn-sm m-1 float-right' data-toggle='modal' data-target='#exampleModal'><img
                src="assets/icons/CommonDelete.png" alt=""><br><small>Delete</small></a>
        <a href="user-add.php" class="btn btn-light btn-sm m-1 float-right" id="addBtn"><img
                src="assets/icons/Theam1New.png" alt=""><br><small>Add
                New</small></a>
    </div>
</div>


<div class="container-fluid">
    <div class="row col-sm-12">

        <br />

        <div class="form-group col-md-12 p-0">



            <!-- Change The action URL -->
            <div class="form-row">

                <div class="form-group   col-md-2">
                    <label>User Name</label>
                    <input type="text" class="form-control" <?php echo 'value="' . $email_address . '"'; ?>
                        id="email_address" name="email_address" autofocus required>
                </div>

                <div class="form-group   col-md-2">
                    <label>Account Name</label>
                    <input type="text" class="form-control" <?php echo 'value="' . $account_name . '"'; ?>
                        id="account_name" name="account_name">
                </div>

                <div class="form-group   col-md-2">
                    <label>User Account Type</label>
                    <input type="email" class="form-control" <?php echo 'value="' . $user_type . '"'; ?> id="user_type"
                        name="user_type">
                </div>

                <div class="form-group   col-md-2">
                    <label>Staff Name</label>
                    <input type="email" class="form-control" <?php echo 'value="' . $staff_name . '"'; ?>
                        id="staff_name" name="staff_name">
                </div>

                <div class="form-group col-md-2">
                    <label>&nbsp;&nbsp;&nbsp;</label><br />
                    <button id="filterform" class="btn btn-light"><img src="assets/icons/search.png" alt=""></button>
                </div>

            </div>





        </div>
    </div>

    <div id="filterTableBody">


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
                        onclick="getCheckedValuesForDelete('myTable','#exampleModal','user-ctrl.php?key1=delete','#filterTableBody')">yes</a>
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
            email_address: $('#email_address').val(),
            password: $('#password').val(),
            account_name: $('#account_name').val(),
            user_type: $('#user_type').val(),
            m_access: $('#m_access').val(),
            email_account: $('#email_account').val(),
            staff_name: $('#staff_name').val()

        }; //Array 

        // Table Body ID, URL, 
        loadTableDataFromAjax("#filterTableBody", "user-ctrl.php?key1=filter&pageNo=" + pageNo, formData);

    }


    $('#filterform').click(function () {
        loadTableData(1);

    });


    // Auto Complete Code --------------------------------------------------------------


    //City Auto Complete
    $(function () {
        $("#email_address").autocomplete({
            source: 'auto-complete.php?type=email_address&tbl=user_table&tkn=' +
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