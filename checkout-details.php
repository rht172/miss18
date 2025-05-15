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
              <li class="breadcrumb-item text-nowrap"><a href="product-category.php">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 text-light mb-0">Checkout</h1>
        </div>
      </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <section class="col-lg-8">
          <!-- Steps-->
          <div class="steps steps-dark pt-2 pb-3 mb-5"><a class="step-item active" href="#">
              <div class="step-progress"><span class="step-count">1</span></div>
              <div class="step-label"><i class="ci-cart"></i>Cart</div>
            </a>
            <a class="step-item active current" href="#">
              <div class="step-progress"><span class="step-count">2</span></div>
              <div class="step-label"><i class="ci-user-circle"></i>Details</div>
            </a>
            <!-- <a class="step-item" href="checkout-shipping.html">
              <div class="step-progress"><span class="step-count">3</span></div>
              <div class="step-label"><i class="ci-package"></i>Shipping</div>
            </a> -->
            <!-- <a class="step-item" href="checkout-payment.php">
              <div class="step-progress"><span class="step-count">4</span></div>
              <div class="step-label"><i class="ci-card"></i>Payment</div>
            </a> -->
            <a class="step-item" href="#">
              <div class="step-progress"><span class="step-count">3</span></div>
              <div class="step-label"><i class="ci-check-circle"></i>Review</div>
            </a>
          </div>
          <!-- Autor info-->
          <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
            <div class="d-flex align-items-center">
              <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><img class="rounded-circle"
                  src="img/shop/account/tid-<?php echo $account_tid ?>.<?php echo $account_ext_file ?>" width="90">
              </div>
              <div class="ps-3">
                <h3 class="fs-base mb-0">
                  <?php echo $account_fname ?>
                  <?php echo $account_lname ?>
                </h3><span class="text-accent fs-sm">
                  <?php echo $account_email ?>
                </span>
              </div>
            </div>
          </div>
          <!-- Shipping address-->
          <form action="user-ctrl.php?key1=checkout_update&pk=<?php echo $customer_id; ?>" method="post">
            <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-fn">First Name</label>
                  <input class="form-control" type="text" id="checkout-fn" name="account_fname"
                    value="<?php echo $account_fname ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-ln">Last Name</label>
                  <input class="form-control" type="text" id="checkout-ln" name="account_lname"
                    value="<?php echo $account_lname ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-email">E-mail Address</label>
                  <input class="form-control" type="email" id="checkout-email" name="account_email"
                    value="<?php echo $account_email ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-phone">Phone Number</label>
                  <input class="form-control" type="text" id="checkout-phone" name="account_phone_number"
                    value="<?php echo $account_phone_number ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-company">Door No</label>
                  <input class="form-control" type="text" id="checkout-company" name="account_door_no"
                    value='<?php echo $account_door_no; ?>' required>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-street">Street</label>
                  <input class="form-control" type="text" id="checkout-street" name="account_street"
                    value='<?php echo $account_street; ?>' required>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-city">City</label>
                  <input class="form-control" type="text" id="checkout-city" name="account_city"
                    value='<?php echo $account_city; ?>' required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-zip">State</label>
                  <input class="form-control" type="text" id="checkout-zip" name="account_state"
                    value='<?php echo $account_state; ?>' required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-address-1">Country</label>
                  <input class="form-control" type="text" id="checkout-address-1" name="account_country"
                    value='<?php echo $account_country; ?>' required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label class="form-label" for="checkout-address-2">ZIP</label>
                  <input class="form-control" type="text" id="checkout-address-2" name="account_pin_code"
                    value='<?php echo $account_pin_code; ?>' required>
                </div>
              </div>
            </div>
            <!-- <h6 class="mb-3 py-3 border-bottom">Billing address</h6>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" checked id="same-address">
              <label class="form-check-label" for="same-address">Same as shipping address</label>
            </div> -->
            <!-- Navigation (desktop)-->
            <div class="d-none d-lg-flex pt-4 mt-3">
              <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.php"><i
                    class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span
                    class="d-inline d-sm-none">Back</span></a></div>
              <div class="w-50 ps-2"><button type='submit' class="btn btn-primary d-block w-100"
                  href="checkout-payment.php"><span class="d-none d-sm-inline">Proceed to Payment</span><span
                    class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
            </div>
          </form>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
          <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
            <div class="py-2 px-xl-2">
              <div class="widget mb-3 " id="product-list">
                <h2 class="widget-title text-center">Order summary</h2>
              </div>
              <ul class="list-unstyled fs-sm pb-2 border-bottom">
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span
                    class="text-end">₹<span class="sub-total"></span></span></li>
                <!-- <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span
                    class="text-end">—</span></li> -->
                <!-- <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span class="text-end">₹9.<small>50</small></span></li> -->
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span
                    class="text-end">₹<span class="discount"></span></span></li>
              </ul>
              <h3 class="fw-normal text-center my-4">₹<span class="whole-total"></span></h3>
              <!-- <form class="needs-validation" method="post" novalidate>
                <div class="mb-3">
                  <input class="form-control" type="text" placeholder="Promo code" required>
                  <div class="invalid-feedback">Please provide promo code.</div>
                </div>
                <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo code</button>
              </form> -->
            </div>
          </div>
        </aside>
      </div>
      <!-- Navigation (mobile)-->
      <div class="row d-lg-none">
        <div class="col-lg-8">
          <div class="d-flex pt-4 mt-3">
            <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i
                  class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span
                  class="d-inline d-sm-none">Back</span></a></div>
            <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-payment.php"><span
                  class="d-none d-sm-inline">Proceed to Payment</span><span class="d-inline d-sm-none">Next</span><i
                  class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


