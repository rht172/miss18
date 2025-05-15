<!-- product-add -->
<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_category = new czDBAccess();
$obj_class_sub_cat = new czDBAccess();
$obj_class_super_sub_cat = new czDBAccess();
$obj_class_brand = new czDBAccess();
$obj_class_uom = new czDBAccess();


//Assign Table Name
$obj_class_main->varTableName = 'product_table_ecom';
$obj_class_category->varTableName = 'ecom_category_master';
$obj_class_sub_cat->varTableName = 'ecom_sub_category_master';
$obj_class_super_sub_cat->varTableName = 'ecom_super_sub_category_master';
$obj_class_brand->varTableName = 'ecom_brand_master';
$obj_class_uom->varTableName = 'ecom_uom_master_table';

//Init Variables
$tid = "";
$sku = "";
$product_type = "";
$category = "";
$sub_category = "";
$super_sub_category = "";
$brand_name = "";
$product_name = "";
$stock = "";
$unit = "";
$tin = "";
$tax_type = "";
$selling_price = "";
$purchase_price = "";
$mrp = "";
$supplier_name = "";
$colour = "";
$size = "";
$barcode = "";
$pack_stock = "";
$product_description = "";
$rack_details = "";
$image1_url = "";
$min_stock = "";
$part_no_01 = "";
$part_no_02 = "";
$part_no_03 = "";
$stock_on_hold = "";
$discount_percentage = "";
$offer_name = "";
$whole_sale_price = "";
$opening_stock = "";
$ext_file_1 = "";
$ext_file_2 = "";
$ext_file_3 = "";
$ext_file_4 = "";
$description_1 = "";
$description_2 = "";
$ext_file_5 = "";
$ext_file_6 = "";
$faq = "";
$sub_save_1 = "";
$sub_save_2 = "";
$sub_save_3 = "";
$meta_tag = "";
$weight = "";
$product_card = "";
$flow = "";
$ext_file_hover = "";
$ext_file_banner_2 = "";
$ext_file_banner_1 = "";
$ext_file_banner_3 = "";
$ext_file_banner_4 = "";
$ext_file_banner_5 = "";

$ext_file_7 = "";
$ext_file_8 = "";
$ext_file_9 = "";
$ext_file_10 = "";

$product_display_name = "";
//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
  $select_Feilds = "*";
  $select_whereClause = "tid = '" . czGet('updateKey') . "'";
  $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
  //$result = $obj_class_main->selectData_customqry("select sku,product_name,category,sub_category,super_sub_category,brand_name,selling_price from product_table where tid = '" . czGet('updateKey') . "' ");
  while ($row = $result->fetch_assoc()) {

    $tid = $row['tid'];
    $sku = $row['sku'];
    $product_type = $row['product_type'];
    $category = $row['category'];
    $sub_category = $row['sub_category'];
    $super_sub_category = $row['super_sub_category'];
    $brand_name = $row['brand_name'];
    $product_name = $row['product_name'];
  
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
    $stock_on_hold = $row['stock'];
    $discount_percentage = $row['discount_percentage'];
    $offer_name = $row['offer_name'];
    $whole_sale_price = $row['whole_sale_price'];
    $opening_stock = $row['opening_stock'];
    $ext_file_1 = $row['ext_file_1'];
    $ext_file_2 = $row['ext_file_2'];
    $ext_file_3 = $row['ext_file_3'];
    $ext_file_4 = $row['ext_file_4'];
    $ext_file_5 = $row['ext_file_5'];
    $ext_file_6 = $row['ext_file_6'];
    $ext_file_hover = $row['ext_file_hover'];
    $description_1 = $row['description_1'];
    $description_2 = $row['description_2'];
    $faq = $row['faq'];
    $sub_save_1 = $row['sub_save_1'];
    $sub_save_2 = $row['sub_save_2'];
    $sub_save_3 = $row['sub_save_3'];
    $meta_tag = $row['meta_tag'];
    $weight = $row['weight'];
    $product_card = $row['product_card'];
    $flow = $row['flow'];

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

    $processName = 'update&pk=' . czGet('updateKey');
  }
}



?>


