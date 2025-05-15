<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'color_master_table';

//Init Variables
$tid = "";
$color_name = "";
$color_code = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";
$last_created_by = "";


//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "insert") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
  $color_name = czPostForSQL('color_name');
  if (strlen($color_name) > 0) {

    //Assign values to Variable from Post Method
    $tid = czPostForSQL('tid');
    $color_name = czPostForSQL('color_name');
    $color_code = czPostForSQL('color_code');
    $created_on = czPostForSQL('created_on');
    $created_by = czPostForSQL('created_by');
    $last_updated_on = czPostForSQL('last_updated_on');
    $last_created_by = czPostForSQL('last_created_by');


    //Convert to Numeric
    $created_on = date("Y-m-d");
    $last_updated_on = date("Y-m-d");
    $created_by = $_SESSION['user_name'];
    $last_created_by = $_SESSION['user_name'];


    //Get Value to form Insert Query
    $insertFeilds = "color_name,color_code,created_on,created_by,last_updated_on,last_created_by";
    $insertValues = "'$color_name','$color_code','$created_on','$created_by','$last_updated_on','$last_created_by'";

    //Insert Process
    $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);

    //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
    if ($insertStatus > 0) {
      header("Location: color-master-my.php?key1=insertSuccess");
      exit();
    } else {
      header("Location: color-master-my.php?key1=insertFailed");
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
  $tid = czPostForSQL('tid');
  $color_name = czPostForSQL('color_name');
  $color_code = czPostForSQL('color_code');
  $created_on = czPostForSQL('created_on');
  $created_by = czPostForSQL('created_by');
  $last_updated_on = czPostForSQL('last_updated_on');
  $last_created_by = czPostForSQL('last_created_by');

  //Convert to Numeric
  $last_updated_on = date("Y-m-d");
  $last_created_by = $_SESSION['user_name'];


  //Initilize The File Upload Process



  //Get Value to form Update Query
  $updateValueAndFeilds = "color_name = '$color_name',color_code = '$color_code',last_updated_on = '$last_updated_on',last_created_by = '$last_created_by'";
  $updateWhereClasuse = "tid = '$updateKey'";

  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  //Redirect URL after update
  if ($UpdateStatus == "Success") {
    header("Location: color-master-my.php?key1=updateSuccess");
    exit();
  } else {
    header("Location: color-master-my.php?key1=updateFailed");
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
        <th><input type="checkbox" id="allcb" onclick="toggleAllCheckbox()"></th>
        <th>ID</th>
        <th>Color Name</th>
        <th>Color Code</th>
      </tr>
    </thead>
    <tbody id="myTable">




      <?php


      //ini value for Select Query
      $temp_Feilds = "tid,color_name,color_code,created_on,created_by,last_updated_on,last_created_by";
      $temp_whereClause = "";

      //Assign values to Variable from Post Method for Filter 
      $tid = czPostForSQL('tid');
      $color_name = czPostForSQL('color_name');


      $created_on_from = czPostForSQL('created_on_from');
      $created_on_to = czPostForSQL('created_on_to');
      $last_updated_on_from = czPostForSQL('last_updated_on_from');
      $last_updated_on_to = czPostForSQL('last_updated_on_to');


      //Filter Query For Where Clause
      $temp_whereClause = whereClasueQueryGenerator('tid', '=', $tid, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('color_name', '=', $color_name, $temp_whereClause);

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
        ?>
        <td><a href='color-master-add.php?key1=update&updateKey=<?php echo $row['tid'] ?>' class='btn btn-success btn-sm'
            id='updateBtn'>#<?php echo $row['tid'] ?></td>
        <?php
        // echo "<td>" . $row['tid'] . "</td>";
        echo "<td>" . $row['color_name'] . "</td>";
        echo "<td>" . $row['color_code'] . "</td>";
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>

  <?php
  pagination($pageNo);
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