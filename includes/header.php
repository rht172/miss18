<?php
$customer_name = "";
if (isset($_SESSION['customer_name'])) {
  $customer_name = $_SESSION['customer_name'];
}
?>


<style>
  .for_desktop {
    display: none;
    /* Hide the header by default */
  }

  @media only screen and (min-width: 768px) {

    /* Show the header on screens with a width of 768 pixels or more (laptop screens) */
    .for_desktop {
      display: block;
    }
  }

  .for_mobile {
    display: none;
    /* Hide the header by default */
  }

  @media only screen and (max-width: 767px) {

    /* Show the header on screens with a width of 767 pixels or less (mobile screens) */
    .for_mobile {
      display: block;
    }
  }

  .navbar .megamenu {
    padding: 1rem;
  }

  /* ============ desktop view ============ */
  @media all and (min-width: 992px) {

    .navbar .has-megamenu {
      position: static !important;
    }

    .navbar .megamenu {
      left: 0;
      right: 0;
      width: 100%;
      margin-top: 0;
    }

  }

  /* ============ desktop view .end// ============ */

  /* ============ mobile view ============ */
  @media(max-width: 991px) {

    .navbar.fixed-top .navbar-collapse,
    .navbar.sticky-top .navbar-collapse {
      overflow-y: auto;
      max-height: 90vh;
      margin-top: 10px;
    }
  }

  @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Platypi:ital,wght@0,300..800;1,300..800&display=swap');

  body,
  html .platypi {
    font-family: "Platypi", serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
  }

  /* body,
  html {
    margin: 0;
    padding: 0;
    font-family: "Josefin Sans", sans-serif;
  } */

  header {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #333;
    color: white;
    z-index: 1000;
  }

  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
  }

  .logo {
    font-size: 24px;
    font-weight: bold;
  }

  .nav-links {
    list-style: none;
    display: flex;
  }

  .nav-links li {
    margin-left: 20px;
  }

  .nav-links a {
    text-decoration: none;
    color: white;
    font-size: 18px;
  }

  .burger {
    display: none;
    cursor: pointer;
    flex-direction: column;
    justify-content: space-between;
    height: 21px;
  }

  .burger div {
    width: 25px;
    height: 3px;
    background-color: white;
  }

  section {
    padding: 60px 20px;
    margin-top: 50px;
  }

  @media (max-width: 768px) {
    .nav-links {
      position: absolute;
      right: 0;
      height: 100vh;
      top: 0;
      background-color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 50%;
      transform: translateX(100%);
      transition: transform 0.5s ease-in;
    }

    .nav-links li {
      margin: 20px 0;
    }

    .burger {
      display: flex;
    }

    .nav-links.active {
      transform: translateX(0%);
    }
  }
</style>


<header class="platypi">
  <!-- <nav class="navbar"> -->
  <div class="navbar-sticky bg-light">
    <div class="navbar navbar-expand-lg navbar-light">
      <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0" href="index.php"><img
            src="img/icon/logo/logo.png" width="142" alt="miss18"></a>
        <div class="input-group d-none d-lg-flex justify-content-center mx-4">
          <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Search-->
                <div class="input-group d-lg-none my-3"><i
                    class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                  <input class="form-control rounded-start" type="text" placeholder="Search for products">
                </div>

                <!-- Primary menu-->
                <ul class="navbar-nav">
                  <li class="nav-item "><a class="nav-link " href="index.php">Home</a></li>

                  <li class="nav-item "><a class="nav-link " href="product-category.php?page=1">Shop</a></li>

                  <li class="nav-item "><a class="nav-link " href="about.php">About Us</a></li>

                  <!-- <li class="nav-item "><a class="nav-link show" href="contact.php">Contact Us</a></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span
              class="navbar-toggler-icon"></span></button>
          </a>

          <?php if (strlen($customer_name) > 0) { ?>
            </a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="account-profile.php">
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
              <div class="navbar-tool-text ms-n3">
                <?php echo $customer_name ?>
              </div>
            </a>
          <?php } else { ?>
            </a>
            <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
              <div class="navbar-tool-text ms-n3">
                <small>Hello, Sign in</small>My Account
              </div>
            </a>
          <?php } ?>
          <div class="navbar-tool  ms-3">

            <a class="navbar-tool d-none d-lg-flex" href="account-wishlist.php">
              <span class="navbar-tool-tooltip">Wishlist</span>
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div>
            </a>

            <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.php"><span
                class="navbar-tool-label cart_qty_cls"></span><i class="navbar-tool-icon ci-cart"></i></a><a
              class="navbar-tool-text" href="shop-cart.php">
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="burger" id="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div> -->
  <!-- </nav> -->
</header>



