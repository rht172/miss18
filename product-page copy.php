<!DOCTYPE html>
<html lang="en">
<style>
  .carousel-item img {
    margin: 0 auto;
  }

  .lg-toolbar {
    opacity: 2 !important;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 10;
  }

  .ci-heart {
    color: #000;
    /* default color */
  }

  .ci-heart-filled {
    color: red;
    /* color when added to wishlist */
  }
</style>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
include 'includes/title.php';
include 'includes/header.php';

$obj_class_product = new czDBAccess();
$obj_class_color = new czDBAccess();
$obj_class_product->varTableName = 'product_table_ecom';
$obj_class_color->varTableName = 'color_master_table';

$product_display_name = "";
$ext_file_hover = "";

$sku_0 = czGet('sku');
$category_0 = czGet('category');
$selectedcolour = czGet('colour');
$selectedsize = czGet('size');
$selectedsku = czGet('sku');

$tid = $sku = $product_type = $category = $sub_category = $super_sub_category = $brand_name = $product_name = $stock = $unit = $tax_type = $selling_price = $purchase_price = $mrp = $supplier_name = $colour = $size = $barcode = $pack_stock = $product_description = $rack_details = $image1_url = $min_stock = $part_no_01 = $part_no_02 = $part_no_03 = $stock_on_hold = $discount_percentage = $offer_name = $whole_sale_price = $opening_stock = $ext_file_1 = $ext_file_2 = $ext_file_3 = $ext_file_4 = $pt_color = $pt_size = $ext_file_5 = $ext_file_6 = $description_1 = $description_2 = $faq = $ext_file_banner_1 = $ext_file_banner_2 = $bg_color = $ext_file_banner_3 = $ext_file_banner_4 = $ext_file_banner_5 = "";


$result = $obj_class_product->selectData_customqry("SELECT product_table_ecom.*,product_table.size as pt_size,product_table.colour as pt_colour FROM product_table_ecom left join product_table on product_table_ecom.sku = product_table.sku where product_table_ecom.sku = '$sku_0'");


while ($row = $result->fetch_assoc()) {

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
  $pt_color = $row['pt_colour'];
  $pt_size = $row['pt_size'];
  $ext_file_5 = $row['ext_file_5'];
  $ext_file_6 = $row['ext_file_6'];
  $description_1 = $row['description_1'];
  $description_2 = $row['description_2'];
  $faq = $row['faq'];
  $sub_save_1 = $row['sub_save_1'];
  $sub_save_2 = $row['sub_save_2'];
  $sub_save_3 = $row['sub_save_3'];
  $ext_file_hover = $row['ext_file_hover'];

  $ext_file_banner_1 = $row['ext_file_banner_1'];
  $ext_file_banner_2 = $row['ext_file_banner_2'];
  $ext_file_banner_3 = $row['ext_file_banner_3'];
  $ext_file_banner_4 = $row['ext_file_banner_4'];
  $ext_file_banner_5 = $row['ext_file_banner_5'];


  $ext_file_7 = $row['ext_file_7'];
  $ext_file_8 = $row['ext_file_8'];
  $ext_file_9 = $row['ext_file_9'];
  $ext_file_10 = $row['ext_file_10'];


  $product_display_name = $row['product_display_name'];
}

?>

<!-- Body-->

