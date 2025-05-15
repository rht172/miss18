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

      <section class="pb-4">
        <div class="tns-carousel-inner"
          data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
          <div>
            <div class="d-lg-flex justify-content-between align-items-center">
              <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/about/apb.jpg">
            </div>
          </div>
      </section>

      <section class="pt-4 pb-3">
        <div>
          <div class="card-body text-center">
            <h1 class="mb-5">AT THE HEART OF ZOY</h1>
            <h4 style="font-style: italic;">"By the <b>MOTHER</b>,</h4>
            <h4 style="font-style: italic;">To all <b>DAUGHTERS</b> across globe”</h4>
            <h4 style="font-style: italic;"> For a Healthy Generation.</h4>
            <h4 style="font-style: italic;">Treated With High End Technology and Unbridled Compassion.</h4>
          </div>
        </div>
      </section>

      <div class="row pt-4 pb-4" style="background-color: #FFF4E2;">
        <h2 class="text-center">ZOY HONOUR AND EMPOWERS THE LIVES OF WOMEN.</h2>
      </div>

      <section class="row g-0 mt-3">
        <!-- <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
          style="min-height: 15rem; background-image: url(img/about/101.jpg);"></div> -->
        <div class="col-md-6 text-center order-md-2 mt-5 mb-5 ">
          <img src="img/about/103.jpg" alt="" style="max: width 300px; max:height 700px">
        </div>
        <div class="col-md-6 px-3 px-md-5 py-5 ">
          <div class="mx-auto  py-lg-5" style="max-width: 35rem;">
            <h2 class="h3 pt-5 pb-0">Revolutionising PERIOD Care</h2>
            <p class="fs-lg pt-5 pb-5 text-muted" style="font-size:25px">At ZOY, we understand that your period journey
              is unique. Our period products are designed to make your monthly cycle as comfortable and stress-free as
              possible.With ZOY, you're not just getting support for your period; you're getting a partner in your
              <b>period journey</b>.
            </p>
          </div>
        </div>
      </section>

      <section class="row g-0 mt-3" style="background-color: #FFF4E2;">
        <!-- <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
          style="min-height: 15rem; background-image: url(img/about/101.jpg);"></div> -->
        <div class="row d-flex justify-content-center">
          <div class="col-md-3 text-center  mt-5 mb-5 ">
            <img src="img/about/106.jpg" alt="" style="max: width 300px; max:height 700px">
          </div>
          <div class="col-md-3 d-flex align-items-center">
            <div class="  py-lg-5 " style="max-width: 35rem;">
              <h1 class="h3 pt-5 pb-0 d-flex justify-content-right fs-xl" style="font-family:Cormorant Garamond Regular;"><b style="font-weight:30px;">MOTHER
                  RECIPE - THE WORLD HEALTHIEST SANITARY PAD</b></h1>
              <p class="fs-lg pt-5 pb-5 text-muted d-flex justify-content-right fs-xl" style="font-size:25px">ZOY was
                made without any
                unnecessary element without omitting necessary once.</p>
            </div>
          </div>
        </div>
      </section>

      <section class="row g-0 mt-3" style="background-color: #FFECF2;">
        <!-- <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
          style="min-height: 15rem; background-image: url(img/about/ceo1.jpg);">
        </div> -->
        <div class="col-md-6 text-center order-md-2 mt-5 mb-5 ">
          <img src="img/about/ceo1.jpg" alt="">
        </div>
        <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
          <div class="mx-auto py-lg-5" style="max-width: 35rem;">
            <h2 class="h1 pb-3">Period Care > Feminine care</h2>
            <p class="fs-lg pb-3 text-muted " style="font-size:25px">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Some game changing business brands are born out of need.
              So was
              ZOY. Safe and reliable sanitary products were the need of the hour. Maheswari
              Moorthy took it upon herself to fill that void by creating ZOY.
              Maheswari Moorthy is an erudite entrepreneur with a masters in
              technology and science. Originating from a textile industry background
              as a successful entrepreneur, she set her sight on the menstrual hygiene
              with the sole aim where Women needs to put HER Health First and Everything Next.</p>

            <p class="fs-lg  pb-3 text-muted">The spark behind the birth of ZOY is <i>"If a Sanitary pad can weaken your
                UTERUS natural rhythm why can’t the same can Enhance when it is properly medicated & precisely
                engineered"</i>
              .ZOY means LIFE ,relating women as a LIFEGIVER. This initiative is not about women care,it’s about Human
              Care. We see ourselves not as a product giving company but as a compassionate solution provider.</p>
          </div>
        </div>
      </section>


      <section class="container py-3 py-lg-5 mt-4 mb-3">
        <!-- <h2 class="h3 my-2">Our core team</h2>
        <p class="fs-sm text-muted">People behind your great shopping experience</p> -->
        <div class="row ">
          <p class="fs-xl text-center mb-5" style="font-family:Cormorant Garamond Regular" !important;;>There is a “Big
            need for a massive cultural
            shift in Women’s
            hygiene”.Our intention is to encourage women everywhere to embrace
            the creative power centre of their bodies-THE WOMB,shifting the
            mindset from ‘fear & shame’ to ‘Reverence & Empowerment’</p>
          <h3 class="text-center mb-0">
            Maheswari Moorthy
          </h3>
          <p class="text-center fs-xl" style="font-weight: 200;">
            FOUNDER & CEO
          </p>
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

</html>