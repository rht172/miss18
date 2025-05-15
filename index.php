<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_slider = new czDBAccess();
$obj_class_sub_slider = new czDBAccess();
$obj_class_parallax = new czDBAccess();
$obj_class_feature_product = new czDBAccess();
$obj_class_product = new czDBAccess();
$obj_class_top_selling = new czDBAccess();
$obj_class_color = new czDBAccess();

//Assign Table Name
$obj_class_slider->varTableName = 'slider_table';
$obj_class_sub_slider->varTableName = 'sub_slider_table';
$obj_class_parallax->varTableName = 'parallax_table';
$obj_class_feature_product->varTableName = 'featured_product_table';
$obj_class_product->varTableName = 'product_table_ecom';
$obj_class_top_selling->varTableName = 'top_selling_table';
$obj_class_color->varTableName = 'color_master_table';

//Init Variables
$tid = "";
$slider_header = "";
$slider_header_2 = "";
$slider_header_3 = "";
$slider_button_url = "";
$ext_file = "";





$tid = $sku = $product_type = $category = $sub_category = $super_sub_category = $brand_name = $product_name = $stock = $unit = $tax_type = $selling_price = $purchase_price = $mrp = $supplier_name = $colour = $size = $barcode = $pack_stock = $product_description = $rack_details = $image1_url = $min_stock = $part_no_01 = $part_no_02 = $part_no_03 = $stock_on_hold = $discount_percentage = $offer_name = $whole_sale_price = $opening_stock = $ext_file_1 = $ext_file_2 = $ext_file_3 = $ext_file_4 = $pt_color = $pt_size = $ext_file_5 = $ext_file_6 = $description_1 = $description_2 = $faq = $ext_file_banner_1 = $ext_file_banner_2 = $bg_color = $category_pass = $product_display_name = "";


$category_pass = czGet('category');
$tempwhere = "";

?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'includes/title.php';
?>
<style>
  .ci-heart {
    color: #000;
    /* default color */
  }

  .ci-heart-filled {
    color: red;
    /* color when added to wishlist */
  }



  .button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
  }

  .button-container button {
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    margin: 5px;
    border: 2px solid black;
    /* Border color */
    background-color: white;
    /* Initial background color */
    color: black;
    /* Initial text color */
    border-radius: 28px;
    /* Rounded corners */
    transition: all 0.3s ease;
    /* Smooth transition */
  }

  .button-container button.active {
    background-color: black;
    /* Background color for active button */
    color: white;
    /* Text color for active button */
  }

  .content {
    display: none;
    margin-top: 20px;
  }

  .content.active {
    display: block;
  }

  @media (max-width: 600px) {
    .button-container {
      flex-direction: column;
    }

    .button-container button {
      width: 100%;
    }
  }








  .image-container {
    position: relative;
  }

  .hover-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.3s;
  }

  .image-container:hover .hover-image {
    opacity: 1;
  }

  @media (max-width: 576px) {
    .card-img-top {
      height: auto;
    }
  }

  /* Tablet Styles */
  @media (min-width: 576px) and (max-width: 768px) {
    .card-img-top {
      height: auto;
    }
  }

  /* Desktop Styles */
  @media (min-width: 768px) {
    .card-img-top {
      height: auto;
    }
  }





  .custom-padding {
    padding-left: 10px;
    padding-right: 10px;
  }


  @media (min-width: 1200px) {

    /* Extra large devices (large desktops) */
    .custom-padding {
      padding-left: 200px;
      padding-right: 200px;
    }
  }

  @media (min-width: 992px) {

    /* Large devices (desktops) */
    .custom-padding {
      padding-left: 200px;
      padding-right: 200px;
    }
  }





  #parallax {
    background: url('assets/images/12.jpg') no-repeat center center;
    background-size: cover;
    background-attachment: fixed;
    width: 100%;
    padding: 100px 0;
  }



  /* Optional: Some padding for the content inside the section */
  .video-parallax .container {
    padding-top: 150px;
    padding-bottom: 150px;
  }

  @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Noto+Serif+Tibetan:wght@100..900&family=Platypi:ital,wght@0,300..800;1,300..800&display=swap');

  .caveat {

    font-family: "Caveat", cursive;
    font-weight: 400;
    font-style: normal;
  }


  /* .image-container {
    position: relative;
    display: inline-block;
  } */

  .main-image {
    border-radius: 20px;
    opacity: 0.9;
    /* Adjust the opacity as needed */
    width: 100%;
    /* Ensure the image covers the container */
  }

  /* .hover-image {
    border-radius: 20px;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.3s ease;
  } */

  .image-container:hover .hover-image {
    opacity: 1;
  }

  .overlay-text {
    position: absolute;
    bottom: 10px;
    /* Adjust the distance from the bottom */
    left: 10px;
    /* Adjust the distance from the left */
    color: black;
    /* Adjust the text color as needed */
    font-size: 1.5em;
    /* font-weight: bold; */
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    /* Adjust the font size as needed */
    /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */
    /* Optional: adds a shadow to the text for better readability */
    z-index: 10;
  }
