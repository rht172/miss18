<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
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







$tid = $sku = $product_type = $category = $sub_category = $super_sub_category = $brand_name = $product_name = $stock = $unit = $tax_type = $selling_price = $purchase_price = $mrp = $supplier_name = $colour = $size = $barcode = $pack_stock = $product_description = $rack_details = $image1_url = $min_stock = $part_no_01 = $part_no_02 = $part_no_03 = $stock_on_hold = $discount_percentage = $offer_name = $whole_sale_price = $opening_stock = $ext_file_1 = $ext_file_2 = $ext_file_3 = $ext_file_4 = $pt_color = $pt_size = $ext_file_5 = $ext_file_6 = $description_1 = $description_2 = $faq = $ext_file_banner_1 = $ext_file_banner_2 = $bg_color = $category_pass = $product_display_name = $colour_pass = $size_pass = "";


$category_pass = czGet('category');
$colour_pass = czGet('colour');
$size_pass = czGet('size');
$price_pass  = czGet('price');
$rate_range = "";
$rate_range_all = "";

// echo $size_pass;
$tempwhere = "";
$colour_where = "";
$size_where = "";
?>



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



  <!-- Navbar 3 Level (Light)-->
  <?php
  include 'includes/header.php';
  ?>


  <div class="page-title-overlap bg-dark pt-5">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-dark justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-dark" href="index.php"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item "><a href="">Shop</a>
            </li>
            <li class="breadcrumb-item text-dark active" aria-current="page">All Products</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Shop grid left sidebar</h1>
      </div>
    </div>
  </div>


  <div class="container-fluid pb-5 mb-2 mb-md-4">
    <div class="row">
      <aside class="col-lg-2 mt-5">
        <!-- Sidebar-->
        <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar" style="max-width: 22rem;">
          <div class="offcanvas-header align-items-center shadow-sm">
            <h2 class="h5 mb-0">Filters</h2>
            <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">

            <!-- Filter by Brand-->
            <div class="widget widget-filter mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Categories</h3>
              <form id="categoryForm">
                <div class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php
                  // Fetch distinct categories from the database
                  $result = $obj_class_main->selectData_customqry("SELECT DISTINCT category FROM product_table_ecom order by category asc;");


                  // Radio button for "All Product"
                  $checked_all = ($category_pass === '') ? 'checked' : '';
                  echo '<div class="form-check">';
                  echo '  <input class="form-check-input category_select" type="radio" name="categories" value="" id="all_products" ' . $checked_all . '>';
                  echo '  <label class="form-check-label" for="all_products">All Product</label>';
                  echo '</div>';

                  // Loop through the categories and create radio buttons
                  while ($row = $result->fetch_assoc()) {
                    $checked = ($category_pass == $row['category']) ? 'checked' : '';
                    echo '<div class="form-check">';
                    echo '  <input class="form-check-input category_select" type="radio" name="categories" value="' . $row['category'] . '" id="' . $row['category'] . '" ' . $checked . '>';
                    echo '  <label class="form-check-label" for="' . $row['category'] . '">' . $row['category'] . '</label>';
                    echo '</div>';
                  }
                  ?>
                </div>
              </form>
            </div>

            <!-- Filter by Size-->
            <div class="widget widget-filter mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Size</h3>
              <form id="sizeForm">
                <div class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php
                  // Fetch distinct size from the database
                  $result = $obj_class_main->selectData_customqry("SELECT DISTINCT size FROM product_table_ecom ORDER BY FIELD(size, 'S', 'M', 'L', 'XL','XXL');");

                  // Loop through the categories and create radio buttons
                  while ($row = $result->fetch_assoc()) {
                    $checked = ($size_pass == $row['size']) ? 'checked' : '';
                    echo '<div class="form-check">';
                    echo '  <input class="form-check-input size_select" type="radio" name="categories" value="' . $row['size'] . '" id="' . $row['size'] . '" ' . $checked . '>';
                    echo '  <label class="form-check-label" for="' . $row['size'] . '">' . $row['size'] . '</label>';
                    echo '</div>';
                  }
                  ?>
                </div>
              </form>
            </div>


            <!-- Filter by Color-->
            <div class="widget widget-filter mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Color</h3>
              <form id="colorForm">
                <div class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php
                  // Fetch distinct colours from the database
                  $result = $obj_class_main->selectData_customqry("SELECT DISTINCT colour FROM product_table_ecom ORDER BY colour ASC");

                  // Radio button for "All Colours"
                  $checked_all = ($colour_pass === '') ? 'checked' : ''; // Check if "All Colours" is selected
                  echo '<div class="form-check">';
                  echo '  <input class="form-check-input colour_select" type="radio" name="colours" value="" id="all_colours" ' . $checked_all . '>';
                  echo '  <label class="form-check-label" for="all_colours">All Colours</label>';
                  echo '</div>';

                  // Loop through the colours and create radio buttons
                  while ($row = $result->fetch_assoc()) {
                    $checked = ($colour_pass == $row['colour']) ? 'checked' : '';
                    echo '<div class="form-check">';
                    echo '  <input class="form-check-input colour_select" type="radio" name="colours" value="' . htmlspecialchars($row['colour']) . '" id="' . htmlspecialchars($row['colour']) . '" ' . $checked . '>';
                    echo '  <label class="form-check-label" for="' . htmlspecialchars($row['colour']) . '">' . htmlspecialchars($row['colour']) . '</label>';
                    echo '</div>';
                  }
                  ?>

                </div>
              </form>
            </div>

            <!-- Filter by price-->
            <div class="widget widget-filter mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Price</h3>
              <form id="priceForm">
                <div class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                  <?php
                  // Define the price ranges
                  $price_ranges = [
                    '' => 'All Prices', // This will select all products
                    'Under-500' => 'Under 500',
                    '500-1000' => '500 - 1000',
                    '1000-2000' => '1000 - 2000',
                    '2000-3000' => '2000 - 3000',
                    '3000-4000' => '3000 - 4000',
                    '4000-5000' => '4000 - 5000',
                    'Above-5000' => 'Above 5000'
                  ];

                  // Generate radio buttons for each price range
                  foreach ($price_ranges as $value => $label) {
                    // Check if the current price range is selected
                    $checked = ($price_pass == $value) ? 'checked' : '';
                    echo '<div class="form-check">';
                    echo '  <input class="form-check-input price_select" type="radio" name="price_ranges" value="' . htmlspecialchars($value) . '" id="' . htmlspecialchars($value) . '" ' . $checked . '>';
                    echo '  <label class="form-check-label" for="' . htmlspecialchars($value) . '">' . htmlspecialchars($label) . '</label>';
                    echo '</div>';
                  }
                  ?>

                </div>
              </form>
            </div>


          </div>
        </div>
      </aside>
      <!-- Content  -->
      <section class="col-lg-9 mt-5">
        <!-- Products grid-->
        <div class="row mx-n2">

          <?php
          // Set up pagination variables and parameters
          $productsPerPage = 12; // Number of products to display per page
          $page = isset($_GET['page']) ? intval($_GET['page']) : 12; // Current page number
          $offset = ($page - 1) * $productsPerPage; // Offset for SQL query
          ?>

          <?php
          $count = 0;

          // if (strlen($colour_pass) > 0 && strlen($size_pass) > 0) {
          //   $colour_where .= "WHERE colour = '$colour_pass'";
          //   $size_where .= " AND size = '$size_pass'";
          // } else {
          //   if (strlen($colour_pass) > 0) {
          //     $colour_where .= "WHERE colour = '$colour_pass'";
          //   }
          //   if (strlen($size_pass) > 0) {
          //     if (strlen($colour_pass) > 0) {
          //       $size_where .= " AND size = '$size_pass'";
          //     } else {
          //       $size_where .= "WHERE size = '$size_pass'";
          //     }
          //   }
          // }


          if ($price_pass == "Under-500") {
            $rate_range = "And selling_price between 0 and 500";
            $rate_range_all = "Where selling_price between 0 and 500";
          } elseif ($price_pass == "500-1000") {
            $rate_range = "And selling_price between 500 and 1000;";
            $rate_range_all = "Where selling_price between 500 and 1000";
          } elseif ($price_pass == "1000-2000") {
            $rate_range = "And selling_price between 1000 and 2000;";
            $rate_range_all = "Where selling_price between 1000 and 2000";
          } elseif ($price_pass == "2000-3000") {
            $rate_range = "And selling_price between 2000 and 3000;";
            $rate_range_all = "Where selling_price between 2000 and 3000";
          } elseif ($price_pass == "3000-4000") {
            $rate_range = "And selling_price  between 3000 and 4000;";
            $rate_range_all = "Where selling_price  between 3000 and 4000";
          } elseif ($price_pass == "4000-5000") {
            $rate_range = "And selling_price between 4000 and 5000;";
            $rate_range_all = "Where selling_price between 4000 and 5000";
          } elseif ($price_pass == "Above-5000") {
            $rate_range = "And selling_price >= 5000;";
            $rate_range_all = "Where selling_price >= 5000";
          } elseif ($price_pass == "") {
            $rate_range = "";
            $rate_range_all = "";
          }



          // Determine the SQL query based on the category
          if (strlen($category_pass) > 0 && strlen($colour_pass) > 0 && strlen($size_pass) > 0) {
            $query = "SELECT * FROM product_table_ecom where category = '$category_pass'and size = '$size_pass' $rate_range  and colour = '$colour_pass'  GROUP BY product_display_name  LIMIT $productsPerPage OFFSET $offset;";
          } else if (strlen($category_pass) > 0 && strlen($size_pass) > 0) {
            $query = "SELECT * FROM product_table_ecom where category = '$category_pass' and size = '$size_pass' $rate_range GROUP BY product_display_name  LIMIT $productsPerPage OFFSET $offset;";
          } else if (strlen($category_pass) > 0 && strlen($colour_pass) > 0) {
            $query = "SELECT * FROM product_table_ecom where category = '$category_pass' and colour = '$colour_pass' $rate_range GROUP BY product_display_name  LIMIT $productsPerPage OFFSET $offset;";
          } else if (strlen($category_pass) > 0) {
            $query = "SELECT * FROM product_table_ecom where category = '$category_pass' $rate_range GROUP BY product_display_name  LIMIT $productsPerPage OFFSET $offset;";
          } else if (strlen($colour_pass) > 0) {
            $query = "SELECT * FROM product_table_ecom where colour = '$colour_pass' $rate_range GROUP BY product_display_name  LIMIT $productsPerPage OFFSET $offset;";
          } else if (strlen($size_pass) > 0) {
            $query = "SELECT * FROM product_table_ecom where size = '$size_pass' $rate_range GROUP BY product_display_name  LIMIT $productsPerPage OFFSET $offset;";
          } else {
            $query = "SELECT * FROM product_table_ecom $rate_range_all GROUP BY product_display_name ORDER BY  CASE category  WHEN 'Dresses' THEN 1  WHEN 'Shrugs' THEN 2   WHEN 'Skirt' THEN 3  WHEN 'T Shirt' THEN  4 ELSE 5 END LIMIT $productsPerPage OFFSET $offset;";
          }
          // echo $query;
          // Execute the query
          $result = $obj_class_product->selectData_customqry($query);


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

            $processName = 'update&pk=' . czGet('updateKey');

            if ($count == 1) {
          ?>

              <div>
                <div class="row">

                <?php } ?>

                <div class="col-md-3 col-sm-6 mb-4 pb-5" id="result">
                  <div class="card product-card">
                    <!-- Product Image -->
                    <!-- <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Add to wishlist" onclick="wishlist('<?php echo $sku ?>','<?php echo $selling_price ?>')"><i
                      class="ci-heart"></i></button> -->

                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist" data-sku="<?php echo $sku ?>" data-price="<?php echo $selling_price ?>" onclick="toggleWishlist(this)">
                      <i class="ci-heart"></i>
                    </button>

                    <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                      <div class="image-container">
                        <img class="d-flex" src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>" alt="Product" width='500'>
                        <img class="hover-image" src="cz-admin/attachments/product/hover_img/tid-<?php echo $tid ?>.<?php echo $ext_file_hover ?>" alt="Another Image">
                      </div>
                    </a>

                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $category ?></a>
                      <h3 class="product-title fs-sm"><a href="product-page.php?sku=<?php echo $sku ?>"><?php echo $product_display_name ?></a></h3>
                      <div class="d-flex justify-content-between">

                        <div class="product-price"><span class="text-accent" id="product_selling_price">
                            <span>&#x20B9; </span>
                            <?php echo $selling_price ?></span>
                          <del class="text-muted fs-sm me-3" id='product_mrp'>
                            <?php
                            if ($selling_price != $mrp) {
                              echo $mrp;
                            }
                            ?>
                          </del>
                        </div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                    <!-- Floating Cart Button -->
                    <div class="card-body card-body-hidden">
                      <a class="card-img-top d-block overflow-hidden" href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                        <button class="btn btn-dark btn-sm d-block w-100 mb-2" type="button">QUICK VIEW</button></a>
                    </div>

                  </div>
                  <hr class="d-sm-none">
                </div>
                <?php if ($count == 12) { ?>
                </div>
              </div>
          <?php
                  $count = 0;
                }
              }
          ?>

          <!-- Banner-->
          <div class="py-sm-2">
            <div class="d-sm-flex justify-content-between align-items-center overflow-hidden mb-4 rounded-3">
              <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
                <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop
                  Now</a>
              </div>
              <!-- <img class="d-block ms-auto" src="img/shop/catalog/1.png" alt="Shop Converse"> -->
            </div>
          </div>

          <nav class="d-flex justify-content-center pt-2" aria-label="Page navigation">
            <ul class="pagination">
              <?php

              if (strlen($category_pass) > 0) {
                $tempwhere = "category = " . "'$category_pass'";
              } else {
                $tempwhere = 'tid <> 0';
              }
              $result = $obj_class_product->selectData_customqry("SELECT count(distinct product_display_name) as count from product_table_ecom where $tempwhere;");
              while ($row = $result->fetch_assoc()) {
                $count = $row['count'];
              }
              // Count the total number of products
              $totalProducts = $count;

              // Calculate the total number of pages
              $totalPages = ceil($totalProducts / $productsPerPage);

              // // Generate "Previous" link
              // if ($page > 1) {
              //   echo '<li class="page-item"><a class="page-link " href="?page=' . ($page - 1) . '">Previous</a></li>';
              // }

              // Generate numeric pagination links

              $adjacents = 2; // Number of pages adjacent to the current page
              $startPage = max(1, $page - $adjacents);
              $endPage = min($totalPages, $page + $adjacents);

              // Adjust the start and end pages if they go out of bounds
              if ($endPage - $startPage < 4) {
                $startPage = max(1, $endPage - 4);
                $endPage = min($totalPages, $startPage + 4);
              }

              // Add 'Previous' button
              if ($page > 1) {
                if (strlen($category_pass) > 0) {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '&category=' . $category_pass . '"> &#8592; Previous</a></li>';
                } else {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '"> &#8592; Previous</a></li>';
                }
              }

              // Generate page links
              for ($i = $startPage; $i <= $endPage; $i++) {
                if (strlen($category_pass) > 0) {
                  echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '&category=' . $category_pass . '">' . $i . '</a></li>';
                } else {
                  echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }
              }

              // Add 'Next' button
              if ($page < $totalPages) {
                if (strlen($category_pass) > 0) {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '&category=' . $category_pass . '">Next &#8594; </a></li>';
                } else {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next &#8594; </a></li>';
                }
              }



              // Generate numeric pagination links with current page number only
              // if ($totalPages > 1) {
              //   for ($i = 1; $i <= $totalPages; $i++) {
              //     if ($i === $page) {
              //       echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
              //     }
              //   }
              // }
              // Generate "Next" link
              // if ($page < $totalPages) {
              //   echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
              // }
              ?>
            </ul>
          </nav>

          <hr class="my-3">
      </section>
    </div>
  </div>


  <div class="edge-mask">
    <div class="ldlz" data-src="/assets/img/c/bg/valley-white.svg" style="opacity: 1; visibility: visible; background-image: url(&quot;/assets/img/c/bg/valley-white.svg&quot;);">
    </div>
  </div>

  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

  <!-- Toolbar for handheld devices (Shop)-->
  <div class="handheld-toolbar">
    <div class="d-table table-layout-fixed w-100">
      <a class="d-table-cell handheld-toolbar-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#shop-sidebar"><span class="handheld-toolbar-icon"><i class="ci-filter-alt"></i></span><span class="handheld-toolbar-label">Filters</span></a>
      <a class="d-table-cell handheld-toolbar-item"
        href="account-wishlist.php"><span class="handheld-toolbar-icon"><i class="ci-heart"></i></span><span
          class="handheld-toolbar-label">Wishlist</span></a>

      <a class="d-table-cell handheld-toolbar-item"
        href="shop-cart.php"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span
            class="badge bg-primary rounded-pill ms-1 cart_qty_cls">0</span></span><span
          class="handheld-toolbar-label">Cart</span></a>

    </div>

