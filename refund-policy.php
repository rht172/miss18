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
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Refund Policy</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 mb-0">Refund Policy</h1>
        </div>
      </div>
    </div>
    <div class="container py-5 mt-md-2 mb-2">
      <div class="row">

        <div class="col-lg-12">
          <!-- <h2 class="h4 pb-3">Available payment methods when checkout</h2> -->


          <p><b>Return Policy</b></p>

          <p class="fs-md">At Zoycare, your hygiene and personal well being is important to us, we work
            to maintain/improve quality standards of hygiene. Due to the intimate nature of
            Zoycare’s products, all products are non returnable after delivery.</p>

          <p class="fs-md">However, in the unlikely event that a product is damaged/defective or has been
            delivered incorrectly, please write to us at support@cloudzoo.in.in and provide the
            details and relevant picture(s)/video(s). We will review all such cases individually.
            Upon receipt of the complaint, we will conduct a full and thorough investigation
            and notify you within a reasonable time. Please note that, we will only accept
            order-related complaints (e.g. damage/defect/deviating products) up to 7 days
            from the delivery date.</p>

          <p><b>Cancellation Policy</b></p>

          <p class="fs-md">Once an order has been placed (all orders), it can be cancelled as long as the
            order has not been transferred to our delivery partner. Since it takes
            approximately one day to ship the order, we recommend that you submit the
            cancellation within 2 hours (120 minutes) of the order confirmation. If you wish to
            cancel your order within time frame, please write to us at support@cloudzoo.in.in</p>

          <p><b>Refund Policy</b></p>

          <p class="fs-md">Cancellation of prepaid orders will result in a refund of the order amount will
            be initiated within 24 to 48 hours and will be credited to the source account within
            another 7 to 10 business days.</p>



        </div>


      </div>
    </div>
    </div>
  </main>

  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


</html>