</style>

<!-- Body-->

<body class="handheld-toolbar-enabled">
  <!-- Google Tag Manager (noscript)-->
  <noscript>
    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
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


    <section class="p-0">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
          // $select_Feilds = "tid,slider_header,slider_header_2,slider_header_3,slider_button_url,created_on,created_by,last_updated_on,last_updated_by,ext_file";
          $result = $obj_class_slider->selectData_customqry("SELECT * from slider_table");

          $first = true; // To mark the first item as active
          while ($row = $result->fetch_assoc()) {
            $tid = $row['tid'];
            $slider_button_url = $row['slider_button_url'];
            $ext_file = $row['ext_file'];
            $bg_color = $row['bg_color'];
          ?>
            <div class="carousel-item <?php if ($first) {
                                        echo 'active';
                                        $first = false;
                                      } ?>">
              <a <?php if (strlen($slider_button_url) > 0) { ?> href="product-category.php?page=1&category=<?php echo $slider_button_url; ?>" <?php } else { ?> href="product-category.php" <?php } ?>>
                <img class="d-block w-100" src="cz-admin/attachments/slider/tid-<?php echo $tid; ?>.<?php echo $ext_file; ?>" alt="Slide">
              </a>
            </div>
          <?php
          }
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only"></span>
        </a>
      </div>
    </section>


    <!-- <marquee><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"><img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200" loading="lazy"></marquee> -->



    <!-- <div class="container-fluid slider-area pt-3">
      <div class="wrapper">
        <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div>
        
        <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div>
        <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div>
        <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div>
        <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div>
        <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div>
        <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div> <div class="item">
          <img src="img/icon/logo/logo.png" alt="Company Logo" height="200" width="200">
        </div>
      </div>
    </div> -->



    <section class="custom-padding">
      <div class="fw-bold text-center text-dark pb-4">
        <h3>SHOP BY CATEGORY</h3>
      </div>

      <div class="tns-carousel">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;nav&quot;: true, &quot;gutter&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;992&quot;:{&quot;items&quot;:4}}}" id="">
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Tops">
              <img class="rounded-3" src="assets/images/about/768/m11.jpg" alt="Blog image ">
              <!-- <img class="hover-image" src=""> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">T Shirt</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Crop%20Top">
              <img class="rounded-3" src="assets/images/about/768/m12.jpg" alt="Blog image ">
              <!-- <img class="hover-image" src=""> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Dresses</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Sweater">
              <img class="rounded-3" src="assets/images/about/768/m14.jpg" alt="Blog image ">
              <!-- <img class="hover-image" src=""> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Dresses</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=T%20Shirt">
              <img class="rounded-3" src="assets/images/about/768/m16.jpg" alt="Blog image ">
              <!-- <img class="hover-image" src=""> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">T Shirt</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Skirt">
              <img class="rounded-3" src="assets/images/about/768/m17.jpg" alt="Blog image ">
              <!-- <img class="hover-image" src=""> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Shrugs</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3" href="product-category.php?page=1&category=Dresses">
              <img class="rounded-3" src="assets/images/about/768/m15.jpg" alt="Blog image ">
              <!-- <img class="hover-image rounded-3" src="assets/images/about/100.jpg"> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Dresses</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Shrugs">
              <img class="rounded-3" src="assets/images/about/768/m13.jpg" alt="Blog image ">
              <!-- <img class="hover-image" src=""> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Shrugs</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Shrugs">
              <img class="rounded-3" src="assets/images/about/768/m18.jpg" alt="Blog image ">
              <!-- <img class="hover-image" src=""> -->
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Dresses</h2>
            </a>
          </article>

        </div>
      </div>

      <div class="tns-carousel mt-5">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;nav&quot;: true, &quot;gutter&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;992&quot;:{&quot;items&quot;:4}}}" id="">
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Tops">
              <img class="rounded-3" src="assets/images/about/768/m22.jpg" alt="Blog image ">
              <img class="hover-image" src="">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Shrugs</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Crop%20Top">
              <img class="rounded-3" src="assets/images/about/768/m21.jpg" alt="Blog image ">
              <img class="hover-image" src="">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Dresses</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Sweater">
              <img class="rounded-3" src="assets/images/about/768/m23.jpg" alt="Blog image ">
              <img class="hover-image" src="">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Crop Top</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article>
            <a class="d-block mb-3 image-container" href="product-category.php?page=1&category=T%20Shirt">
              <img class="rounded-3" src="assets/images/about/768/m28.jpg" alt="Blog image ">
              <img class="hover-image" src="">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Sweater</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Skirt">
              <img class="rounded-3" src="assets/images/about/768/m27.jpg" alt="Blog image ">
              <img class="hover-image" src="">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Crop Top</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3" href="product-category.php?page=1&category=Dresses">
              <img class="rounded-3" src="assets/images/about/768/m26.jpg" alt="Blog image ">
              <img class="hover-image rounded-3" src="assets/images/about/100.jpg">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Dresses</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Shrugs">
              <img class="rounded-3" src="assets/images/about/768/m24.jpg" alt="Blog image ">
              <img class="hover-image" src="">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Crop Top</h2>
            </a>
          </article>
          <!-- Carousel item-->
          <article><a class="d-block mb-3 image-container" href="product-category.php?page=1&category=Shrugs">
              <img class="rounded-3" src="assets/images/about/768/m25.jpg" alt="Blog image ">
              <img class="hover-image" src="">
              <h2 class="h6 blog-entry-title mb-0 d-flex justify-content-center align-items-center mt-5">Top</h2>
            </a>
          </article>

        </div>
      </div>
    </section>

    <section class="custom-padding pt-5">
      <div class="button-container">
        <button id="tshirtBtn" class="active">T-Shirt</button>
        <button id="topBtn">Top</button>
        <button id="cropBtn">Crop Top</button>
      </div>

      <div>
        <div id="tshirtContent" class="content active">
          <?php
          $count = 0;

          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE category = 'T shirt' group by product_name LIMIT 4; ");

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card

            if ($count == 1) {
          ?>
              <div class="row mx-n2">

              <?php } ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card card-static">
                  <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <div class="image-container">
                      <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='450'>
                      <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image" width='450'>
                    </div>
                  </a>

                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                    <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                    <div class="d-flex justify-content-between">
                      <div class="product-price">
                        <span class="text-dark" id="product_selling_price">
                          <span>&#x20B9; </span>
                          <?php echo $selling_price ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($count == 6) { ?>
              </div>
          <?php $count = 0;
              }
            } ?>
        </div>
        <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=T%20shirt">VIEW &nbsp; ALL</a></div>
      </div>
      <!-- <div class="text-center pt-3 pb-5"><a class="btn btn-outline-dark" href="product-category.php?page=1&category=T shirt">VIEW &nbsp; ALL</a></div> -->


      <div>
        <div id="topContent" class="content">
          <?php
          $count = 0;

          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE category = 'Tops' group by product_name LIMIT 4; ");

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card

            if ($count == 1) {
          ?>


              <div class="row mx-n2">

              <?php } ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card card-static">
                  <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <div class="image-container">
                      <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='450'>
                      <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image" width='450'>
                    </div>
                  </a>
                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                    <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                    <div class="d-flex justify-content-between">

                      <div class="product-price">
                        <span class="text-dark" id="product_selling_price">
                          <span>&#x20B9; </span>
                          <?php echo $selling_price ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($count == 6) { ?>
              </div>

          <?php
                $count = 0;
              }
            }
          ?>
        </div>
        <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=Tops">VIEW &nbsp; ALL</a></div>
        <!-- <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark" href="product-category.php?page=1&category=Tops">VIEW &nbsp; ALL</a></div> -->
      </div>
      <div>
        <div id="cropContent" class="content">
          <?php
          $count = 0;

          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE category = 'Crop Top' LIMIT 4;");

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card

            if ($count == 1) {
          ?>
              <div class="row mx-n2">
              <?php } ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card card-static">

                  <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <div class="image-container">
                      <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='450'>
                      <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image" width='450'>
                    </div>
                  </a>
                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                    <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                    <div class="d-flex justify-content-between">

                      <div class="product-price">
                        <span class="text-dark" id="product_selling_price">
                        <span>&#x20B9; </span>
                          <?php echo $selling_price ?>
                        </span></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($count == 6) { ?>
              </div>
          <?php
                $count = 0;
              }
            }
          ?>
        </div>
        <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=Crop%20Top">VIEW &nbsp; ALL</a></div>
      </div>


    </section>

    <!-- <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=">VIEW &nbsp; ALL</a></div> -->


    <!--parallax-->

    <section id="parallax" class="video-parallax padding pt-5 pb-5">
      <div class=" pt-5 pb-5">
        <div class="row pt-5 pb-5">
          <div class="col-lg-6 col-md-6 col-sm-12 pt-5 pb-5">

          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 pt-5 pb-5">
            <div class="heading-title text-md-left text-center wow fadeIn" data-wow-delay="500ms">
              <!-- <span class="color-three text-white mb-5">SPORTS TEX</span> -->
              <img src="img/icon/logo/logo.png" alt="" height="250px" width="250px" class="pb-3">

              <h4 class="caveat">
                <span class="text-dark font-normal mb-5">From casual day dresses to elegant evening gowns,</span><br> <span class="text-dark  font-xlight"> find the perfect dress for any occasion.<br />
                  Express your personality with pieces that highlight your individual style.</span>
                <!-- <span class="font-normal color-two text-white">Perfection</span> -->
              </h4>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="custom-padding pb-5">
      <div class="button-container">
        <button id="dressesBtn" class="active">Dresses</button>
        <button id="shrugsBtn">Shrugs</button>
        <button id="skirtBtn">Skirt</button>
        <button id="sweaterBtn">Sweater</button>
      </div>

      <div>
        <div id="dressesContent" class="content active">
          <?php
          $count = 0;

          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE category = 'Dresses' LIMIT 4; ");

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card

            if ($count == 1) {
          ?>
              <div class="row mx-n2">

              <?php } ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card card-static">
                  <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <div class="image-container">
                      <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='450'>
                      <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image" width='450'>
                    </div>
                  </a>

                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                    <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                    <div class="d-flex justify-content-between">
                      <div class="product-price">
                        <span class="text-dark" id="product_selling_price">
                        <span>&#x20B9; </span>
                          <?php echo $selling_price ?>
                        </span></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($count == 6) { ?>
              </div>
          <?php $count = 0;
              }
            } ?>
        </div>
        <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=Dresses">VIEW &nbsp; ALL</a></div>
      </div>


      <div>
        <div id="shrugsContent" class="content">
          <?php
          $count = 0;

          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE category = 'Shrugs' LIMIT 4; ");

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card

            if ($count == 1) {
          ?>


              <div class="row mx-n2">

              <?php } ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card card-static">
                  <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <div class="image-container">
                      <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='450'>
                      <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image" width='450'>
                    </div>
                  </a>
                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                    <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                    <div class="d-flex justify-content-between">

                      <div class="product-price">
                        <span class="text-dark" id="product_selling_price">
                        <span>&#x20B9; </span>
                          <?php echo $selling_price ?>
                        </span></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($count == 6) { ?>
              </div>

          <?php
                $count = 0;
              }
            }
          ?>
        </div>
        <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=Shrugs">VIEW &nbsp; ALL</a></div>
      </div>
      <!-- <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark" href="product-category.php?page=1&category=Shrugs">VIEW &nbsp; ALL</a></div> -->


      <div>
        <div id="skirtContent" class="content">
          <?php
          $count = 0;

          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE category = 'Skirt' LIMIT 4; ");

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card

            if ($count == 1) {
          ?>


              <div class="row mx-n2">

              <?php } ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card card-static">
                  <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <div class="image-container">
                      <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='450'>
                      <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image" width='450'>
                    </div>
                  </a>
                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                    <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                    <div class="d-flex justify-content-between">

                      <div class="product-price">
                        <span class="text-dark" id="product_selling_price">
                      <span>&#x20B9; </span>
                          <?php echo $selling_price ?>
                        </span></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($count == 6) { ?>
              </div>

          <?php
                $count = 0;
              }
            }
          ?>
        </div>
        <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=Skirt">VIEW &nbsp; ALL</a></div>
        <!-- <div class="text-center pt-3"><a class="btn btn-outline-dark" href="product-category.php?page=1&category=Skirt">VIEW &nbsp; ALL</a></div> -->
      </div>

      <div>
        <div id="sweaterContent" class="content">
          <?php
          $count = 0;

          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE category = 'Sweater' LIMIT 4; ");

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card

            if ($count == 1) {
          ?>


              <div class="row mx-n2">

              <?php } ?>
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card card-static">
                  <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <div class="image-container">
                      <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='450'>
                      <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image" width='450'>
                    </div>
                  </a>
                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                    <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                    <div class="d-flex justify-content-between">

                      <div class="product-price">
                        <span class="text-dark" id="product_selling_price">
                        <span>&#x20B9; </span>
                          <?php echo $selling_price ?>
                        </span></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($count == 6) { ?>
              </div>

          <?php
                $count = 0;
              }
            }
          ?>
        </div>
        <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=Sweater">VIEW &nbsp; ALL</a></div>
      </div>
    </section>
    <!-- <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=">VIEW &nbsp; ALL</a></div> -->


    <!-- Bestsellers (Carousel)-->
    <section class="custom-padding pt-md-3 mb-md-3 mt-5 pt-5">
      <!-- Heading-->
      <div class="d-flex flex-wrap justify-content-center align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-3">TRENDING PRODUCT</h2>
      </div>
      <div class="row pt-4 mx-n2">
        <?php
        $select_Feilds_0 = "tid,sku,other_details,created_on,created_by,last_updated_on,last_updated_by";

        $result_0 = $obj_class_feature_product->selectDataWithoutWhere($select_Feilds_0);
        $count = 0;
        while ($row_0 = $result_0->fetch_assoc()) {
          $tid_0 = $row_0['tid'];
          $sku_0 = $row_0['sku'];
          $other_details_0 = $row_0['other_details'];
          $created_on_0 = $row_0['created_on'];
          $created_by_0 = $row_0['created_by'];
          $last_updated_on_0 = $row_0['last_updated_on'];
          $last_updated_by_0 = $row_0['last_updated_by'];

          $select_Feilds = "tid,sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,stock_on_hold,discount_percentage,offer_name,whole_sale_price,opening_stock,ext_file_1,ext_file_2,ext_file_3,ext_file_4,ext_file_hover,product_display_name";
          $select_whereClause = "sku = '" . $sku_0 . "'";

          $result = $obj_class_product->selectData($select_Feilds, $select_whereClause);

          while ($row = $result->fetch_assoc()) {
            $count++;
            $tid = $row['tid'];
            $sku = $row['sku'];
            $product_type = $row['product_type'];
            $category = $row['category'];
            $sub_category = $row['sub_category'];
            $super_sub_category = $row['super_sub_category'];
            $brand_name = $row['brand_name'];
            $product_name = $row['product_name'];
            $stock = $row['stock'];
            $unit = $row['unit'];
            $tax_type = $row['tax_type'];
            $selling_price = $row['selling_price'];
            $purchase_price = $row['purchase_price'];
            $mrp = $row['mrp'];
            $supplier_name = $row['supplier_name'];
            $colour = $row['colour'];
            $size = $row['size'];
            $barcode = $row['barcode'];
            $pack_stock = $row['pack_stock'];
            $product_description = $row['product_description'];
            $rack_details = $row['rack_details'];
            $image1_url = $row['image1_url'];
            $min_stock = $row['min_stock'];
            $part_no_01 = $row['part_no_01'];
            $part_no_02 = $row['part_no_02'];
            $part_no_03 = $row['part_no_03'];
            $stock_on_hold = $row['stock_on_hold'];
            $discount_percentage = $row['discount_percentage'];
            $offer_name = $row['offer_name'];
            $whole_sale_price = $row['whole_sale_price'];
            $opening_stock = $row['opening_stock'];
            $ext_file_1 = $row['ext_file_1'];
            $ext_file_2 = $row['ext_file_2'];
            $ext_file_3 = $row['ext_file_3'];
            $ext_file_4 = $row['ext_file_4'];
            $ext_file_hover = $row['ext_file_hover'];
            $product_display_name = $row['product_display_name'];

            $modifiedSku = $sku;
            // Modify the SKU here as required

            // HTML for product card
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
              <div class="card product-card" style="border-radius: 20px;">
                <!-- Product Image -->
                <!-- <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                  title="Add to wishlist" onclick="wishlist('<?php echo $sku ?>','<?php echo $selling_price ?>')"><i
                    class="ci-heart"></i></button> -->

                <!-- <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist" data-sku="<?php //echo $sku 
                                                                                                                                                            ?>" data-price="<?php //echo $selling_price 
                                                                                                                                                                            ?>" onclick="toggleWishlist(this)">
                  <i class="ci-heart"></i>
                </button> -->


                <a class="card-img-top d-block card-hover-shadow overflow-hidden" style="border-radius: 20px;" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">

                  <div class="image-container" style="position: relative; border-radius: 20px;">
                    <img class="d-flex main-image" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product">
                    <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image">
                    <div class="overlay-text"><?php echo $category ?></div>
                  </div>
                </a>

                <!-- <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php //echo $category 
                                                                                                      ?></a>
                  <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php //echo $sku 
                                                                                ?>"><?php //echo $product_display_name 
                                                                                    ?></a></h3>
                  <div class="d-flex justify-content-between">



                    <div class="product-price"><span class="text-dark" id="product_selling_price">
                        <?php //echo $selling_price 
                        ?>
                      </span></div>
                  </div>
                </div> -->
              </div>
            </div>
        <?php
            // Check if it's the end of the first row, then close the row div and open a new one for the second row
            if ($count == 4) {
              echo '</div><div class="row">';
              $count = 0;
            }
          }
        }
        ?>
      </div>
      <!-- <div class="text-center pt-3"><a class="btn btn-outline-dark" href="product-category.php?page=1">More products<i class="ci-arrow-right ms-1 me-n1"></i></a></div> -->
    </section>


    <section class="container py-lg-4 mb-4">
      <!-- <h2 class="h3 text-center pb-4">Shop by brand</h2> -->
      <!-- <div class="row">
          <div class="col-md-4 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/wall-sticker.jpg" style="width: 250px;" alt="Brand"></a></div>
          <div class="col-md-4 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/jack-jmmy.jpg" style="width: 100px;" alt="Brand"></a></div>
          <div class="col-md-4 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/pap-fab.jpg" style="width: 250px;" alt="Brand"></a></div>
        </div> -->
    </section>
  </main>


  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  var tokenid = "<?php echo session_id(); ?>";


  document.addEventListener('DOMContentLoaded', function() {
    // Initialize the heart icon state for all wishlist buttons
    initializeHeartIconState();
  });

  function toggleWishlist(button) {
    var sku = button.getAttribute('data-sku');
    var rate = button.getAttribute('data-price');

    if (sku.length > 0) {
      // Retrieve and parse the wishlist array from localStorage
      var storedJsonString = localStorage.getItem("wishlist");
      var storedArray = storedJsonString ? JSON.parse(storedJsonString) : [];

      // Check if the item already exists in the wishlist
      var foundObjectIndex = storedArray.findIndex(function(obj) {
        return obj.sku === sku;
      });

      if (foundObjectIndex !== -1) {
        // Item found, remove it from the wishlist
        storedArray.splice(foundObjectIndex, 1);
        showToastSuccess("Success", "Wishlist Removed");
      } else {
        // Item not found, add it to the wishlist
        var newItem = {
          sku: sku,
          qty: 1,
          rate: rate
        };
        storedArray.push(newItem);
        showToastSuccess("Success", "Wishlist Added");
      }

      // Update the wishlist in localStorage
      var jsonString = JSON.stringify(storedArray);
      localStorage.setItem("wishlist", jsonString);

      // Toggle the heart icon
      toggleHeartIcon(button, foundObjectIndex === -1);
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Please Select the Colour and Size!',
        confirmButtonColor: '#3085d6',
      });
    }
  }

  function toggleHeartIcon(button, isAdding) {
    var icon = button.querySelector('i');

    if (isAdding) {
      icon.classList.remove('ci-heart');
      icon.classList.add('ci-heart-filled'); // Assuming 'ci-heart-filled' is the class for the red heart
    } else {
      icon.classList.remove('ci-heart-filled');
      icon.classList.add('ci-heart');
    }
  }

  function initializeHeartIconState() {
    var buttons = document.querySelectorAll('.btn-wishlist');
    var storedJsonString = localStorage.getItem("wishlist");
    var storedArray = storedJsonString ? JSON.parse(storedJsonString) : [];

    buttons.forEach(function(button) {
      var sku = button.getAttribute('data-sku');

      // Check if the item exists in the wishlist
      var foundObjectIndex = storedArray.findIndex(function(obj) {
        return obj.sku === sku;
      });

      // Update the heart icon based on the presence of the item in the wishlist
      toggleHeartIcon(button, foundObjectIndex !== -1);
    });
  }


  // var myParamKey1 = getUrlParameter("key1");

  // if (myParamKey1 == "invalidlogin") {
  //   // Swal.fire({
  //   //   icon: 'warning',
  //   //   title: 'Oops...',
  //   //   text: 'Invalid Login!',
  //   //   confirmButtonColor: '#ff0000'
  //   // });


  //   var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

  //   // Trigger the modal
  //   signInModal.show();


  //   // Destroy key1 parameter after loading

  //   // Get the current URL
  //   var url = window.location.href;

  //   // Remove the parameters by creating a new URL without them
  //   var updatedURL = url
  //     .replace(/([?&])key1=.*?(&|$)/, '$1')
  //     // .replace(/([?&])updateKey=.*?(&|$)/, '$1')
  //     // .replace(/([?&])insertID=.*?(&|$)/, '$1')
  //     .replace(/(&|\?)$/, '');

  //   // Replace the current URL with the updated one
  //   window.history.replaceState({}, document.title, updatedURL);

  // }


  // if (myParamKey1 == "password_mismatch") {

  //   var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

  //   // Trigger the modal
  //   signInModal.show();


  //   // Get the current URL
  //   var url = window.location.href;

  //   // Remove the parameters by creating a new URL without them
  //   var updatedURL = url
  //     .replace(/([?&])key1=.*?(&|$)/, '$1')
  //     .replace(/([?&])fname=.*?(&|$)/, '$1')
  //     .replace(/([?&])lname=.*?(&|$)/, '$1')
  //     .replace(/([?&])email=.*?(&|$)/, '$1')
  //     .replace(/(&|\?)$/, '');

  //   // Replace the current URL with the updated one
  //   window.history.replaceState({}, document.title, updatedURL);

  // }



  // if (myParamKey1 == "signup_success") {

  //   var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

  //   // Trigger the modal
  //   signInModal.show();


  //   // Get the current URL
  //   var url = window.location.href;

  //   // Remove the parameters by creating a new URL without them
  //   var updatedURL = url
  //     .replace(/([?&])key1=.*?(&|$)/, '$1')
  //     .replace(/(&|\?)$/, '');

  //   // Replace the current URL with the updated one
  //   window.history.replaceState({}, document.title, updatedURL);

  // }








  function add_to_cart(sku, rate) {

    if (sku.length > 0) {

      var upn = sku;
      var quantity = "1";
      var sub = "0";
      var selling_price = rate;


      var cartItem = {
        sku: upn,
        qty: quantity,
        rate: selling_price,
        subscribe: sub
      };

      // Retrieving and parsing the array of objects
      var storedJsonString = localStorage.getItem("added_cart");

      if (storedJsonString != null) {
        var storedArray = JSON.parse(storedJsonString);

        // Find the index of an object with matching SKU and size
        var existingIndex = storedArray.findIndex(function(obj) {
          return obj.sku === cartItem.sku;
        });

        if (existingIndex !== -1) {
          // Update the existing item
          storedArray[existingIndex] = cartItem;
        } else {
          // Add the new item
          storedArray.push(cartItem);
        }

        var jsonString = JSON.stringify(storedArray);
        localStorage.setItem("added_cart", jsonString);
      } else {
        var jsonString = JSON.stringify([cartItem]);
        localStorage.setItem("added_cart", jsonString);
      }

      // if (buy == "buy_now") {
      //   window.location.href = 'shop-cart.php';
      // } else {
      // Swal.fire({
      //   icon: 'success',
      //   title: 'Cool...',
      //   text: 'Added to Cart!',
      //   confirmButtonColor: '#3085d6',
      // });
      // }


      // cznotifytimeout("Oops!", "Please click the refresh button", "warning");

      showToastSuccess("Success", "Added to Cart");



      // console.log(JSON.parse(localStorage.getItem("added_cart")));
      added_cart = JSON.parse(localStorage.getItem("added_cart"));
      // console.log(added_cart);

      if (added_cart) {
        $('.cart_qty_cls').html(added_cart.length);
      } else {
        $('.cart_qty_cls').html(0);
      }
    }
  }

  $(document).ready(function() {
    $('title').html('HOME');
  });

  // function setActive(buttonId, contentId) {
  //   // Remove active class from all buttons and contents
  //   $('.button-container button').removeClass('active');
  //   $('.content').removeClass('active');

  //   // Add active class to the clicked button and corresponding content
  //   $('#' + buttonId).addClass('active');
  //   $('#' + contentId).addClass('active');
  // }

  // $('#tshirtBtn').on('click', function() {
  //   setActive('tshirtBtn', 'tshirtContent');
  // });

  // $('#topBtn').on('click', function() {
  //   setActive('topBtn', 'topContent');
  //   console.log("hii");
  // });

  // tshirtBtn
  // tshirtContent

  // topBtn
  // topContent



  $(document).ready(function() {
    // Handle click event for #topBtn
    $("#topBtn").on("click", function() {
      // Add active class to the clicked button and corresponding content
      $(this).addClass('active');
      $("#topContent").addClass('active');

      // Remove active class from the other buttons and content
      $("#tshirtBtn").removeClass('active');
      $("#tshirtContent").removeClass('active');
      $("#cropBtn").removeClass('active');
      $("#cropContent").removeClass('active');
    });

    // Handle click event for #tshirtBtn
    $("#tshirtBtn").on("click", function() {
      // Add active class to the clicked button and corresponding content
      $(this).addClass('active');
      $("#tshirtContent").addClass('active');

      // Remove active class from the other buttons and content
      $("#topBtn").removeClass('active');
      $("#topContent").removeClass('active');
      $("#cropBtn").removeClass('active');
      $("#cropContent").removeClass('active');
    });

    // Handle click event for #cropBtn
    $("#cropBtn").on("click", function() {
      // Add active class to the clicked button and corresponding content
      $(this).addClass('active');
      $("#cropContent").addClass('active');

      // Remove active class from the other buttons and content
      $("#topBtn").removeClass('active');
      $("#topContent").removeClass('active');
      $("#tshirtBtn").removeClass('active');
      $("#tshirtContent").removeClass('active');
    });
  });





  $(document).ready(function() {
    // Handle click event for #topBtn
    $("#dressesBtn").on("click", function() {
      // Add active class to the clicked button and corresponding content
      $(this).addClass('active');
      $("#dressesContent").addClass('active');

      // Remove active class from the other buttons and content
      $("#shrugsBtn").removeClass('active');
      $("#shrugsContent").removeClass('active');
      $("#skirtBtn").removeClass('active');
      $("#skirtContent").removeClass('active');
      $("#sweaterBtn").removeClass('active');
      $("#sweaterContent").removeClass('active');
    });

    // Handle click event for #tshirtBtn
    $("#shrugsBtn").on("click", function() {
      // Add active class to the clicked button and corresponding content
      $(this).addClass('active');
      $("#shrugsContent").addClass('active');

      // Remove active class from the other buttons and content
      $("#skirtBtn").removeClass('active');
      $("#skirtContent").removeClass('active');
      $("#sweaterBtn").removeClass('active');
      $("#sweaterContent").removeClass('active');
      $("#dressesBtn").removeClass('active');
      $("#dressesContent").removeClass('active');
    });

    // Handle click event for #cropBtn
    $("#skirtBtn").on("click", function() {
      // Add active class to the clicked button and corresponding content
      $(this).addClass('active');
      $("#skirtContent").addClass('active');

      // Remove active class from the other buttons and content
      $("#shrugsBtn").removeClass('active');
      $("#shrugsContent").removeClass('active');
      $("#sweaterBtn").removeClass('active');
      $("#sweaterContent").removeClass('active');
      $("#dressesBtn").removeClass('active');
      $("#dressesContent").removeClass('active');
    });

    // Handle click event for #cropBtn
    $("#sweaterBtn").on("click", function() {
      // Add active class to the clicked button and corresponding content
      $(this).addClass('active');
      $("#sweaterContent").addClass('active');

      // Remove active class from the other buttons and content
      $("#shrugsBtn").removeClass('active');
      $("#shrugsContent").removeClass('active');
      $("#dressesBtn").removeClass('active');
      $("#dressesContent").removeClass('active');
      $("#skirtBtn").removeClass('active');
      $("#skirtContent").removeClass('active');
    });
  });
</script>
<script src="script.js"></script>

</html>