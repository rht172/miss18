<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'cod_table';

$tid = "";
$status = "";
$status_name = "";



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

    <h1>Cash On Delivery</h1>


    <div>
    <table class="table table-striped ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php

      $result = $obj_class_main->selectData_customqry("SELECT * FROM cod_table");

      //Loop Through Select Result
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['tid'] . "</td>";
        echo "<td>" . $row['status_name'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        ?>
                <td><a href='cod-add.php?key1=update&updateKey=<?php echo $row['tid'] ?>' class='btn btn-success btn-sm'
            id='updateBtn'>Update</td>
        <?php
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>

    </div>
</div>

<script>
</script>

<?php include 'includes/footer.php'; ?>