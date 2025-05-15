<!DOCTYPE html>
<html lang="en">


<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
include('config.php');


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
$account_reward_points = "";

if (isset($_SESSION['tid'])) {
  $customer_id = $_SESSION['tid'];
} else {
  $customer_id = '';

}

if (strlen($customer_id) == 0) {
  header("Location: checkout-details.php");
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
  $account_reward_points = $row['reward_points'];
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
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
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
          <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.php">
              <div class="step-progress"><span class="step-count">1</span></div>
              <div class="step-label"><i class="ci-cart"></i>Cart</div>
            </a>
            <a class="step-item active" href="checkout-details.php">
              <div class="step-progress"><span class="step-count">2</span></div>
              <div class="step-label"><i class="ci-user-circle"></i>Details</div>
            </a>
            <!-- <a class="step-item active" href="checkout-shipping.php">
              <div class="step-progress"><span class="step-count">3</span></div>
              <div class="step-label"><i class="ci-package"></i>Shipping</div>
            </a>
            <a class="step-item active" href="checkout-payment.php">
              <div class="step-progress"><span class="step-count">4</span></div>
              <div class="step-label"><i class="ci-card"></i>Payment</div>
            </a> -->
            <a class="step-item active current" href="checkout-review.php">
              <div class="step-progress"><span class="step-count">3</span></div>
              <div class="step-label"><i class="ci-check-circle"></i>Review</div>
            </a>
          </div>
          <!-- Order details-->
          <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>
          <!-- Item-->
          <div id="product-div">

          </div>

          <!-- Client details-->
          <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
            <div class="row">
              <div class="col-sm-6">
                <h4 class="h6">Shipping to:</h4>
                <ul class="list-unstyled fs-sm">
                  <li><span class="text-muted">Client:&nbsp;</span>
                    <?php echo $account_fname . ' ' . $account_lname ?>
                  </li>
                  <li><span class="text-muted">Address:&nbsp;</span>
                    <?php echo $account_door_no . ',' . $account_street . ',' . $account_city . ',' . $account_state . ',' . $account_country ?>
                  </li>
                  <li><span class="text-muted">Phone:&nbsp;</span>
                    <?php echo $account_phone_number ?>
                  </li>
                </ul>
              </div>
              <?php

              // // Receiving page (otherpage.php in this case)
              // if (isset($_GET['epyt'])) {
              //   $receivedWord = $_GET['epyt'];
              // } else {
              //   header("Location: checkout-payment.php");
              //   exit();
              // }
              
              // Output: "example"
              ?>
              <div class="col-sm-6">
                <h4 class="h6">Payment method:</h4>
                <ul class="list-unstyled fs-sm">
                  <li><span class="text-muted">Payment Method:&nbsp;</span><span id="payment_type">
                      <?php echo 'razorpay'; ?>
                    </span></li>
                </ul>

              </div>
            </div>
          </div>
          <!-- Navigation (desktop)-->
          <div class="d-none d-lg-flex pt-4">
            <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-details.php"><i
                  class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span
                  class="d-inline d-sm-none">Back</span></a></div>


            <?php //if ($receivedWord == "razorpay") {                     ?>

            <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100 rzp-button1"><span
                  class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i
                  class="ci-arrow-right mt-sm-0 ms-1"></i></a>
            </div>

            <?php //} else {                     ?>

            <!-- <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100 place-order"><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
              </div> -->

            <?php //}                     ?>


          </div>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
          <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
            <div class="py-2 px-xl-2">
              <h2 class="h6 text-center mb-4">Order summary</h2>
              <ul class="list-unstyled fs-sm pb-2 border-bottom">
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span
                    class="text-end">₹<span class="sub-total"></span></span></li>
                <!-- <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span class="text-end">₹9.<small>50</small></span></li> -->
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span
                    class="text-end">₹<span class="discount">0</span></span></li>
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Promo Code:</span><span
                    class="text-end">₹<span class="promocode">0</span></span></li>
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span
                    class="text-end">₹<span class="shipping-charge">0</span></span></li>
              </ul>
              <div class="mb-3" id="shippingType">
                <p><span class="fw-medium">Shipping Type</span></p>
              </div>
              <div class="accordion-body" id='reward_points_div'>
                <p>You currently have<span class="fw-medium">&nbsp;
                    <?php echo $account_reward_points; ?>
                  </span>&nbsp;Reward Points to spend.</p>
                <div class="form-check d-block">
                  <input class="form-check-input" type="checkbox" id="use_points"
                    value="<?php echo $account_reward_points; ?>">
                  <label class="form-check-label" for="use_points">Use my Reward Points to pay for this order.</label>
                </div>
              </div>
              <h3 class="fw-normal text-center my-4">₹<span class="whole-total"></span></h3>
              <!-- <form class="needs-validation" method="post" novalidate> -->
              <div class="mb-3">
                <input class="form-control promo-code" type="text" placeholder="Promo code" required>
                <div class="invalid-feedback">Please provide promo code.</div>
              </div>
              <button class="btn btn-outline-primary d-block w-100 apply-promo-code">Apply promo code</button>
              <!-- </form> -->
            </div>
          </div>
        </aside>
      </div>
      <!-- Navigation (mobile)-->
      <div class="row d-lg-none">
        <div class="col-lg-8">
          <div class="d-flex pt-4 mt-3">
            <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-details.php"><i
                  class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span
                  class="d-inline d-sm-none">Back</span></a></div>


            <?php //if ($receivedWord == "razorpay") {                     ?>

            <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100 rzp-button1"><span
                  class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i
                  class="ci-arrow-right mt-sm-0 ms-1"></i></a>
            </div>


            <?php //} else {                     ?>

            <!-- <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100 place-order"><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
              </div> -->

            <?php //}                     ?>


          </div>
        </div>
      </div>
    </div>
  </main>



  <!-- Footer-->
  <?php include 'includes/footer.php' ?>



</body>

</html>




<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var tokenid = '<?php echo session_id(); ?>'

  let t_d = 0;
  let g_t_v = 0;
  let g_d = 0;

  let shipping_charge = 0;
  let promo_discount = 0;
  let tot_weight = 0;
  let mul_qty = 0;
  let tot_mul_qty = 0;

  var storedJsonString = localStorage.getItem("added_cart");

  if (storedJsonString != null) {
    var storedArray = JSON.parse(storedJsonString);
    console.log(storedArray);
    var tot_discount = 0;


    tot_weight = 0;

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
            console.log(data);
            data.forEach(function (row) {
              var tid = row.tid;
              var ext_file_1 = row.ext_file_1;
              var size = row.size;
              var colour = row.colour;
              var selling_price = row.selling_price;

              var weight = row.weight;
              tot_weight += Number(weight);

              if (subscribe == 3) {
                mul_qty = Number(qty) * Number(subscribe);
                tot_mul_qty += mul_qty * weight;
                // console.log(tot_mul_qty);

              } else if (subscribe == 6) {
                mul_qty = Number(qty) * Number(subscribe);
                tot_mul_qty += mul_qty * weight;
                // console.log(tot_mul_qty);

              } else if (subscribe == 12) {
                mul_qty = Number(qty) * Number(subscribe);
                tot_mul_qty += mul_qty * weight;

              }



              if (mul_qty > 0) {
                var row_tot = Number(mul_qty) * Number(selling_price);
              } else {
                var row_tot = Number(qty) * Number(selling_price);
              }


              var sub_save_1 = row.sub_save_1;
              var sub_save_2 = row.sub_save_2;
              var sub_save_3 = row.sub_save_3;
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
              <div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
            <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4"
                href="product-page.php?key1=${tid}&sku=${sku}"><img src="cz-admin/attachments/product/product_thumb/tid-${tid}.${ext_file_1}" width="160" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="product-page.php?key1=${tid}&sku=${sku}"class='sku_cart'>${sku}</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Size:</span><span>${size}</span></div>
                <div class="fs-sm"><span class="text-muted me-2">Color:</span><span>${colour}</span></div>
                <div class="fs-lg text-accent pt-2">₹<span class='sell_price'>${selling_price}</span></div>
              </div>
            </div>
            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
              <p class="mb-0"><span class="text-muted fs-sm">Quantity:</span><span>&nbsp;<span class='quantity'>${qty}</span>${subscribe.length > 0 ? `<span class='quantity'>&nbsp;&times;&nbsp;${subscribe}&nbsp;Month</span>` : ''}</span></p>
            </div>
            <span class='row-tot d-none'>${row_tot}</span>
          </div>`;

              // Append the product HTML to the product-list element
              document.getElementById('product-div').insertAdjacentHTML('beforeend', productHTML);
            });


            var subTotal = 0;

            $('.row-tot').each(function () {
              // console.log(Number($(this).html()));
              subTotal = subTotal + Number($(this).html());
            });
            // console.log(subTotal);

            <?php

            if ($account_state == 'Tamil Nadu') {
              $ship_charge = 50;
            } else {
              $ship_charge = 99;
            }

            ?>

            // console.log(storedArray.length);
            if (i == storedArray.length - 1) {
              console.log(storedArray.length);

              var subTotal = 0;

              $('.row-tot').each(function () {
                // console.log(Number($(this).html()));
                subTotal = subTotal + Number($(this).html());
              });
              // console.log(subTotal);

              if (subTotal >= 1500) {
                // $('#free_ship').prop('checked', true);
                // $('.normal').addClass('d-none');
                $('.shipping-charge').html(0);
                // console.log("jkvjkn");

                var shipTypeHTML = `<div class="form-check d-block free_ship">
              <input class="form-check-input free_ship" type="radio" id="free_ship" name="ship_type" value="0" checked>
              <label class="form-check-label free_ship" for="free_ship">Free Shipping</label>
            </div>
            <div class="form-check d-block">
              <input class="form-check-input" type="radio" id="express" name="ship_type" value="200">
              <label class="form-check-label" for="express">Express</label>
            </div>`;

              } else if (subTotal < 1500) {
                // $('#normal').prop('checked', true);
                // $('.free_ship').addClass('d-none');
                // console.log("hiiiiiii");

                var shipTypeHTML = `
            <div class="form-check d-block normal">
              <input class="form-check-input normal" type="radio" id="normal" name="ship_type" value="<?php echo $ship_charge ?>" checked>
              <label class="form-check-label normal" for="normal">Normal</label>
            </div>
            <div class="form-check d-block">
              <input class="form-check-input" type="radio" id="express" name="ship_type" value="200">
              <label class="form-check-label" for="express">Express</label>
            </div>`;

              }

              // Append the product HTML to the product-list element
              document.getElementById('shippingType').insertAdjacentHTML('beforeend', shipTypeHTML);



              // Append the product HTML to the product-list element
              // document.getElementById('shippingType').insertAdjacentHTML('beforeend', shipTypeHTML);

              // Get the selected radio button value
              var selectedValue = document.querySelector('input[name="ship_type"]:checked');
              ship_type = selectedValue.value;
              shipping_charge = tot_mul_qty * ship_type;
              $('.shipping-charge').html(shipping_charge.toFixed());

              $('.sub-total').html(subTotal.toFixed());
              $('.discount').html(tot_discount.toFixed());
              var whole_discount = (subTotal - tot_discount) + shipping_charge;

              // console.log(tot_discount);
              g_d = tot_discount;
              // console.log(g_d);
              // console.log(tot_discount);
              $('.whole-total').html(whole_discount.toFixed(0));
              t_d = tot_discount.toFixed(0);
              g_t_v = whole_discount.toFixed(0);

              var reward_points = $('#use_points').val();
              if (subTotal < reward_points) {
                $("#reward_points_div").addClass("d-none");
              } else {
                $("#reward_points_div").removeClass("d-none"); // Optional: Remove class if condition not met
              }
            }
          }
        };
        xhr_8.send();
      })(i); // Pass i to the closure
    }




  }


  $("body").on("click", ".apply-promo-code", function () {

    var promo_code = $('.promo-code').val();
    // Make an AJAX request to fetch the data
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'api-call.php?promo_code=' + promo_code + '&type=check_promo_code' + '&tkn=' + tokenid, false);

    xhr.onload = function () {
      if (xhr.status === 200) {
        var percent = xhr.responseText;


        var subTotal = 0;

        $('.row-tot').each(function () {
          // console.log(Number($(this).html()));
          subTotal = subTotal + Number($(this).html());
        });


        if (percent == 0) {
          Swal.fire({
            icon: 'warning',
            title: 'Ooops..!',
            text: 'This Promo Code Is Invalid!',
            confirmButtonColor: '#3085d6',
          }).then((result) => {
            if (result.isConfirmed) {

            }
          });
        } else if (percent > 0) {
          promo_discount = (subTotal * percent) / 100;
          $('.promocode').html(promo_discount.toFixed(0));
          g_d += promo_discount.toFixed(0);


          // console.log(g_d);

          // console.log(t_d);
          // Subtract 5% from the original amount
          var newAmount = (subTotal - promo_discount - t_d) + shipping_charge;
          $('.whole-total').html(newAmount.toFixed(0));
          g_t_v = newAmount.toFixed(0);

          // console.log(g_t_v);
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Ooops..!',
            text: 'This Promo Code Is Invalid!',
            confirmButtonColor: '#3085d6',
          }).then((result) => {
            if (result.isConfirmed) {

            }
          });
        }
      }
    }
    xhr.send();
  });


  $("body").on("click", ".place-order", function () {

    // console.log(g_t_v);
    // console.log(g_d);

    ship_fee = '';
    var payment_type = $('#payment_type').html().trim();
    // var fname = $('#fname').val();
    // var lname = $('#lname').val();
    // var phone_number = $('#phone_number').val();
    // var email = $('#email').val();
    // var address = $('#address').val();
    // var town_city = $('#town_city').val();
    // var state = $('#state').val();
    // var postal_code = $('#postal_code').val();
    // var country = $('#country').val();
    // var ship_fee = Number(document.getElementById('shipping').innerHTML.trim());









    // Make an AJAX request to fetch the data
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'api-call.php?shipping_fee=' + ship_fee + '&checked_value=' + payment_type + '&g_t_v=' + g_t_v + '&g_d=' + g_d + '&reward_points=' + reward_points_1 + '&type=place_order' + '&tkn=' + tokenid, false);

    xhr.onload = function () {
      if (xhr.status === 200) {

        var insertId = xhr.responseText;
        // console.log(insertId);

        if (insertId == "failure") {

          alert("Please Select the Payment Option");

        } else {

          if (insertId > 0) {
            // Retrieving and parsing the array of objects
            var storedJsonString = localStorage.getItem("added_cart");

            if (storedJsonString != null) {
              var storedArray = JSON.parse(storedJsonString);

              for (let i = 0; i < added_cart.length; i++) {
                var cart = added_cart[i];
                sku = cart.sku;
                qty = cart.qty;


                main_id_fk = insertId;

                // Make an AJAX request to fetch the data
                var xhr_1 = new XMLHttpRequest();
                xhr_1.open('GET', 'api-call.php?sku=' + sku + '&qty=' + qty + '&main_id_fk=' + main_id_fk + '&type=place_order_2' +
                  '&tkn=' + tokenid, false);

                xhr_1.onload = function () {
                  if (xhr_1.status === 200) {
                    var data_1 = JSON.parse(xhr_1.responseText);

                    if (data_1 > 0) {
                      Swal.fire({
                        icon: 'success',
                        title: 'Cool...',
                        text: 'Order Placed Successfully!',
                        confirmButtonColor: '#3085d6',
                      }).then((result) => {
                        if (result.isConfirmed) {
                          // Clear "add to cart" data from local storage
                          localStorage.removeItem('added_cart');
                          // Redirect to another page
                          window.location.href = 'index.php';
                        }
                      });
                    }
                  }
                }
                xhr_1.send();
              }
            }
          }
        }
      }
    };
    xhr.send();

    // else if (selectedPaymentMethod == "upi") {
    //     var total = document.getElementById('sub-total3').innerHTML.trim();
    //     var ship_fee = document.getElementById('shipping').innerHTML.trim();
    //     total = total.replace(/₹/g, '');

    //     // var encryptedTotal = CryptoJS.AES.encrypt(total, 'encryption_key').toString();
    //     // var encryptedShipFee = CryptoJS.AES.encrypt(ship_fee, 'encryption_key').toString();

    //     window.location.href = "fund-checkout.php?total=" + total + "&shipping_fee=" + ship_fee;
    // }
  });




  $(document).ready(function () {
    // Add change event listener to the checkbox
    $("#use_points").change(function () {
      // Check if the checkbox is checked
      if ($(this).prop("checked")) {

        var reward_points = $('#use_points').val();
        var after_points_discount = Number(t_d) + Number(reward_points);
        t_d = after_points_discount;
        $('.discount').html(after_points_discount.toFixed(0));

        // console.log(t_d);
        // console.log(g_t_v);
        var wt_after_points_discount = Number(g_t_v) - Number(reward_points);
        $('.whole-total').html(wt_after_points_discount.toFixed(0));
        g_t_v = wt_after_points_discount;
        // console.log(g_t_v);



      } else {

        var reward_points = $('#use_points').val();
        var points_discount_minus = Number(t_d) - Number(reward_points);
        t_d = points_discount_minus;
        $('.discount').html(points_discount_minus.toFixed(0));
        // console.log(t_d);

        var wt_after_points_discount_minus = Number(g_t_v) + Number(reward_points);
        $('.whole-total').html(wt_after_points_discount_minus.toFixed(0));
        g_t_v = wt_after_points_discount_minus;
        // console.log(g_t_v);
      }
    });


  });

let razor_pay_amt = 0;

  $(document).ready(function () {
    $('.rzp-button1').click(function (e) {

      var key_id = "<?php echo $keyId; ?>"


      ship_fee = '';
      var payment_type = $('#payment_type').html().trim();
      var promo_code = $('.promo-code').val();
      // var fname = $('#fname').val();
      // var lname = $('#lname').val();
      // var phone_number = $('#phone_number').val();
      // var email = $('#email').val();
      // var address = $('#address').val();
      // var town_city = $('#town_city').val();
      // var state = $('#state').val();
      // var postal_code = $('#postal_code').val();
      // var country = $('#country').val();
      // var ship_fee = Number(document.getElementById('shipping').innerHTML.trim());



      //           // Get the checkbox element
      //     var usePointsCheckbox = document.getElementById("use_points");

      // // Check if the checkbox is checked
      // if (usePointsCheckbox.checked) {
      //   // The checkbox is checked
      //   var reward_points = $('#use_points').val();

      // } else {
      //   // The checkbox is not checked
      //   var reward_points = 0;
      // }



      var usePointsCheckbox = document.getElementById("use_points");


      if (usePointsCheckbox.checked) {
        var reward_points_1 = $('#use_points').val();
      } else {
        var reward_points_1 = 0;
      }

// console.log(g_t_v);

      // Make an AJAX request to fetch the data
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'api-call.php?shipping_fee=' + ship_fee + '&checked_value=' + payment_type + '&g_t_v=' + g_t_v + '&promo_code=' + promo_code + '&g_d=' + g_d + '&reward_points=' + reward_points_1 + '&type=place_order' + '&tkn=' + tokenid, false);


      xhr.onload = function () {
        if (xhr.status === 200) {

          var insertId = xhr.responseText;
          // console.log(insertId);

          if (insertId == "failure") {

            alert("Please Select the Payment Option");

          } else {

            if (insertId > 0) {
              // Retrieving and parsing the array of objects
              var storedJsonString = localStorage.getItem("added_cart");

              if (storedJsonString != null) {
                var storedArray = JSON.parse(storedJsonString);

                for (let i = 0; i < added_cart.length; i++) {
                  var cart = added_cart[i];
                  sku = cart.sku;
                  qty = cart.qty;
                  subscribe = cart.subscribe;


                  main_id_fk = insertId;

                  // Make an AJAX request to fetch the data
                  var xhr_1 = new XMLHttpRequest();
                  xhr_1.open('GET', 'api-call.php?sku=' + sku + '&qty=' + qty + '&subscribe=' + subscribe + '&main_id_fk=' + main_id_fk + '&type=place_order_2' +
                    '&tkn=' + tokenid, false);

                  xhr_1.onload = function () {
                    if (xhr_1.status === 200) {
                      var data_1 = JSON.parse(xhr_1.responseText);

                      if (data_1 > 0) {
                        // Swal.fire({
                        //   icon: 'success',
                        //   title: 'Cool...',
                        //   text: 'Order Placed Successfully!',
                        //   confirmButtonColor: '#3085d6',
                        // }).then((result) => {
                        //   if (result.isConfirmed) {
                        //     // Clear "add to cart" data from local storage
                        //     localStorage.removeItem('added_cart');
                        //     // Redirect to another page
                        //     window.location.href = 'index.php';
                        //   }
                        // });


                        var subTotal = 0;
                        $('.row-tot').each(function () {
                          // console.log(Number($(this).html()));
                          subTotal = subTotal + Number($(this).html());
                        });

                        var promo_code = $('.promo-code').val();
                        // Make an AJAX request to fetch the data
                        if (promo_code.length > 0) {
                          var xhr = new XMLHttpRequest();
                          xhr.open('GET', 'api-call.php?promo_code=' + promo_code + '&type=check_promo_code' + '&tkn=' + tokenid, false);

                          xhr.onload = function () {
                            if (xhr.status === 200) {
                              var percent = xhr.responseText;


                              var subTotal = 0;

                              $('.row-tot').each(function () {
                                // console.log(Number($(this).html()));
                                subTotal = subTotal + Number($(this).html());
                              });


                              if (percent == 0) {
                                Swal.fire({
                                  icon: 'warning',
                                  title: 'Ooops..!',
                                  text: 'This Promo Code Is Invalid!',
                                  confirmButtonColor: '#3085d6',
                                }).then((result) => {
                                  if (result.isConfirmed) {

                                  }
                                });
                              } else if (percent > 0) {
                                var promo_discount = (subTotal * percent) / 100;
                                $('.promocode').html(promo_discount.toFixed(0));

                                // Subtract 5% from the original amount
                                var newAmount = (subTotal - promo_discount - t_d) + shipping_charge;
                                $('.whole-total').html(newAmount.toFixed(0));


                                razor_pay_amt = newAmount;


                                // var total_1 = newAmount;

                                // // total_1 = total_1.replace(/₹/g, '');


                                // var options = {
                                //   "key": key_id, // Enter the Key ID generated from the Dashboard
                                //   "amount": total_1 * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                //   "buttontext": "Pay Now",
                                //   "name": "Zoycare",
                                //   "image": "img/icon/logo/Zoy-Girl.jpg",
                                //   // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                //   "callback_url": "checkout-complete.php?shd=" + insertId + "&g_t_v=" + g_t_v + "reward_ppp=" + reward_points_1 + "&dshjbhsdghsdf=Success",
                                //   "theme": {
                                //     "color": "#1765E6"
                                //   }
                                // };
                                // var rzp1 = new Razorpay(options);

                                // rzp1.open();
                                // e.preventDefault();


                              } else {
                                Swal.fire({
                                  icon: 'warning',
                                  title: 'Ooops..!',
                                  text: 'This Promo Code Is Invalid!',
                                  confirmButtonColor: '#3085d6',
                                }).then((result) => {
                                  if (result.isConfirmed) {

                                  }
                                });
                              }
                            }
                          }
                          xhr.send();

                        } else {
                          var newAmount = (subTotal - t_d) + shipping_charge;
                          $('.whole-total').html(newAmount.toFixed(0));


                          razor_pay_amt = newAmount;


                          // var total_1 = newAmount;

                          // // total_1 = total_1.replace(/₹/g, '');


                          // var options = {
                          //   "key": key_id, // Enter the Key ID generated from the Dashboard
                          //   "amount": total_1 * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                          //   "buttontext": "Pay Now",
                          //   "name": "Zoycare",
                          //   "image": "img/icon/logo/Zoy-Girl.jpg",
                          //   // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                          //   "callback_url": "checkout-complete.php?shd=" + insertId + "&g_t_v=" + g_t_v + "reward_ppp=" + reward_points_1 + "&dshjbhsdghsdf=Success",
                          //   "theme": {
                          //     "color": "#1765E6"
                          //   }
                          // };
                          // var rzp1 = new Razorpay(options);

                          // rzp1.open();
                          // e.preventDefault();

                        }

                      }
                    }
                  }
                  xhr_1.send();
                }

console.log(insertId);

                var total_1 = razor_pay_amt;

                // total_1 = total_1.replace(/₹/g, '');


                var options = {
                  "key": key_id, // Enter the Key ID generated from the Dashboard
                  "amount": total_1 * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                  "buttontext": "Pay Now",
                  "name": "Zoycare",
                  "image": "img/icon/logo/Zoy-Girl.jpg",
                  // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                  "callback_url": "checkout-complete.php?shd=" + insertId + "&g_t_v=" + g_t_v + "reward_ppp=" + reward_points_1 + "&dshjbhsdghsdf=Success",
                  "theme": {
                    "color": "#1765E6"
                  }
                };
                var rzp1 = new Razorpay(options);

                rzp1.open();
                e.preventDefault();

              }
            }
          }
        }
      };
      xhr.send();


      // var storedJsonString = localStorage.getItem("added_cart");

      // if (storedJsonString != null) {
      //   var storedArray = JSON.parse(storedJsonString);
      //   var subTotal = 0;
      //   // Loop through storedArray
      //   for (let i = 0; i < storedArray.length; i++) {
      //     (function(i) { // Using a closure to capture the value of i
      //       var cart = storedArray[i];
      //       var sku = cart.sku;
      //       var qty = cart.qty;
      //       var rate = cart.rate;
      //       var size = cart.size;

      //       var xhr_8 = new XMLHttpRequest();
      //       // Set up the API call
      //       xhr_8.open("GET", 'api-call.php?type=get_sku_details&sku=' + sku + '&tkn=' + tokenid, true);

      //       // Handle the response from the API
      //       xhr_8.onreadystatechange = function() {
      //         if (xhr_8.readyState === 4 && xhr_8.status === 200) {
      //           var data = JSON.parse(xhr_8.responseText);
      //           data.forEach(function(row) {
      //             var tid = row.tid;
      //             var ext_file_1 = row.ext_file_1;
      //             var size = row.size;
      //             var colour = row.colour;
      //             var selling_price = row.selling_price;
      //             var row_tot = Number(qty) * Number(selling_price);

      //             subTotal += 0;

      //           })
      //         }
      //       }
      //       xhr_8.send();
      //     })
      //   }
      // }



    });
  });


  // Destroy key1 parameter after loading
  var myParamKey2 = getUrlParameter('epyt');
  if (myParamKey2.length > 0) {
    // Get the current URL
    var url = window.location.href;

    // Remove the parameters by creating a new URL without them
    var updatedURL = url
      .replace(/([?&])epyt=.*?(&|$)/, '$1')
      .replace(/(&|\?)$/, '');

    // Replace the current URL with the updated one
    window.history.replaceState({}, document.title, updatedURL);
  }






  // // Get the checkbox element
  // var usePointsCheckbox = document.getElementById("use_points");

  // // Check if the checkbox is checked
  // if (usePointsCheckbox.checked) {
  //   // The checkbox is checked
  //   var reward_points = $('#use_points').val();

  // } else {
  //   // The checkbox is not checked
  //   var reward_points = 0;
  // }



  $("body").on("click", "#normal", function () {


    var subTotal = 0;
    $('.row-tot').each(function () {
      // console.log(Number($(this).html()));
      subTotal = subTotal + Number($(this).html());
    });

    account_state = "<?php echo $account_state; ?>";

    if (account_state == 'Tamil Nadu') {
      charge = 50;
    } else {
      charge = 99;
    }

    shipping_charge = tot_mul_qty * charge;


    g_t_v = Number(g_t_v) + Number(shipping_charge);


    $('.shipping-charge').html(shipping_charge.toFixed());
    var newAmount = (subTotal - promo_discount - t_d) + shipping_charge;
    $('.whole-total').html(newAmount.toFixed());



  });



  $("body").on("click", "#express", function () {



    var charge = 200;

    var subTotal = 0;
    $('.row-tot').each(function () {
      // console.log(Number($(this).html()));
      subTotal = subTotal + Number($(this).html());
    });

    shipping_charge = tot_mul_qty * charge;


    g_t_v = Number(g_t_v) + Number(shipping_charge);


    $('.shipping-charge').html(shipping_charge.toFixed());

    var newAmount = (subTotal - promo_discount - t_d) + shipping_charge;

    console.log(subTotal);

    console.log(promo_discount);

    console.log(t_d);
    $('.whole-total').html(newAmount.toFixed());



  });



  $("body").on("click", "#free_ship", function () {



    var charge = $(this).val();

    var subTotal = 0;
    $('.row-tot').each(function () {
      // console.log(Number($(this).html()));
      subTotal = subTotal + Number($(this).html());
    });

    g_t_v = g_t_v - shipping_charge;

    shipping_charge = tot_mul_qty * charge;


    g_t_v = Number(g_t_v) + Number(shipping_charge);


    $('.shipping-charge').html(shipping_charge.toFixed());

    var newAmount = (subTotal - promo_discount - t_d) + shipping_charge;
    $('.whole-total').html(newAmount.toFixed());




  });




</script>