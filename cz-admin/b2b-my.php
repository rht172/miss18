<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'customer_table';

//get The Process Name -insert or delete or update
$processName = czGet('key1');

//Message For Display

if (strlen($processName) > 0) {
  //Notify Based On Insert Status
  if ($processName == "insertSuccess") {
    // If Inserted Successfull
    echo '<div class="alert alert-success" id="success-alert">
                    <strong>Cool!</strong>  #' . czGet('insertID') . ' Data Inserted Successfully.
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
                  <strong>Cool!</strong> #' . czGet('updateKey') . ' Data Update Successfully.
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
    <h1>Customer Master</h1>
  </div>
  <div class="col-md-6 p-0">
    <!-- Add and Delete Buttons -->
    <a onclick="downloadExcel('reportTable','B2B_Report')" class="btn btn-light btn-sm m-1 float-right" id="addBtn"><img
        src="assets/icons/download.png" alt=""><br><small>Download</small></a>
    <a class='btn btn-light btn-sm m-1 float-right' data-toggle='modal' data-target='#exampleModal'><img
        src="assets/icons/CommonDelete.png" alt=""><br><small>Delete</small></a>
    <!-- <a href="b2b-add.php" class="btn btn-light btn-sm m-1 float-right" id="addBtn"><img src="assets/icons/Theam1New.png"
        alt=""><br><small>Add
        New</small></a> -->
  </div>
</div>

<div class="container-fluid">
  <div class="row mt-3">


    <!-- Chenage The action URL -->

    <div class="form-row form-group col-md-12">

      <div class="form-group   col-md-2">
        <label>First Name</label>
        <input type="text" class="form-control" id="fname" name="fname">
      </div>

      <div class="form-group   col-md-2">
        <label> Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname">
      </div>

      <div class="form-group   col-md-3">
        <label> Email</label>
        <input type="text" class="form-control" id="email" name="email">
      </div>

      <div class="form-group   col-md-2">
        <label> City</label>
        <input type="text" class="form-control" id="city" name="city">
      </div>

      <div class="form-group   col-md-2">
        <label> State</label>
        <input type="text" class="form-control" id="state" name="state">
      </div>

      <div class="form-group   col-md-2">
        <label> Country</label>
        <input type="text" class="form-control" id="country" name="country">
      </div>

      <div class="form-group   col-md-2">
        <label> Zip Code</label>
        <input type="text" class="form-control" id="pin_code" name="pin_code">
      </div>

      <div class="form-group   col-md-2">
        <label> Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number">
      </div>


      <div class="form-group ">
      <label>&nbsp;&nbsp;&nbsp;</label><br />
      <button class="btn btn-light" id="reset"><small><img src="assets/icons/clear-filter.png" alt=""></small></button>
    </div>
      <div class="form-group ml-2">
        <label>&nbsp;&nbsp;&nbsp;</label><br />
        <button id="filterform" class="btn btn-light"><img src="assets/icons/search.png" alt=""></button>
      </div>

    </div>




    <br />
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
            onclick="getCheckedValuesForDelete('myTable','#exampleModal','b2b-ctrl.php?key1=delete','#filterTableBody')">yes</a>
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
      fname: $('#fname').val(),
      lname: $('#lname').val(),
      email: $('#email').val(),
      city: $('#city').val(),
      state: $('#state').val(),
      country: $('#country').val(),
      pin_code: $('#pin_code').val(),
      phone_number: $('#phone_number').val()
    }; //Array 

    // Table Body ID, URL, 
    loadTableDataFromAjax("#filterTableBody", "b2b-ctrl.php?key1=filter&pageNo=" + pageNo, formData);

  }


  $('#filterform').click(function () {
    loadTableData(1);

  });

  $(document).ready(function () {
        loadTableData(1);
    });

  // Auto Complete Code --------------------------------------------------------------


  //City Auto Complete
  $(function () {
    $("#fname").autocomplete({
      source: 'auto-complete.php?type=fname&tbl=customer_table&tkn=' +
        tokenid
    });
  });

  $(function () {
    $("#lname").autocomplete({
      source: 'auto-complete.php?type=lname&tbl=customer_table&tkn=' +
        tokenid
    });
  });

  $(function () {
    $("#email").autocomplete({
      source: 'auto-complete.php?type=email&tbl=customer_table&tkn=' +
        tokenid
    });
  });

  //Product name Auto Complete

  $(function () {
    $("#city").autocomplete({
      source: 'auto-complete.php?type=city&tbl=customer_table&tkn=' +
        tokenid
    });
  });

  $(function () {
    $("#state").autocomplete({
      source: 'auto-complete.php?type=state&tbl=customer_table&tkn=' +
        tokenid
    });
  });

  $(function () {
    $("#country").autocomplete({
      source: 'auto-complete.php?type=country&tbl=customer_table&tkn=' +
        tokenid
    });
  });

  $(function () {
    $("#pin_code").autocomplete({
      source: 'auto-complete.php?type=pin_code&tbl=customer_table&tkn=' +
        tokenid
    });
  });

  $(function () {
    $("#phone_number").autocomplete({
      source: 'auto-complete.php?type=phone_number&tbl=customer_table&tkn=' +
        tokenid
    });
  });


  // For clear filters
  $(document).ready(function () {
        $("#reset").click(function () {
            $("input").val('');
            $("select").val('');

            loadTableData(1);
        });
    });



</script>




<?php include 'includes/footer.php'; ?>