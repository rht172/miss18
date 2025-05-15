<!-- <meta http-equiv="content-type" content="text/html;charset=utf-8" /> -->
<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <title>MISS 18</title>
  <!-- SEO Meta Tags-->
  <meta name="description" content="">
  <?php
  $obj_class_met = new czDBAccess();
  if (isset($_GET['sku'])) {
    $sku = $_GET['sku'];
    $sql_3 = "SELECT meta_tag from product_table_ecom where sku = '$sku';";
    $result_3 = $obj_class_met->selectData_customqry($sql_3);

    while ($row_3 = $result_3->fetch_assoc()) {
      $meta_tag = $row_3['meta_tag'];
    }
  } else {
    $meta_tag = "";
  }
  ?>
  <meta name="keywords" content="<?php echo $meta_tag; ?>">
  <!-- Viewport-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon and Touch Icons-->
  <link rel="apple-touch-icon" sizes="180x180" href="img/icon/logo/logo-2.jpg">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icon/logo/logo-2.jpg">
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon/logo/logo-2.jpg">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
  <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
  <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
  <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css" />
  <link rel="stylesheet" media="screen" href="vendor/lightgallery/css/lightgallery-bundle.min.css" />
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
  <!-- Google Tag Manager-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="assets/js/czjs.js"></script>
  <script src="assets/js/sweetalert2@11.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="assets/js/czjs.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="assets/js/czjs.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/min/tiny-slider.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">


</head>