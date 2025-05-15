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
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Privacy Policy</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 mb-0">Privacy Policy</h1>
        </div>
      </div>
    </div>
    <div class="container py-5 mt-md-2 mb-2">
      <div class="row">

        <div class="col-lg-12">
          <!-- <h2 class="h4 pb-3">Available payment methods when checkout</h2> -->
          <p class="fs-md">Zoygirl.com is committed to protecting all the information you share with us. Please read our
            privacy policy carefully to get a clear understanding of how we collect, use, protect otherwise
            handle your information in accordance with our website.</p>

          <p><b>What personal information do we collect from the people that visit our website?</b></p>

          <p class="fs-md">When ordering or registering on our site, as appropriate, you may be asked to enter your
            name,
            email address, mailing address, phone number or other details to help you with your
            experience.</p>

          <p><b>When do we collect information?</b></p>

          <p class="fs-md">We collect information from you when you place an order or enter information on our site.</p>

          <p><b>How do we use your information?</b></p>

          <ul>

          <li class="fs-md">We may use the information we collect from you when you register, make a purchase, signup
            for our newsletter, respond to a survey or marketing communication, browse the website or use
            certain other site features to quickly process your transactions.</li>

          <li class="fs-md">We may also use your email address to send regular information to help you keep up to date
            with our new offerings, promotions, products and shopping offers. You may choose to
            unsubscribe from our mailing list at any point.</li>

          </ul>

          <p><b>How do we protect visitor information?</b></p>

          <ul>

          <li class="fs-md">Our website is scanned on a regular basis for security holes and known vulnerabilities to
            make your visit to our site as safe as possible.</li>

          <li class="fs-md">Your personal information is contained behind secured networks and is only accessible by a
            limited number of persons who have special access rights to such systems and are required to
            keep the information confidential.</li>

          <li class="fs-md">We implement a variety of security measures when a user places an order enters, submits or
            accesses their information to maintain the safety of your personal information.</li>

          <li class="fs-md">All transactions are processed through a gateway provider and are not stored or processed on
            our servers. We have no access to your credit/debit card details and any other payment
            methods which you might use on our website.</li>

          </ul>

          <p><b>Do we use ‘cookies’?</b></p>

          <ul>

          <li class="fs-md">Yes. Cookies are small files that a site or its service provider transfers to your computer’s
            hard
            drive through your Web browser (if you allow) that enables the site’s or service provider’s
            systems to recognize your browser and capture and remember certain information.</li>

          <li class="fs-md">For instance, we use cookies to help us remember and process the items in your shopping cart.
            They are also used to help us understand your preferences based on previous or current site
            activity, which enables us to provide you with improved services.</li>

          <li class="fs-md">We also use cookies to help us compile aggregate data about site traffic and site inter
            action so
            that we can offer better site experiences and tools in the future.</li>

           </ul>

          <p><b>We use cookies to:</b></p>

          <ul>

          <li class="fs-md">Help remember and process the items in the shopping cart.</li>

          <li class="fs-md">Compile aggregate data about site traffic and site interactions to offer better site
            experiences and tools in the future.</li>

          <li class="fs-md">We may also use trusted third-party services that track this information on our behalf.</li>

          <li class="fs-md">You can choose to have your computer warn you each time a cookie is being sent, or you can
            choose to turn off all cookies.</li>

          <li class="fs-md">You do this through your browser (like Internet Explorer) settings. Each browser is a little
            different, so look at your browser’s Help menu to learn the correct way to modify your cookies.</li>

          <li class="fs-md">If you disable cookies off, some features will be disabled. It won’t affect the user
            experience,
            that make your site experience more efficient and some of our services will not function
            properly.</li>

          <li class="fs-md">However, you can still place orders.</li>

         </ul>

          <p><b>Third Party Disclosure:</b></p>

          <ul>

          <li class="fs-md">We do not sell, trade, or otherwise transfer to outside parties your personally identifiable
            information.</li>

          <li class="fs-md">This does not include website hosting partners and other parties who assist us in operating
            our
            website, conducting our business, or servicing you, so long as those parties agree to keep this
            information confidential.</li>

          <li class="fs-md">We may also release your information when we believe release is appropriate to comply with
            the law, enforce our site policies, or protect ours or others’ rights, property, or safety.</li>

          <li class="fs-md">However, non-personally identifiable visitor information may be provided to other parties for
            marketing, advertising, or other uses.</li>

          <li class="fs-md">Exceptions: We may be required by law to disclose your information.</li>

          <li class="fs-md">However, we will never amend our commitment of keeping your personal information secure.</li>

         </ul>

        </div>


      </div>
    </div>
    </div>
  </main>

  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


</html>