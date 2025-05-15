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
<?php
$obj_class_product = new czDBAccess();
$obj_class_color = new czDBAccess();
$obj_class_review_rate = new czDBAccess();


$obj_class_product->varTableName = 'product_table_ecom';
$obj_class_color->varTableName = 'color_master_table';
$obj_class_review_rate->varTableName = 'review_rating_table';

if (isset($_SESSION['tid'])) {
    $customer_id = $_SESSION['tid'];
} else {
    $customer_id = '';
}


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

$review_rating = 0;

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

        <div class="page-title-overlap bg-secondary pt-4">
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

                        <div class="col-lg-5 pe-lg-0 pt-lg-4">
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
                                </div>
                            </div>
                        </div>

                        <!-- Product details--------------------------------->
                        <div class="col-lg-7 pt-4 pt-lg-0">
                            <div class="product-details ms-auto pb-2 pt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class='m-0 d-none' id='product_sku'>
                                        <?php echo $sku ?>
                                    </h3>
                                    <h3 class='m-0' id='display_sku'>
                                        <?php echo $product_display_name ?>
                                    </h3>
                                    <a href=""></a>
                                </div>
                                <br>
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
                                    </div>
                                </div>
                                <hr>
                                <br>

                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end pb-4">
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="category_select">Sort by:</label>
                                            <select class="form-select form-select-sm" id="category_select">
                                                <option value=""></option>
                                                <option value="my">My Reviewes</option>
                                                <option value="new">Most Recent</option>
                                                <option value="high">High Rating</option>
                                                <option value="low">Low Rating</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Review-->

                                    <?php

                                    $review_tid = "";
                                    $cus_tid = "";

                                    $review_rating = isset($_GET['category_select']) ? $_GET['category_select'] : '';
                                    // echo $review_rating;
                                    if ($review_rating == 'my') {
                                        $query = "SELECT review_rating_table.cus_id as cus_tid,review_rating_table.tid as review_tid,customer_table.tid as pr_tid,customer_table.ext_file as extension,review_rating_table.customer_name as names,review_rating_table.ratings as stars,review_rating_table.reviews as review,review_rating_table.pros as pros,review_rating_table.cons as cons,review_rating_table.created_date as created_date FROM review_rating_table left join customer_table on review_rating_table.cus_id = customer_table.tid where cus_id = '$customer_id' and sku = '$sku';";
                                    } else if ($review_rating == 'new') {
                                        $query = "SELECT review_rating_table.cus_id as cus_tid,review_rating_table.tid as review_tid,customer_table.tid as pr_tid,customer_table.ext_file as extension,review_rating_table.customer_name as names,review_rating_table.ratings as stars,review_rating_table.reviews as review,review_rating_table.pros as pros,review_rating_table.cons as cons,review_rating_table.created_date as created_date,review_rating_table.tid as max_tid FROM review_rating_table left join customer_table on review_rating_table.cus_id = customer_table.tid ORDER BY  review_rating_table.tid ASC;";
                                    } else if ($review_rating == 'high') {
                                        $query = "SELECT review_rating_table.cus_id as cus_tid,review_rating_table.tid as review_tid,customer_table.tid as pr_tid,customer_table.ext_file as extension,review_rating_table.customer_name as names,review_rating_table.ratings as stars,review_rating_table.reviews as review,review_rating_table.pros as pros,review_rating_table.cons as cons,review_rating_table.created_date as created_date FROM review_rating_table left join customer_table on review_rating_table.cus_id = customer_table.tid where review_rating_table.ratings >= '3';";
                                    } else if ($review_rating == 'low') {
                                        $query = "SELECT review_rating_table.cus_id as cus_tid,review_rating_table.tid as review_tid,customer_table.tid as pr_tid,customer_table.ext_file as extension,review_rating_table.customer_name as names,review_rating_table.ratings as stars,review_rating_table.reviews as review,review_rating_table.pros as pros,review_rating_table.cons as cons,review_rating_table.created_date as created_date FROM review_rating_table left join customer_table on review_rating_table.cus_id = customer_table.tid where review_rating_table.ratings <= '3';";
                                    } else {
                                        $query = "SELECT review_rating_table.cus_id as cus_tid,review_rating_table.tid as review_tid,customer_table.tid as pr_tid,customer_table.ext_file as extension,review_rating_table.customer_name as names,review_rating_table.ratings as stars,review_rating_table.reviews as review,review_rating_table.pros as pros,review_rating_table.cons as cons,review_rating_table.created_date as created_date FROM review_rating_table left join customer_table on review_rating_table.cus_id = customer_table.tid left join product_table_ecom on review_rating_table.sku = product_table_ecom.sku where review_rating_table.sku = '$sku';";
                                    }

                                    $result_cus = $obj_class_review_rate->selectData_customqry($query);


                                    while ($row_cus = $result_cus->fetch_assoc()) {

                                        $review_tid = $row_cus['review_tid'];
                                        $cus_tid = $row_cus['cus_tid'];
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
                                                <?php
                                                if (isset($_SESSION['tid'])) {
                                                    $customer_id = $_SESSION['tid'];
                                                } else {
                                                    $customer_id = '';
                                                }


                                                if ($review_rating == 'my' &&  $customer_id == $cus_tid) {
                                                    // echo "234".$review_tid;
                                                ?>

                                                    <div class="ms-auto align-self-center">
                                                        <a href="" onclick="get_review_details('<?php echo $review_tid; ?>')" class="text-muted" data-bs-toggle="modal" data-bs-target="#editReviewModal">
                                                            <i class="ci-edit fs-lg"></i>
                                                        </a>
                                                    </div>
                                                <?php
                                                } else {
                                                }
                                                ?>
                                            </div>
                                            <p class="fs-md mb-2"><?php echo $review ?></p>
                                            <ul class="list-unstyled fs-ms pt-1">
                                                <li class="mb-1"><span class="fw-medium">Pros:&nbsp;</span><?php echo $pros ?></li>
                                                <li class="mb-1"><span class="fw-medium">Cons:&nbsp;</span><?php echo $cons ?></li>
                                            </ul>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="editReviewModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editReviewModalLabel">Edit Your Review</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Card Form Inside the Modal -->
                                        <div class="col-md-12 mt-2 pt-4 mt-md-0 pt-md-0">
                                            <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3" id="rating_review">
                                                <h3 class="h4 pb-2">Write a review</h3>

                                                <form id="myform" action="review-rating-ctrl.php?key2=<?php echo $processName; ?>" method="post"
                                                    enctype="multipart/form-data">

                                                    <div class="mb-3">
                                                        <label class="form-label" for="customer_name">Your name<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" required id="customer_name" name="customer_name" <?php echo 'value="' . $customer_name . '"'; ?>>
                                                        <div class="invalid-feedback">Please enter your name!</div><small class="form-text text-muted">Will be displayed on the comment.</small>
                                                    </div>

                                                    <input class="form-control d-none" type="text" required id="sku" name="sku" <?php echo 'value="' . $sku . '"'; ?>>
                                                    <input class="form-control d-none" type="text" required id="cus_id" name="cus_id" <?php echo 'value="' . $customer_id . '"'; ?>>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="customer_email">Your email<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="email" required id="customer_email" name="customer_email" <?php echo 'value="' . $customer_email . '"'; ?>>
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
                                                        <textarea class="form-control" rows="6" required id="reviews" name="reviews" <?php echo 'value="' . $review . '"'; ?>></textarea>
                                                        <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at least 50 characters.</small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="review-pros">Pros</label>
                                                        <textarea class="form-control" rows="2" placeholder="Separated by commas" id="pros" name="pros" <?php echo 'value="' . $pros . '"'; ?>></textarea>
                                                    </div>

                                                    <div class="mb-3 mb-4">
                                                        <label class="form-label" for="review-cons">Cons</label>
                                                        <textarea class="form-control" rows="2" placeholder="Separated by commas" id="cons" name="cons" <?php echo 'value="' . $cons . '"'; ?>></textarea>
                                                    </div>

                                                    <div class="g-recaptcha d-flex justify-content-center pb-4" data-sitekey="6Lf7QQElAAAAAJL-nju7RoeJh0X57mHOu5FZatA4">
                                                    </div>

                                                    <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Save Changes</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer-->
    <?php include 'includes/footer.php' ?>
</body>
<script>
    var tokenid = "<?php echo session_id(); ?>";

    $(document).ready(function() {

        $('#category_select').on('change', function() {

            var category_select = $(this).val();

            // console.log(category_select);

            window.location.href = 'review-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>&category_select=' + category_select;

        });

    });



    function get_review_details(tid) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'api-call.php?tid=' + tid + '&type=get_review_details', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = xhr.responseText;
                console.log(data);

                // Check if there was an error
                if (data.error) {
                    console.error(data.error);
                    alert('No review data found.');
                    return;
                }

                // Display the data (assuming you have HTML elements with these IDs)
                document.getElementById('customer_name').textContent = data.name;
                document.getElementById('customer_email').textContent = data.email;
                document.getElementById('ratings').textContent = data.rating;
                document.getElementById('reviews').textContent = data.review;
                document.getElementById('pros').textContent = data.pros;
                document.getElementById('cons').textContent = data.cons;
            } else {
                console.error('Request failed. Status: ' + xhr.status);
            }
        };
        xhr.send();
    }
</script>
<script src="assets/js/cities.js"></script>

</html>