<div class="container-fluid">

  <div class="form-row">

    <div class="col-md-12">
      <h1>Add Product</h1>
      <p>Each product Must have atleast One Image and SKU Need to be Unique</p>
    </div>

  </div>


  <div class="row">
    <div class="container-fluid">
      <form action="product-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group   col-md-12">
            <h3>1.Basic Details</h3>
          </div>

          <div class="form-group   col-md-4 ui-widget">
            <label>SKU *</label>
            <input type="text" class="form-control" <?php echo 'value="' . $sku . '"'; ?> id="sku" name="sku">
          </div>
          <div class="form-group   col-md-3">
            <label>Product name</label>
            <input type="text" class="form-control" <?php echo 'value="' . $product_name . '"'; ?> id="product_name"
              name="product_name">
          </div>

          <div class="form-group   col-md-2">
            <label>Type</label>
            <select class="form-control" id="product_type" name="product_type">
              <option value="<?php echo $product_type ?>" class="d-none"><?php echo $product_type ?></option>
              <option value="C-Load">C-Load </option>
              <option value="Combo"> Combo</option>
              <option value="Product">Product </option>
              <option value="Service">Service </option>
              <option value="Single"> Single</option>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>

          <div class="form-group   col-md-1">
            <label>UOM</label>
            <select class="form-control" id="unit" name="unit">

              <option value=""> </option>
              <?php
              $result = $obj_class_uom->selectData_customqry("select uom from ecom_uom_master_table;");
              while ($row = $result->fetch_assoc()) {
                if ($unit == $row['uom']) {
                  echo ' <option selected="selected" value="' . $row['uom'] . '" >' . $row['uom'] . '</option>';
                } else {
                  echo ' <option value="' . $row['uom'] . '" >' . $row['uom'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>

          <div class="form-group   col-md-2">
            <label>Barcode</label>
            <input type="text" class="form-control" <?php echo 'value="' . $barcode . '"'; ?> id="barcode"
              name="barcode">
          </div>


          <div class="form-group   col-md-3">
            <label>Category</label>
            <select class="form-control" id="category" name="category">
              <option value=""> </option>
              <?php
              $result = $obj_class_category->selectData_customqry("SELECT category from ecom_category_master");
              while ($row = $result->fetch_assoc()) {
                if ($category == $row['category']) {
                  echo ' <option selected="selected" value="' . $row['category'] . '" >' . $row['category'] . '</option>';
                } else {
                  echo ' <option value="' . $row['category'] . '" >' . $row['category'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>

          <div class="form-group   col-md-3">
            <label>Sub Category</label>
            <select class="form-control" id="sub_category" name="sub_category">
              <option value=""> </option>
              <?php
              $result = $obj_class_sub_cat->selectData_customqry("select sub_category from ecom_sub_category_master;");
              while ($row = $result->fetch_assoc()) {
                if ($sub_category == $row['sub_category']) {
                  echo ' <option selected="selected" value="' . $row['sub_category'] . '" >' . $row['sub_category'] . '</option>';
                } else {
                  echo ' <option value="' . $row['sub_category'] . '" >' . $row['sub_category'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>

          <div class="form-group   col-md-3">
            <label>Super Sub Category</label>
            <select class="form-control" id="super_sub_category" name="super_sub_category">
              <option value=""> </option>
              <?php
              $result = $obj_class_super_sub_cat->selectData_customqry("select super_sub_category from ecom_super_sub_category_master;");
              while ($row = $result->fetch_assoc()) {
                if ($super_sub_category == $row['super_sub_category']) {
                  echo ' <option selected="selected" value="' . $row['super_sub_category'] . '" >' . $row['super_sub_category'] . '</option>';
                } else {
                  echo ' <option value="' . $row['super_sub_category'] . '" >' . $row['super_sub_category'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------------->
          </div>

          <div class="form-group   col-md-3">
            <label>Brand Name</label>
            <select class="form-control" id="brand_name" name="brand_name">
              <option value=""> </option>
              <?php
              $result = $obj_class_brand->selectData_customqry("select brand from ecom_brand_master;");
              while ($row = $result->fetch_assoc()) {
                if ($brand_name == $row['brand']) {
                  echo ' <option selected="selected" value="' . $row['brand'] . '" >' . $row['brand'] . '</option>';
                } else {
                  echo ' <option value="' . $row['brand'] . '" >' . $row['brand'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>


          <div class="form-group col-md-3">
            <label>Flow</label>
            <input type="text" class="form-control" <?php echo 'value="' . $flow . '"'; ?> id="flow" name="flow">
          </div>


          <div class="form-group col-md-3">
            <label>Product Card</label>
            <input type="text" class="form-control" <?php echo 'value="' . $product_card . '"'; ?> id="product_card"
              name="product_card">
          </div>

          <div class="form-group   col-md-3">
            <label>Product Display Name</label>
            <input type="text" class="form-control" <?php echo 'value="' . $product_display_name . '"'; ?>
              id="product_display_name" name="product_display_name">
          </div>


        </div>
        <br>

        <div class="form-row">
          <div class="form-group   col-md-12">
            <h3>2.Sales & Purchase Information</h3>
          </div>

          <div class="form-group   col-md-1">
            <label>Current Stock</label>
            <input type="text" class="form-control" <?php echo 'value="' . $stock_on_hold . '"'; ?> id="stock_on_hold"
              name="stock_on_hold">
          </div>

          <div class="form-group   col-md-2">
            <label>Minimum Stock</label>
            <input type="text" class="form-control" <?php echo 'value="' . $min_stock . '"'; ?> id="min_stock"
              name="min_stock">
          </div>

          <div class="form-group   col-md-1">
            <label>Selling Price</label>
            <input type="text" class="form-control" <?php echo 'value="' . $selling_price . '"'; ?> id="selling_price"
              name="selling_price">
          </div>

          <div class="form-group   col-md-2```">
            <label>Purchase Price</label>
            <input type="text" class="form-control" <?php echo 'value="' . $purchase_price . '"'; ?> id="purchase_price"
              name="purchase_price">
          </div>

          <div class="form-group   col-md-1">
            <label>Mrp</label>
            <input type="text" class="form-control" <?php echo 'value="' . $mrp . '"'; ?> id="mrp" name="mrp">
          </div>

          <div class="form-group   col-md-2">
            <label>HSN/SAC</label>
            <select class="form-control" id="supplier_name" name="supplier_name">
              <option value=""> </option>
              <?php
              $result = $obj_class_main->selectData_customqry("select distinct supplier_name from product_table_ecom");
              while ($row = $result->fetch_assoc()) {
                if ($supplier_name == $row['supplier_name']) {
                  echo ' <option selected="selected" value="' . $row['supplier_name'] . '" >' . $row['supplier_name'] . '</option>';
                } else {
                  echo ' <option value="' . $row['supplier_name'] . '" >' . $row['supplier_name'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>

          <div class="form-group   col-md-1">
            <label>GST %</label>
            <input type="text" class="form-control" <?php echo 'value="' . $tax_type . '"'; ?> id="tax_type"
              name="tax_type">
          </div>

          <div class="form-group   col-md-1">
            <label>Discount %</label>
            <input type="text" class="form-control" <?php echo 'value="' . $discount_percentage . '"'; ?>
              id="discount_percentage" name="discount_percentage">
          </div>

          <div class="form-group   col-md-1">
            <label>Weight</label>
            <input type="text" class="form-control" <?php echo 'value="' . $weight . '"'; ?> id="weight" name="weight">
          </div>
        </div>
        <br>


        <div class="form-row">
          <div class="form-group   col-md-12">
            <h3>3.Subscribe & Save Discount</h3>
          </div>

          <div class="form-group   col-md-2">
            <label>3 Months</label>
            <input type="text" class="form-control" <?php echo 'value="' . $sub_save_1 . '"'; ?> id="sub_save_1"
              name="sub_save_1">
          </div>

          <div class="form-group   col-md-2">
            <label>6 Months</label>
            <input type="text" class="form-control" <?php echo 'value="' . $sub_save_2 . '"'; ?> id="sub_save_2"
              name="sub_save_2">
          </div>

          <div class="form-group   col-md-2">
            <label>12 Months</label>
            <input type="text" class="form-control" <?php echo 'value="' . $sub_save_3 . '"'; ?> id="sub_save_3"
              name="sub_save_3">
          </div>

        </div>
        <br>

        <div>
          <h3>4.Other Details</h3>
        </div>



        <div class="form-group">
          <label>Product Description</label>
          <br>
          <textarea cols="86" rows="10" id="product_description" name="product_description" class="form-control"
            aria-label="With textarea"><?php echo $product_description; ?></textarea>
        </div>





        <div class="form-row">
          <div class="form-group   col-md-2">
            <label>Size</label>
            <select class="form-control" id="size" name="size">
              <option value=""> </option>
              <?php
              $result = $obj_class_category->selectData_customqry("SELECT size from size_table");
              while ($row = $result->fetch_assoc()) {
                if ($size == $row['size']) {
                  echo ' <option selected="selected" value="' . $row['size'] . '" >' . $row['size'] . '</option>';
                } else {
                  echo ' <option value="' . $row['size'] . '" >' . $row['size'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>

          <div class="form-group   col-md-2">
            <label>Colour</label>
            <select class="form-control" id="colour" name="colour">
              <option value=""> </option>
              <?php
              $result = $obj_class_category->selectData_customqry("SELECT color_name from color_master_table");
              while ($row = $result->fetch_assoc()) {
                if ($colour == $row['color_name']) {
                  echo ' <option selected="selected" value="' . $row['color_name'] . '" >' . $row['color_name'] . '</option>';
                } else {
                  echo ' <option value="' . $row['color_name'] . '" >' . $row['color_name'] . '</option>';
                }
              }
              ?>
            </select>
            <!-- dropdown-------------------^--------- -->
          </div>


          <div class="form-group   col-md-2">
            <label>Rack Details</label>
            <input type="text" class="form-control" <?php echo 'value="' . $rack_details . '"'; ?> id="rack_details"
              name="rack_details">
          </div>

          <div class="form-group   col-md-2">
            <label>Part No. 01</label>
            <input type="text" class="form-control" <?php echo 'value="' . $part_no_01 . '"'; ?> id="part_no_01"
              name="part_no_01">
          </div>

          <div class="form-group   col-md-2">
            <label>Part No. 02</label>
            <input type="text" class="form-control" <?php echo 'value="' . $part_no_02 . '"'; ?> id="part_no_02"
              name="part_no_02">
          </div>

          <div class="form-group   col-md-2">
            <label>Part No. 03</label>
            <input type="text" class="form-control" <?php echo 'value="' . $part_no_03 . '"'; ?> id="part_no_03"
              name="part_no_03">
          </div>

        </div>


        <!-- <div class="form-group   col-md-2">
            <p>Poduct Image</p>
            <div class="form-group col-md-12">
              <input type="file" class="custom-file-input" id="company_image" name="company_image" accept="image/jpeg">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div> -->





        <div class="form-row">

          <div class="col-md-3">
            <p class="mb-2">Thumbnail Image</p>
            <!-- <div class="form-group col-md-12">
              <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image"
                accept=".png, .jpg, .jpeg">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div> -->

            <!-- <div class="form-group col-md-12">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image"
                  accept=".png, .jpg, .jpeg">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <div class="input-group-append" id="thumb_image">
                <a class="btn btn-light input-group-text pt-1 pb-1 pl-1" id="remove_image"
                  onclick="delete_image_fun('<?php //echo $ext_file_1 ?>','ext_file_1')">Remove</a>
              </div>
            </div> -->

            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="thumb_image" name="thumb_image"
                    accept=".png, .jpg, .jpeg">
                  <label class="custom-file-label" for="thumb_image">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_1 ?>','ext_file_1')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>


            <?php

            if (strlen($ext_file_1) > 0) {
              ?>
              <div class="col-md-6">
                <img src="attachments/product/product_thumb/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_1 ?>"
                  alt="img" class="img-thumbnail">
              </div>
              <?php
            }
            ?>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Image-1</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_image1" name="product_image1"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_2 ?>','ext_file_2')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_2) > 0) {
              ?>
              <div class="form-group">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_image1/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_2 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
                <div class="input-group-append " id="product_image">
                </div>
              </div>
              <?php
            }
            ?>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Image-2</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_image2" name="product_image2"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_3 ?>','ext_file_3')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_3) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_image2/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_3 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Image-3</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_image3" name="product_image3"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_4 ?>','ext_file_4')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_4) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_image3/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_4 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>


          <div class="col-md-3">
            <p class="mb-2">Image-4</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_image4" name="product_image4"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_7 ?>','ext_file_7')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_7) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_image4/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_7 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Image-5</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_image5" name="product_image5"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_8 ?>','ext_file_8')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_8) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_image5/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_8 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Image-6</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_image6" name="product_image6"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_9 ?>','ext_file_9')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_9) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_image6/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_9 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Image-7</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_image7" name="product_image7"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_10 ?>','ext_file_10')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_10) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_image7/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_10 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>




          <div class="col-md-3">
            <p class="mb-2">Hover Img</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="hover_img" name="hover_img"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_hover ?>','ext_file_hover')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_hover) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <a href="attachments/product/hover_img/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_hover ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>

        </div>



        <div>
          <h3>5.Product Banner</h3>
        </div>


        <div class="form-row">

          <div class="col-md-3">
            <p class="mb-2">Big Banner 1</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_banner_1" name="product_banner_1"
                    accept=".png, .jpg, .jpeg">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_banner_1 ?>','ext_file_banner_1')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>

            <?php

            if (strlen($ext_file_banner_1) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_banner_1/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_banner_1 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Big Banner 2</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_banner_2" name="product_banner_2"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_banner_2 ?>','ext_file_banner_2')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_banner_2) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_banner_2/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_banner_2 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>


          <div class="col-md-3">
            <p class="mb-2">Big Banner 3</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_banner_3" name="product_banner_3"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_banner_3 ?>','ext_file_banner_3')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_banner_3) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_banner_3/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_banner_3 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>


          <div class="col-md-3">
            <p class="mb-2">Big Banner 4</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_banner_4" name="product_banner_4"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_banner_4 ?>','ext_file_banner_4')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_banner_4) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_banner_4/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_banner_4 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>


          <div class="col-md-3">
            <p class="mb-2">Big Banner 4</p>
            <div class="form-group col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="product_banner_5" name="product_banner_5"
                    accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="remove_image"
                    onclick="delete_image_fun('<?php echo $ext_file_banner_5 ?>','ext_file_banner_5')">
                    <img  src="assets/icons/CommonDelete.png" alt="">
                  </button>
                </div>
              </div>
            </div>
            <?php

            if (strlen($ext_file_banner_5) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/product_banner_5/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_banner_5 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>

        </div>


        <div class="row">
          <div class="form-group col-md-8">
            <label>Description-1</label>
            <br>
            <textarea cols="86" rows="10" id="description_1" name="description_1" class="form-control"
              aria-label="With textarea"><?php echo $description_1; ?></textarea>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Desc Image-1</p>
            <div class="form-group col-md-12">
              <input type="file" class="custom-file-input" id="desc_image_1" name="desc_image_1"
                accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip, .gif">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <?php

            if (strlen($ext_file_5) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/desc_image_1/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_5 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>
        </div>


        <div class="row">
          <div class="form-group col-md-8">
            <label>Description-2</label>
            <br>
            <textarea cols="86" rows="10" id="description_2" name="description_2" class="form-control"
              aria-label="With textarea"><?php echo $description_2; ?></textarea>
          </div>

          <div class="col-md-3">
            <p class="mb-2">Desc Image-2</p>
            <div class="form-group col-md-12">
              <input type="file" class="custom-file-input" id="desc_image_2" name="desc_image_2"
                accept=".png, .jpg, .jpeg, .pdf, .doc, .xlsx, .xls, .csv, .zip, .gif">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <?php

            if (strlen($ext_file_6) > 0) {
              ?>
              <div class="form-group   col-md-8">
                <!-- <label>&nbsp;&nbsp;&nbsp;</label><br /> -->
                <a href="attachments/product/desc_image_2/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file_6 ?>"
                  class="btn btn-light btn-sm" target="_blank"><img src="assets/icons/file.png" alt="">Attachments</a>
              </div>
              <?php
            }
            ?>
          </div>
        </div>


        <div class="row">
          <div class="form-group col-md-8">
            <label>FAQ</label>
            <br>
            <textarea cols="86" rows="10" id="faq" name="faq" class="form-control"
              aria-label="With textarea"><?php echo $faq; ?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-8">
            <label>Meta Tag</label>
            <br>
            <textarea cols="86" rows="10" id="meta_tag" name="meta_tag" class="form-control"
              aria-label="With textarea"><?php echo $meta_tag; ?></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-success float-right mb-3">Save</button>
    </div>





    </form>
  </div>
</div>


<script>
  var tokenid = "<?php echo session_id(); ?>";

  //Editable Select
  $('#supplier_name').editableSelect();

  $(function () {
    $("#product_name").autocomplete({
      source: 'auto-complete.php?type=product_name&tbl=product_table_ecom&tkn=' +
        tokenid
    });
  });



  function autoFilAddress() {
    if (document.getElementById("checkBox").checked) {
      document.getElementById("s_street_l1").value = document.getElementById("b_street_l1").value;
      document.getElementById("s_city").value = document.getElementById("b_city").value;
      document.getElementById("s_state").value = document.getElementById("b_state").value;
      document.getElementById("s_zip").value = document.getElementById("b_zip").value;
      document.getElementById("s_country").value = document.getElementById("b_country").value;

    } else {
      document.getElementById("s_street_l1").value = "";
      document.getElementById("s_city").value = "";
      document.getElementById("s_state").value = "";
      document.getElementById("s_zip").value = "";
      document.getElementById("s_country").value = "";

    }
  }

  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });


  function delete_image_fun(ext, field) {
    var result = window.confirm("Do you want to Delete?");
    if (result) {
      var update_id = getUrlParameter("updateKey");


      const xhr = new XMLHttpRequest();
      xhr.open('GET', 'api-call.php?update_id=' + update_id + '&ext=' + ext + '&field=' + field + '&type=delete_image_fun' + '&tkn=' + tokenid, true);
      xhr.onload = function () {
        if (xhr.status === 200) {



        }
      }
      xhr.send();
    }
  }



</script>
<?php include 'includes/footer.php'; ?>