<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';

include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

$obj_class_cus_promo = new czDBAccess();
$obj_class_cus_promo->varTableName = 'customer_promo_code_table';


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


    if (czGet('dshjbhsdghsdf') == 'Success') {

      $shd = czGet('shd');

      if (strlen($shd) > 0) {
        $obj_class_main = new czDBAccess();
        $obj_class_order = new czDBAccess();
        $obj_class_product = new czDBAccess();
        $obj_class_product_stock = new czDBAccess();
        $obj_class_main->varTableName = 'customer_table';
        $obj_class_order->varTableName = 'ecom_order_main_table';
        $obj_class_product->varTableName = 'product_table';
        $obj_class_product_stock->varTableName = 'product_branch_stock_table';
        $customer_id = $_SESSION['tid'];
        $g_t_v = czGet('g_t_v');
        $reward_ppp = czGet('reward_ppp');


        // $sql = "SELECT max(tid) as last_order_id from ecom_order_main_table where tid = '$customer_id';";
        // $result = $obj_class_order->selectData_customqry($sql);
    
        // while ($row = $result->fetch_assoc()) {
        //   $last_order_id = $row['last_order_id'];
        // }
    
        //Get Value to form Update Query
        $updateValueAndFeilds = "order_payment_status = 'Paid'";
        $updateWhereClasuse = "tid = '$shd'";

        //Update Process
        $UpdateStatus = $obj_class_order->updateData($updateValueAndFeilds, $updateWhereClasuse);


        if ($UpdateStatus == 'Success') {

          $sql = "SELECT * from ecom_order_product_table where main_id_fk = '$shd';";
          $result = $obj_class_order->selectData_customqry($sql);

          while ($row = $result->fetch_assoc()) {
            $sku = $row['product'];
            $qty = $row['qty'];

            $select_Feilds_tid = "*";
            $select_whereClause_tid = "sku = '$sku'";
            $result_tid = $obj_class_product->selectData($select_Feilds_tid, $select_whereClause_tid);

            while ($row = $result_tid->fetch_assoc()) {
              $product_tid = $row['tid'];
            }

            $select_Feilds_tid = "*";
            $select_whereClause_tid = "main_id_fk = '$product_tid' ";
            $result_tid_1 = $obj_class_product_stock->selectData_customqry("SELECT min(tid) as min_id from product_branch_stock_table where main_id_fk = '$product_tid' and branch_stock >= '$qty';");

            while ($row_1 = $result_tid_1->fetch_assoc()) {
              $min_id = $row_1['min_id'];
            }


            $select_Feilds_1 = "*";
            $select_whereClause_1 = "main_id_fk = '$min_id' and branch = 'HO'";
            $result_1 = $obj_class_product_stock->selectData($select_Feilds_1, $select_whereClause_1);

            // If The Table Has a TID We will Update it
            $updatestockValues = "branch_stock = `branch_stock` - $qty";
            $updatestockWhereClause = "tid = '$min_id' and branch = 'HO'";
            //Insert Process
            $UpdatestockStatus = $obj_class_product_stock->updateData($updatestockValues, $updatestockWhereClause);
          }


          $sql_3 = "SELECT promo_code from ecom_order_main_table where tid = '$shd';";
          $result_3 = $obj_class_order->selectData_customqry($sql_3);

          while ($row_3 = $result_3->fetch_assoc()) {
            $promo_code = $row_3['promo_code'];
            $customer_name = $_SESSION['email'];

            if (strlen($promo_code) > 0) {
              // Insert Process 
              $insertFeilds = "promo_code,customer_name";
              $insertValues = "'$promo_code','$customer_name'";

              //Insert Process
              $insertID = $obj_class_cus_promo->insertDataWithReturnValue($insertFeilds, $insertValues);
            }
          }





          $result_4 = $obj_class_order->selectData_customqry("SELECT reward_factor FROM reward_points_factor_table where type = 'Reward';");
          while ($row = $result_4->fetch_assoc()) {
            $reward_factor = $row['reward_factor'];
          }

          $points = $g_t_v * $reward_factor;

          $UpdateStatus_4 = $obj_class_main->selectData_customqry("UPDATE customer_table SET reward_points = reward_points + '$points' WHERE tid = '$customer_id';");

          if ($reward_ppp > 0) {
            $UpdateStatus_4 = $obj_class_main->selectData_customqry("UPDATE customer_table SET reward_points = reward_points - '$reward_ppp' WHERE tid = '$customer_id';");
          }





        }
      }
    }
    ?>

    <div class="container pb-5 mb-sm-4">
      <div class="pt-5">
        <div class="card py-3 mt-sm-3">
          <div class="card-body text-center">
            <h2 class="h4 pb-3">Thank you for your order!</h2>
            <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
            <p class="fs-sm mb-2">Make sure you make note of your order number, which is <span
                class='fw-medium'>34VB5540K83.</span></p>
            <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>You can now:</u>
            </p><a class="btn btn-secondary mt-3 me-3" href="product-category.php">Go back shopping</a><a
              class="btn btn-primary mt-3" href="order-tracking.html"><i class="ci-location"></i>&nbsp;Track order</a>
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

  var myParamdshjbhsdghsdf = getUrlParameter('dshjbhsdghsdf');

  if (myParamdshjbhsdghsdf == 'Success') {

    var id = getUrlParameter('shd');

    if (id.length > 0) {

      var xhr_8 = new XMLHttpRequest();
      // Set up the API call
      xhr_8.open("GET", 'api-call.php?type=get_sku_from_order&dfid=' + id + '&tkn=' + tokenid, true);

      // Handle the response from the API
      xhr_8.onreadystatechange = function () {
        if (xhr_8.readyState === 4 && xhr_8.status === 200) {
          var data = JSON.parse(xhr_8.responseText);
          data.forEach(function (row) {

            sku = row.product;
            // console.log(sku_cart);

            // Retrieve the stored cart items from localStorage
            var storedJsonString = localStorage.getItem("added_cart");

            if (storedJsonString != null) {
              // Parse the stored JSON string to get the array of cart items
              var storedArray = JSON.parse(storedJsonString);

              // Find the index of the cart item to remove based on its SKU
              var existingIndex = storedArray.findIndex(function (obj) {
                return obj.sku === sku;
              });

              // Check if the cart item with the specified SKU exists
              if (existingIndex !== -1) {
                // Remove the cart item from the array using splice
                storedArray.splice(existingIndex, 1);

                // Update the localStorage with the modified array
                localStorage.setItem("added_cart", JSON.stringify(storedArray));
              }

              // console.log(JSON.parse(localStorage.getItem("added_cart")));
              added_cart = JSON.parse(localStorage.getItem("added_cart"));
              // console.log(added_cart);

              if (added_cart) {
                $('.cart_qty_cls').html(added_cart.length);
              } else {
                $('.cart_qty_cls').html(0);
              }
            }



          })
        }
      }
      xhr_8.send();

    }
  }





  // Destroy key1 parameter after loading
  var myParamKey2 = getUrlParameter('dshjbhsdghsdf');
  if (myParamKey2.length > 0) {
    // Get the current URL
    var url = window.location.href;

    // Remove the parameters by creating a new URL without them
    var updatedURL = url
      .replace(/([?&])dshjbhsdghsdf=.*?(&|$)/, '$1')
      .replace(/([?&])shd=.*?(&|$)/, '$1')
      .replace(/([?&])g_t_v=.*?(&|$)/, '$1')
      .replace(/([?&])reward_ppp=.*?(&|$)/, '$1')
      .replace(/(&|\?)$/, '');

    // Replace the current URL with the updated one
    window.history.replaceState({}, document.title, updatedURL);
  }
</script>