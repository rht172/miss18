<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_category = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_sub_category_master';
$obj_class_category->varTableName = 'ecom_category_master';

//Init Variables
$sub_category = "";
$category = "";
$describition = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";




//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}


//Insert Process---------------------------------------------------------------------------
if (czGet('key1') == "insert") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
  $sub_category = czPostForSQL('sub_category');
  if (strlen($sub_category) > 0) {

    //Assign values to Variable from Post Method
    $sub_category = czPostForSQL('sub_category');
    $category = czPostForSQL('category');
    $describition = czPostForSQL('describition');
    $created_on = czPostForSQL('created_on');
    $created_by = czPostForSQL('created_by');
    $last_updated_on = czPostForSQL('last_updated_on');



    //Convert to Numeric
    $created_on = date("Y-m-d");
    $last_updated_on = date("Y-m-d");
    $created_by = $_SESSION['user_name'];

    //Get Extension Code
    $path_parts = pathinfo($_FILES["sub_category_image"]["name"]);
    $extFileUpload = $path_parts['extension'];


    //Get Value to form Insert Query
    $insertFeilds = "sub_category,category,describition,created_on,created_by,last_updated_on,ext_file";
    $insertValues = "'$sub_category','$category','$describition','$created_on','$created_by','$last_updated_on','$extFileUpload'";


    //Insert Process
    $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
    FileUpload("sub_category_image", 'tid-' . $insertStatus, "attachments/sub-category/", $extFileUpload);
    //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
    if ($insertStatus > 0) {
      header("Location: sub-category-my.php?key1=insertSuccess");
      exit();
    } else {
      header("Location: sub-category-my.php?key1=insertFailed");
      exit();
    }
  }
}

//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

  //Get Update Key
  $updateKey = czGet('pk');

  if (isset($_FILES['sub_category_image']) && $_FILES['sub_category_image']['error'] === UPLOAD_ERR_OK) {
    echo "Attachment selected";
    $result = $obj_class_main->selectData_customqry("SELECT ext_file from ecom_sub_category_master where tid = $updateKey");
    while ($row = $result->fetch_assoc()) {
      if (strlen($row['ext_file']) > 0) {
        unlink("attachments/sub-category/tid-" . $updateKey . '.' . $row['ext_file']);
      }
    }
  } else {
    echo "No file selected.";
  }


  //Assign values to Variable from Post Method
  $sub_category = czPostForSQL('sub_category');
  $category = czPostForSQL('category');
  $describition = czPostForSQL('describition');
  $last_updated_on = czPostForSQL('last_updated_on');


  //Convert to Numeric
  $last_updated_on = date("Y-m-d");


  //Get Extension Code
  $path_parts = pathinfo($_FILES["sub_category_image"]["name"]);
  $extFileUpload = $path_parts['extension'];

  //Initilize The File Upload Process

  //Get Value to form Update Query
  $updateValueAndFeilds = "sub_category = '$sub_category',category = '$category',describition = '$describition',last_updated_on = '$last_updated_on'";
  $updateWhereClasuse = "tid = '$updateKey'";
  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  if ($UpdateStatus == "Success") {
    //Get Value to form Update Query
    if (isset($_FILES['sub_category_image']) && $_FILES['sub_category_image']['error'] == UPLOAD_ERR_OK) {
      //Get Extension Code
      $path_parts1 = pathinfo($_FILES["sub_category_image"]["name"]);
      $extFileUpload = $path_parts1['extension'];

      $updateValueAndFeilds = "ext_file = '$extFileUpload'";
      $updateWhereClasuse = "tid = '$updateKey'";
      FileUpload("sub_category_image", 'tid-' . $updateKey, "attachments/sub-category/", $extFileUpload);
      //Update Process
      $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
    }

  }



  //Redirect URL after update
  if ($UpdateStatus == "Success" || $UpdateStatus1 == "Success") {

    header("Location: sub-category-my.php?key1=updateSuccess");
    exit();
  } else {
    header("Location: sub-category-my.php?key1=updateFailed");
    exit();
  }
}


//Filter Section ------------------------------------------------------------------------------
if (czGet('key1') == "filter") {

  $pageNo = czGet('pageNo');
  ?>

  <table class="table table-striped ">
    <thead>
      <tr>
        <th class="w-5"><input type="checkbox" id="allcb" onclick="toggleAllCheckbox()"></th>
        <th class="w-5">ID</th>
        <th class="w-20">Sub Category</th>
        <th>Category</th>
        <th class="w-20">Notes</th>
        <th class="w-5">Update</th>
      </tr>
    </thead>
    <tbody id="myTable">




      <?php


      //ini value for Select Query
      $temp_Feilds = "tid,sub_category,category,describition,created_on,created_by,last_updated_on";
      $temp_whereClause = "";

      //Assign values to Variable from Post Method for Filter 
      $sub_category = czPostForSQL('sub_category');
      $category = czPostForSQL('category');
      $describition = czPostForSQL('describition');
      $created_on_from = czPostForSQL('created_on_from');
      $created_on_to = czPostForSQL('created_on_to');
      $last_updated_on_from = czPostForSQL('last_updated_on_from');
      $last_updated_on_to = czPostForSQL('last_updated_on_to');


      //Filter Query For Where Clause
      $temp_whereClause = whereClasueQueryGenerator('sub_category', '=', $sub_category, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('describition', '=', $describition, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGeneratorForDate('created_on', $created_on_from, $created_on_to, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGeneratorForDate('last_updated_on', $last_updated_on_from, $last_updated_on_to, $temp_whereClause);


      // Select Date To Display In Table
      $limitString = "";
      if ($pageNo > 0) {
        if ($pageNo == 1) {
          $limitString = " limit 0,100";
        } else {
          $limitString = " limit " . (($pageNo * 100) - 99) . "," . ($pageNo * 100);
        }
      }
      $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause, $limitString);

      //Loop Through Select Result
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo '<td><input type="checkbox"  value="' . $row['tid'] . '"></td>';
        echo "<td>" . $row['tid'] . "</td>";
        echo "<td>" . $row['sub_category'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['describition'] . "</td>";


        //Update Call
        echo "<td><a href='sub-category-add.php?key1=update&updateKey=" . $row['tid'] . "' class='btn btn-success btn-sm'>Update</td>";

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

    $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file from ecom_sub_category_master where $temp_whereClause");
    while ($row = $result->fetch_assoc()) {
      if (strlen($row['ext_file']) > 0) {
        unlink("attachments/sub-category/tid-" . $row['tid'] . '.' . $row['ext_file']);
      }
    }
  } else {
    $temp_whereClause = "tid  = '" . $deleteKeyValue . "'";

    $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file from ecom_sub_category_master where $temp_whereClause");
    while ($row = $result->fetch_assoc()) {
      if (strlen($row['ext_file']) > 0) {
        unlink("attachments/sub-category/tid-" . $row['tid'] . '.' . $row['ext_file']);
      }
    }
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