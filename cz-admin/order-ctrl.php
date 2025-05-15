<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_order_main_table';

//Init Variables
$tid = "";
$order_status = "";
$despatch_details = "";
$track_id = "";
$customer_id = "";
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


//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

  //Get Update Key
  $updateKey = czGet('pk');



  //Assign values to Variable from Post Method
  $tid = czPostForSQL('tid');
  $order_status = czPostForSQL('order_status');
  $despatch_details = czPostForSQL('despatch_details');
  $track_id = czPostForSQL('track_id');
  $created_on = czPostForSQL('created_on');
  $created_by = czPostForSQL('created_by');
  $last_updated_on = czPostForSQL('last_updated_on');
  $last_created_by = czPostForSQL('last_created_by');

  //Convert to Numeric
  $last_updated_on = date("Y-m-d");
  $last_created_by = $_SESSION['user_name'];


  //Initilize The File Upload Process



  //Get Value to form Update Query
  $updateValueAndFeilds = "order_status = '$order_status',despatch_details = '$despatch_details',track_id = '$track_id'";
  $updateWhereClasuse = "tid = '$updateKey'";

  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  //Redirect URL after update
  if ($UpdateStatus == "Success") {
    if ($order_status == 'Shipped') {
      header("Location: ../cz-admin/amazon-ses/sendemail_shipped.php?key1=updateSuccess&updateKey=" . $updateKey);
      exit();
    } else {
      header("Location: order-my.php?key1=updateSuccess");
      exit();
    }
  } else {
    header("Location: order-my.php?key1=updateFailed");
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
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Order Status</th>
        <th>Order Date</th>
        <th>Despatch Details</th>
        <th>Track ID</th>
        <th>Print</th>
      </tr>
    </thead>
    <tbody id="myTable">




      <?php


      //ini value for Select Query
      $temp_Feilds = "tid,order_status,despatch_details,customer_id,order_date,track_id";
      $temp_whereClause = "";

      //Assign values to Variable from Post Method for Filter 
      $tid = czPostForSQL('tid');
      $order_status = czPostForSQL('order_status');
      $despatch_details = czPostForSQL('despatch_details');
      $customer_id = czPostForSQL('customer_id');
      $track_id = czPostForSQL('track_id');


      $created_on_from = czPostForSQL('created_on_from');
      $created_on_to = czPostForSQL('created_on_to');
      // $last_updated_on_from = czPostForSQL('last_updated_on_from');
      // $last_updated_on_to = czPostForSQL('last_updated_on_to');


      //Filter Query For Where Clause
      $temp_whereClause = whereClasueQueryGenerator('tid', '=', $tid, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('order_status', '=', $order_status, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('despatch_details', '=', $despatch_details, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('customer_id', '=', $customer_id, $temp_whereClause);
      $temp_whereClause = whereClasueQueryGenerator('track_id', '=', $track_id, $temp_whereClause);

      $temp_whereClause = whereClasueQueryGeneratorForDate('order_date', $created_on_from, $created_on_to, $temp_whereClause);
      // $temp_whereClause = whereClasueQueryGeneratorForDate('last_updated_on', $last_updated_on_from, $last_updated_on_to, $temp_whereClause);


      // Select Date To Display In Table
      $limitString = "";
      if ($pageNo > 0) {
        if ($pageNo == 1) {
          $limitString = " limit 0,100";
        } else {
          $limitString = " limit " . (($pageNo * 100) - 99) . "," . ($pageNo * 100);
        }
      }

      if (strlen($temp_whereClause) > 0) {
        $result = $obj_class_main->selectData_customqry("SELECT ecom_order_main_table.tid as main_id, ecom_order_main_table.*,customer_table.* from ecom_order_main_table left join customer_table on ecom_order_main_table.customer_id = customer_table.tid where  $temp_whereClause order by ecom_order_main_table.tid desc;");
      } else {
      $result = $obj_class_main->selectData_customqry("SELECT ecom_order_main_table.tid as main_id, ecom_order_main_table.*,customer_table.* from ecom_order_main_table left join customer_table on ecom_order_main_table.customer_id = customer_table.tid order by ecom_order_main_table.tid desc;");
      }

      //Loop Through Select Result
      while ($row = $result->fetch_assoc()) {
        $cus_id = $row['customer_id'];
        echo "<tr>";
        echo '<td><input type="checkbox"  value="' . $row['main_id'] . '"></td>';
        ?>
        <td><a href='order-add.php?key1=update&updateKey=<?php echo $row['main_id'] ?>' class='btn btn-success btn-sm'
            id='updateBtn'>#<?php echo $row['main_id'] ?></td>
        <?php
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
        echo "<td>" . $row['order_status'] . "</td>";
        echo "<td>" . $row['order_date'] . "</td>";
        echo "<td>" . $row['despatch_details'] . "</td>";
        echo "<td>" . $row['track_id'] . "</td>";
        echo '<td> <a href="invoice-1.php?key1=update&updateKey=' . $row['main_id'] . '" class="btn btn-info btn-sm" target="_blank"> Print </td>';
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