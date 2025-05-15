<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_combo_table';

//Init Variables
$tid  =  "";
$combo_sku  =  "";
$child_sku  =  "";
$child_qty  =  "";
$describition  =  "";
$created_on  =  "";
$created_by  =  "";
$last_updated_on  =  "";






//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "insert") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
  $combo_sku = czPostForSQL('combo_sku');
  if (strlen($combo_sku) > 0) {

    //Assign values to Variable from Post Method
    $tid = czPostForSQL('tid');
    $combo_sku = czPostForSQL('combo_sku');
    $child_sku = czPostForSQL('child_sku');
    $child_qty = czPostForSQL('child_qty');
    $describition = czPostForSQL('describition');
    $created_on = czPostForSQL('created_on');
    $created_by = czPostForSQL('created_by');
    $last_updated_on = czPostForSQL('last_updated_on');
    
    




    //Convert to Numeric
    $created_on = date("Y-m-d");
    $last_updated_on = date("Y-m-d");
    $created_by = $_SESSION['user_name'];

    //Initilize The File Upload Process




    //Get Value to form Insert Query
    $insertFeilds = "combo_sku,child_sku,child_qty,describition,created_on,created_by";
    $insertValues = "'$combo_sku','$child_sku','$child_qty','$describition','$created_on','$created_by'";


    //Insert Process
    $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);

    //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
    if ($insertStatus > 0) {
      header("Location: combo-my.php?key1=insertSuccess");
      exit();
    } else {
      header("Location:combo-my.php?key1=insertFailed");
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
  $combo_sku = czPostForSQL('combo_sku');
  $child_sku = czPostForSQL('child_sku');
  $child_qty = czPostForSQL('child_qty');
  $describition = czPostForSQL('describition');
  $created_on = czPostForSQL('created_on');
  $created_by = czPostForSQL('created_by');
  $last_updated_on = czPostForSQL('last_updated_on');
  



  //Convert to Numeric
  $last_updated_on = date("Y-m-d");

  //Initilize The File Upload Process



  //Get Value to form Update Query
  $updateValueAndFeilds = "combo_sku = '$combo_sku',child_sku = '$child_sku',child_qty = '$child_qty',describition = '$describition',last_updated_on = '$last_updated_on'";
  $updateWhereClasuse = "tid = '$updateKey'";

  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  //Redirect URL after update
  if ($UpdateStatus == "Success") {
    header("Location: combo-my.php?key1=updateSuccess");
    exit();
  } else {
    header("Location: combo-my.php?key1=updateFailed");
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
        <th>Combo SKY</th>
        <th>Child SKU</th>
        <th>Child Qty</th>
        <th>Notes</th>

      </tr>
    </thead>
    <tbody id="myTable">




      <?php


      //ini value for Select Query
      $temp_Feilds = "tid,combo_sku,child_sku,child_qty,describition,created_on,created_by,last_updated_on";
      $temp_whereClause = "";

      //Assign values to Variable from Post Method for Filter 
      $tid = czPostForSQL('tid');
      $combo_sku = czPostForSQL('combo_sku');
      $child_sku = czPostForSQL('child_sku');
      $child_qty = czPostForSQL('child_qty');
      $describition = czPostForSQL('describition');

      $created_on_from = czPostForSQL('created_on_from');
      $created_on_to = czPostForSQL('created_on_to');
      $last_updated_on_from = czPostForSQL('last_updated_on_from');
      $last_updated_on_to = czPostForSQL('last_updated_on_to');


      //Filter Query For Where Clause
      $temp_whereClause = whereClasueQueryGenerator('tid' ,'=',$tid,$temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('combo_sku' ,'=',$combo_sku,$temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('child_sku' ,'=',$child_sku,$temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('child_qty' ,'=',$child_qty,$temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('describition' ,'=',$describition,$temp_whereClause);

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
        <td><a href='combo-add.php?key1=update&updateKey=<?php echo $row['tid'] ?>' class='btn btn-success btn-sm'
            id='updateBtn'>#<?php echo $row['tid'] ?></td>
        <?php
        echo "<td>" . $row['combo_sku'] . "</td>";
        echo "<td>" . $row['child_sku'] . "</td>";
        echo "<td>" . $row['child_qty'] . "</td>";
        echo "<td>" . $row['describition'] . "</td>";



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