<!-- product-my -->
<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'product_table_ecom';

//get The Process Name -insert or delete or update
$processName = czGet('key1');



$colour = '';



//Message For Display

if (strlen($processName) > 0) {
  //Notify Based On Insert Status
  if ($processName == "insertSuccess") {
    // If Inserted Successfull
    echo '<div class="alert alert-success" id="success-alert">
                    <strong>Cool!</strong>  Data Inserted Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
  } elseif ($processName == "insertFailed") {
    // If Insert Failed
    echo '<div class="alert alert-danger" id="success-alert">
               <strong>Oops!</strong> Something Went Wrong, Data Not Inserted Properly.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
              </div>';
  }



  //Notify Based On Update Status
  if ($processName == "updateSuccess") {
    // If Update Successfull
    echo '<div class="alert alert-success" id="success-alert">
               <strong>Cool!</strong>  Data Updated Successfully.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
              </div>';
  } elseif ($processName == "updateFailed") {
    // If Update Failed
    echo '<div class="alert alert-danger" id="success-alert">
               <strong>Oops!</strong> Something Went Wrong, Data Not Updated Properly.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
              </div>';
  }



}


?>


<div class="col-md-12 row pr-0">
  <div class="col-md-6">
    <h1>Products</h1>
  </div>
  <div class="col-md-6 p-0">
    <!-- Add and Delete Buttons -->
    <a onclick="downloadExcel('reportTable','Products_Report')" class="btn btn-light btn-sm m-1 float-right"
      id="addBtn"><img src="assets/icons/download.png" alt=""><br><small>Download</small></a>
    <a class='btn btn-light btn-sm m-1 float-right' data-toggle='modal' data-target='#exampleModal'><img
        src="assets/icons/CommonDelete.png" alt=""><br><small>Delete</small></a>
    <a href="product-add.php" class="btn btn-light btn-sm m-1 float-right" id="addBtn"><img
        src="assets/icons/Theam1New.png" alt=""><br><small>Add
        New</small></a>
  </div>
</div>




