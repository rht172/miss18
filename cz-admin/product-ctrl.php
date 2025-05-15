<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'product_table_ecom';

//Init Variables
$sku = "";
$product_type = "";
$category = "";
$sub_category = "";
$super_sub_category = "";
$brand_name = "";
$product_name = "";
$stock = "";
$unit = "";
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
$tid = "";
$ext_file_1 = "";
$ext_file_2 = "";
$ext_file_3 = "";
$ext_file_4 = "";
$sub_save_1 = "";
$sub_save_2 = "";
$sub_save_3 = "";
$meta_tag = "";
$weight = "";
$flow = "";
$hover_img = "";
$ext_file_banner_2 = "";
$ext_file_banner_1 = "";
$ext_file_banner_3 = "";
$ext_file_banner_4 = "";
$ext_file_banner_5 = "";


$ext_file_7 = "";
$ext_file_8 = "";
$ext_file_9 = "";
$ext_file_10 = "";


//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "insert") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
    $sku = czPostForSQL('sku');
    if (strlen($sku) > 0) {

        //Assign values to Variable from Post Method
        $sku = czPostForSQL('sku');
        $product_type = czPostForSQL('product_type');
        $category = czPostForSQL('category');
        $sub_category = czPostForSQL('sub_category');
        $super_sub_category = czPostForSQL('super_sub_category');
        $brand_name = czPostForSQL('brand_name');
        $product_name = czPostForSQL('product_name');
        $stock = czPostForSQL('stock');
        $unit = czPostForSQL('unit');
        $tax_type = czPostForSQL('tax_type');
        $selling_price = czPostForSQL('selling_price');
        $purchase_price = czPostForSQL('purchase_price');
        $mrp = czPostForSQL('mrp');
        $supplier_name = czPostForSQL('supplier_name');
        $colour = czPostForSQL('colour');
        $size = czPostForSQL('size');
        $barcode = czPostForSQL('barcode');
        $pack_stock = czPostForSQL('pack_stock');
        $product_description = czPostForSQL('product_description');
        $rack_details = czPostForSQL('rack_details');
        $image1_url = czPostForSQL('image1_url');
        $min_stock = czPostForSQL('min_stock');
        $part_no_01 = czPostForSQL('part_no_01');
        $part_no_02 = czPostForSQL('part_no_02');
        $part_no_03 = czPostForSQL('part_no_03');
        $stock_on_hold = czPostForSQL('stock_on_hold');
        $discount_percentage = czPostForSQL('discount_percentage');
        $offer_name = czPostForSQL('offer_name');
        $whole_sale_price = czPostForSQL('whole_sale_price');
        $opening_stock = czPostForSQL('opening_stock');
        $ext_file_1 = czPostForSQL('ext_file_1');
        $ext_file_2 = czPostForSQL('ext_file_2');
        $ext_file_3 = czPostForSQL('ext_file_3');
        $ext_file_4 = czPostForSQL('ext_file_4');
        $hover_img = czPostForSQL('hover_img');
        $description_1 = czPostForSQL('description_1');
        $description_2 = czPostForSQL('description_2');
        $faq = czPostForSQL('faq');
        $sub_save_1 = czPostForSQL('sub_save_1');
        $sub_save_2 = czPostForSQL('sub_save_2');
        $sub_save_3 = czPostForSQL('sub_save_3');
        $meta_tag = czPostForSQL('meta_tag');
        $weight = czPostForSQL('weight');
        $product_card = czPostForSQL('product_card');
        $flow = czPostForSQL('flow');

        $product_banner_1 = czPostForSQL('product_banner_1');
        $product_banner_2 = czPostForSQL('product_banner_2');

        $product_display_name = czPostForSQL('product_display_name');



        //Convert to Numeric
        // $rate = (float) $rate;
        $stock = (float) $stock;
        $tax_type = (float) $tax_type;
        $selling_price = (float) $selling_price;
        $purchase_price = (float) $purchase_price;
        $mrp = (float) $mrp;
        $pack_stock = (float) $pack_stock;
        $min_stock = (float) $min_stock;
        $stock_on_hold = (float) $stock_on_hold;
        $discount_percentage = (float) $discount_percentage;
        $whole_sale_price = (float) $whole_sale_price;
        $opening_stock = (float) $opening_stock;
        $sub_save_1 = (float) $sub_save_1;
        $sub_save_2 = (float) $sub_save_2;
        $sub_save_3 = (float) $sub_save_3;
        $weight = (float) $weight;

        //Get Extension Code
        $path_parts = pathinfo($_FILES["thumb_image"]["name"]);
        $thumbImage = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_image1"]["name"]);
        $productImage1 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_image2"]["name"]);
        $productImage2 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_image3"]["name"]);
        $productImage3 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["hover_img"]["name"]);
        $hover_img = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["desc_image_1"]["name"]);
        $desc_image_1 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["desc_image_2"]["name"]);
        $desc_image_2 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_banner_1"]["name"]);
        $product_banner_1 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_banner_2"]["name"]);
        $product_banner_2 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_banner_3"]["name"]);
        $product_banner_3 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_banner_4"]["name"]);
        $product_banner_4 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_banner_5"]["name"]);
        $product_banner_5 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_image4"]["name"]);
        $productImage4 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_image5"]["name"]);
        $productImage5 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_image6"]["name"]);
        $productImage6 = $path_parts['extension'];

        $path_parts = pathinfo($_FILES["product_image7"]["name"]);
        $productImage7 = $path_parts['extension'];


        //Get Value to form Insert Query
        $insertFeilds = "sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,discount_percentage,offer_name,whole_sale_price,opening_stock,ext_file_1,ext_file_2,ext_file_3,ext_file_4,ext_file_5,ext_file_6,faq,sub_save_1,sub_save_2,sub_save_3,meta_tag,weight,product_card,flow,ext_file_hover,ext_file_banner_1,ext_file_banner_2,ext_file_banner_3,ext_file_banner_4,ext_file_banner_5,ext_file_7,ext_file_8,ext_file_9,ext_file_10,product_display_name";
        $insertValues = "'$sku','$product_type','$category','$sub_category','$super_sub_category','$brand_name','$product_name','$stock_on_hold','$unit','$tax_type','$selling_price','$purchase_price','$mrp','$supplier_name','$colour','$size','$barcode','$pack_stock','$product_description','$rack_details','$image1_url','$min_stock','$part_no_01','$part_no_02','$part_no_03','$discount_percentage','$offer_name','$whole_sale_price','$opening_stock','$thumbImage','$productImage1','$productImage2','$productImage3','$desc_image_1','$desc_image_2','$faq','$sub_save_1','$sub_save_2','$sub_save_3','$meta_tag','$weight','$product_card','$flow','$hover_img','$product_banner_1','$product_banner_2','$product_banner_3','$product_banner_4','$product_banner_5','$productImage4','$productImage5','$productImage6','$productImage7','$product_display_name'";
        //Insert Process
        $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
        FileUploadJPG("company_image", $insertStatus, "attachments/customers/");
        //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
        if ($insertStatus > 0) {
            FileUpload("thumb_image", 'tid-' . $insertStatus, "attachments/product/product_thumb/", $thumbImage);
            FileUpload("product_image1", 'tid-' . $insertStatus, "attachments/product/product_image1/", $productImage1);
            FileUpload("product_image2", 'tid-' . $insertStatus, "attachments/product/product_image2/", $productImage2);
            FileUpload("product_image3", 'tid-' . $insertStatus, "attachments/product/product_image3/", $productImage3);
            FileUpload("desc_image_1", 'tid-' . $insertStatus, "attachments/product/desc_image_1/", $desc_image_1);
            FileUpload("desc_image_2", 'tid-' . $insertStatus, "attachments/product/desc_image_2/", $desc_image_2);
            FileUpload("hover_img", 'tid-' . $insertStatus, "attachments/product/hover_img/", $hover_img);
            FileUpload("product_banner_1", 'tid-' . $insertStatus, "attachments/product/product_banner_1/", $product_banner_1);
            FileUpload("product_banner_2", 'tid-' . $insertStatus, "attachments/product/product_banner_2/", $product_banner_2);
            FileUpload("product_banner_3", 'tid-' . $insertStatus, "attachments/product/product_banner_3/", $product_banner_3);
            FileUpload("product_banner_4", 'tid-' . $insertStatus, "attachments/product/product_banner_4/", $product_banner_4);
            FileUpload("product_banner_5", 'tid-' . $insertStatus, "attachments/product/product_banner_5/", $product_banner_5);
            FileUpload("product_image4", 'tid-' . $insertStatus, "attachments/product/product_image4/", $productImage4);
            FileUpload("product_image5", 'tid-' . $insertStatus, "attachments/product/product_image5/", $productImage5);
            FileUpload("product_image6", 'tid-' . $insertStatus, "attachments/product/product_image6/", $productImage6);
            FileUpload("product_image7", 'tid-' . $insertStatus, "attachments/product/product_image7/", $productImage7);

            header("Location: product-my.php?key1=insertSuccess");
            exit();
        } else {
            header("Location: product-my.php?key1=insertFailed");
            exit();
        }
    }
}

