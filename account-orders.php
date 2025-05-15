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
    <!-- Order Details Modal-->
    <div class="modal fade" id="order-details">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="order_no"></h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pb-0" id="order_div">
            <!-- Item-->
            <!-- <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
              <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                  href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/01.jpg" alt="Product"></a>
                <div class="ps-sm-4 pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Women Colorblock Sneakers</a>
                  </h3>
                  <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                  <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div>
                  <div class="fs-lg text-accent pt-2">$154.<small>00</small></div>
                </div>
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <div class="text-muted mb-2">Quantity:</div>1
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <div class="text-muted mb-2">Subtotal</div>$154.<small>00</small>
              </div>
            </div> -->

          </div>
          <!-- Footer-->
          <div class="modal-footer flex-wrap justify-content-right bg-secondary fs-md">
            <!-- <div class="px-2 py-1"><span class="text-muted">Subtotal:&nbsp;</span><span>$265.<small>00</small></span>
            </div>
            <div class="px-2 py-1"><span class="text-muted">Shipping:&nbsp;</span><span>$22.<small>50</small></span>
            </div> -->
            <div class="px-2 py-1"><span class="text-muted">Discount:&nbsp;</span><span class="fs-lg" id="grand_discount_span"></span></div>
            <div class="px-2 py-1"><span class="text-muted">Total:&nbsp;</span><span class="fs-lg"
                id="total_card"></span></div>
          </div>
        </div>
      </div>
    </div>

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
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 text-light mb-0">My orders</h1>
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
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active"
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
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
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
          <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
            <div class="d-flex align-items-center">

            </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="session-logout.php"><i
                class="ci-sign-out me-2"></i>Sign out</a>
          </div>
          <!-- Orders list-->
          <div class="table-responsive fs-md mb-4">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Date Purchased</th>
                  <th>Status</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $productsPerPage = 10; // Number of products to display per page
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page number
                $offset = ($page - 1) * $productsPerPage; // Offset for SQL query
                

                $result = $obj_class_main->selectData_customqry("SELECT sum(ecom_order_product_table.total_amount) as total_value, ecom_order_main_table.tid as main_tid, ecom_order_main_table.*, ecom_order_product_table.* from ecom_order_main_table left join ecom_order_product_table on ecom_order_main_table.tid = ecom_order_product_table.main_id_fk where ecom_order_main_table.customer_id = '$customer_id' group by ecom_order_main_table.tid order by ecom_order_main_table.tid desc LIMIT $productsPerPage OFFSET $offset;");
                while ($row = $result->fetch_assoc()) {

                  $main_tid = $row['main_tid'];
                  $order_date = $row['order_date'];
                  $order_status = $row['order_status'];
                  $order_payment_status = $row['order_payment_status'];
                  $product = $row['product'];
                  $qty = $row['qty'];
                  $rate = $row['rate'];
                  $amount = $row['amount'];
                  $total_amount = $row['total_value'];
                  $grand_total = $row['grand_total'];
                  $grand_discount = $row['grand_discount'];
                  ?>


                  <tr>

                    <td class="py-3"><a class="nav-link-style fw-medium fs-sm"
                        onclick='get_order_details(<?php echo $main_tid ?>)' data-bs-toggle="modal" href="#order-details">
                        <?php echo $main_tid ?>
                      </a></td>

                    <td class="py-3">
                      <?php echo $order_date ?>
                    </td>

                    <td class="py-3"><span class="badge bg-info m-0">
                        <?php echo $order_status ?>
                      </span></td>

                    <td class="py-3">
                      <?php echo $grand_total ?>
                    </td>

                  </tr>
                  <tr>


                    <?php
                }
                ?>


              </tbody>
            </table>
          </div>
          <!-- Pagination-->
          <?php
          $result = $obj_class_main->selectData_customqry("SELECT count(tid) as count from ecom_order_main_table");
          while ($row = $result->fetch_assoc()) {
            $count = $row['count'];
          }
          // Count the total number of products
          $totalProducts = $count;

          // Calculate the total number of pages
          $totalPages = ceil($totalProducts / $productsPerPage);
          ?>
          <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">

            <ul class="pagination">
              <?php
              // Generate "Previous" link
              if ($page > 1) {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '"><i class="ci-arrow-left me-2"></i>Prev</a></li>';
              }
              ?>
            </ul>
            <ul class="pagination">
              <!-- <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
              <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span
                    class="visually-hidden">(current)</span></span></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li> -->

              <?php
              // Generate numeric pagination links with current page number only
              // if ($totalPages > 1) {
              //   for ($i = 1; $i <= $totalPages; $i++) {
              //     if ($i === $page) {
                   
              //       echo '<li class="page-item d-none d-sm-block"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
              //     }
              //   }
              // }
              ?>

            </ul>
            <ul class="pagination">
             
                    <?php
                     // Generate "Next" link
            if ($page < $totalPages) {
              echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '" aria-label="Next">Next<i
                                              class="ci-arrow-right ms-2"></i></a></li>';
            }
            ?>
            </ul>



            <?php
            // $result = $obj_class_product->selectData_customqry("SELECT count(tid) as count from ecom_order_main_table");
            // while ($row = $result->fetch_assoc()) {
            //   $count = $row['count'];
            // }
            // // Count the total number of products
            // $totalProducts = $count;

            // // Calculate the total number of pages
            // $totalPages = ceil($totalProducts / $productsPerPage);

            // // Generate "Previous" link
            // if ($page > 1) {
            //   echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '"><i class="ci-arrow-left me-2"></i>Prev</a></li>';
            // }



            // // Generate numeric pagination links with current page number only
            // if ($totalPages > 1) {
            //   for ($i = 1; $i <= $totalPages; $i++) {
            //     if ($i === $page) {
            //       // echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            //       echo '<li class="page-item d-sm-none"><span class="page-link page-link-static">' . $i . '</span></li>';
            //     }
            //   }
            // }



            // // Generate "Next" link
            // if ($page < $totalPages) {
            //   echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '" aria-label="Next">Next<i
            //                                   class="ci-arrow-right ms-2"></i></a></li>';
            // }



            ?>
          </nav>
        </section>
      </div>
    </div>
  </main>

  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>



