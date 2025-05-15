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
?>

<!DOCTYPE html>
<html lang="en">

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


    <!-- <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <div class="d-inline-block align-middle bg-primary rounded me-2" style="width: 1.25rem; height: 1.25rem;"></div>
    <h6 class="fs-sm mb-0 me-auto">Bootstrap</h6>
    <small>11 mins ago</small>
    <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">Hello, world! This is a toast message.</div>
</div>



<div class="toast fade show" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header bg-success text-white">
    <i class="ci-check-circle me-2"></i>
    <span class="fw-medium me-auto">Success toast</span>
    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body text-success">Hello, world! This is a toast message.</div>
</div> -->


    <!-- Hero slider-->
    <section class="tns-carousel tns-controls-lg mb-4 mb-lg-5">
      <div class="tns-carousel-inner"
        data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
        <!-- Item-->


        <?php
        // $select_Feilds = "tid,slider_header,slider_header_2,slider_header_3,slider_button_url,created_on,created_by,last_updated_on,last_updated_by,ext_file";
        $result = $obj_class_slider->selectData_customqry("SELECT * from slider_table");

        while ($row = $result->fetch_assoc()) {

          $tid = $row['tid'];
          $slider_header = $row['slider_header'];
          $slider_header_2 = $row['slider_header_2'];
          $slider_header_3 = $row['slider_header_3'];
          $slider_button_url = $row['slider_button_url'];
          $created_on = $row['created_on'];
          $created_by = $row['created_by'];
          $last_updated_on = $row['last_updated_on'];
          $last_updated_by = $row['last_updated_by'];
          $ext_file = $row['ext_file'];
          $bg_color = $row['bg_color'];

          ?>


          <a <?php if (strlen($slider_button_url) > 0) { ?> href="product-page.php?sku=<?php echo $slider_button_url ?>"
            <?php } else { ?> href="product-category.php" <?php } ?>>
            <div class="ps-lg-0" style="background-color: #<?php echo $bg_color ?>;">
              <div class="d-lg-flex align-items-center ps-lg-0">
                <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0"
                  src="cz-admin/attachments/slider/tid-<?php echo $tid ?>.<?php echo $ext_file ?>">

              </div>
            </div>
          </a>
          <?php
        }
        ?>
    </section>



    <!-- Bestsellers (Carousel)-->
    <section class="m-5 inline-photo show-on-scroll">
      <!-- Heading-->
      <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-3">T-SHIRT</h2>
        <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="product-category.php?category=T-SHIRT">More products<i
              class="ci-arrow-right ms-1 me-n1"></i></a></div>
      </div>
      <div class="tns-carousel tns-controls-static tns-controls-outside tns-dots-enabled pt-2">
        <div class="tns-carousel-inner"
          data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}">

          <?php

          $select_Feilds_0 = "tid,sku,other_details,created_on,created_by,last_updated_on,last_updated_by";

          $result = $obj_class_product->selectData_customqry("SELECT * from product_table_ecom where category = 'T-SHIRT'");
          // while ($row_0 = $result_0->fetch_assoc()) {

          //   $tid_0 = $row_0['tid'];
          //   $sku_0 = $row_0['sku'];
          //   $category_0 = $row_['category'];
          //   $other_details_0 = $row_0['other_details'];
          //   $created_on_0 = $row_0['created_on'];
          //   $created_by_0 = $row_0['created_by'];
          //   $last_updated_on_0 = $row_0['last_updated_on'];
          //   $last_updated_by_0 = $row_0['last_updated_by'];

          //   // echo $sku;
          
          //   $select_Feilds = "tid,sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,stock_on_hold,discount_percentage,offer_name,whole_sale_price,opening_stock,ext_file_1,ext_file_2,ext_file_3,ext_file_4,ext_file_hover";
          //   $select_whereClause = "category = '" . $category_0 . "'";
          //   $result = $obj_class_product->selectData($select_Feilds, $select_whereClause);

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
              $ext_file_hover = $row['ext_file_hover'];

              $processName = 'update&pk=' . czGet('updateKey');

              ?>


              <div>
                <div class="card product-card card-static pb-3">
                  <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Add to wishlist" onclick="wishlist_1('<?php echo $sku ?>', '<?php echo $selling_price ?>')"><i
                      class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                    href="product-page.php?sku=<?php echo $sku ?>">

                    <div class="image-container">
                      <img src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>"
                        alt="Product">
                      <img class="hover-image"
                        src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>"
                        alt="Another Image">
                    </div>
                  </a>
                  <div class="card-body py-2">
                    <!-- <a class="product-meta d-block fs-xs pb-1" href="#">Dairy and Eggs</a> -->
                    <h3 class="product-title fs-sm text-truncate"><a
                        href="product-page.php?category=<?php echo $category ?>">
                        <?php

                        $modifiedSku = $sku;


                        // Remove ZOY-FASHION or ZOY-GIRL if present
                        $modifiedSku = preg_replace('/\b(ZOY-FASHION|ZOY-GIRL)\b/', '', $modifiedSku);

                        // Remove number followed by letters and any characters after that
                        $modifiedSku = preg_replace('/\d+[A-Za-z].*/', '', $modifiedSku);

                        // Remove any single letters or digits
                        $modifiedSku = preg_replace('/\b[A-Za-z0-9]\b/', '', $modifiedSku);

                        // Remove any two-letter words (e.g., XL, M, S, L, etc.)
                        $modifiedSku = preg_replace('/\b[A-Za-z]{2}\b/', '', $modifiedSku);

                        // Remove any remaining hyphens
                        $modifiedSku = str_replace('-', ' ', $modifiedSku);


                        echo $modifiedSku; ?>
                      </a>
                    </h3>
                    <div class="product-price"><span class="text-accent">&#x20B9;
                        <?php echo $selling_price ?>
                      </span></div>
                  </div>
                  <div class="product-floating-btn">
                    <button class="btn btn-primary btn-shadow btn-sm" type="button"
                      onclick="add_to_cart('<?php echo $sku ?>','<?php echo $selling_price ?>')">+<i
                        class="ci-cart fs-base ms-1"></i></button>
                  </div>
                </div>
              </div>
              <?php
            }
          
          ?>
        </div>
      </div>
    </section>


    <section class="m-5 inline-photo show-on-scroll">
      <!-- Heading-->
      <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-3">LEGGINGS</h2>
        <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="product-category.php?category=LEGGINGS">More products<i
              class="ci-arrow-right ms-1 me-n1"></i></a></div>
      </div>
      <div class="tns-carousel tns-controls-static tns-controls-outside tns-dots-enabled pt-2">
        <div class="tns-carousel-inner"
          data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}">

          <?php

          $select_Feilds_0 = "tid,sku,other_details,created_on,created_by,last_updated_on,last_updated_by";

          $result = $obj_class_product->selectData_customqry("SELECT * from product_table_ecom where category = 'LEGGINGS'");

          // while ($row_0 = $result_0->fetch_assoc()) {

          //   $tid_0 = $row_0['tid'];
          //   $sku_0 = $row_0['sku'];
          //   $other_details_0 = $row_0['other_details'];
          //   $created_on_0 = $row_0['created_on'];
          //   $created_by_0 = $row_0['created_by'];
          //   $last_updated_on_0 = $row_0['last_updated_on'];
          //   $last_updated_by_0 = $row_0['last_updated_by'];

          //   // echo $sku;
          
          //   $select_Feilds = "tid,sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,stock_on_hold,discount_percentage,offer_name,whole_sale_price,opening_stock,ext_file_1,ext_file_2,ext_file_3,ext_file_4,ext_file_hover";
          //   $select_whereClause = "sku = '" . $sku_0 . "'";
          //   $result = $obj_class_product->selectData($select_Feilds, $select_whereClause);

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
              $ext_file_hover = $row['ext_file_hover'];

              $processName = 'update&pk=' . czGet('updateKey');

              ?>


              <div>
                <div class="card product-card card-static pb-3">
                  <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Add to wishlist" onclick="wishlist_1('<?php echo $sku ?>', '<?php echo $selling_price ?>')"><i
                      class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                    href="product-page.php?sku=<?php echo $sku ?>">

                    <div class="image-container">
                      <img src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>"
                        alt="Product">
                      <img class="hover-image"
                        src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>"
                        alt="Another Image">
                    </div>
                  </a>
                  <div class="card-body py-2">
                    <!-- <a class="product-meta d-block fs-xs pb-1" href="#">Dairy and Eggs</a> -->
                    <h3 class="product-title fs-sm text-truncate"><a href="product-page.php?sku=<?php echo $sku ?>">
                        <?php

                        $modifiedSku = $sku;


                        // Remove ZOY-FASHION or ZOY-GIRL if present
                        $modifiedSku = preg_replace('/\b(ZOY-FASHION|ZOY-GIRL)\b/', '', $modifiedSku);

                        // Remove number followed by letters and any characters after that
                        $modifiedSku = preg_replace('/\d+[A-Za-z].*/', '', $modifiedSku);

                        // Remove any single letters or digits
                        $modifiedSku = preg_replace('/\b[A-Za-z0-9]\b/', '', $modifiedSku);

                        // Remove any two-letter words (e.g., XL, M, S, L, etc.)
                        $modifiedSku = preg_replace('/\b[A-Za-z]{2}\b/', '', $modifiedSku);

                        // Remove any remaining hyphens
                        $modifiedSku = str_replace('-', ' ', $modifiedSku);


                        echo $modifiedSku; ?>
                      </a>
                    </h3>
                    <div class="product-price"><span class="text-accent">&#x20B9;
                        <?php echo $selling_price ?>
                      </span></div>
                  </div>
                  <div class="product-floating-btn">
                    <button class="btn btn-primary btn-shadow btn-sm" type="button"
                      onclick="add_to_cart('<?php echo $sku ?>','<?php echo $selling_price ?>')">+<i
                        class="ci-cart fs-base ms-1"></i></button>
                  </div>
                </div>
              </div>


              <?php
            }
          // }
          ?>
        </div>
      </div>
    </section>

    <section class="m-5 inline-photo show-on-scroll">
      <!-- Heading-->
      <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-3">WALL STICKER</h2>
        <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="product-category.php?category=WALL-STICKER">More products<i
              class="ci-arrow-right ms-1 me-n1"></i></a></div>
      </div>
      <div class="tns-carousel tns-controls-static tns-controls-outside tns-dots-enabled pt-2">
        <div class="tns-carousel-inner"
          data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}">

          <?php

          $select_Feilds_0 = "tid,sku,other_details,created_on,created_by,last_updated_on,last_updated_by";

          $result = $obj_class_product->selectData_customqry("SELECT * from product_table_ecom where category = 'WALL-STICKER'");

          // while ($row_0 = $result_0->fetch_assoc()) {

          //   $tid_0 = $row_0['tid'];
          //   $sku_0 = $row_0['sku'];
          //   $other_details_0 = $row_0['other_details'];
          //   $created_on_0 = $row_0['created_on'];
          //   $created_by_0 = $row_0['created_by'];
          //   $last_updated_on_0 = $row_0['last_updated_on'];
          //   $last_updated_by_0 = $row_0['last_updated_by'];

          //   // echo $sku;
          
          //   $select_Feilds = "tid,sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,stock_on_hold,discount_percentage,offer_name,whole_sale_price,opening_stock,ext_file_1,ext_file_2,ext_file_3,ext_file_4,ext_file_hover";
          //   $select_whereClause = "sku = '" . $sku_0 . "'";
          //   $result = $obj_class_product->selectData($select_Feilds, $select_whereClause);

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
              $ext_file_hover = $row['ext_file_hover'];

              $processName = 'update&pk=' . czGet('updateKey');

              ?>


              <div>
                <div class="card product-card card-static pb-3">
                  <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Add to wishlist" onclick="wishlist_1('<?php echo $sku ?>', '<?php echo $selling_price ?>')"><i
                      class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                    href="product-page.php?sku=<?php echo $sku ?>">

                    <div class="image-container">
                      <img src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>"
                        alt="Product">
                      <img class="hover-image"
                        src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>"
                        alt="Another Image">
                    </div>
                  </a>
                  <div class="card-body py-2">
                    <!-- <a class="product-meta d-block fs-xs pb-1" href="#">Dairy and Eggs</a> -->
                    <h3 class="product-title fs-sm text-truncate"><a href="product-page.php?sku=<?php echo $sku ?>">
                        <?php

                        $modifiedSku = $sku;


                        // Remove ZOY-FASHION or ZOY-GIRL if present
                        $modifiedSku = preg_replace('/\b(ZOY-FASHION|ZOY-GIRL)\b/', '', $modifiedSku);

                        // Remove number followed by letters and any characters after that
                        $modifiedSku = preg_replace('/\d+[A-Za-z].*/', '', $modifiedSku);

                        // Remove any single letters or digits
                        $modifiedSku = preg_replace('/\b[A-Za-z0-9]\b/', '', $modifiedSku);

                        // Remove any two-letter words (e.g., XL, M, S, L, etc.)
                        $modifiedSku = preg_replace('/\b[A-Za-z]{2}\b/', '', $modifiedSku);

                        // Remove any remaining hyphens
                        $modifiedSku = str_replace('-', ' ', $modifiedSku);


                        echo $modifiedSku; ?>
                      </a>
                    </h3>
                    <div class="product-price"><span class="text-accent">&#x20B9;
                        <?php echo $selling_price ?>
                      </span></div>
                  </div>
                  <div class="product-floating-btn">
                    <button class="btn btn-primary btn-shadow btn-sm" type="button"
                      onclick="add_to_cart('<?php echo $sku ?>','<?php echo $selling_price ?>')">+<i
                        class="ci-cart fs-base ms-1"></i></button>
                  </div>
                </div>
              </div>


              <?php
            }
          // }
          ?>
        </div>
      </div>
    </section>


  </main>


  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  var tokenid = "<?php echo session_id(); ?>";


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


  


</script>



</html>