//Update Process --------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

    //Get Update Key
    $updateKey = czGet('pk');

    if (isset($_FILES['thumb_image']) && $_FILES['thumb_image']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_1 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_1']) > 0) {
                unlink("attachments/product/product_thumb/" . 'tid-' . $updateKey . '.' . $row['ext_file_1']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_image1']) && $_FILES['product_image1']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_2 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_2']) > 0) {
                unlink("attachments/product/product_image1/" . 'tid-' . $updateKey . '.' . $row['ext_file_2']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_image2']) && $_FILES['product_image2']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_3 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_3']) > 0) {
                unlink("attachments/product/product_image2/" . 'tid-' . $updateKey . '.' . $row['ext_file_3']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_image3']) && $_FILES['product_image3']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_4 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_4']) > 0) {
                unlink("attachments/product/product_image3/" . 'tid-' . $updateKey . '.' . $row['ext_file_4']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['desc_image_1']) && $_FILES['desc_image_1']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_5 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_5']) > 0) {
                unlink("attachments/product/desc_image_1/" . 'tid-' . $updateKey . '.' . $row['ext_file_5']);
            }
        }
    } else {
        echo "No file photo selected.";
    }


    if (isset($_FILES['desc_image_2']) && $_FILES['desc_image_2']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_6 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_6']) > 0) {
                unlink("attachments/product/desc_image_2/" . 'tid-' . $updateKey . '.' . $row['ext_file_6']);
            }
        }
    } else {
        echo "No file photo selected.";
    }


    if (isset($_FILES['hover_img']) && $_FILES['hover_img']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_hover from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_hover']) > 0) {
                unlink("attachments/product/hover_img/" . 'tid-' . $updateKey . '.' . $row['ext_file_hover']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_banner_1']) && $_FILES['product_banner_1']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_banner_1 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_banner_1']) > 0) {
                unlink("attachments/product/product_banner_1/" . 'tid-' . $updateKey . '.' . $row['ext_file_banner_1']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_banner_2']) && $_FILES['product_banner_2']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_banner_2 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_banner_2']) > 0) {
                unlink("attachments/product/product_banner_2/" . 'tid-' . $updateKey . '.' . $row['ext_file_banner_2']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_banner_3']) && $_FILES['product_banner_3']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_banner_3 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_banner_3']) > 0) {
                unlink("attachments/product/product_banner_3/" . 'tid-' . $updateKey . '.' . $row['ext_file_banner_3']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_banner_4']) && $_FILES['product_banner_4']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_banner_4 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_banner_4']) > 0) {
                unlink("attachments/product/product_banner_4/" . 'tid-' . $updateKey . '.' . $row['ext_file_banner_4']);
            }
        }
    } else {
        echo "No file photo selected.";
    }

    if (isset($_FILES['product_banner_5']) && $_FILES['product_banner_5']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_banner_5 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_banner_5']) > 0) {
                unlink("attachments/product/product_banner_5/" . 'tid-' . $updateKey . '.' . $row['ext_file_banner_5']);
            }
        }
    } else {
        echo "No file photo selected.";
    }


    if (isset($_FILES['product_image4']) && $_FILES['product_image4']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_7 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_7']) > 0) {
                unlink("attachments/product/product_image4/" . 'tid-' . $updateKey . '.' . $row['ext_file_7']);
            }
        }
    } else {
        echo "No file photo selected.";
    }


    if (isset($_FILES['product_image5']) && $_FILES['product_image5']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_8 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_8']) > 0) {
                unlink("attachments/product/product_image5/" . 'tid-' . $updateKey . '.' . $row['ext_file_8']);
            }
        }
    } else {
        echo "No file photo selected.";
    }


    if (isset($_FILES['product_image6']) && $_FILES['product_image6']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_9 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_9']) > 0) {
                unlink("attachments/product/product_image6/" . 'tid-' . $updateKey . '.' . $row['ext_file_9']);
            }
        }
    } else {
        echo "No file photo selected.";
    }


    if (isset($_FILES['product_image7']) && $_FILES['product_image7']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file_10 from product_table_ecom where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_10']) > 0) {
                unlink("attachments/product/product_image7/" . 'tid-' . $updateKey . '.' . $row['ext_file_10']);
            }
        }
    } else {
        echo "No file photo selected.";
    }


    //Assign values to Variable from Post Method
    $sku = czPostForSQL('sku');
    $product_type = czPostForSQL('product_type');
    $category = czPostForSQL('category');
    $sub_category = czPostForSQL('sub_category');
    $super_sub_category = czPostForSQL('super_sub_category');
    $brand_name = czPostForSQL('brand_name');
    $product_name = czPostForSQL('product_name');
    $stock = czPostForSQL('stock');
    $unit = czPostForSQL('unit');
    $tax_type = czPostForSQL('tax_type');
    $selling_price = czPostForSQL('selling_price');
    $purchase_price = czPostForSQL('purchase_price');
    $mrp = czPostForSQL('mrp');
    $supplier_name = czPostForSQL('supplier_name');
    $colour = czPostForSQL('colour');
    $size = czPostForSQL('size');
    $barcode = czPostForSQL('barcode');
    $pack_stock = czPostForSQL('pack_stock');
    $product_description = czPostForSQL('product_description');
    $rack_details = czPostForSQL('rack_details');
    $image1_url = czPostForSQL('image1_url');
    $min_stock = czPostForSQL('min_stock');
    $part_no_01 = czPostForSQL('part_no_01');
    $part_no_02 = czPostForSQL('part_no_02');
    $part_no_03 = czPostForSQL('part_no_03');
    $stock_on_hold = czPostForSQL('stock_on_hold');
    $discount_percentage = czPostForSQL('discount_percentage');
    $offer_name = czPostForSQL('offer_name');
    $whole_sale_price = czPostForSQL('whole_sale_price');
    $opening_stock = czPostForSQL('opening_stock');
    $ext_file_1 = czPostForSQL('ext_file_1');
    $ext_file_2 = czPostForSQL('ext_file_2');
    $ext_file_3 = czPostForSQL('ext_file_3');
    $ext_file_4 = czPostForSQL('ext_file_4');
    $description_1 = czPostForSQL('description_1');
    $description_2 = czPostForSQL('description_2');
    $faq = czPostForSQL('faq');
    $sub_save_1 = czPostForSQL('sub_save_1');
    $sub_save_2 = czPostForSQL('sub_save_2');
    $sub_save_3 = czPostForSQL('sub_save_3');
    $meta_tag = czPostForSQL('meta_tag');
    $weight = czPostForSQL('weight');
    $product_card = czPostForSQL('product_card');
    $flow = czPostForSQL('flow');

    $product_banner_1 = czPostForSQL('product_banner_1');
    $product_banner_2 = czPostForSQL('product_banner_2');

    $product_display_name = czPostForSQL('product_display_name');

    //Convert to Numeric
    // $rate = (float) $rate;
    $stock = (float) $stock;
    $tax_type = (float) $tax_type;
    $selling_price = (float) $selling_price;
    $purchase_price = (float) $purchase_price;
    $mrp = (float) $mrp;
    $pack_stock = (float) $pack_stock;
    $min_stock = (float) $min_stock;
    $stock_on_hold = (float) $stock_on_hold;
    $discount_percentage = (float) $discount_percentage;
    $whole_sale_price = (float) $whole_sale_price;
    $opening_stock = (float) $opening_stock;
    $sub_save_1 = (float) $sub_save_1;
    $sub_save_2 = (float) $sub_save_2;
    $sub_save_3 = (float) $sub_save_3;
    $weight = (float) $weight;



    //Get Value to form Update Query
    $updateValueAndFeilds = "sku = '$sku',product_type = '$product_type',category = '$category',sub_category = '$sub_category',super_sub_category = '$super_sub_category',brand_name = '$brand_name',product_name = '$product_name',stock = '$stock_on_hold',unit = '$unit',tax_type = '$tax_type',selling_price = '$selling_price',purchase_price = '$purchase_price',mrp = '$mrp',supplier_name = '$supplier_name',colour = '$colour',size = '$size',barcode = '$barcode',pack_stock = '$pack_stock',product_description = '$product_description',rack_details = '$rack_details',image1_url = '$image1_url',min_stock = '$min_stock',part_no_01 = '$part_no_01',part_no_02 = '$part_no_02',part_no_03 = '$part_no_03',discount_percentage = '$discount_percentage',offer_name = '$offer_name',whole_sale_price = '$whole_sale_price',opening_stock = '$opening_stock',description_1 = '$description_1',description_2 = '$description_2',faq = '$faq',sub_save_1 = '$sub_save_1',sub_save_2 = '$sub_save_2',sub_save_3 = '$sub_save_3',meta_tag = '$meta_tag',weight = '$weight',product_card = '$product_card',flow = '$flow',product_display_name = '$product_display_name'";

    $updateWhereClasuse = "tid='$updateKey'";
    //Update Process
    $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

    if ($UpdateStatus == "Success") {
        if (isset($_FILES['thumb_image']) && $_FILES['thumb_image']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["thumb_image"]["name"]);
            $thumb_image = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_1 = '$thumb_image'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("thumb_image", 'tid-' . $updateKey, "attachments/product/product_thumb/", $thumb_image);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['product_image1']) && $_FILES['product_image1']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_image1"]["name"]);
            echo $product_image1 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_2 = '$product_image1'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_image1", 'tid-' . $updateKey, "attachments/product/product_image1/", $product_image1);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['product_image2']) && $_FILES['product_image2']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_image2"]["name"]);
            $product_image2 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_3 = '$product_image2'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_image2", 'tid-' . $updateKey, "attachments/product/product_image2/", $product_image2);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['product_image3']) && $_FILES['product_image3']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_image3"]["name"]);
            $product_image3 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_4 = '$product_image3'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_image3", 'tid-' . $updateKey, "attachments/product/product_image3/", $product_image3);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }


        if (isset($_FILES['desc_image_1']) && $_FILES['desc_image_1']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["desc_image_1"]["name"]);
            $desc_image_1 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_5 = '$desc_image_1'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("desc_image_1", 'tid-' . $updateKey, "attachments/product/desc_image_1/", $desc_image_1);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['desc_image_2']) && $_FILES['desc_image_2']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["desc_image_2"]["name"]);
            $desc_image_2 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_6 = '$desc_image_2'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("desc_image_2", 'tid-' . $updateKey, "attachments/product/desc_image_2/", $desc_image_2);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

        }


        if (isset($_FILES['hover_img']) && $_FILES['hover_img']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["hover_img"]["name"]);
            $hover_img = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_hover = '$hover_img'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("hover_img", 'tid-' . $updateKey, "attachments/product/hover_img/", $hover_img);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['product_banner_1']) && $_FILES['product_banner_1']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_banner_1"]["name"]);
            $product_banner_1 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_banner_1 = '$product_banner_1'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_banner_1", 'tid-' . $updateKey, "attachments/product/product_banner_1/", $product_banner_1);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }


        if (isset($_FILES['product_banner_2']) && $_FILES['product_banner_2']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_banner_2"]["name"]);
            $product_banner_2 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_banner_2 = '$product_banner_2'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_banner_2", 'tid-' . $updateKey, "attachments/product/product_banner_2/", $product_banner_2);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['product_banner_3']) && $_FILES['product_banner_3']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_banner_3"]["name"]);
            $product_banner_3 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_banner_3 = '$product_banner_3'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_banner_3", 'tid-' . $updateKey, "attachments/product/product_banner_3/", $product_banner_3);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['product_banner_4']) && $_FILES['product_banner_4']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_banner_4"]["name"]);
            $product_banner_4 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_banner_4 = '$product_banner_4'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_banner_4", 'tid-' . $updateKey, "attachments/product/product_banner_4/", $product_banner_4);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

        if (isset($_FILES['product_banner_5']) && $_FILES['product_banner_5']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_banner_5"]["name"]);
            $product_banner_5 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_banner_5 = '$product_banner_5'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_banner_5", 'tid-' . $updateKey, "attachments/product/product_banner_5/", $product_banner_5);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }


        if (isset($_FILES['product_image4']) && $_FILES['product_image4']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_image4"]["name"]);
            $product_image4 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_7 = '$product_image4'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_image4", 'tid-' . $updateKey, "attachments/product/product_image4/", $product_image4);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }


        if (isset($_FILES['product_image5']) && $_FILES['product_image5']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_image5"]["name"]);
            $product_image5 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_8 = '$product_image5'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_image5", 'tid-' . $updateKey, "attachments/product/product_image5/", $product_image5);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }


        if (isset($_FILES['product_image6']) && $_FILES['product_image6']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_image6"]["name"]);
            $product_image6 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_9 = '$product_image6'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_image6", 'tid-' . $updateKey, "attachments/product/product_image6/", $product_image6);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }


        if (isset($_FILES['product_image7']) && $_FILES['product_image7']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["product_image7"]["name"]);
            $product_image7 = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file_10 = '$product_image7'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("product_image7", 'tid-' . $updateKey, "attachments/product/product_image7/", $product_image7);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

    }
    //Redirect URL after update
    if ($UpdateStatus == "Success") {
        header("Location: product-my.php?key1=updateSuccess");
        exit();
    } else {
        header("Location: product-my.php?key1=updateFailed");
        exit();
    }
}


//Filter Section ------------------------------------------------------------------------------
if (czGet('key1') == "filter") {

    $pageNo = czGet('pageNo');
    ?>
    <div class="table-responsive-md table-responsive-xs" id="tab_filter">
        <table class="table table-striped table-bordered table_filter" id="reportTable">
            <thead class="thead_filter">
                <tr class="tr_filter">
                    <th><input type="checkbox" id="allcb" onclick="toggleAllCheckbox()"></th>
                    <th style="width: 120px">TID</th>
                    <th class="th_filter">SKU</th>
                    <th class="th_filter">Product Name</th>
                    <th class="th_filter">Category</th>
                    <th class="th_filter">Sub Category</th>
                    <th class="th_filter">Stock</th>
                    <th class="th_filter">Brand Name</th>
                    <th class="th_filter">Selling Price</th>
                    <th class="th_filter">Purchase Price</th>
                    <th class="th_filter">Rack</th>
                    <th class="th_filter">Part No.</th>
                    <th class="th_filter">Barcode</th>



                </tr>
            </thead>
            <tbody id="myTable" class="tbody_filter">




                <?php


                //ini value for Select Query
                $temp_Feilds = "sku,product_type,category,sub_category,super_sub_category,brand_name,product_name,stock,unit,tax_type,selling_price,purchase_price,mrp,supplier_name,colour,size,barcode,pack_stock,product_description,rack_details,image1_url,min_stock,part_no_01,part_no_02,part_no_03,stock_on_hold,discount_percentage,offer_name,whole_sale_price,opening_stock,tid";
                $temp_whereClause = "";

                //Assign values to Variable from Post Method for Filter 
                $sku = czPostForSQL('sku');
                $brand_name = czPostForSQL('brand_name');
                $category = czPostForSQL('category');
                $stock_less = czPostForSQL('stock_less');
                $stock_great = czPostForSQL('stock_great');
                $product_name = czPostForSQL('product_name');
                $sub_category = czPostForSQL('sub_category');
                $super_sub_category = czPostForSQL('super_sub_category');
                $part_no_01 = czPostForSQL('part_no_01');
                $rack_details = czPostForSQL('rack_details');
                $barcode = czPostForSQL('barcode');
                $size = czPostForSQL('size');
                $colour = czPostForSQL('colour');

                //Filter Query For Where Clause
                $temp_whereClause = whereClasueQueryGenerator('sku', '=', $sku, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('brand_name', '=', $brand_name, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('category', '=', $category, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGeneratorStock('stock', '<=', $stock_less, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGeneratorStock('stock', '>=', $stock_great, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('product_name', '=', $product_name, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('sub_category', '=', $sub_category, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('super_sub_category', '=', $super_sub_category, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('part_no_01', '=', $part_no_01, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('rack_details', '=', $rack_details, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('barcode', '=', $barcode, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('size', '=', $size, $temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('colour', '=', $colour, $temp_whereClause);
                // Select Date To Display In Table
                $limitString = "";
                if ($pageNo > 0) {
                    if ($pageNo == 1) {
                        $limitString = " limit 0,100";
                    } else {
                        $limitString = " limit " . ($pageNo * 100) . ",100";
                    }
                }
                $result = $obj_class_main->selectDataOrderBy($temp_Feilds, $temp_whereClause, $limitString);

                //Loop Through Select Result
                while ($row = $result->fetch_assoc()) {

                    echo "<tr class='tr_filter'>";
                    echo '<td><input type="checkbox" name="' . $row['tid'] . '" value="' . $row['tid'] . '"></td>';
                    echo '<td> <a href="product-add.php?key1=update&updateKey=' . $row['tid'] . '" class="btn btn-success btn-sm"> #' . $row['tid'] . '</td>';
                    echo "<td class='td_filter'>" . $row['sku'] . "</td>";
                    echo "<td class='td_filter'>" . $row['product_name'] . "</td>";
                    echo "<td class='td_filter'>" . $row['category'] . "</td>";
                    echo "<td class='td_filter'>" . $row['sub_category'] . "</td>";
                    echo "<td class='td_filter'>" . $row['stock'] . "</td>";
                    echo "<td class='td_filter'>" . $row['brand_name'] . "</td>";
                    echo "<td class='td_filter'>" . $row['selling_price'] . "</td>";
                    echo "<td class='td_filter'>" . $row['purchase_price'] . "</td>";
                    echo "<td class='td_filter'>" . $row['rack_details'] . "</td>";
                    echo "<td class='td_filter'>" . $row['part_no_01'] . "</td>";
                    echo "<td class='td_filter'>" . $row['barcode'] . "</td>";

                    echo "</tr>";
                }

                echo '</tbody>
      </table>
      </div>';

                pagination($pageNo);
}



//Delete Process------------------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "delete") {


    //Delete Query call
    $deleteKeyValue = czPostForSQL('delete_key');
    if (substr($deleteKeyValue, 0, 1) === ",") {
        $deleteKeyValue = substr($deleteKeyValue, 1);
    }
    if (strpos($deleteKeyValue, ',')) {
        $temp_whereClause = "tid in (" . $deleteKeyValue . ")";
        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_1 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_1']) > 0) {
                unlink("attachments/product/product_thumb/tid-" . $row['tid'] . '.' . $row['ext_file_1']);
            }
        }

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_2 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_2']) > 0) {
                unlink("attachments/product/product_image1/tid-" . $row['tid'] . '.' . $row['ext_file_2']);
            }
        }

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_3 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_3']) > 0) {
                unlink("attachments/product/product_image2/tid-" . $row['tid'] . '.' . $row['ext_file_3']);
            }
        }

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_4 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_4']) > 0) {
                unlink("attachments/product/product_image3/tid-" . $row['tid'] . '.' . $row['ext_file_4']);
            }
        }
    } else {
        $temp_whereClause = "tid  = '" . $deleteKeyValue . "'";
        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_1 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_1']) > 0) {
                unlink("attachments/product/product_thumb/tid-" . $row['tid'] . '.' . $row['ext_file_1']);
            }
        }

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_2 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_2']) > 0) {
                unlink("attachments/product/product_image1/tid-" . $row['tid'] . '.' . $row['ext_file_2']);
            }
        }

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_3 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_3']) > 0) {
                unlink("attachments/product/product_image2/tid-" . $row['tid'] . '.' . $row['ext_file_3']);
            }
        }

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file_4 from product_table_ecom where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file_4']) > 0) {
                unlink("attachments/product/product_image3/tid-" . $row['tid'] . '.' . $row['ext_file_4']);
            }
        }
    }

    $curdStatus = $obj_class_main->deleteData($temp_whereClause);

    //Notify Based On Delete Status
    if ($curdStatus == "Success") {
        // If Delete Successfull
        echo '<div class="alert alert-success" id="success-alert">
                    <strong>Cool!</strong>  Data Delete Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
                </div>';
    } else {
        // If Delete Failed
        echo '<div class="alert alert-danger" id="success-alert">
    <strong>Oops!</strong> Something Went Wrong, Data Not Delete Properly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
  </div>';
    }
}
