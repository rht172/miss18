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


    <main class="container-fluid px-0">
      <!-- Row: Shop online-->
      <!-- <section class="row g-0">
        <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
          style="min-height: 15rem; background-image: url(img/about/01.jpg);"></div>
        <div class="col-md-6 px-3 px-md-5 py-5">
          <div class="mx-auto py-lg-5" style="max-width: 35rem;">
            <h2 class="h3 pb-3">Search, Select, Buy online</h2>
            <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus
              at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan
              leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at
              euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id
              ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor
              at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a
              class="btn btn-primary btn-shadow" href="shop-grid-ls.html">View products</a>
          </div>
        </div>
      </section> -->
      <!-- Row: Delivery-->

      <!-- <div class="row pt-4 pb-4" style="background-color: #FFF4E2;">
        <h2 class="text-center">ZOY HONOUR AND EMPOWERS THE LIVES OF WOMEN.</h2>
      </div> -->


      <section class="row g-0 mt-3 bg-secondary">
        <!-- <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
          style="min-height: 15rem; background-image: url(img/about/ceo1.jpg);">
        </div> -->
        <div class="col-md-5 text-center order-md-2 mt-5 mb-5 ">
          <img src="img/about/co1.jpg" alt="">
        </div>
        <div class="col-md-7 px-3 px-md-5 py-5 order-md-1">
          <div class="mx-auto py-lg-5" style="max-width: 35rem;">
            <h2 class="h1 text-center pb-3">About Us</h2>
            <p class="">Welcome to Knitting Concepts International: the global leader of Knitted
              Sweaters, Sweatshirt, Polo, etc. Our continued investment in technical and
              creative expertise make it possible for us to present our buyers with a
              collection of products that truly stand out in terms of Quality, Style and
              Design.</p>
            <!-- <div class="row "> -->
            <p class="">We have consistently expanded over the years not only in infrastructure but
              also in the range of products we offer which now includes Sweaters, Blankets,
              Scarves, Ponchos, Crop tops, Knitted Jackets, Pullovers & many more.</p>

            <p class=" " style="">
              It is in 2011 Knitting Concepts made a foray into the world of knitting.
            </p>
            <p class="" style="">
              We have devoted it to flat knit fabric manufacturing, and it has always
              striven to accompany as closely as possible the growth that has taken place
              within the sector.
            </p>

            <p class="" style="">
              With constant updating of technological equipment and processes, along with
              the training and motivation of the human resources involved, we have
              achieved a high level of efficiency which places us the most advanced
              companies in this sector.
            </p>

            <p class="" style="">
              As a market leader, we can acquire high end customers. The ever-increasing
              array of services offered; the level of quality already reached together with
              punctual deliveries are key factors which contribute to our success.

            </p>
          </div>
        </div>
      </section>

      <section class="row g-0 mt-3 bg-secondary">
        <!-- <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
          style="min-height: 15rem; background-image: url(img/about/ceo1.jpg);">
        </div> -->
        <div class="col-md-6 px-3 px-md-5 py-5 order-md-2">
          <div class="mx-auto py-lg-5" style="max-width: 35rem;">
            <h2 class="h1 text-center pb-3">Our Vision</h2>
            <p class="">We aim to be one of the largest state of art Sweater manufacturing facility in the
              world.</p>
            <!-- <div class="row "> -->
            <p class="">Our creative designs, constant technology, advancement and best quality
              products has given us a lead in this sector.</p>

            <p class=" " style="">
              We believe in Incremental improvement of all the business activities through
              people, management, innovation and creativity.
            </p>
            <p class="" style="">
              We also keep on exploring the new dimensions of business excellence and
              creating a holistic environment within organization. Our work force has been
              one of the strengths of our organization due to which today we possess the
              current status.

            </p>

          </div>
        </div>
        <div class="col-md-6 text-center order-md-1 mt-5 mb-5 ">
          <img src="img/about/co1.jpg" alt="">
        </div>

      </section>

      <section class="container py-3 py-lg-5 mt-4 mb-3">
        <!-- <h2 class="h3 my-2">Our core team</h2>
        <p class="fs-sm text-muted">People behind your great shopping experience</p> -->
        <div class="row ">
          <!-- <p class="fs-xl text-center mb-5" >There is a “Big
            need for a massive cultural
            shift in Women’s
            hygiene”.Our intention is to encourage women everywhere to embrace
            the creative power centre of their body-THE WOMB,shifting the
            mindset from ‘Fear & Shame’ to ‘Reverence & Empowerment’.</p>
          <h3 class="text-center mb-0">
          &#8213;Maheswari Moorthy
          </h3>
          <p class="text-center fs-xl" style="font-weight: 200;">
            FOUNDER
          </p> -->
        </div>

      </section>


      <!-- <div class="row mb-3">
        <h1 class="text-center">The ZOY WAY</h1>
      </div>
      <section class="row g-0">
        <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
          style="min-height: 15rem; background-image: url(img/about/zoy-way.jpg);"></div>
        <div class="col-md-6 px-3 px-md-5 py-5">
          <div class="mx-auto py-lg-5" style="max-width: 35rem;">
            <h3>What Sets Us Apart from the Rest?</h3>
            <ul>
              <li>
                <p>Safe Sanitary Pads - (A creative showing every layer)</p>
              </li>
              <li>
                <p>Rigorous Standards - (Patent Pending, Clinically Proven, certificates)</p>
              </li>
              <li>
                <p>Sterilized Packaging</p>
              </li>
              <li>
                <p>Functional Chip</p>
              </li>
              <li>
                <p>Phthalates, VOC’s, and Chlorine Free</p>
              </li>
            </ul>
          </div>
        </div>
      </section> -->

      <!-- Section: Shopping outlets-->


      <!-- <section class="row g-0">
        <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
          style="min-height: 15rem; background-image: url(img/about/zoy-ino.jpg);"></div>
        <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
          <div class="mx-auto py-lg-5" style="max-width: 35rem;">
            <h2 class="h3 pb-3">A Culmination of Technology & Nature</h2>
            <p class="fs-sm pb-3 text-muted">ZOY Pad is invented for every girls’ period wellness. Our researchers
              focused on the ABSORBENTS, the most important core component of
              sanitary napkins.As women - the “LIFE GIVER’S” , deserve the utmost
              care for the most sensitive and important part of their body, ‘THE
              VAGINA’ . So we have chosen every component backed with
              Health+Science+Nature</p>
          </div>
        </div>
      </section> -->
      <hr>
      <!-- Section: Team-->
    </main>
  </main>
  <!-- Footer-->

</body>

<?php include 'includes/footer.php' ?>

<script>

  $(document).ready(function () {
    $('title').html('ABOUT US');
  });

</script>

</html>