<script>

  var tokenid = '<?php echo session_id(); ?>'

  function get_order_details(self) {

    var xhr_8 = new XMLHttpRequest();

    xhr_8.open("GET", 'api-call.php?type=fetch_order_details&tid=' + self + '&tkn=' + tokenid, true);


    // Handle the response from the API
    xhr_8.onreadystatechange = function () {

      if (xhr_8.readyState === 4 && xhr_8.status === 200) {

        var data = JSON.parse(xhr_8.responseText);

        document.getElementById('order_div').innerHTML = '';

        document.getElementById('order_no').innerHTML = 'Order No - ' + self;

        var tot_amt = 0;
        var disc_amt = 0;
        var g_tot = 0;
        var row_g_tot = 0;
        data.forEach(function (row) {
          var product_tid = row.product_tid;
          var ext_file_1 = row.ext_file_1;
          var size = row.size;
          var colour = row.colour;
          var rate = row.rate;
          var product = row.product;
          var qty = row.qty;
          var total_amount = row.total_amount;
          disc_amt = row.disc;
          row_g_tot = row.grand_total

          var tot_amt_multi_qty = Number(rate) * Number(qty);

          tot_amt += Number(tot_amt_multi_qty);
          // console.log(disc_amt);

          // Create HTML content for the product item
          var productHTML = `
          <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
              <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                  href="product-page.php?key1=${product_tid}&sku=${product}" style="width: 10rem;"><img src="cz-admin/attachments/product/product_thumb/tid-${product_tid}.${ext_file_1}" alt="Product"></a>
                <div class="ps-sm-4 pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="product-page.php?key1=${product_tid}&sku=${product}">${product}</a>
                  </h3>
                  <div class="fs-sm"><span class="text-muted me-2">Variant/Size:</span>${size}</div>
                  <div class="fs-sm"><span class="text-muted me-2">Color/Type:</span>${colour}</div>
                  <div class="fs-lg text-accent pt-2">${rate}</small></div>
                </div>
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <div class="text-muted mb-2">Quantity:</div>${qty}
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <div class="text-muted mb-2">Subtotal</div>${tot_amt_multi_qty}
              </div>
            </div>`;



          // Append the product HTML to the product-list element
          document.getElementById('order_div').insertAdjacentHTML('beforeend', productHTML);
        });

        g_tot = tot_amt - row_g_tot;

        if (g_tot < 0) {
          g_tot = 0;
        }

        document.getElementById('total_card').innerHTML = tot_amt;
        document.getElementById('grand_discount_span').innerHTML = g_tot;
        // console.log(disc_amt);

      }
    };
    xhr_8.send();
  }
</script>


</html>