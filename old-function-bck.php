<?php


?>
<!-- // best seller -->
<div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 mb-0">
    <div class="card product-card card-static">
        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
            title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
            href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
            <img src="cz-admin/attachments/product/product_thumb/tid-<?php echo $tid ?>.<?php echo $ext_file_1 ?>"
                alt="Product">
        </a>
        <div class="card-body py-2">

            <h3 class="product-title fs-sm text-center"><a
                    href="product-page.php?key1=<?php echo $tid ?>&sku=<?php echo $sku ?>&category=<?php echo $category ?>">
                    <?php
                    $modifiedSku = str_replace('-', ' ', $sku);
                    echo $modifiedSku ?>
                </a>
            </h3>
            <div class="d-flex justify-content-center">
                <div class="product-price"><span class="text-accent"> &#x20B9;
                        <?php echo $selling_price ?>
                    </span></div>

            </div>
            <div class="d-flex justify-content-center">
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                </div>
            </div>
        </div>

    </div>
</div>





<!-- // Slider  -->



<div class="px-lg-5" style="background-color: #<?php echo $bg_color ?>;">
            <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img
                class="d-block order-lg-2 me-lg-n5 flex-shrink-0"
                src="cz-admin/attachments/slider/tid-<?php echo $tid ?>.<?php echo $ext_file ?>">
              <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1"
                style="max-width: 42rem; z-index: 10;">
                <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
                  <h3 class="h2 text-light fw-light pb-1 from-bottom">
                    <?php echo $slider_header ?>
                  </h3>
                  <h2 class="text-light display-5 from-bottom delay-1">
                    <?php echo $slider_header_2 ?>
                  </h2>
                  <p class="fs-lg text-light pb-3 from-bottom delay-2">
                    <?php echo $slider_header_3 ?>
                  </p>
                  <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary"
                      href="<?php echo $slider_button_url ?>">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
                </div>
              </div>
            </div>
          </div>





          <!-- // other than pads colour  -->




          <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color/Type:</span>
                    <div class="form-group">
                      <!-- <select class="form-select" id="color" name="color" onchange="fetch_variant_options(this)">
                      <option value=""> </option>
                      <?php
                      // $result = $obj_class_product->selectData_customqry("SELECT distinct colour from product_table where product_name = '$product_name';");
                      // while ($row = $result->fetch_assoc()) {
                      //   if ($pt_color == $row['colour']) {
                      //     echo ' <option selected="selected" value="' . $row['colour'] . '" >' . $row['colour'] . '</option>';
                      //   } else {
                      //     echo ' <option value="' . $row['colour'] . '" >' . $row['colour'] . '</option>';
                      //   }
                      // }
                      ?>
                    </select> -->
                      <!-- <input class="form-control" id="color" name="color" <?php echo 'value="' . $pt_color . '"'; ?>
                      required readonly> -->

                      <button class='button_p button_p_color btn btn-light' id='color' name='color'
                        value='<?php echo $pt_color ?>'>
                        <?php echo $pt_color ?>
                      </button>
                    </div>
                  </div>









                  <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Variant/Size:</span>
                    <div class="form-group">
           
                      <?php
                  
                    

                      $result = $obj_class_product->selectData_customqry("SELECT distinct size from product_table where product_name = '$product_name' and colour = '$pt_color';");
                      $selectedSize = $pt_size; // Assuming $pt_size is the previously selected size
                      while ($row = $result->fetch_assoc()) {
                        $sizeValue = $row['size'];
                        $isSelected = ($selectedSize == $sizeValue) ? 'selected' : '';
                        echo "<button class='button_p_c btn btn-light $isSelected' onclick='changeColor(this),getSku(\"$sizeValue\", \"$pt_color\")' id='size' name='size' value='$sizeValue'>$sizeValue</button>";

                      }

                      ?>
    
                    </div>
                  </div>

<?php

                  $result = $obj_class_product->selectData_customqry("SELECT distinct size from product_table where product_name = '$product_name' and colour = '$pt_color';");
                      $selectedSize = $pt_size; // Assuming $pt_size is the previously selected size
                      while ($row = $result->fetch_assoc()) {
                        $sizeValue = $row['size'];
                        $isSelected = ($selectedSize == $sizeValue) ? 'selected' : '';
                        echo "<button class='button_p_c btn btn-light $isSelected' onclick='changeColor(this),getSku(\"$sizeValue\", \"$pt_color\")' id='size' name='size' value='$sizeValue'>$sizeValue</button>";
                    
                      }


                      ?>