<body class="handheld-toolbar-enabled">

  <!-- Google Tag Manager (noscript)-->
  <noscript>
    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
      style="display: none; visibility: hidden;"></iframe>
  </noscript>

  <?php
  include 'sign-up-form.php';
  ?>


  <main class="page-wrapper">
    <?php

    ?>
    <div class="modal fade" id="size-chart">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist" style="margin-bottom: -1rem;">
              <li class="nav-item">
                <a class="nav-link fw-medium active" href="#womens" data-bs-toggle="tab" role="tab"
                  aria-controls="womens" aria-selected="true">Women's sizes</a>
              </li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-0">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="womens" role="tabpanel">
                <div class="table-responsive">
                  <table class="table fs-sm text-center mb-0">
                    <thead>
                      <tr>
                        <th class="align-middle bg-secondary">US<br>Sizes</th>
                        <th class="align-middle">Euro<br>Sizes</th>
                        <th class="align-middle">UK<br>Sizes</th>
                        <th class="align-middle">Inches</th>
                        <th class="align-middle">CM</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="bg-secondary fw-medium">4</td>
                        <td>35</td>
                        <td>2</td>
                        <td>8.1875"</td>
                        <td>20.8</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">4.5</td>
                        <td>35</td>
                        <td>2.5</td>
                        <td>8.375"</td>
                        <td>21.3</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">5</td>
                        <td>35-36</td>
                        <td>3</td>
                        <td>8.5"</td>
                        <td>21.6</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">5.5</td>
                        <td>36</td>
                        <td>3.5</td>
                        <td>8.75"</td>
                        <td>22.2</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">6</td>
                        <td>36-37</td>
                        <td>4</td>
                        <td>8.875"</td>
                        <td>22.5</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">6.5</td>
                        <td>37</td>
                        <td>4.5</td>
                        <td>9.0625"</td>
                        <td>23</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">7</td>
                        <td>37-38</td>
                        <td>5</td>
                        <td>9.25"</td>
                        <td>23.5</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">7.5</td>
                        <td>38</td>
                        <td>5.5</td>
                        <td>9.375"</td>
                        <td>23.8</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">8</td>
                        <td>38-39</td>
                        <td>6</td>
                        <td>9.5"</td>
                        <td>24.1</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">8.5</td>
                        <td>39</td>
                        <td>6.5</td>
                        <td>9.6875"</td>
                        <td>24.6</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">9</td>
                        <td>39-40</td>
                        <td>7</td>
                        <td>9.875"</td>
                        <td>25.1</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">9.5</td>
                        <td>40</td>
                        <td>7.5</td>
                        <td>10"</td>
                        <td>25.4</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">10</td>
                        <td>40-41</td>
                        <td>8</td>
                        <td>10.1875"</td>
                        <td>25.9</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">10.5</td>
                        <td>41</td>
                        <td>8.5</td>
                        <td>10.3125"</td>
                        <td>26.2</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">11</td>
                        <td>41-42</td>
                        <td>9</td>
                        <td>10.5"</td>
                        <td>26.7</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">11.5</td>
                        <td>42</td>
                        <td>9.5</td>
                        <td>10.6875"</td>
                        <td>27.1</td>
                      </tr>
                      <tr>
                        <td class="bg-secondary fw-medium">12</td>
                        <td>42-43</td>
                        <td>10</td>
                        <td>10.875"</td>
                        <td>27.6</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 text-light mb-0"><?php echo $category ?></php>
          </h1>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Gallery + details-->
      <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
        <div class="px-lg-3">
          <div class="row">
            <!-- Product gallery-->

            <div class="col-lg-7 pe-lg-0 pt-lg-4">
              <div class="product-gallery">
                <div class="product-gallery-preview order-sm-2 ">
                  <div class="product-gallery-preview-item active first" id="first">
                    <img class="image-zoom" id="product_image_1"
                      src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>"
                      alt="Product image"
                      data-zoom="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>">
                    <div class="image-zoom-pane"></div>
                  </div>
                  <div class="product-gallery-preview-item second" id="second"><img class="image-zoom"
                      id="product_image_2"
                      src="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>"
                      alt="Product image"
                      data-zoom="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>">
                    <div class="image-zoom-pane"></div>
                  </div>
                  <div class="product-gallery-preview-item third" id="third"><img class="image-zoom" id="hover_img"
                      src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>"
                      alt="Product image">
                    <div class="image-zoom-pane"></div>
                  </div>
                </div>

                <div class="product-gallery-thumblist order-sm-1">

                  <a class="product-gallery-thumblist-item active" id="small_image_div_1" href="#first"><img
                      id="small_image_1"
                      src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>"
                      alt="Product thumb"></a>

                  <?php if (strlen($ext_file_2 > 0) || strlen($ext_file_3 > 0) || strlen($ext_file_4 > 0) || strlen($ext_file_hover > 0)) { ?>
                    <!-- <div class="product-gallery-thumblist order-sm-1"> -->
                    <?php if (strlen($ext_file_2 > 0)) { ?>

                      <a class="product-gallery-thumblist-item" href="#second" id="small_image_div_2"><img
                          id="small_image_2"
                          src="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>"
                          alt="Product thumb"></a>

                    <?php } ?>
                    <?php if (strlen($ext_file_hover > 0)) { ?>

                      <a class="product-gallery-thumblist-item" href="#third" id="small_image_div_3"><img id="small_image_3"
                          src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>"
                          alt="Product thumb"></a>

                    <?php } ?>



                  <?php } ?>

                  <div class="additional-images-container d-none" id="toggleElement">
                    <div id="carouselExampleIndicators" class="container carousel slide" data-ride="carousel">
                      <div id="lg-backdrop-1" class="lg-backdrop in" style="transition-duration: 30ms;">
                        <div class="carousel-inner text-center" style="top: 47px; bottom: 44px;">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>

                          </ol>
                          <div class="change-slider">

                            <?php if (strlen($ext_file_1 > 0)) { ?>
                              <div class="carousel-item active">
                                <img class=" pb-5" id="product_image_1"
                                  src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>"
                                  alt="First slide" width="600" height="500">
                              </div>
                            <?php } ?>

                            <?php if (strlen($ext_file_hover > 0)) { ?>
                              <div class="carousel-item ">
                                <img class=" pb-5" id="hover_img"
                                  src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>"
                                  alt="Second slide" width="600" height="500">
                              </div>
                            <?php } ?>

                            <?php if (strlen($ext_file_2 > 0)) { ?>
                              <div class="carousel-item">
                                <img class=" pb-5" id="product_image_3"
                                  src="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>"
                                  alt="Third slide" width="600" height="500">
                              </div>
                            <?php } ?>

                            <?php if (strlen($ext_file_3 > 0)) { ?>
                              <div class="carousel-item">
                                <img class=" pb-5" id="product_image_4"
                                  src="cz-admin/attachments/product/product_image2/tid-<?php echo $tid ?>.<?php echo $ext_file_3 ?>"
                                  alt="Fourth slide" width="600" height="500">
                              </div>
                            <?php } ?>

                            <?php if (strlen($ext_file_9 > 0)) { ?>
                              <div class="carousel-item">
                                <img class=" pb-5" id="product_image6"
                                  src="cz-admin/attachments/product/product_image6/tid-<?php echo $tid ?>.<?php echo $ext_file_9 ?>"
                                  alt="Five slide" width="600" height="500">
                              </div>
                            <?php } ?>


                            <?php if (strlen($ext_file_10 > 0)) { ?>
                              <div class="carousel-item">
                                <img class=" pb-5" id="product_image_6"
                                  src="cz-admin/attachments/product/product_image7/tid-<?php echo $tid ?>.<?php echo $ext_file_10 ?>"
                                  alt="Sixth slide" width="600" height="500">
                              </div>
                            <?php } ?>


                            <?php if (strlen($ext_file_7 > 0)) { ?>
                              <div class="carousel-item">
                                <img class=" pb-5" id="product_image_7"
                                  src="cz-admin/attachments/product/product_image4/tid-<?php echo $tid ?>.<?php echo $ext_file_7 ?>"
                                  alt="Seventh slide" width="600" height="500">
                              </div>
                            <?php } ?>


                            <?php if (strlen($ext_file_8 > 0)) { ?>
                              <div class="carousel-item">
                                <img class=" pb-5" id="product_image5"
                                  src="cz-admin/attachments/product/product_image5/tid-<?php echo $tid ?>.<?php echo $ext_file_8 ?>"
                                  alt="Eight slide" width="600" height="500">
                              </div>
                            <?php } ?>

                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                          data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                          data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only"></span>
                        </a>
                        <div id="lg-toolbar-1" class="lg-toolbar lg-group">
                          <button type="button" aria-label="Close gallery" id="lg-close-1"
                            class="lg-close lg-icon btn btn-danger">
                          </button>
                          <!-- <button id="lg-actual-size-1" type="button" aria-label="View actual size"
                            class="lg-zoom-in lg-icon"></button> -->
                          <!-- <button type="button" aria-label="Toggle Fullscreen" class="lg-fullscreen lg-icon"></button> -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-3 d-flex justify-content-center">
                    <button id="show-more-btn" onclick="toggleAdditionalImages()">Show More</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Product details--------------------------------->
            <div class="col-lg-5 pt-4 pt-lg-0">
              <div class="product-details ms-auto pb-2 pt-4">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class='m-0 d-none' id='product_sku'>
                    <?php echo $sku ?>
                  </h5>
                  <h5 class='m-0' id='display_sku'>
                    <?php echo $product_display_name ?>
                  </h5>
                  <a href=""></a>
                  <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Add to wishlist" data-sku="<?php echo $sku ?>" data-price="<?php echo $selling_price ?>"
                    onclick="toggleWishlist(this)">
                    <i class="ci-heart"></i>
                  </button>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                    </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 Reviews</span>
                  </a>
                </div>

                <div class="position-relative me-n4  mb-3">

                  <div class="mb-3"><span class="h3 fw-normal text-accent me-1" id='product_selling_price'>
                      <?php echo $selling_price ?>
                    </span>
                    <del class="text-muted fs-lg me-3" id='product_mrp'>
                      <?php
                      if ($selling_price != $mrp) {
                        echo $mrp;
                      }
                      ?>
                    </del><span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                  </div>

                  <div id="product_status">
                    <?php
                    $branch_stock = 0;
                    $result_34 = $obj_class_product->selectData_customqry("SELECT stock from product_table_ecom where sku = '$sku';");
                    while ($row = $result_34->fetch_assoc()) {
                      $branch_stock = $row['stock'];
                    }

                    // echo $branch_stock;
                    
                    if ($branch_stock > 0) {
                      // echo '<div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available </div>';
                    
                      // <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available
                      // </div>
                    
                      echo '<div class="product-badge product-available  mt-n1"><i class="ci-security-check"></i>Product available </div>';


                    } else {
                      // echo '<div class="product-badge product-not-available mt-n1"><i class="ci-security-close"></i>Product unavailable </div>';
                    
                      echo '<div class="product-badge product-not-available mt-n1"><i class="ci-security-close"></i>Product unavailable </div>';
                    }
                    ?>

                  </div>
                </div>

                <form class="mb-grid-gutter" method="post">
                  <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center pb-1">
                      <label class="form-label" for="product-size">Size:</label><a class="nav-link-style fs-sm"
                        href="#size-chart" data-bs-toggle="modal"><i
                          class="ci-ruler lead align-middle me-1 mt-n1"></i>Size guide</a>
                    </div>
                    <select class="form-select" required id="product-size">
                      <option value="">Select Size</option>
                      <?php
                      $result_33 = $obj_class_product->selectData_customqry("SELECT distinct product_table_ecom.sub_category,sku,size,product_name FROM product_table_ecom  WHERE product_name  = '$product_name';");
                      while ($row = $result_33->fetch_assoc()) {
                        $sizeValue_1 = $row['size'];
                        $not_pad_sku = $row['sku'];
                        $isSelected = ($sku == $not_pad_sku) ? 'selected' : '';

                        echo '<option ' . $isSelected . ' onclick="change_sku(\'' . $not_pad_sku . '\'),check_stock(\'' . $not_pad_sku . '\'),changeColor(this)" value="' . $sizeValue_1 . '">' . $sizeValue_1 . '</option>';
                      }
                      ?>
                    </select>

                  </div>
                </form>


                <div class="row mb-3 mt-2">
                  <div class="col-md-2 mb-4 d-flex align-items-center">
                    <span class="text-heading fw-medium me-1 fs-sm">Quantity:</span>
                  </div>
                  <div class="col-md-10 mb-4">
                    <div class="input-group">
                      <button class="btn btn-outline-secondary" type="button" id="decrementButton">-</button>
                      <input type="text" id="customValueInput" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        class="form-control text-center pcsQty" placeholder="Enter" value="1">
                      <button class="btn btn-outline-secondary" type="button" id="incrementButton">+</button>
                    </div>
                  </div>


                  <!-- <div class="col-md-7 mb-3 d-flex align-items-center justify-content-evenly p-0"> -->
                  <div><button class="btn btn-primary btn-shadow d-block w-100 product-add-cart mb-4"
                      onclick="size_and_colour()"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                  </div>

                  <div>
                    <?php $buy_now = "buy_now"; ?>
                    <button class="btn btn-light btn-shadow d-block w-100 product-buy-now" id=""
                      onclick="size_and_colour('<?php echo $buy_now ?>')">Buy
                      Now</button>
                  </div>
                  <!-- </div> -->
                </div>
              </div>
              <!-- Product panels-->
              <div class="accordion mb-4" id="productPanels">
                <?php echo $product_description ?>

              </div>
              <!-- Sharing-->
              <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a
                class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a
                class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a
                class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Product description section 1-->
    <div class="row align-items-center py-md-3">
      <div class="col-lg-5 col-md-6 offset-lg-1 order-md-2">
        <img class="d-block rounded-3" src="img/shop/single/01.jpg" alt="Image">
      </div>
      <div class="col-lg-4 col-md-6 offset-lg-1 py-4 order-md-1">
        <h2 class="h3 mb-4 pb-2">High quality materials</h2>
        <h6 class="fs-base mb-3">Soft cotton blend</h6>
        <p class="fs-sm text-muted pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit.</p>
        <h6 class="fs-base mb-3">Washing instructions</h6>
        <ul class="nav nav-tabs mb-3" role="tablist">
          <li class="nav-item"><a class="nav-link active" href="#wash" data-bs-toggle="tab" role="tab"><i
                class="ci-wash fs-xl"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#bleach" data-bs-toggle="tab" role="tab"><i
                class="ci-bleach fs-xl"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#hand-wash" data-bs-toggle="tab" role="tab"><i
                class="ci-hand-wash fs-xl"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#ironing" data-bs-toggle="tab" role="tab"><i
                class="ci-ironing fs-xl"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#dry-clean" data-bs-toggle="tab" role="tab"><i
                class="ci-dry-clean fs-xl"></i></a></li>
        </ul>
        <div class="tab-content text-muted fs-sm">
          <div class="tab-pane fade show active" id="wash" role="tabpanel">30° mild machine washing</div>
          <div class="tab-pane fade" id="bleach" role="tabpanel">Do not use any bleach</div>
          <div class="tab-pane fade" id="hand-wash" role="tabpanel">Hand wash normal (30°)</div>
          <div class="tab-pane fade" id="ironing" role="tabpanel">Low temperature ironing</div>
          <div class="tab-pane fade" id="dry-clean" role="tabpanel">Do not dry clean</div>
        </div>
      </div>
    </div>
    <!-- Product description section 2-->
    <div class="row align-items-center py-4 py-lg-5">
      <div class="col-lg-5 col-md-6 offset-lg-1"><img class="d-block rounded-3" src="img/shop/single/prod-map.png"
          alt="Map"></div>
      <div class="col-lg-4 col-md-6 offset-lg-1 py-4">
        <h2 class="h3 mb-4 pb-2">Where is it made?</h2>
        <!-- <h6 class="fs-base mb-3">Apparel Manufacturer, Ltd.</h6> -->
        <p class="fs-sm text-muted pb-2"> C-4 Hampton Business Park, Chandigarh Road, Ludhiana,
          Punjab 141011
        </p>
        <div class="d-flex mb-2">
          <div class="me-4 pe-2 text-center">
            <h4 class="h2 text-accent mb-1">3258</h4>
            <p>Workers</p>
          </div>
          <div class="me-4 pe-2 text-center">
            <h4 class="h2 text-accent mb-1">43%</h4>
            <p>Female</p>
          </div>
          <div class="text-center">
            <h4 class="h2 text-accent mb-1">57%</h4>
            <p>Male</p>
          </div>
        </div>
        <h6 class="fs-base mb-3">Factory information</h6>
        <p class="fs-sm text-muted pb-md-2">​Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
          tempor incididunt ut labore et dolore.</p>
      </div>
    </div>
    </div>
    <!-- Product carousel (You may also like)-->
    <div class="container py-5 my-md-3">
      <h2 class="h3 text-center pb-4">You may also like</h2>
      <div class="tns-carousel tns-controls-static tns-controls-outside">
        <div class="tns-carousel-inner"
          data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
          <!-- Product-->

          <?php

          $select_Fields_1 = "tid,sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,stock_on_hold,discount_percentage,offer_name,whole_sale_price,opening_stock,ext_file_1,ext_file_2,ext_file_3,ext_file_4";
          $result_1 = $obj_class_product->selectData_customqry("SELECT $select_Fields_1 FROM product_table_ecom where product_name != '$product_name' group by product_name order by rand() limit 5");


          while ($row_1 = $result_1->fetch_assoc()) {

            $rand_tid = $row_1['tid'];
            $rand_sku = $row_1['sku'];
            $rand_product_type = $row_1['product_type'];
            $rand_category = $row_1['category'];
            $rand_sub_category = $row_1['sub_category'];
            $rand_super_sub_category = $row_1['super_sub_category'];
            $rand_brand_name = $row_1['brand_name'];
            $rand_product_name = $row_1['product_name'];
            $rand_stock = $row_1['stock'];
            $rand_unit = $row_1['unit'];
            $rand_tax_type = $row_1['tax_type'];
            $rand_selling_price = $row_1['selling_price'];
            $rand_purchase_price = $row_1['purchase_price'];
            $rand_mrp = $row_1['mrp'];
            $rand_supplier_name = $row_1['supplier_name'];
            $rand_colour = $row_1['colour'];
            $rand_size = $row_1['size'];
            $rand_barcode = $row_1['barcode'];
            $rand_pack_stock = $row_1['pack_stock'];
            $rand_product_description = $row_1['product_description'];
            $rand_rack_details = $row_1['rack_details'];
            $rand_image1_url = $row_1['image1_url'];
            $rand_min_stock = $row_1['min_stock'];
            $rand_part_no_01 = $row_1['part_no_01'];
            $rand_part_no_02 = $row_1['part_no_02'];
            $rand_part_no_03 = $row_1['part_no_03'];
            $rand_stock_on_hold = $row_1['stock_on_hold'];
            $rand_discount_percentage = $row_1['discount_percentage'];
            $rand_offer_name = $row_1['offer_name'];
            $rand_whole_sale_price = $row_1['whole_sale_price'];
            $rand_opening_stock = $row_1['opening_stock'];
            $rand_ext_file_1 = $row_1['ext_file_1'];
            $rand_ext_file_2 = $row_1['ext_file_2'];
            $rand_ext_file_3 = $row_1['ext_file_3'];
            $rand_ext_file_4 = $row_1['ext_file_4'];

            ?>



            <div>
              <div class="card product-card card-static">
                <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                  title="Add to wishlist"
                  onclick="wishlist_1('<?php echo $rand_sku ?>', '<?php echo $rand_selling_price ?>')"><i
                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                  href="product-page.php?key1=<?php echo $rand_tid ?>&sku=<?php echo $rand_sku ?>&category=<?php echo $rand_category ?>"><img
                    src="cz-admin/attachments/product/product_thumb/tid-<?php echo $rand_tid ?>.<?php echo $rand_ext_file_1 ?>"
                    alt="Product"></a>
                <div class="card-body py-2">
                  <!-- <a class="product-meta d-block fs-xs pb-1" href="#">
                    <?php //echo $rand_product_name                                               
                      ?>
                  </a> -->
                  <h3 class="product-title fs-sm text-center"><a href="#">
                      <?php echo
                        $rand_modifiedSku = str_replace('-', ' ', $rand_sku);
                      $rand_modifiedSku ?>
                    </a></h3>
                  <div class="d-flex justify-content-center">
                    <div class="product-price"><span class="text-accent">
                        <?php echo $rand_selling_price ?>
                      </span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>

        </div>
      </div>
    </div>
  </main>
  <!-- Footer-->




  <?php include 'includes/footer.php' ?>

</body>


<script>
  var tokenid = "<?php echo session_id(); ?>";



  function toggleCard() {
    const cardContainer = document.getElementById('card-container');
    const isHidden = cardContainer.classList.contains('hidden');

    if (isHidden) {
      cardContainer.classList.remove('hidden');
    }
  }

  $(document).ready(function () {
    $("#back_btn_card_desc").click(function () {

      $("#card-container").addClass('hidden');

    });
  });


  $(document).ready(function () {
    // Increment and decrement buttons
    $('#incrementButton, #decrementButton').on('click', function () {
      let inputValue = parseInt($('#customValueInput').val()) || 0;

      if ($(this).attr('id') === 'incrementButton') {
        inputValue++;
      } else {
        if (inputValue > 1) {
          inputValue--;
        }
      }

      $('#customValueInput').val(inputValue);
    });
  });


  function active_remove(div) {
    $('.div').addClass('active');
  }




  function show() {
    /* Access image by id and change 
    the display property to block*/
    document.getElementById('image').style.display = "block";
    document.getElementById('btnID').style.display = "none";
  }

  // function fetch_variant_options(val) {

  //   var color = val.value;


  //   // console.log(selectedValue);
  //   var xhr_1 = new XMLHttpRequest();
  //   xhr_1.open('GET', 'api-call.php?product_name=' + product_name + '&color=' + color +
  //     '&type=variant_select_from_variant' + '&tkn=' + tokenid, true);
  //   xhr_1.onload = function () {
  //     if (xhr_1.readyState === 4 && xhr_1.status === 200) {
  //       // console.log(xhr_1.responseText);
  //       var options = JSON.parse(xhr_1.responseText);
  //       var select2 = document.getElementById('size');
  //       select2.innerHTML = ""; // Clear previous options

  //       var emptyOption = document.createElement("option");
  //       emptyOption.value = ""; // Set an empty value
  //       emptyOption.text = ""; // Set an empty text
  //       select2.appendChild(emptyOption);


  //       for (var i = 0; i < options.length; i++) {
  //         var option = document.createElement('option');
  //         option.text = options[i];
  //         select2.add(option);
  //       }
  //     }
  //   };
  //   xhr_1.send();
  // };




  function change_sku(sku) {


    // var sku = $(sku).val();
    // console.log(Size);
    var slider = "";

    // Assuming you're using XMLHttpRequest
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'api-call.php?sku=' + sku + '&type=fetch_sku_color' + '&tkn=' +
      tokenid, true);

    // console.log(Size);
    xhr.onload = function () {
      if (xhr.status === 200) {

        const data = JSON.parse(xhr.responseText);
        // console.log(data);

        var sub_upto = data[0].sub_save_3;
        sub_upto = Number(sub_upto).toFixed();

        if (data[0].sub_category == "pads") {

          var s_p = data[0].selling_price;
          var p_mrp = data[0].mrp;
          var sub_1 = data[0].sub_save_1;
          var sub_2 = data[0].sub_save_2;
          var sub_3 = data[0].sub_save_3;

          var off_three = (s_p - ((sub_1 / 100) * s_p));
          var off_six = (s_p - ((sub_2 / 100) * s_p));
          var off_twelve = (s_p - ((sub_3 / 100) * s_p));



          $('.off_three').html("&#x20B9;" + off_three);
          $('.off_six').html("&#x20B9;" + off_six);
          $('.off_twelve').html("&#x20B9;" + off_twelve);
          $('.off_mrp').html(p_mrp);
        }

        $('#display_sku').html(data[0].product_display_name);
        $('#product_selling_price').html(data[0].selling_price);
        if (data[0].selling_price != data[0].mrp) {
          $('#product_mrp').html(data[0].mrp);
        }






        var product_tid = data[0].tid;

        // console.log(data[0].tid);

        if ((data[0].ext_file_1.length) > 0) {

          var productImage_1 = document.getElementById('product_image_1');
          var newImageSrc_1 = 'cz-admin/attachments/product/product_thumb/tid-' + product_tid + '.' + data[0]
            .ext_file_1;
          productImage_1.src = newImageSrc_1;
          productImage_1.setAttribute('data-zoom', newImageSrc_1);

        }

        if ((data[0].ext_file_2.length) > 0) {

          var productImage_2 = document.getElementById('product_image_2');
          var newImageSrc_2 = 'cz-admin/attachments/product/product_image1/tid-' + product_tid + '.' + data[0]
            .ext_file_2;
          productImage_2.src = newImageSrc_2;
          productImage_2.setAttribute('data-zoom', newImageSrc_2);

        }

        if ((data[0].ext_file_hover.length) > 0) {

          var productImage_3 = document.getElementById('hover_img');
          var newImageSrc_3 = 'cz-admin/attachments/product/hover_img/tid-' + product_tid + '.' + data[0]
            .ext_file_hover;
          productImage_3.src = newImageSrc_3;
          productImage_3.setAttribute('data-zoom', newImageSrc_3);

        }



        // small image
        var small_image_1 = document.getElementById('small_image_1');
        if ((data[0].ext_file_1.length) > 0) {
          var small_ImageSrc_1 = 'cz-admin/attachments/product/product_thumb/tid-' + product_tid + '.' + data[0].ext_file_1;
          small_image_1.src = small_ImageSrc_1;
          $("#small_image_div_1").removeClass('d-none');
        } else {
          small_image_1.src = "";
          $("#small_image_div_1").addClass('d-none');
        }

        var small_image_2 = document.getElementById('small_image_2');
        if (data[0].ext_file_2.length > 0) {
          var small_ImageSrc_2 = 'cz-admin/attachments/product/product_image1/tid-' + product_tid + '.' + data[0].ext_file_2;
          small_image_2.src = small_ImageSrc_2;
          $("#small_image_div_2").removeClass('d-none');
        } else {
          small_image_2.src = "";
          $("#small_image_div_2").addClass('d-none');
        }


        var small_image_3 = document.getElementById('small_image_3');
        if ((data[0].ext_file_hover.length) > 0) {
          var small_ImageSrc_3 = 'cz-admin/attachments/product/hover_img/tid-' + product_tid + '.' + data[0]
            .ext_file_hover;
          small_image_3.src = small_ImageSrc_3;
          $("#small_image_div_3").removeClass('d-none');
        } else {
          small_image_3.src = "";
          $("$small_image_div_3").addClass('d-none');
        }



        // const images = [
        //   'cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>',
        //   'cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>',
        //   'cz-admin/attachments/product/product_image2/tid-<?php echo $tid ?>.<?php echo $ext_file_3 ?>',
        //   'cz-admin/attachments/product/product_image3/tid-<?php echo $tid ?>.<?php echo $ext_file_4 ?>',
        //   'cz-admin/attachments/product/product_image4/tid-<?php echo $tid ?>.<?php echo $ext_file_5 ?>',
        //   'cz-admin/attachments/product/product_image5/tid-<?php echo $tid ?>.<?php echo $ext_file_6 ?>',
        //   'cz-admin/attachments/product/product_image6/tid-<?php echo $tid ?>.<?php echo $ext_file_7 ?>',
        //   'cz-admin/attachments/product/product_image7/tid-<?php echo $tid ?>.<?php echo $ext_file_8 ?>',
        //   'cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>'
        // ];


        // var slider_image = document.getElementById('small_image_1');
        // if ((data[0].ext_file_1.length) > 0) {
        //   var small_ImageSrc_1 = 'cz-admin/attachments/product/product_thumb/tid-' + product_tid + '.' + data[0].ext_file_1;
        //   small_image_1.src = small_ImageSrc_1;
        //   $("#small_image_div_1").removeClass('d-none');
        // } else {
        //   small_image_1.src = "";
        //   $("#small_image_div_1").addClass('d-none');
        // }

        $('.change-slider').empty();

        if ((data[0].ext_file_1.length) > 0) {
          slider = ` <div class="carousel-item active">
          <img 
            src="cz-admin/attachments/product/product_thumb/tid-${product_tid}.${data[0]
              .ext_file_1}"
            alt="First slide" />
        </div>`;
        }

        if ((data[0].ext_file_hover.length) > 0) {
          slider += ` <div class="carousel-item">
          <img 
            src="cz-admin/attachments/product/hover_img/tid-${product_tid}.${data[0]
              .ext_file_hover}"
            alt="First slide" />
        </div>`;
        }

        if ((data[0].ext_file_2.length) > 0) {

          slider += ` <div class="carousel-item">
          <img 
            src="cz-admin/attachments/product/product_image1/tid-${product_tid}.${data[0]
              .ext_file_2}"
            alt="Second slide" />
        </div>`;

        }

        if ((data[0].ext_file_3.length) > 0) {

          slider += ` <div class="carousel-item">
           <img src="cz-admin/attachments/product/product_image2/tid-${product_tid}.${data[0].ext_file_3}"
             alt="Third slide" /></div>`;

        }

        if ((data[0].ext_file_4.length) > 0) {

          slider += ` <div class="carousel-item">
          <img src="cz-admin/attachments/product/product_image3/tid-${product_tid}.${data[0].ext_file_4}"
           alt="Forth slide" /></div>`;

        }

        if ((data[0].ext_file_9.length) > 0) {

          slider += ` <div class="carousel-item">
          <img src="cz-admin/attachments/product/product_image6/tid-${product_tid}.${data[0].ext_file_9}"
           alt="Fiveth slide" /></div>`;

        }

        if ((data[0].ext_file_10.length) > 0) {

          slider += ` <div class="carousel-item">
        <img src="cz-admin/attachments/product/product_image7/tid-${product_tid}.${data[0].ext_file_10}"
        alt="Sixth slide" /></div>`;

        }

        if ((data[0].ext_file_7.length) > 0) {

          slider += ` <div class="carousel-item">
          <img src="cz-admin/attachments/product/product_image4/tid-${product_tid}.${data[0].ext_file_7}"
          alt="Seventh slide" /></div>`;

        }

        if ((data[0].ext_file_8.length) > 0) {

          slider += ` <div class="carousel-item">
           <img src="cz-admin/attachments/product/product_image5/tid-${product_tid}.${data[0].ext_file_8}"
           alt="Eight slide" /></div>`;

        }

        $('.change-slider').html(slider);

      }
    };
    xhr.send();
  }



  //   function check_stock(sku) {

  //     var xhr = new XMLHttpRequest();
  //     xhr.open('GET', 'api-call.php?sku=' + sku + '&type=check_stock' + '&tkn=' +
  //       tokenid, true);
  //     xhr.onload = function() {
  //       // console.log(xhr);

  //       if (xhr.status === 200) {
  //         var data = Number(xhr.responseText);
  //         // var productCardDiv = document.getElementById('product_status');

  //         // // Clear existing content
  //         // productCardDiv.innerHTML = '';

  //         $('#product_status').html('');

  //         console.log(data);

  //         if (data > 0) {
  //           var productHTML = `
  //     <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available </div>
  // `;
  //         } else {
  //           var productHTML = `
  //       <div class="product-badge product-not-available mt-n1"><i class="ci-security-close"></i>Product unavailable </div>
  //       `;
  //         }
  //         // Append the product HTML to the productCardDiv
  //         // productCardDiv.insertAdjacentHTML('beforeend', productHTML);
  //         $('#product_status').html(productHTML);



  //       }


  //     };
  //     xhr.send();


  //   }



  function size_and_colour(buy) {
    // Hide and show the option for add and update page

    var sku = $('#product_sku').html().trim();

    if (sku.length > 0) {

      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'api-call.php?sku=' + sku + '&type=check_stock' + '&tkn=' +
        tokenid, true);
      xhr.onload = function () {
        // console.log(xhr);

        if (xhr.status === 200) {
          var data = Number(xhr.responseText);
          let inputValue = parseInt($('#customValueInput').val());
          // console.log(data);

          if (data > inputValue) {
            add_to_cart(buy)
          } else {
            // alert("Your Combo is not available!!");
            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Please Select Low Qty!',
              confirmButtonColor: '#3085d6',
            });
          }

        } else {
          console.error('Error fetching data:', xhr.status);
        }

      };
      xhr.send();
    }
    // if (size.length > 0 && colour.length == 0) {
    //   Swal.fire({
    //     icon: 'warning',
    //     title: 'Oops...',
    //     text: 'Please Select the Colour!',
    //     confirmButtonColor: '#3085d6',
    //   });
    // } else if (size.length == 0 && colour.length > 0) {
    //   Swal.fire({
    //     icon: 'warning',
    //     title: 'Oops...',
    //     text: 'Please Select the Size!',
    //     confirmButtonColor: '#3085d6',
    //   });
    // } else if (size.length == 0 && colour.length == 0) {
    //   Swal.fire({
    //     icon: 'warning',
    //     title: 'Oops...',
    //     text: 'Please Select the Colour and Size!',
    //     confirmButtonColor: '#3085d6',
    //   });
    // }
  }




  function add_to_cart(buy) {
    var sku = $('#product_sku').html().trim();
    if (sku.length > 0) {
      var quantity = $(".pcsQty").val();
      var selling_price = $("#product_selling_price").html().trim();
      var upn = $("#product_sku").html().trim();

      // Get the selected radio button value
      var selectedValue = document.querySelector('input[name="sub_save"]:checked');

      // Check if a radio button is selected
      if (selectedValue) {
        var sub = selectedValue.value;
        // You can do further processing here, like sending the value to the server or updating the UI.
      } else {
        var sub = "0";
      }


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
        var existingIndex = storedArray.findIndex(function (obj) {
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

      if (buy == "buy_now") {
        window.location.href = 'shop-cart.php';
      } else {
        // Swal.fire({
        //   icon: 'success',
        //   title: 'Cool...',
        //   text: 'Added to Cart!',
        //   confirmButtonColor: '#3085d6',
        // });
        showToastSuccess("Success", "Added to Cart");
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
  }







  document.addEventListener('DOMContentLoaded', function () {
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
      var foundObjectIndex = storedArray.findIndex(function (obj) {
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
      icon.classList.add('ci-heart-filled');  // Assuming 'ci-heart-filled' is the class for the red heart
    } else {
      icon.classList.remove('ci-heart-filled');
      icon.classList.add('ci-heart');
    }
  }

  function initializeHeartIconState() {
    var buttons = document.querySelectorAll('.btn-wishlist');
    var storedJsonString = localStorage.getItem("wishlist");
    var storedArray = storedJsonString ? JSON.parse(storedJsonString) : [];

    buttons.forEach(function (button) {
      var sku = button.getAttribute('data-sku');

      // Check if the item exists in the wishlist
      var foundObjectIndex = storedArray.findIndex(function (obj) {
        return obj.sku === sku;
      });

      // Update the heart icon based on the presence of the item in the wishlist
      toggleHeartIcon(button, foundObjectIndex !== -1);
    });
  }





  function wishlist_1(sku, selling_price) {

    if (sku.length > 0) {
      var quantity = 1;
      var upn = sku;

      var cart = [{
        sku: upn,
        qty: quantity,
        rate: selling_price
      }];

      // Retrieving and parsing the array of objects
      var storedJsonString = localStorage.getItem("wishlist");
      var storedArray = [];

      if (storedJsonString != null) {
        storedArray = JSON.parse(storedJsonString);

        // Function to find an object by a property value
        function findObjectByPropertyValue(array, property, value) {
          return array.find(function (obj) {
            return obj[property] === value;
          });
        }

        // Example: Finding an object with name "Bob"
        var foundObjectIndex = storedArray.findIndex(function (obj) {
          return obj.sku === upn;
        });

        if (foundObjectIndex !== -1) {
          // Update the existing item
          storedArray[foundObjectIndex] = cart[0];
        } else {
          // Add the new item
          storedArray.push(cart[0]);
        }

        var jsonString = JSON.stringify(storedArray);
        localStorage.setItem("wishlist", jsonString);
      } else {
        var jsonString = JSON.stringify(cart);
        localStorage.setItem("wishlist", jsonString);
      }


      // Swal.fire({
      //   icon: 'success',
      //   title: 'Cool...',
      //   text: 'Wishlist Added!',
      //   confirmButtonColor: '#3085d6',
      // });

      showToastSuccess("Success", "Wishlist Added");
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Please Select the Colour and Size!',
        confirmButtonColor: '#3085d6',
      });
      // console.log(storedArray);
    }
  }




  function changeColor(button) {
    var buttons = document.getElementsByClassName('button_p');
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove('selected');
    }

    button.classList.add('selected');
  }


  function changeColor(button) {
    var buttons = document.getElementsByClassName('button_p_c');
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove('selected');
    }

    button.classList.add('selected');
  }



  function changeColor_card(button) {
    var buttons = document.getElementsByClassName('button_card');
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove('selected');
    }

    button.classList.add('selected');
  }


  $(document).ready(function () {

    $('#three_months').click(function () {

      var qty = $('#custom_qty').val();
      var calc_val = (qty * 3);
      $('#custom_qty').val(calc_val);

    });

  });



  $(document).ready(function () {
    var initialQty;

    // Event handler for radio buttons
    $('input[name="sub_save"]').on('change', function () {
      // Store the initial quantity value when a radio button is selected for the first time
      if (!initialQty) {
        initialQty = parseInt($('#customValueInput').val());
      }

      // Get the selected value from the radio button
      var selectedValue = parseInt($(this).val());

      // Multiply the initial quantity by the selected value
      var multipliedQty = initialQty * selectedValue;

      // Update the input box with the multiplied quantity
      $('#customValueInput').val(multipliedQty);

      $('#customValueInput').prop('readonly', true);
      $('#incrementButton, #decrementButton').prop('disabled', true);


    });
  });








  function check_stock(sku) {


    console.log(sku);

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'api-call.php?sku=' + sku + '&type=check_stock' + '&tkn=' +
      tokenid, true);
    xhr.onload = function () {
      // console.log(xhr);

      if (xhr.status === 200) {
        var data = Number(xhr.responseText);
        // var productCardDiv = document.getElementById('product_status');

        // // Clear existing content
        // productCardDiv.innerHTML = '';

        $('#product_status').html('');

        console.log(data);

        if (data > 0) {
          var productHTML = `
          <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available </div>
    `;
        } else {
          var productHTML = `
          <div class="product-badge product-not-available mt-n1"><i class="ci-security-close"></i>Product unavailable </div>
          `;
        }
        // Append the product HTML to the productCardDiv
        // productCardDiv.insertAdjacentHTML('beforeend', productHTML);
        $('#product_status').html(productHTML);

        // console.log(data);

      }


    };
    xhr.send();


  }


  // function toggleAdditionalImages() {
  //   var additionalImagesContainer = document.querySelector('.additional-images-container');
  //   var carouselExampleIndicators = document.querySelector('#carouselExampleIndicators');
  //   var showMoreButton = document.getElementById('show-more-btn');
  //   carouselExampleIndicators.style.display = 'block';

  //   if (additionalImagesContainer.style.display === 'none') {
  //     additionalImagesContainer.style.display = 'block';

  //   } else {
  //     additionalImagesContainer.style.display = 'none';

  //   }
  // }


  $('#lg-close-1').on('click', function () {
    // var additionalImagesContainer = document.querySelector('.additional-images-container');
    // additionalImagesContainer.style.display = 'none';
    var element = document.getElementById('toggleElement');
    element.classList.toggle('d-none');
  });

  document.getElementById('show-more-btn').addEventListener('click', function () {
    var element = document.getElementById('toggleElement');
    element.classList.toggle('d-none');

  });

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>