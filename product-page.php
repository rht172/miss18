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
  $obj_class_review_rate = new czDBAccess();


  $obj_class_product->varTableName = 'product_table_ecom';
  $obj_class_color->varTableName = 'color_master_table';
  $obj_class_review_rate->varTableName = 'review_rating_table';


  $product_display_name = "";
  $ext_file_hover = "";

  $customer_name = "";
  $customer_email = "";
  $ratings = "";
  $reviews = "";
  $pros = "";
  $cons = "";
  $processName = "";

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
  </style>

  <!-- Body-->

  <body class="handheld-toolbar-enabled">

    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>

    <?php
    include 'sign-up-form.php';
    ?>

    <main class="page-wrapper">

      <div class="modal fade" id="size-chart">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <ul class="nav nav-tabs card-header-tabs" role="tablist" style="margin-bottom: -1rem;">
                <li class="nav-item">
                  <a class="nav-link fw-medium active" href="#womens" data-bs-toggle="tab" role="tab" aria-controls="womens" aria-selected="true">Women's sizes</a>
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

      <div class="page-title-overlap bg-secondary pt-4 ">
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
                      <img class="image-zoom" id="product_image_1" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product image" data-zoom="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>">
                      <div class="image-zoom-pane"></div>
                    </div>
                    <div class="product-gallery-preview-item second" id="second">
                      <img class="image-zoom" id="product_image_2" src="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>" alt="Product image" data-zoom="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>">
                      <div class="image-zoom-pane"></div>
                    </div>
                    <div class="product-gallery-preview-item" id="third">
                      <img class="image-zoom" id="hover_img" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Product image" data-zoom="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>">
                      <div class="image-zoom-pane"></div>
                    </div>
                    <div class="product-gallery-preview-item fourth" id="fourth">
                      <img class="image-zoom" id="product_image_4" src="cz-admin/attachments/product/product_image2/tid-<?php echo $tid ?>.<?php echo $ext_file_3 ?>" alt="Product image" data-zoom="cz-admin/attachments/product/product_image2/tid-<?php echo $tid ?>.<?php echo $ext_file_3 ?>">
                      <div class="image-zoom-pane"></div>
                    </div>

                  </div>

                  <div class="product-gallery-thumblist order-sm-1">

                    <a class="product-gallery-thumblist-item active" id="small_image_div_1" href="#first"><img id="small_image_1" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product thumb"></a>

                    <?php if (strlen($ext_file_2 > 0) || strlen($ext_file_3 > 0) || strlen($ext_file_hover > 0) || strlen($ext_file_4 > 0)) { ?>
                      <!-- <div class="product-gallery-thumblist order-sm-1"> -->
                      <?php if (strlen($ext_file_2 > 0)) { ?>

                        <a class="product-gallery-thumblist-item" href="#second" id="small_image_div_2"><img id="small_image_2" src="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>" alt="Product thumb"></a>

                      <?php } ?>

                      <?php if (strlen($ext_file_hover > 0)) { ?>

                        <a class="product-gallery-thumblist-item third" href="#third" id="small_image_div_3"><img id="small_image_3" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Product thumb"></a>

                      <?php } ?>

                      <?php if (strlen($ext_file_3 > 0)) { ?>

                        <a class="product-gallery-thumblist-item" href="#fourth" id="small_image_div_4"><img id="small_image_4" src="cz-admin/attachments/product/product_image2/tid-<?php echo $tid ?>.<?php echo $ext_file_3 ?>" alt="Product thumb"></a>

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
                                  <img class=" pb-5" id="product_image_1" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="First slide" width="600" height="500">
                                </div>
                              <?php } ?>

                              <?php if (strlen($ext_file_hover > 0)) { ?>
                                <div class="carousel-item ">
                                  <img class=" pb-5" id="hover_img" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Second slide" width="600" height="500">
                                </div>
                              <?php } ?>

                              <?php if (strlen($ext_file_2 > 0)) { ?>
                                <div class="carousel-item">
                                  <img class=" pb-5" id="product_image_3" src="cz-admin/attachments/product/product_image1/tid-<?php echo $tid ?>.<?php echo $ext_file_2 ?>" alt="Third slide" width="600" height="500">
                                </div>
                              <?php } ?>

                              <?php if (strlen($ext_file_3 > 0)) { ?>
                                <div class="carousel-item">
                                  <img class=" pb-5" id="product_image_4" src="cz-admin/attachments/product/product_image2/tid-<?php echo $tid ?>.<?php echo $ext_file_3 ?>" alt="Fourth slide" width="600" height="500">
                                </div>
                              <?php } ?>

                              <?php if (strlen($ext_file_9 > 0)) { ?>
                                <div class="carousel-item">
                                  <img class=" pb-5" id="product_image6" src="cz-admin/attachments/product/product_image6/tid-<?php echo $tid ?>.<?php echo $ext_file_9 ?>" alt="Five slide" width="600" height="500">
                                </div>
                              <?php } ?>


                              <?php if (strlen($ext_file_10 > 0)) { ?>
                                <div class="carousel-item">
                                  <img class=" pb-5" id="product_image_6" src="cz-admin/attachments/product/product_image7/tid-<?php echo $tid ?>.<?php echo $ext_file_10 ?>" alt="Sixth slide" width="600" height="500">
                                </div>
                              <?php } ?>


                              <?php if (strlen($ext_file_7 > 0)) { ?>
                                <div class="carousel-item">
                                  <img class=" pb-5" id="product_image_7" src="cz-admin/attachments/product/product_image4/tid-<?php echo $tid ?>.<?php echo $ext_file_7 ?>" alt="Seventh slide" width="600" height="500">
                                </div>
                              <?php } ?>


                              <?php if (strlen($ext_file_8 > 0)) { ?>
                                <div class="carousel-item">
                                  <img class=" pb-5" id="product_image5" src="cz-admin/attachments/product/product_image5/tid-<?php echo $tid ?>.<?php echo $ext_file_8 ?>" alt="Eight slide" width="600" height="500">
                                </div>
                              <?php } ?>

                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                          </a>
                          <div id="lg-toolbar-1" class="lg-toolbar lg-group">
                            <button type="button" aria-label="Close gallery" id="lg-close-1" class="lg-close lg-icon btn btn-danger">
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
                    <h3 class='m-0 d-none' id='product_sku'>
                      <?php echo $sku ?>
                    </h3>
                    <h3 class='m-0' id='display_sku'>
                      <?php echo $product_display_name ?>
                    </h3>
                    <a href=""></a>
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist" data-sku="<?php echo $sku ?>" data-price="<?php echo $selling_price ?>" onclick="toggleWishlist(this)">
                      <i class="ci-heart"></i>
                    </button>
                  </div>
                  <br />

                  <!-- <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                    </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 Reviews</span>
                  </a>
                </div> -->

                  <div class="position-relative me-n4  mb-3">

                    <div class="mb-3"><span class="h5 fw-normal text-accent me-1" id='product_selling_price'>

                        <span>&#x20B9; </span>
                        <?php echo $selling_price ?>
                      </span>
                      <del class="text-muted fs-lg me-3" id='product_mrp'>
                        <?php
                        if ($selling_price != $mrp) {
                          echo $mrp;
                        }
                        ?>
                      </del>
                      <!-- <span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span> -->
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

                  <div class="fs-sm mb-2">
                    <?php echo $description_1 ?>
                  </div>

                  <hr>
                  <br />




                  <div class="fs-sm mb-2"><span class="text-heading fw-medium me-1">Size:</span>
                    <div class="col-md-10">

                      <?php

                      $result_33 = $obj_class_product->selectData_customqry("SELECT distinct product_table_ecom.sub_category, sku, size, product_name FROM product_table_ecom WHERE product_name = '$product_name' ORDER BY FIELD(size, 'S', 'M', 'L', 'XL','XXL');");

                      while ($row = $result_33->fetch_assoc()) {
                        $sizeValue_1 = $row['size'];
                        $not_pad_sku = $row['sku'];

                        // echo $not_pad_sku;

                        // $isSelected = ($sku == $not_pad_sku) ? 'selected' : '';

                        // echo $isSelected;

                        echo "<button class='button_p_c product_size id='color' name='color' onclick='change_sku(\"$not_pad_sku\"),check_stock(\"$not_pad_sku\"),changeColor(this)' value='$sizeValue_1'>$sizeValue_1</button>";
                        // echo  $sizeValue_1;
                      }
                      ?>
                    </div>



                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Size Chart</h5>
                            <button type="button" class="dclose" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?php
                            $result_35 = $obj_class_product->selectData_customqry("SELECT ecom_size_chart_master.tid,ecom_size_chart_master.attach_file FROM ecom_size_chart_master left join product_table_ecom on ecom_size_chart_master.size_chart_name = product_table_ecom.category  WHERE ecom_size_chart_master.size_chart_name  = '$category';");

                            while ($row_35 = $result_35->fetch_assoc()) {
                              $attach_file = $row_35['attach_file'];
                              $attach_tid = $row_35['tid'];
                            }
                            ?>

                            <img src="cz-admin/attachments/sizechart/tid-<?php echo $attach_tid ?>.<?php echo $attach_file ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <button class="btn btn-secondary btn-shadow d-block w-100 mb-4">
                      <a class="nav-link-style fs-sm" href="#size-chart" data-bs-toggle="modal">
                        <i class="ci-ruler lead align-middle me-1 mt-n1"></i>Size Chart
                      </a>
                    </button>
                  </div>


                  <div class="row mb-3 mt-2">
                    <div class="col-md-2 mb-4 d-flex align-items-center">
                      <span class="text-heading fw-medium me-1 fs-sm">Quantity:</span>
                    </div>
                    <div class="col-md-10 mb-4">
                      <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button" id="decrementButton">-</button>
                        <input type="text" id="customValueInput" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control text-center pcsQty" placeholder="Enter" value="1">
                        <button class="btn btn-outline-secondary" type="button" id="incrementButton">+</button>
                      </div>
                    </div>


                    <!-- <div class="col-md-7 mb-3 d-flex align-items-center justify-content-evenly p-0"> -->
                    <div><button class="btn btn-primary btn-shadow d-block w-100 product-add-cart mb-4" onclick="size_and_colour()"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                    </div>

                    <div>
                      <?php $buy_now = "buy_now"; ?>
                      <button class="btn btn-light btn-shadow d-block w-100 product-buy-now" id="" onclick="size_and_colour('<?php echo $buy_now ?>')">Buy
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
                <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Product description section 1-->
      <?php
      $result_review = $obj_class_product->selectData_customqry("SELECT count(review_rating_table.sku) as total_sku, count(review_rating_table.ratings)/100 * 5 as tot_rating FROM review_rating_table left join product_table_ecom on review_rating_table.sku = product_table_ecom.sku where product_table_ecom.sku = '$sku'");
      while ($row_review = $result_review->fetch_assoc()) {
        $total_sku = $row_review['total_sku'];
        $total_rating = $row_review['tot_rating'];
      }
      ?>
      <div class="border-top border-bottom my-lg-3 py-5">
        <div class="container pt-md-2" id="reviews">
          <div class="row pb-3">
            <div class="col-lg-4 col-md-5">
              <h2 class="h3 mb-4"><?php echo $total_sku; ?></h2>
              <div class="star-rating me-2">
                <?php
                $max_stars = 5; // Maximum number of stars
                $filled_stars = round($total_rating); // Round the total rating to the nearest integer

                // Display filled stars
                for ($i = 0; $i < $filled_stars; $i++) {
                  echo '<i class="ci-star-filled fs-sm text-accent me-1"></i>';
                }

                // Display unfilled stars
                for ($i = 0; $i < ($max_stars - $filled_stars); $i++) {
                  echo '<i class="ci-star fs-sm text-muted me-1"></i>';
                }
                ?>
              </div>

              <span class="d-inline-block align-middle"><?php echo round($total_rating); ?> Overall rating</span>
              <p class="pt-3 fs-sm text-muted">Customers recommended this product</p>
            </div>
            <div class="col-lg-8 col-md-7">
              <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                <div class="w-100">
                  <div class="progress" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><span class="text-muted ms-3">43</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                <div class="w-100">
                  <div class="progress" style="height: 4px;">
                    <div class="progress-bar" role="progressbar" style="width: 27%; background-color: #a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><span class="text-muted ms-3">16</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                <div class="w-100">
                  <div class="progress" style="height: 4px;">
                    <div class="progress-bar" role="progressbar" style="width: 17%; background-color: #ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><span class="text-muted ms-3">9</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                <div class="w-100">
                  <div class="progress" style="height: 4px;">
                    <div class="progress-bar" role="progressbar" style="width: 9%; background-color: #fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><span class="text-muted ms-3">4</span>
              </div>
              <div class="d-flex align-items-center">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                <div class="w-100">
                  <div class="progress" style="height: 4px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><span class="text-muted ms-3">2</span>
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-3">
          <div class="row pt-4">
            <!-- Reviews list-->
            <div class="col-md-7">
              <div class="d-flex justify-content-end pb-4">
                <div class="d-flex align-items-center flex-nowrap">
                  <!-- <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort by:</label>
                  <select class="form-select form-select-sm" id="sort-reviews">
                    <option value="">My Reviewes</option>
                    <option value="new">Newest</option>
                    <option value="old">Oldest</option>
                    <option value="high">High Rating</option>
                    <option value="low">Low Rating</option>
                  </select> -->
                </div>
              </div>
              <!-- Review-->

              <?php
              $result_cus = $obj_class_product->selectData_customqry("SELECT customer_table.tid as pr_tid,customer_table.ext_file as extension,review_rating_table.customer_name as names,review_rating_table.ratings as stars,review_rating_table.reviews as review,review_rating_table.pros as pros,review_rating_table.cons as cons,review_rating_table.created_date as created_date FROM review_rating_table left join customer_table on review_rating_table.cus_id = customer_table.tid left join product_table_ecom on review_rating_table.sku = product_table_ecom.sku where review_rating_table.sku = '$sku' LIMIT 5;");

              while ($row_cus = $result_cus->fetch_assoc()) {
                $customer_name = $row_cus['names'];
                $star_rating = $row_cus['stars'];
                $review = $row_cus['review'];
                $pros = $row_cus['pros'];
                $cons = $row_cus['cons'];
                $created_date = $row_cus['created_date'];
                $img_tid = $row_cus['pr_tid'];
                $extension = $row_cus['extension'];

                // echo  'ext'.$extension;
                // echo  'tid'.$img_tid;


              ?>
                <div class="product-review pb-4 mb-4 border-bottom">
                  <div class="d-flex mb-3">
                    <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle" src="img/shop/account/tid-<?php echo $img_tid ?>.<?php echo $extension ?>" width="50" alt="YOUR IMAGE">
                      <div class="ps-3">
                        <h4 class="mb-0"><?php echo $customer_name ?></h4><span class="fs-ms text-muted"><?php echo $created_date ?></span>
                      </div>
                    </div>
                    <div>
                      <div class="star-rating me-2 mt-3">
                        <?php
                        $max_stars_1 = 5; // Maximum number of stars
                        $filled_stars_1 = round($star_rating); // Round the total rating to the nearest integer

                        // Display filled stars
                        for ($i = 0; $i < $filled_stars_1; $i++) {
                          echo '<i class="ci-star-filled fs-sm text-accent me-1"></i>';
                        }

                        // Display unfilled stars
                        for ($i = 0; $i < ($max_stars_1 - $filled_stars_1); $i++) {
                          echo '<i class="ci-star fs-sm text-muted me-1"></i>';
                        }
                        ?>
                      </div>
                      <div class="fs-ms text-muted">83% of users found this review helpful</div>
                    </div>
                  </div>
                  <p class="fs-md mb-2"><?php echo $review ?></p>
                  <ul class="list-unstyled fs-ms pt-1">
                    <li class="mb-1"><span class="fw-medium">Pros:&nbsp;</span><?php echo $pros ?></li>
                    <li class="mb-1"><span class="fw-medium">Cons:&nbsp;</span><?php echo $cons ?></li>
                  </ul>
                  <!-- <div class="text-nowrap">
                    <button class="btn-like" type="button">15</button>
                    <button class="btn-dislike" type="button">3</button>
                  </div> -->
                </div>
              <?php
              }
              ?>

              <?php if (isset($_SESSION['tid']) > 0) { ?>
                <div class="text-center">
                  <button class="btn btn-outline-accent" type="button"><a href="review-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>"><i class="ci-reload me-2"></i>Load more reviews</a></button>
                </div>
              <?php } else { ?>
                <div class="text-center">
                  <button class="btn btn-outline-accent" type="button"><a href="#signin-modal" data-bs-toggle="modal"><i class="ci-reload me-2"></i>Load more reviews</a></button>
                </div>
              <?php } ?>
            </div>
            <!-- Leave review form-->
            <!-- Review-->
            <?php
            //get The Process Name -insert or delete or update
            $processName = czGet('key2');

            // Assign Default Value to the Process Name
            if (strlen($processName) == 0) {
              $processName = "insert";
            }


            if (isset($_SESSION['tid'])) {
              $customer_id = $_SESSION['tid'];
            } else {
              $customer_id = '';
            }

            // echo $customer_id;
            $result_review = $obj_class_product->selectData_customqry("SELECT * FROM customer_table where tid ='$customer_id';");
            while ($row_review = $result_review->fetch_assoc()) {
              $tid_1 = $row_review['tid'];
              // echo  $_SESSION['tid'];
              $name = $row_review['fname'];
              $email = $row_review['email'];
            }
            if ($customer_id > 0) {
            ?>
              <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3" id="rating_review">
                  <h3 class="h4 pb-2">Write a review</h3>

                  <form id="myform" action="review-rating-ctrl.php?key2=<?php echo $processName; ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                      <label class="form-label" for="customer_name">Your name<span class="text-danger">*</span></label>
                      <input class="form-control" type="text" required id="customer_name" name="customer_name" <?php echo $name; ?>>
                      <div class="invalid-feedback">Please enter your name!</div><small class="form-text text-muted">Will be displayed on the comment.</small>
                    </div>

                    <input class="form-control d-none" type="text" required id="sku" name="sku" <?php echo 'value="' . $sku . '"'; ?>>
                    <input class="form-control d-none" type="text" required id="cus_id" name="cus_id" <?php echo 'value="' . $customer_id . '"'; ?>>

                    <div class="mb-3">
                      <label class="form-label" for="customer_email">Your email<span class="text-danger">*</span></label>
                      <input class="form-control" type="email" required id="customer_email" name="customer_email" <?php echo $email; ?>>
                      <div class="invalid-feedback">Please provide valid email address!</div><small class="form-text text-muted">Authentication only - we won't spam you.</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="review-rating">Rating<span class="text-danger">*</span></label>
                      <select class="form-select" required id="ratings" name="ratings">
                        <option value="">Choose rating</option>
                        <option value="5">5 stars</option>
                        <option value="4">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="2">2 stars</option>
                        <option value="1">1 star</option>
                      </select>
                      <div class="invalid-feedback">Please choose rating!</div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="review-text">Review<span class="text-danger">*</span></label>
                      <textarea class="form-control" rows="6" required id="reviews" name="reviews"></textarea>
                      <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at least 50 characters.</small>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="review-pros">Pros</label>
                      <textarea class="form-control" rows="2" placeholder="Separated by commas" id="pros" name="pros"></textarea>
                    </div>

                    <div class="mb-3 mb-4">
                      <label class="form-label" for="review-cons">Cons</label>
                      <textarea class="form-control" rows="2" placeholder="Separated by commas" id="cons" name="cons"></textarea>
                    </div>

                    <div class="g-recaptcha d-flex justify-content-center pb-4" data-sitekey="6Lf7QQElAAAAAJL-nju7RoeJh0X57mHOu5FZatA4">
                    </div>

                    <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit a Review</button>

                  </form>
                </div>
              </div>
            <?php
            } else {
            ?>
              <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                  <h3 class="h4 pb-2">Review this product</h3>
                  <div class="container py-5 mt-md-2 mb-2">
                    <div class="row">
                      <div class="col-md-12">
                        <center><img src="assets/images/set_woman.png" alt="">
                          <h2></h2>
                          <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="#signin-modal" data-bs-toggle="modal">Write a Product Review</a></div>
                        </center>
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


      <section class="custom-padding">
        <h2 class="h3 text-center pb-4">You may also like</h2>
        <div>
          <?php
          $count = 0;

          $select_Fields_1 = "tid,sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,stock_on_hold,discount_percentage,offer_name,whole_sale_price,opening_stock,ext_file_1,ext_file_2,ext_file_3,ext_file_4";
          $result = $obj_class_product->selectData_customqry("SELECT * FROM product_table_ecom WHERE product_name != '$product_name' group by product_name order by rand() limit 12 ");
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
              <div class="row">

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
              <?php if ($count == 8) { ?>
              </div>
          <?php $count = 0;
              }
            } ?>
        </div>
      </section>
      <!-- <div class="text-center pt-3  pb-5"><a class="btn btn-outline-dark fw-bold" href="product-category.php?page=1&category=T%20shirt">VIEW &nbsp; ALL</a></div> -->


      <!-- Product description section 2-->
      <!-- <div class="row align-items-center py-4 py-lg-5">
      <div class="col-lg-5 col-md-6 offset-lg-1"><img class="d-block rounded-3" src="img/shop/single/prod-map.png" alt="Map"></div>
      <div class="col-lg-4 col-md-6 offset-lg-1 py-4">
        <h2 class="h3 mb-4 pb-2">Where is it made?</h2>
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
    </div> -->
      <!-- Product carousel (You may also like)-->

    </main>
    <!-- Footer-->




    <?php include 'includes/footer.php' ?>

  </body>


  <script>
    var tokenid = "<?php echo session_id(); ?>";

    // Form Resubmmison
    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
      location.reload();
    }

    function toggleCard() {
      const cardContainer = document.getElementById('card-container');
      const isHidden = cardContainer.classList.contains('hidden');

      if (isHidden) {
        cardContainer.classList.remove('hidden');
      }
    }

    $(document).ready(function() {
      $("#back_btn_card_desc").click(function() {

        $("#card-container").addClass('hidden');

      });
    });


    $(document).ready(function() {
      // Increment and decrement buttons
      $('#incrementButton, #decrementButton').on('click', function() {
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
      xhr.onload = function() {
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
          $('#product_sku').html(data[0].sku);
          $('#display_sku').html(data[0].product_display_name);
          $('#product_selling_price').html(data[0].selling_price);
          if (data[0].selling_price != data[0].mrp) {
            $('#product_mrp').html(data[0].mrp);
          }



          // zoom

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

          if ((data[0].ext_file_3.length) > 0) {

            var productImage_4 = document.getElementById('product_image_4');
            var newImageSrc_4 = 'cz-admin/attachments/product/product_image2/tid-' + product_tid + '.' + data[0]
              .ext_file_3;
            productImage_4.src = newImageSrc_4;
            productImage_4.setAttribute('data-zoom', newImageSrc_4);

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


          var small_image_4 = document.getElementById('small_image_4');
          if (data[0].ext_file_3.length > 0) {
            var small_ImageSrc_4 = 'cz-admin/attachments/product/product_image2/tid-' + product_tid + '.' + data[0].ext_file_3;
            small_image_4.src = small_ImageSrc_4;
            $("#small_image_div_4").removeClass('d-none');
          } else {
            small_image_4.src = "";
            $("#small_image_div_4").addClass('d-none');
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
           <img src="cz-admin/attachments/product/product_image2/tid-${product_tid}.${data[0]
           .ext_file_3}"
             alt="Third slide" />
             </div>`;

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
      // console.log(sku);

      if (sku.length > 0) {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'api-call.php?sku=' + sku + '&type=check_stock' + '&tkn=' +
          tokenid, true);
        xhr.onload = function() {
          // console.log(xhr);

          if (xhr.status === 200) {
            var data = Number(xhr.responseText);
            let inputValue = parseInt($('#customValueInput').val());

            // console.log('qty' + inputValue);

            // console.log('data' + data);

            // console.log(sku);  


            if (data > inputValue) {
              add_to_cart(buy)
              // console.log(buy);

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
        var selected_size = "";
        var quantity = parseInt($(".pcsQty").val(), 10);
        var selling_price = $("#product_selling_price").html().trim();
        var upn = $("#product_sku").html().trim();


        $('.product_size').each(function() {
          if ($(this).hasClass('selected')) {
            selected_size = $(this).val();
            return false; // break the loop once the selected size is found
          }
        });

        // Get the selected radio button value
        var selectedValue = document.querySelector('input[name="sub_save"]:checked');
        var sub = selectedValue ? selectedValue.value : "0";



        var cartItem = {
          sku: upn,
          qty: quantity,
          rate: selling_price,
          subscribe: sub,
          size: selected_size
        };

        // Retrieving and parsing the array of objects
        var storedJsonString = localStorage.getItem("added_cart");
        var storedArray = storedJsonString ? JSON.parse(storedJsonString) : [];

        var existingIndex = storedArray.findIndex(function(obj) {
          return obj.sku === cartItem.sku && obj.size === cartItem.size;
        });


        if (existingIndex !== -1) {
          // storedArray[existingIndex] = cartItem;

          // storedArray[existingIndex].qty += cartItem.qty;
          storedArray[existingIndex].qty = parseInt(storedArray[existingIndex].qty, 10) + cartItem.qty;

          console.log(existingIndex);

        } else {
          storedArray.push(cartItem);
        }

        localStorage.setItem("added_cart", JSON.stringify(storedArray));



        if (buy == "buy_now") {
          window.location.href = 'shop-cart.php';
        } else {
          showToastSuccess("Success", "Added to Cart");
        }

        var added_cart = JSON.parse(localStorage.getItem("added_cart"));
        $('.cart_qty_cls').html(added_cart ? added_cart.length : 0);
      }
    }






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
            return array.find(function(obj) {
              return obj[property] === value;
            });
          }

          // Example: Finding an object with name "Bob"
          var foundObjectIndex = storedArray.findIndex(function(obj) {
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


    $(document).ready(function() {

      $('#three_months').click(function() {

        var qty = $('#custom_qty').val();
        var calc_val = (qty * 3);
        $('#custom_qty').val(calc_val);

      });

    });



    $(document).ready(function() {
      var initialQty;

      // Event handler for radio buttons
      $('input[name="sub_save"]').on('change', function() {
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


      // console.log(sku);

      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'api-call.php?sku=' + sku + '&type=check_stock' + '&tkn=' +
        tokenid, true);
      xhr.onload = function() {
        // console.log(xhr);

        if (xhr.status === 200) {
          var data = Number(xhr.responseText);
          // var productCardDiv = document.getElementById('product_status');

          // // Clear existing content
          // productCardDiv.innerHTML = '';

          $('#product_status').html('');

          // console.log(data);

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


    $('#lg-close-1').on('click', function() {
      // var additionalImagesContainer = document.querySelector('.additional-images-container');
      // additionalImagesContainer.style.display = 'none';
      var element = document.getElementById('toggleElement');
      element.classList.toggle('d-none');
    });

    document.getElementById('show-more-btn').addEventListener('click', function() {
      var element = document.getElementById('toggleElement');
      element.classList.toggle('d-none');

    });
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="path/to/your/czjs.js"></script>



  <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up"> </i></a>
  <!-- Vendor scrits: js libraries and plugins-->
  <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/simplebar/dist/simplebar.min.js"></script>
  <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
  <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="vendor/drift-zoom/dist/Drift.min.js"></script>
  <script src="vendor/lightgallery/lightgallery.min.js"></script>
  <script src="vendor/lightgallery/plugins/video/lg-video.min.js"></script>
  <!-- Main theme script-->
  <script src="js/theme.min.js"></script>


  </html>