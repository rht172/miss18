<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'customer_table';

//Init Variables
$tid = "";
$fname = "";
$lname = "";
$street = "";
$city = "";
$state = "";
$pin_code = "";
$email = "";
$password = "";
$phone_number = "";
$country = "";





//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
  $select_Feilds = "fname,lname,street,city,state,pin_code,email,password,phone_number,country";
  $select_whereClause = "tid = '" . czGet('updateKey') . "'";
  $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
  //$result = $obj_class_main->selectData_customqry("select sku,product_name,category,sub_category,super_sub_category,brand_name,selling_price from product_table where tid = '" . czGet('updateKey') . "' ");
  while ($row = $result->fetch_assoc()) {

    $fname = $row['fname'];
    $lname = $row['lname'];
    $street = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $pin_code = $row['pin_code'];
    $email = $row['email'];
    $password = $row['password'];
    $phone_number = $row['phone_number'];
    $country = $row['country'];


    $processName = 'update&pk=' . czGet('updateKey');
  }
}



?>

<div class="container-fluid">
  <h1>Customer Master</h1>

  <div class="row p-3">
    <div class="container-fluid">
      <form action="b2b-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row row">
          <div class="col-md-3">
            <label for="email">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" <?php echo 'value="' . $fname . '"'; ?>
              placeholder="First Name" required>
          </div>
          <div class="col-md-3">
            <label for="review">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" <?php echo 'value="' . $lname . '"'; ?>
              placeholder="Last Name" required>
          </div>
        </div>
  

        <div class="form-row row mb-3 mt-3">
          <div class="col-md-12">
            <h4><b>Address</b></h4>
          </div>
        </div>

        <div class="form-row row">

          <div class="col-md-7">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" <?php echo 'value="' . $street . '"'; ?>
              placeholder="Street" required>
          </div>

          <div class="col-md-3">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="City" <?php echo 'value="' . $city . '"'; ?> required>
          </div>

          <div class="col-md-2">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" placeholder="State" <?php echo 'value="' . $state . '"'; ?> required>
          </div>

          <div class="col-md-2">
            <label for="pin_code">Pin Code</label>
            <input type="text" class="form-control" id="pin_code" name="pin_code" <?php echo 'value="' . $pin_code . '"'; ?> placeholder="Pin code or Zip code" required>
          </div>

          <div class="col-md-2">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" <?php echo 'value="' . $country . '"'; ?> placeholder="Country" required>
          </div>

        </div>

        <div class="form-row row mb-3 mt-3">
          <div class="col-md-12">
            <h4><b>Other Details</b></h4>
          </div>
        </div>

        <div class="form-row row">
          <div class="col-md-4">
            <label for="email">email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" <?php echo 'value="' . $email . '"'; ?> required readonly>
          </div>

          <div class="col-md-4">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" <?php echo 'value="' . $phone_number . '"'; ?> placeholder="1234567890" pattern="[0-9]{10}" maxlength="10" required>
          </div>

          <div class="col-md-4">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" <?php echo 'value="' . $password . '"'; ?> placeholder="Enter your password" required readonly>
          </div>
          

        </div>
        <button type="submit" id="saveButton" class="btn btn-success w-auto float-right mt-3">Save</button>
      </form>
    </div>
  </div>
</div>

<script>
  var tokenid = "<?php echo session_id(); ?>";

</script>
<?php include 'includes/footer.php'; ?>