</body>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Track selected size
    let selectedSize = null;

    // Add change event listener to all radio buttons
    const radioButtons = document.querySelectorAll('.form-check-input');

    radioButtons.forEach(radio => {
      radio.addEventListener('change', function() {
        // Update the selected size
        selectedSize = this.value;

        // Update highlight
        radioButtons.forEach(btn => {
          const label = document.querySelector(`label[for="${btn.id}"]`);
          if (label) {
            label.classList.remove('highlighted');
          }
        });

        const selectedLabel = document.querySelector(`label[for="${this.id}"]`);
        if (selectedLabel) {
          selectedLabel.classList.add('highlighted');
        }
      });
    });

    // Add to Cart function
    window.addToCart = function() {
      if (selectedSize === null) {
        alert('Please select a size.');
        return;
      }
      // Replace with your actual SKU and price variables
      const sku = '<?php echo $sku ?>';
      const sellingPrice = '<?php echo $selling_price ?>';

      // Call your add to cart function
      add_to_cart(sku, sellingPrice, selectedSize);
    };
  });
</script>



<script>
  var tokenid = "<?php echo session_id(); ?>";


  // document.getElementById('sorting').addEventListener('change', function () {
  //   var selectedCategory = this.value;
  //   var xhr = new XMLHttpRequest();
  //   xhr.open('GET', 'api-call.php?sorting=' + selectedCategory + '&type=get_sorting' + '&tkn=' + tokenid, true);
  //   xhr.onreadystatechange = function () {
  //     if (xhr.readyState === XMLHttpRequest.DONE) {
  //       if (xhr.status === 200) {
  //         document.getElementById('result').innerHTML = xhr.responseText;
  //       } else {
  //         console.error('Error:', xhr.status);
  //       }
  //     }
  //   };

  //   xhr.send();
  // });




  // document.addEventListener('DOMContentLoaded', function() {
  //   const form = document.getElementById('categoryForm');
  //   const form_1 = document.getElementById('sizeForm');
  //   const radioButtons = form.querySelectorAll('input[type="radio"]');

  //   // Handle category selection
  //   form.addEventListener('change', function(event) {
  //     if (event.target.classList.contains('category_select')) {
  //       const selectedCategory = event.target.value;
  //       // Construct the new URL with the selected category
  //       const newUrl = `product-category.php?page=1&category=${encodeURIComponent(selectedCategory)}`;
  //       // Update the window location to navigate to the new URL
  //       window.location.href = newUrl;
  //     }else if ((event.target.classList.contains('category_select'))&&(event.target.classList.contains('size_select'))) {
  //       const selectedCategory = event.target.value;
  //       const selectedCategory_1 = event.target.value;
  //       // Construct the new URL with the selected category
  //       const newUrl = `product-category.php?page=1&category=${encodeURIComponent(selectedCategory)}&size=${encodeURIComponent(selectedCategory_1)}`;
  //       // Update the window location to navigate to the new URL
  //       window.location.href = newUrl;
  //     }

  //   });
  // });


  document.addEventListener('DOMContentLoaded', function() {
    // Get all form elements
    const categoryForm = document.getElementById('categoryForm');
    const sizeForm = document.getElementById('sizeForm');
    const colorForm = document.getElementById('colorForm');
    const priceForm = document.getElementById('priceForm'); // Added price form

    // Reset the forms on page load to clear all selections
    if (categoryForm) categoryForm.reset();
    if (sizeForm) sizeForm.reset();
    if (colorForm) colorForm.reset();
    if (priceForm) priceForm.reset(); // Reset price form

    // Function to get the selected value from a form
    function getSelectedValue(form) {
      const selected = form.querySelector('input[type="radio"]:checked');
      return selected ? selected.value : null;
    }

    // Function to update the URL based on selections
    function updateUrl() {
      const selectedCategory = getSelectedValue(categoryForm);
      const selectedSize = getSelectedValue(sizeForm);
      const selectedColor = getSelectedValue(colorForm);
      const selectedPrice = getSelectedValue(priceForm); // Added selected price

      // Construct the new URL with the selected values
      let newUrl = 'product-category.php?page=1';
      if (selectedCategory) {
        newUrl += `&category=${encodeURIComponent(selectedCategory)}`;
      }
      if (selectedSize) {
        newUrl += `&size=${encodeURIComponent(selectedSize)}`;
      }
      if (selectedColor) {
        newUrl += `&colour=${encodeURIComponent(selectedColor)}`;
      }
      if (selectedPrice) {
        newUrl += `&price=${encodeURIComponent(selectedPrice)}`; // Add price to URL
      }

      // Update the window location to navigate to the new URL
      window.location.href = newUrl;
    }

    // Attach change event listeners to the forms
    if (categoryForm) categoryForm.addEventListener('change', updateUrl);
    if (sizeForm) sizeForm.addEventListener('change', updateUrl);
    if (colorForm) colorForm.addEventListener('change', updateUrl);
    if (priceForm) priceForm.addEventListener('change', updateUrl); // Listen to price form

    // Optional: Handle clicks outside the form
    document.addEventListener('click', function(event) {
      if (!event.target.closest('#categoryForm, #sizeForm, #colorForm, #priceForm')) {
        // Do nothing or any other action if needed
      }
    });
  });


  // $(document).ready(function() {

  // $('.category_select').on('change', function() {

  // var category_select = $(this).val();

  // console.log(category_select);

  // window.location.href = 'product-category.php?page=1&category=' + category_select;

  // });

  // });

  // $(document).ready(function() {

  //   function updateURL() {
  //     var category_select = $('.category_select').val();
  //     var colour_select = $('.colour_select').val();
  //     var size_select = $('.size_select').val();

  //     // console.log('Category:', category_select);
  //     // console.log('Colour:', colour_select);
  //     // console.log('Size:', size_select);

  //     var url = 'product-category.php?page=1&category=' + category_select;

  //     if (colour_select) {
  //       url += '&colour=' + encodeURIComponent(colour_select);
  //     }

  //     if (size_select) {
  //       url += '&size=' + encodeURIComponent(size_select);
  //     }

  //     window.location.href = url;
  //   }

  //   $('.category_select, .colour_select, .size_select').on('change', updateURL);

  // });












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
      // window.location.href = 'shop-cart.php';
      // } else {
      // Swal.fire({
      // icon: 'success',
      // title: 'Cool...',
      // text: 'Added to Cart!',
      // confirmButtonColor: '#3085d6',
      // });
      // }

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
    $('title').html('ALL PRODUCTS');
  });
</script>

</html>