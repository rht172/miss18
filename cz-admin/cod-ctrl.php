<?php include 'includes/validateSession.php';
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


//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

  //Get Update Key
  $updateKey = czGet('pk');



  //Assign values to Variable from Post Method
  $tid = czPostForSQL('tid');
  $status = czPostForSQL('status');

  //Get Value to form Update Query
  $updateValueAndFeilds = "status = '$status'";
  $updateWhereClasuse = "tid = '$updateKey'";

  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  //Redirect URL after update
  if ($UpdateStatus == "Success") {
    header("Location: cod-my.php?key1=updateSuccess");
    exit();
  } else {
    header("Location: cod-my.php?key1=updateFailed");
    exit();
  }
}



//Delete Process------------------------------------------------------------------------------------------------------
if (czGet('key1') == "delete") {


  //Delete Query call
  $deleteKeyValue = czPostForSQL('delete_key');
  if (substr($deleteKeyValue, 0, 1) === ",") {
    $deleteKeyValue = substr($deleteKeyValue, 1);
  }
  if (strpos($deleteKeyValue, ',')) {
    $temp_whereClause = "tid in (" . $deleteKeyValue . ")";
  } else {
    $temp_whereClause = "tid  = '" . $deleteKeyValue . "'";
  }

  $curdStatus = $obj_class_main->deleteData($temp_whereClause);

  //Notify Based On Delete Status
  if ($curdStatus == "Success") {
    // If Delete Successfull
    echo '<div class="alert alert-success" id="success-alert">
                    <strong>Cool!</strong>  Data Delete Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>';
  } else {
    // If Delete Failed
    echo '<div class="alert alert-danger" id="success-alert">
    <strong>Oops!</strong> Something Went Wrong, Data Not Delete Properly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  }
}



?>