<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_uom_master_table';

//Init Variables

$category  =  "";
$notes  =  "";
$created_on  =  "";
$created_by  =  "";
$last_updated_on  =  "";
$last_updated_by  =  "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "insert") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
  $uom = czPostForSQL('uom');
  if (strlen($uom) > 0) {

    //Assign values to Variable from Post Method
    $uom = czPostForSQL('uom');
    $notes = czPostForSQL('notes');
    


    //Convert to Numeric
    $created_on = date("Y-m-d");
    $created_by = $_SESSION['user_name'];

    //Initilize The File Upload Process

    //Get Value to form Insert Query
    $insertFeilds = "uom,notes,created_on,created_by";
    $insertValues = "'$uom','$notes','$created_on','$created_by'";
    //Insert Process
    $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
    FileUploadJPG("company_image", $insertStatus, "attachments/customers/");
    //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
    if ($insertStatus > 0) {
      header("Location: uom-my.php?key1=insertSuccess");
      exit();
    } else {
      header("Location:uom-my.php?key1=insertFailed");
      exit();
    }
  }
}

//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

  //Get Update Key
  $updateKey = czGet('pk');



  //Assign values to Variable from Post Method
  $uom = czPostForSQL('uom');
  $notes = czPostForSQL('notes');
 


  //Convert to Numeric
  $last_updated_on = date("Y-m-d");
  $last_updated_by = $_SESSION['user_name'];

  //Initilize The File Upload Process

  //Get Value to form Update Query
  $updateValueAndFeilds = "uom = '$uom',notes = '$notes',last_updated_on = '$last_updated_on',last_updated_by = '$last_updated_by'";
  $updateWhereClasuse = "tid = '$updateKey'";
  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  //Redirect URL after update
  if ($UpdateStatus == "Success") {
    header("Location: uom-my.php?key1=updateSuccess");
    exit();
  } else {
    header("Location: uom-my.php?key1=updateFailed");
    exit();
  }
}


//Filter Section ------------------------------------------------------------------------------
if (czGet('key1') == "filter") {

  $pageNo  = czGet('pageNo');
?>

<table class="table table-striped ">
    <thead>
        <tr>
            <th class="w-5"><input type="checkbox" id="allcb" onclick="toggleAllCheckbox()"></th>
            <th class="w-5">ID</th>
            <th class="w-20">Category</th>
            <th class="w-20">Notes</th>
            <th class="w-5">Update</th>


        </tr>
    </thead>
    <tbody id="myTable">




        <?php


    //ini value for Select Query
    $temp_Feilds = "tid,uom,notes,created_on,created_by,last_updated_on";
    $temp_whereClause = "";

    //Assign values to Variable from Post Method for Filter 
    $uom = czPostForSQL('uom');

    $last_updated_on = czPostForSQL('last_updated_on');

    //Filter Query For Where Clause
    $temp_whereClause = whereClasueQueryGenerator('uom' ,'=',$category,$temp_whereClause);
    $temp_whereClause = whereClasueQueryGenerator('last_updated_on' ,'=',$last_updated_on,$temp_whereClause);
   

    // Select Date To Display In Table
    $limitString = "";
    if ($pageNo > 0) {
      if ($pageNo == 1) {
        $limitString = " limit 0,100";
      } else {
        $limitString = " limit " . ($pageNo * 100)  . ",100";
      }
    }
    $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause, $limitString);

    //Loop Through Select Result
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
            echo '<td><input type="checkbox"  value="' .  $row['tid']  . '"></td>';
            echo "<td>" . $row['tid'] . "</td>";
            echo "<td>" . $row['uom'] . "</td>";
            echo "<td>" . $row['notes'] . "</td>";

      //Update Call
       echo "<td><a href='uom-add.php?key1=update&updateKey=" . $row['tid'] . "' class='btn btn-success btn-sm'>Update</td>";
     
      echo "</tr>";
    }

    echo '</tbody>
      </table>';

      pagination($pageNo);


  }



  //Delete Process------------------------------------------------------------------------------------------------------------------------------
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