</html>



<script>
  var tokenid = '<?php echo session_id(); ?>'

  var storedJsonString = localStorage.getItem("added_cart");

  if (storedJsonString != null) {
    var storedArray = JSON.parse(storedJsonString);

    var tot_discount = 0;
    // Loop through storedArray
    for (let i = 0; i < storedArray.length; i++) {
      (function (i) { // Using a closure to capture the value of i
        var cart = storedArray[i];
        var sku = cart.sku;
        var qty = cart.qty;
        var rate = cart.rate;
        var size = cart.size;
        var subscribe = cart.subscribe;

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
              var selling_price = row.selling_price;
              var sub_save_1 = row.sub_save_1;
              var sub_save_2 = row.sub_save_2;
              var sub_save_3 = row.sub_save_3;
              if (subscribe > 0) {
                var row_tot = ((Number(qty) * Number(subscribe)) * Number(rate));
              } else {
                var row_tot = (Number(qty) * Number(rate));
              }
              if (subscribe == 3) {
                var discount = ((sub_save_1 / 100) * row_tot);
                tot_discount += discount;
              } else if (subscribe == 6) {
                var discount = ((sub_save_2 / 100) * row_tot);
                tot_discount += discount;
              } else if (subscribe == 12) {
                var discount = ((sub_save_3 / 100) * row_tot);
                tot_discount += discount;
              }

              // Create HTML content for the product item
              var productHTML = `
                <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="product-page.php?key1=${tid}&sku=${sku}"><img src="cz-admin/attachments/product/product_thumb/tid-${tid}.${ext_file_1}" width="80" alt="Product"></a>
                    <div class="ps-2">
                      <h6 class="widget-product-title"><a href="product-page.php?key1=${tid}&sku=${sku}" class='sku_cart'>${sku}</a></h6>
                      <div class="widget-product-meta"><span class="text-accent me-2">₹<span class='sell_price'>${selling_price}</span></span><span class="text-muted">x <span class='quantity'>${qty}</span>${subscribe > 0 ? `<span class='quantity'>&nbsp;&times;&nbsp;${subscribe}&nbsp;Month</span>` : ''}</span></div>
                      <span class='row-tot d-none'>${row_tot}</span>
                    </div>
                  </div>`;

              // Append the product HTML to the product-list element
              document.getElementById('product-list').insertAdjacentHTML('beforeend', productHTML);
            });


            var subTotal = 0;

            $('.row-tot').each(function () {
              // console.log(Number($(this).html()));
              subTotal = subTotal + Number($(this).html());
            });
            // console.log(subTotal);

            $('.sub-total').html(subTotal.toFixed());
            $('.discount').html(tot_discount.toFixed());
            var whole_discount = subTotal - tot_discount;
            $('.whole-total').html(whole_discount.toFixed());
          }
        };
        xhr_8.send();
      })(i); // Pass i to the closure
    }
  }

  // $(document).ready(function () {
  //   var currentUrl = window.location.href;
  //   var cus002_id = "<?php //echo $customer_id; ?>";
  //   let captcha = "";

  //   $('#checkout-fn,#checkout-ln,#checkout-email,#checkout-phone,#checkout-company,#checkout-street,#checkout-city,#checkout-zip,#checkout-address-1,#checkout-address-2').on('click', function () {

  //   if (currentUrl.includes('checkout-details.php') && cus002_id.length === 0) {
  //     var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

  //     // Trigger the modal
  //     signInModal.show();
  //   }

  //   });

  // });



</script>