<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

$obj_class_main = new czDBAccess();
$obj_class_main->varTableName = 'customer_table';


$account_tid = "";
$account_fname = "";
$account_lname = "";
$account_email = "";
$account_password = "";
$account_phone_number = "";
$account_pin_code = "";
$account_state = "";
$account_city = "";
$account_street = "";
$account_door_no = "";
$account_ext_file = "";
$account_country = "";


if (isset($_SESSION['tid'])) {
  $customer_id = $_SESSION['tid'];
} else {
  $customer_id = '';
}

$result = $obj_class_main->selectData_customqry("SELECT * from customer_table where tid = '$customer_id';");

while ($row = $result->fetch_assoc()) {

  $account_tid = $row['tid'];
  $account_fname = $row['fname'];
  $account_lname = $row['lname'];
  $account_email = $row['email'];
  $account_password = $row['password'];
  $account_phone_number = $row['phone_number'];
  $account_pin_code = $row['pin_code'];
  $account_state = $row['state'];
  $account_city = $row['city'];
  $account_street = $row['street'];
  $account_door_no = $row['door_no'];
  $account_ext_file = $row['ext_file'];
  $account_country = $row['country'];

}

?>


<?php
include 'includes/title.php';
?>


<!-- Body-->

<body class="handheld-toolbar-enabled">
  <!-- Google Tag Manager (noscript)-->
  <noscript>
    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
      style="display: none; visibility: hidden;"></iframe>
  </noscript>
  <!-- Sign in / sign up modal-->
  <?php
  include 'sign-up-form.php';
  ?>


  <main class="page-wrapper">
    <!-- Add New Address-->


    <!-- Navbar 3 Level (Light)-->
    <?php
    include 'includes/header.php';
    ?>



    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb  flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="account-profile.php">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Addresses</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 text-light mb-0">My addresses</h1>
        </div>
      </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
          <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
            <div class="d-md-flex justify-content-center align-items-center text-center text-md-start p-4">
              <div class="d-md-flex align-items-center">
                <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0"
                  style="width: 6.375rem;">
                  
                  <?php
                  if (isset($_SESSION['google_data']['picture'])) {
                    echo '<img class="rounded-circle" src="' . $_SESSION['google_data']['picture'] . '"/>';
                  } else {
                    ?>
                    <img class="rounded-circle"
                      src="img/shop/account/tid-<?php echo $account_tid ?>.<?php echo $account_ext_file ?>" alt="Name">
                    <?php
                  }
                  ?>
                  
                  
                  </div>
                <div class="ps-md-3">
                  <h3 class="fs-base mb-0">
                    <?php echo $account_fname . ' ' . $account_lname ?>
                  </h3><span class="text-accent fs-xs">
                    <?php echo $account_email ?>
                  </span>
                </div>
              </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu"
                data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
            </div>
            <div class="d-lg-block collapse" id="account-menu">
              <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
              </div>
              <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="account-orders.php"><i class="ci-bag opacity-60 me-2"></i>Orders<span
                      class="fs-sm text-muted ms-auto"></span></a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="account-wishlist.php"><i class="ci-heart opacity-60 me-2"></i>Wishlist<span
                      class="fs-sm text-muted ms-auto"></span></a></li>
                <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="#"><i class="ci-help opacity-60 me-2"></i>Support tickets<span
                      class="fs-sm text-muted ms-auto"></span></a></li>
              </ul>
              <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
              </div>
              <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="account-profile.php"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active"
                    href="account-address.php"><i class="ci-location opacity-60 me-2"></i>Addresses</a></li>
                <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="account-payment.php"><i class="ci-card opacity-60 me-2"></i>Payment methods</a></li> -->
                <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="session-logout.php"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li>
              </ul>
            </div>
          </div>
        </aside>


        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
            <h6 class="fs-base text-light mb-0">Your registered address:</h6><a class="btn btn-primary btn-sm"
              href="session-logout.php"><i class="ci-sign-out me-2"></i>Sign out</a>
          </div>
          <!-- Addresses list-->

          <form action="user-ctrl.php?key1=address_update&pk=<?php echo $customer_id; ?>" method="post">

            <div class="row gx-4 gy-3">

              <div class="col-sm-6">
                <label class="form-label" for="address-company">Door No</label>
                <input class="form-control" type="text" id="address-company" name="door_no"
                  value='<?php echo $account_door_no; ?>'>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="address-fn">Street</label>
                <input class="form-control" type="text" id="address-fn" name="street"
                  value='<?php echo $account_street; ?>' required>
                <!-- <div class="invalid-feedback">Please fill in you first name!</div> -->
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="address-ln">City</label>
                <input class="form-control" type="text" id="address-ln" name="city" value='<?php echo $account_city; ?>'
                  required>
                <!-- <div class="invalid-feedback">Please fill in you last name!</div> -->
              </div>

              <!-- <div class="col-sm-6">
                <label class="form-label" for="address-country">Country</label>
                <select class="form-select" id="address-country" required>
                  <option value>Select country</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Belgium">Belgium</option>
                  <option value="France">France</option>
                  <option value="Germany">Germany</option>
                  <option value="Spain">Spain</option>
                  <option value="UK">United Kingdom</option>
                  <option value="USA">USA</option>
                </select>
                <div class="invalid-feedback">Please select your country!</div>
              </div> -->
              <div class="col-sm-6">
                <label class="form-label" for="address-city">State</label>
                <input class="form-control" type="text" id="address-city" name="state"
                  value='<?php echo $account_state; ?>' required>
                <!-- <div class="invalid-feedback">Please fill in your city!</div> -->
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="address-line1">Country</label>
                <input class="form-control" type="text" id="address-line1" name="country"
                  value='<?php echo $account_country; ?>' required>
                <!-- <div class="invalid-feedback">Please fill in your address!</div> -->
              </div>

              <div class="col-sm-6">
                <label class="form-label" for="address-zip">ZIP code</label>
                <input class="form-control" type="text" id="address-zip" name="zip_code"
                  value='<?php echo $account_pin_code; ?>' required>
                <!-- <div class="invalid-feedback">Please add your ZIP code!</div> -->
              </div>
              <!-- <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="address-primary">
                  <label class="form-check-label" for="address-primary">Make this address primary</label>
                </div>
              </div> -->
            </div>

            <div class="modal-footer mt-3">
              <button class="btn btn-primary btn-shadow" type="submit">Add address</button>
            </div>

          </form>

        </section>


      </div>
    </div>
  </main>
  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


<script>
  var tokenid = "<?php echo session_id(); ?>";

  var myParamKey1 = getUrlParameter("key1");

  if (myParamKey1 == "updateSuccess") {

    Swal.fire({
      icon: 'success',
      title: 'Cool...',
      text: 'Address Updated Successfully!!!',
      confirmButtonColor: 'green'
    });



    var url = window.location.href;

    // Remove the parameters by creating a new URL without them
    var updatedURL = url
      .replace(/([?&])key1=.*?(&|$)/, '$1')
      .replace(/(&|\?)$/, '');

    // Replace the current URL with the updated one
    window.history.replaceState({}, document.title, updatedURL);

  }

</script>

</html>