<header class="shadow-sm for_mobile">
  <!-- Topbar-->
  <!-- <div class="topbar topbar-dark bg-dark p-0">
    <div class="container justify-content-center">

      <div class="tns-carousel tns-controls-static d-md-block">
        <div class="tns-carousel-inner"
          data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
          <div class="topbar-text">Subscribe & Save upto 20%</div>

        </div>
      </div>

    </div>
  </div> -->
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <div class="navbar-sticky bg-light">
    <div class="navbar navbar-expand-lg navbar-light p-0">
      <div class="container">

        <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="home"><img src="img/icon/logo/logo.png"
            width="142" class="img-fluid" style="max-width : 80px;"></a><a
          class="navbar-brand d-sm-none flex-shrink-0 me-2" href="home"><img src="img/icon/logo/logo.png" width="74">
        </a>


        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" id='colloapse_fun'><span
              class="navbar-toggler-icon"></span></button>

          <a class="navbar-tool navbar-stuck-toggler"><span class="navbar-tool-tooltip">Expand
              menu</span>
            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
          </a>

          <a class="navbar-tool d-none d-lg-flex" href="account-wishlist.php">
            <span class="navbar-tool-tooltip">Wishlist</span>
            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div>
          </a>


          <?php if (strlen($customer_name) > 0) { ?>
            </a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="account-profile.php">
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
              <div class="navbar-tool-text ms-n3">
                <?php echo $customer_name ?>
              </div>
            </a>
          <?php } else { ?>
            </a>
            <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
              <div class="navbar-tool-text ms-n3">
                <small>Hello, Sign in</small>My Account
              </div>
            </a>
          <?php } ?>


          <!-- <div class="navbar-tool dropdown ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                            href="shop-cart.php"><span class="navbar-tool-label cart_qty_cls"></span><i
                                class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text cart_qty_cls"
                            href="shop-cart.php"><small>My
                                Cart</small></a>
                    </div> -->


          <!-- <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.php"><span
                            class="navbar-tool-label cart_qty_cls"></span><i
                            class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text" href="shop-cart.php">
                    </a> -->

        </div>
      </div>
    </div>

    <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
      <div class="container">
        <div class="collapse navbar-collapse d-lg-flex justify-content-center" id="navbarCollapse_1">
          <!-- Search-->

          <!-- <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" id='product_nav_btn'><i
                  class="ci-view-grid me-2"></i>Products</a>

              <div class="dropdown-menu megamenu row p-0 m-0" id='product_nav_dropdown' role="menu">
                <div class="row  d-flex justify-content-center p-0 m-0">

                  <div class="widget widget-links m-3" style="max-width: 150px;"><a class="d-block overflow-hidden mb-3"
                      href="product-category.php?category=Modern Tops&page=1"><img src="img/shop/categories/th01.jpg"
                        alt=""></a>
                    <h6 class="fs-base mb-2">Modern Tops</h6>
                  </div>

                  <div class="widget widget-links m-3" style="max-width: 150px;">
                    <a class="d-block overflow-hidden mb-3" style="border-radius: 100px;"
                      href="product-category.php?category=Full Lenght&page=1"><img src="img/shop/categories/2323.jpg"
                        alt=""></a>
                    <h6 class="fs-base mb-2">Full Length Dress</h6>
                  </div>

                  <div class="widget widget-links m-3" style="max-width: 150px;">
                    <a class="d-block overflow-hidden mb-3" style="border-radius: 100px;"
                      href="zoy-snow-lotus-therapy-pad-160mm-10">
                      <img src="img/shop/departments/herbal.jpg" alt="Therapy Pad">
                    </a>
                    <a href="zoy-snow-lotus-therapy-pad-160mm-10">
                      <h1 class="fs-base mb-2 text-center">SNOW LOTUS PAD</h1>
                    </a>
                  </div>
                </div>

                <div class="row d-flex justify-content-center p-0 m-0" style="background-color : #FCDBE6;">
                  <a class="text-center" href="all-products">
                    <h6 class="mb-2 mt-2 fw-bold" style="color: #383838; font-size: 20px;">SHOP ALL
                    </h6>
                  </a>
                </div>
              </div>
            </li>
          </ul> -->
          <!-- Primary menu-->
          <ul class="navbar-nav">
            <!-- <li class="nav-item dropdown"><a class="nav-link " href="#">Combos</a>
                        </li> -->

            <li class="nav-item dropdown"><a class="nav-link " href="index.php">Home</a>
            </li>

            <li class="nav-item dropdown"><a class="nav-link " href="product-category.php">Shop</a>
            </li>

            <li class="nav-item dropdown"><a class="nav-link " href="about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>


  <!-- <script>
    $(document).ready(function () {
      $('#colloapse_fun').on('click', function () {
        $('#navbarCollapse_1').toggleClass('show');
      });

      $('#product_nav_btn').on('click', function () {
        $('#product_nav_dropdown').toggleClass('show');
      });
    });

  </script> -->

</header>

<script src="assets/js/czjs.js"></script>