<div class="container-fluid">


  <div class="col-md-12 p-0">


    <!-- Change The action URL -->

    <div class="form-row">

      <div class="form-group   col-md-3">
        <label>SKU</label>
        <input type="text" class="form-control" id="sku" name="sku">
      </div>

      <div class="form-group   col-md-3">
        <label>Product name</label>
        <select class="form-control" id="product_name" name="product_name">
          <option value=""> </option>
          <?php
          $result = $obj_class_main->selectData_customqry("select distinct product_name from product_table_ecom");
          while ($row = $result->fetch_assoc()) {
            echo ' <option value="' . $row['product_name'] . '" >' . $row['product_name'] . '</option>';
          }
          ?>
        </select>
        <!-- dropdown-------------------^--------- -->
      </div>

      <div class="form-group   col-md-2">
        <label>Brand</label>
        <select class="form-control" id="brand_name" name="brand_name">
          <option value=""> </option>
          <?php
          $result = $obj_class_main->selectData_customqry("select distinct brand_name from product_table_ecom");
          while ($row = $result->fetch_assoc()) {
            echo ' <option value="' . $row['brand_name'] . '" >' . $row['brand_name'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group   col-md-2">
        <label>Category</label>

        <select class="form-control" id="category" name="category">
          <option value=""> </option>
          <?php
          $result = $obj_class_main->selectData_customqry("select distinct category from product_table_ecom");
          while ($row = $result->fetch_assoc()) {
            echo ' <option value="' . $row['category'] . '" >' . $row['category'] . '</option>';

          }
          ?>
        </select>

      </div>


      <div class="form-group   col-md-2">
        <label>sub Category</label>
        <select class="form-control" id="sub_category" name="sub_category">
          <option value=""> </option>
          <?php
          $result = $obj_class_main->selectData_customqry("select distinct sub_category from product_table_ecom");
          while ($row = $result->fetch_assoc()) {
            echo ' <option value="' . $row['sub_category'] . '" >' . $row['sub_category'] . '</option>';

          }
          ?>
        </select>
        <!-- dropdown-------------------^--------- -->
      </div>

      <div class="form-group   col-md-2">
        <label>Super Sub Category</label>
        <select class="form-control" id="super_sub_category" name="super_sub_category">
          <option value=""> </option>
          <?php
          $result = $obj_class_main->selectData_customqry("select distinct super_sub_category from product_table_ecom");
          while ($row = $result->fetch_assoc()) {
            echo ' <option value="' . $row['super_sub_category'] . '" >' . $row['super_sub_category'] . '</option>';
          }
          ?>
        </select>
        <!-- dropdown-------------------^--------- -->
      </div>

      <div class="form-group   col-md-2">
        <label>Part No. 01</label>
        <input type="text" class="form-control" id="part_no_01" name="part_no_01">
      </div>

      <div class="form-group   col-md-2">
        <label>Rack Details</label>
        <input type="text" class="form-control" id="rack_details" name="rack_details">
      </div>

      <div class="form-group   col-md-2">
        <label>Barcode</label>
        <input type="text" class="form-control" id="barcode" name="barcode">

      </div>

      <div class="form-group   col-md-2">
        <label>Size</label>
        <select class="form-control" id="size" name="size">
          <option value=""> </option>
          <?php
          $result = $obj_class_main->selectData_customqry("select distinct size from product_table_ecom");
          while ($row = $result->fetch_assoc()) {
            echo ' <option value="' . $row['size'] . '" >' . $row['size'] . '</option>';
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
          $result = $obj_class_main->selectData_customqry("select distinct colour from product_table_ecom");
          while ($row = $result->fetch_assoc()) {
            if ($colour == $row['colour']) {
              echo ' <option selected="selected" value="' . $row['colour'] . '" >' . $row['colour'] . '</option>';
            } else {
              echo ' <option value="' . $row['colour'] . '" >' . $row['colour'] . '</option>';
            }

          }
          ?>
        </select>
        <!-- dropdown-------------------^--------- -->
      </div>

      <div class="form-group   col-md-1">
        <label>Stock < </label>
            <input type="text" class="form-control" id="stock_less" name="stock_less">
      </div>

      <div class="form-group   col-md-1">
        <label>Stock > </label>
        <input type="text" class="form-control" id="stock_great" name="stock_great">
      </div>

      <div class="form-group ">
        <label>&nbsp;&nbsp;&nbsp;</label><br />
        <button class="btn btn-light" id="reset"><small><img src="assets/icons/clear-filter.png"
              alt=""></small></button>
      </div>


      <div class="form-group ml-2">
        <label>&nbsp;&nbsp;&nbsp;</label><br />
        <button id="filterform" class="btn btn-light"><img src="assets/icons/search.png" alt=""></button>
      </div>

    </div>






  </div>


  <div id="filterTableBody">

  </div>




  <!-- Modal Yes No Before Delete -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Want to Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are You Sure that you want to delete the Selected?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <a id="modelYesButton" type="button" class="btn btn-primary"
            onclick="getCheckedValuesForDelete('myTable','#exampleModal','product-ctrl.php?key1=delete','#filterTableBody')">yes</a>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  var tokenid = "<?php echo session_id(); ?>";


  function loadTableData(pageNo) {

    // Make Sure to remove the Last Feild (,) if you are Pasting from The Excel Sheet
    var formData = {
      sku: $('#sku').val(),
      brand_name: $('#brand_name').val(),
      category: $('#category').val(),
      stock_great: $('#stock_great').val(),
      stock_less: $('#stock_less').val(),
      product_name: $('#product_name').val(),
      sub_category: $('#sub_category').val(),
      super_sub_category: $('#super_sub_category').val(),
      part_no_01: $('#part_no_01').val(),
      rack_details: $('#rack_details').val(),
      barcode: $('#sku').val(),
      size: $('#size').val(),
      colour: $('#colour').val()

    }; //Array 

    // Table Body ID, URL, 
    loadTableDataFromAjax("#filterTableBody", "product-ctrl.php?key1=filter&pageNo=" + pageNo, formData);

  }


  $('#filterform').click(function () {
    loadTableData(1);

  });


  // Auto Complete Code --------------------------------------------------------------


  //City Auto Complete
  $(function () {
    $("#sku").autocomplete({
      source: 'auto-complete.php?type=sku&tbl=product_table_ecom&tkn=' +
        tokenid
    });
  });

  // $(function() {
  //     $("#brand_name").autocomplete({
  //         source: 'auto-complete.php?type=brand_name&tbl=product_table&tkn=' +
  //             tokenid
  //     });
  // });

  // $(function() {
  //     $("#category").autocomplete({
  //         source: 'auto-complete.php?type=category&tbl=product_table&tkn=' +
  //             tokenid
  //     });
  // });


  //Product name Auto Complete

  // $(function() {
  //   $("#city").autocomplete({
  //     source: 'auto-complete.php?type=b_city&tbl=company_table&tkn=' + tokenid
  //   });
  // });




    // For clear filters
    $(document).ready(function () {
        $("#reset").click(function () {
            $("input").val('');
            $("select").val('');

            loadTableData(1);
        });
        loadTableData(1);
    });


</script>




<?php include 'includes/footer.php'; ?>