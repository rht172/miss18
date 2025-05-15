<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';


$obj_class_customer = new czDBAccess();

$obj_class_customer->varTableName = 'customer_table';


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

// $customer_id = $_SESSION['tid'];
if (isset($_SESSION['tid'])) {
  $customer_id = $_SESSION['tid'];
} else {
  $customer_id = '';
}

$result = $obj_class_customer->selectData_customqry("SELECT * from customer_table where tid = '$customer_id';");

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
    <!-- Navbar 3 Level (Light)-->
    <?php
    include 'includes/header.php';
    ?>

    <!-- Page Title-->
    <div class="page-title-overlap bg-secondary pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb  flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="account-profile.php">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Wishlist</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 text-light mb-0">My wishlist</h1>
        </div>
      </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
          <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
            <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
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
                    id='wish_to_order' onclick="go_to_login ()"><i class="ci-bag opacity-60 me-2"></i>Orders<span
                      class="fs-sm text-muted ms-auto"></span></a></li>
                <!-- <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active"
                    href="account-wishlist.php"><i class="ci-heart opacity-60 me-2"></i>Wishlist<span
                      class="fs-sm text-muted ms-auto"></span></a></li> -->
                <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="#"><i class="ci-help opacity-60 me-2"></i>Support tickets<span
                      class="fs-sm text-muted ms-auto"></span></a></li>
              </ul>
              <div class="bg-secondary px-4 py-3">
                <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
              </div>
              <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                id='wish_to_profile' onclick="go_to_login ()"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                id='wish_to_address' onclick="go_to_login ()"><i class="ci-location opacity-60 me-2"></i>Address</a></li>
                <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="account-payment.php"><i class="ci-card opacity-60 me-2"></i>Payment methods</a></li> -->
                <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                    href="session-logout.php"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li>
              </ul>
            </div>
          </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8" id="product-list">
          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
            <h6 class="fs-base text-light mb-0">List of items you added to wishlist:</h6><a
              class="btn btn-dark btn-sm" href="session-logout.php"><i class="ci-sign-out me-2"></i>Sign out</a>
          </div>
          <!-- Wishlist-->



          <!-- <div class="d-sm-flex justify-content-between my-4 pb-3 pb-sm-2 border-bottom">
            <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a
                class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html" style="width: 10rem;"><img
                  src="img/shop/cart/03.jpg" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Brand:</span>The North Face</div>
                <div class="fs-sm"><span class="text-muted me-2">Color:</span>Pink / Beige / Dark blue</div>
                <div class="fs-lg text-accent pt-2">$22.<small>50</small></div>
              </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
              <button class="btn btn-outline-danger btn-sm" type="button"><i class="ci-trash me-2"></i>Remove</button>
            </div>
          </div>

          <div class="d-sm-flex justify-content-between mt-4">
            <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a
                class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html" style="width: 10rem;"><img
                  src="img/shop/cart/04.jpg" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Size:</span>42</div>
                <div class="fs-sm"><span class="text-muted me-2">Color:</span>Light blue</div>
                <div class="fs-lg text-accent pt-2">$9.<small>00</small></div>
              </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
              <button class="btn btn-outline-danger btn-sm" type="button"><i class="ci-trash me-2"></i>Remove</button>
            </div>
          </div> -->



        </section>
      </div>
    </div>
  </main>


  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>

<script>

  var tokenid = "<?php echo session_id(); ?>";

  $(document).ready(function () {
    var storedJsonString = localStorage.getItem("wishlist");

    if (storedJsonString != null) {
      var storedArray = JSON.parse(storedJsonString);

      // Loop through storedArray
      for (let i = 0; i < storedArray.length; i++) {
        (function (i) { // Using a closure to capture the value of i
          var cart = storedArray[i];
          var sku = cart.sku;
          var qty = cart.qty;
          var rate = cart.rate;
          var size = cart.size;

          var xhr_8 = new XMLHttpRequest();
          // Set up the API call
          xhr_8.open("GET", 'api-call.php?type=get_sku_details&sku=' + sku + '&tkn=' + tokenid, true);

          // Handle the response from the API
          xhr_8.onreadystatechange = function () {
            if (xhr_8.readyState === 4 && xhr_8.status === 200) {
              var data = JSON.parse(xhr_8.responseText);
              data.forEach(function (row) {
                var tid = row.tid;
                var ext_file_1 = row.ext_file_1;
                var size = row.size;
                var colour = row.colour;
                var row_tot = Number(qty) * Number(rate);

                // Create HTML content for the product item
                var productHTML = `
                <div class="d-sm-flex justify-content-between my-4 pb-3 pb-sm-2 border-bottom product-div">
            <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a
                class="d-block flex-shrink-0 mx-auto me-sm-4" href="product-page.php?key1=${row.tid}&sku=${row.sku}" style="width: 10rem;"><img
                  src="cz-admin/attachments/product/product_thumb/tid-${tid}.${ext_file_1}" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="product-page.php?key1=${row.tid}&sku=${row.sku}" class='sku_cart'>${sku}</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Variant/Size:</span>${size}</div>
                <div class="fs-sm"><span class="text-muted me-2">Color/Type:</span>${colour}</div>
                <div class="fs-lg text-accent pt-2">${rate}</div>
              </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
              <button class="btn btn-outline-danger btn-sm" type="button" id="btn-row-remove"><i class="ci-trash me-2"></i>Remove</button>
            </div>
          </div>
            `;




                // Append the product HTML to the product-list element
                document.getElementById('product-list').insertAdjacentHTML('beforeend', productHTML);
              });
            }
          };
          xhr_8.send();
        })(i); // Pass i to the closure
      }
    }
  });




  $("body").on("click", "#btn-row-remove", function () {
    $(this).closest(".product-div").remove();
    sku_cart = $(this).closest('.product-div').find('.sku_cart').html();
    // console.log(sku_cart);

    // Retrieve the stored cart items from localStorage
    var storedJsonString = localStorage.getItem("wishlist");

    if (storedJsonString != null) {
      // Parse the stored JSON string to get the array of cart items
      var storedArray = JSON.parse(storedJsonString);

      // Find the index of the cart item to remove based on its SKU
      var existingIndex = storedArray.findIndex(function (obj) {
        return obj.sku === sku_cart;
      });

      // Check if the cart item with the specified SKU exists
      if (existingIndex !== -1) {
        // Remove the cart item from the array using splice
        storedArray.splice(existingIndex, 1);

        // Update the localStorage with the modified array
        localStorage.setItem("wishlist", JSON.stringify(storedArray));
      }


      // console.log(JSON.parse(localStorage.getItem("added_cart")));
      added_cart = JSON.parse(localStorage.getItem("wishlist"));
      // console.log(added_cart);

      if (added_cart) {
        $('.cart_qty_cls').html(added_cart.length);
      } else {
        $('.cart_qty_cls').html(0);
      }
    }

  });






    function go_to_login() {

      var cus_id = "<?php echo $customer_id ?>";

      if (cus_id.length > 0) {
        $("#wish_to_order").attr("href", "account-orders.php");
        $("#wish_to_profile").attr("href", "account-profile.php");
        $("#wish_to_address").attr("href", "account-address.php");
      } else {
        var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

    // Trigger the modal
    signInModal.show();
      }

}








</script>

</html>