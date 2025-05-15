<?php 

$user_id = "";
if (isset($_SESSION['tid'])) {
    $user_id = $_SESSION['tid'];
} else {
    $user_id = 'User';
}

$ext_file = "";
if (isset($_SESSION['ext_file'])) {
    $ext_file = $_SESSION['ext_file'];
} else {
    $ext_file = 'User';
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>CloudZoo360</title>
    <link class="icon_image" rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jqueryui.min.css">
    <link rel="stylesheet" href="assets/css/cloudzoo.css">
    <link rel="stylesheet" href="assets/css/simple-notify.min.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/xlsx.core.min.js"></script>
    <script src="assets/js/jqueryui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="assets/js/czjs.js"></script>
    <script src="assets/js/simple-notify.min.js"></script>
    <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
    <link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css"
        rel="stylesheet">


    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"><img src="assets\img\logo.png" /></a>
        <a class="navbar-brand" href="index.php">CZ E-Com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

                <!-- <li class="nav-item active">
                    <a class="nav-link" href="slider-my.php">Slider</a>
                </li> -->

                <li class="nav-item active">
                </li>

                <li class="nav-item active">
                </li>

                <li class="nav-item active">
                </li>

                <li class="nav-item active">
                </li>

                <li class="nav-item active">
                </li>

                <li class="nav-item active">
                </li>

                <!-- <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Inventory</a>
                    <div class="dropdown-menu">
                    </div>
                </li>-->

                <li class="nav-item active">
                <a class="nav-link" href="product-my.php">Product</a>
                </li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Themes</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="slider-my.php">Slider</a>
                        <a class="dropdown-item" href="sub-slider-my.php">Sub Slider</a>
                        <a class="dropdown-item" href="parallax-my.php">Parallax</a>

                        <a class="dropdown-item" href="featured-product-my.php">Featured Product</a>
                        <a class="dropdown-item" href="top-selling-my.php">Top Selling</a>
                       
                    </div>
                </li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Master</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="brand-my.php">Brand</a>
                        <a class="dropdown-item" href="hsn-my.php">HSN</a>
                        <a class="dropdown-item" href="uom-my.php">UOM</a>
                        <a class="dropdown-item" href="combo-my.php">Combo</a>
                        <a class="dropdown-item" href="category-my.php">Category Master</a>
                        <a class="dropdown-item" href="sub-category-my.php">Sub Category Master</a>
                        <a class="dropdown-item" href="super-sub-cat-my.php">Super Sub Category Master</a>
                        <a class="dropdown-item" href="coupon-my.php">Coupon code</a>
                        <a class="dropdown-item" href="city-my.php">City</a>
                        <a class="dropdown-item" href="b2b-my.php">Customer</a>
                        <a class="dropdown-item" href="color-master-my.php">Colour</a>
                        <a class="dropdown-item" href="size-master-my.php">Size</a>
                        <a class="dropdown-item" href="shipping-fee-my.php">Shipping Fee</a>
                        <!-- <a class="dropdown-item" href="order-my.php">Order</a> -->
                        <a class="dropdown-item" href="cod-my.php">Cod</a>
                        <a class="dropdown-item" href="promocode-my.php">Promocode</a>
                        <a class="dropdown-item" href="referral-percentage-my.php">Referral Percentage</a>
                        <a class="dropdown-item" href="size-chart-master-my.php">Size Chart</a>
                    </div>
                </li>

                <li class="nav-item active">
                <a class="nav-link" href="order-my.php">Order</a>
                </li>

            </ul>

            <!-- Profile -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <img class="table-img-view" src="attachments/profile/<?php echo 'tid-' . $user_id ?>.<?php echo $ext_file ?>" alt="">&nbsp; <?php echo $_SESSION['user_name'] ?> 
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="user-my.php">Users</a>
                        <a class="dropdown-item" href="session-logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid p-0" style="margin-top:70px">

    <!-- </div>



    <div class="theme-settings">
        <ul>
            <li class="demo-li">
                <div class="backend-btn"><a target="_blank" href="https://cloudzoo.in/support.php">Need Help <img
                            class="emoji" src="assets\img\nerd1.png"></a></div>
            </li>
        </ul>
    </div>

</body> -->