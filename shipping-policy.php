<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
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


    <!-- Page Title (Light)-->
    <div class="bg-secondary py-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
              <!-- <li class="breadcrumb-item text-nowrap"><a href="help-topics.html">Help center</a>
              </li> -->
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Shipping Policy</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 mb-0">Shipping Policy</h1>
        </div>
      </div>
    </div>
    <div class="container py-5 mt-md-2 mb-2">
      <div class="row">

        <div class="col-lg-12">
          <!-- <h2 class="h4 pb-3">Available payment methods when checkout</h2> -->


          <p><b>Shipping Policy</b></p>

          <p class="fs-md">Zoycare provides shipping with an additional delivery charge levied based on the delivery location & the weight. Most orders, if within Tamilnadu, it will be delivered in 1 or 2 days from the order date. If within southern states, it will be delivered 2 to 4 days, Rest of India, it will be delivered within 4 to 8 days depending on the location.We will send all packages only through reputed couriers & notify our customers via shipment confirmation email /sms within stipulated time of dispatching the product(s) with the couriers tracking number.</p>



        </div>


      </div>
    </div>
    </div>
  </main>

  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


</html>