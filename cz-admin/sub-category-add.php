<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_category = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'ecom_sub_category_master';
$obj_class_category->varTableName = 'ecom_category_master';

//Init Variables
$sub_category = "";
$category = "";
$describition = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";
$ext_file = "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,sub_category,category,describition,ext_file";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
    //$result = $obj_class_main->selectData_customqry("select sku,product_name,category,sub_category,super_sub_category,brand_name,selling_price from product_table where tid = '" . czGet('updateKey') . "' ");
    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $sub_category = $row['sub_category'];
        $category = $row['category'];
        $describition = $row['describition'];
        $ext_file = $row['ext_file'];


        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>Sub Category Master</h1>


    <form action="sub-category-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">

            <div class="form-group   col-md-3">
                <label>Sub Category</label>
                <input type="text" class="form-control" <?php echo 'value="' . $sub_category . '"'; ?> id="sub_category"
                    name="sub_category">
            </div>

            <div class="form-group   col-md-3">
                <label>Category</label>
                <select class="form-control" <?php echo 'value="' . $category . '"'; ?> id="category" name="category">
                    <option value=""></option>
                    <?php
                    $result = $obj_class_category->selectData_customqry("select distinct category from ecom_category_master");
                    while ($row = $result->fetch_assoc()) {
                        if ($category == $row['category']) {
                            echo ' <option selected="selected" value="' . $row['category'] . '" >' . $row['category'] . '</option>';
                        } else {
                            echo ' <option value="' . $row['category'] . '" >' . $row['category'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group   col-md-3">
                <label>Notes</label>
                <input type="text" class="form-control" <?php echo 'value="' . $describition . '"'; ?> id="describition"
                    name="describition">
            </div>

            <div class="col-md-3">
                <p class="mb-2">Attachments</p>
                <div class="form-group col-md-12">
                    <input type="file" class="custom-file-input" id="sub_category_image" name="sub_category_image"
                        accept=".png, .jpg, .jpeg">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

            <?php

            if (strlen($ext_file) > 0) {
                ?>
                <div class="col-md-6">
                    <img src="attachments/sub-category/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file ?>" alt="img"
                        class="img-thumbnail">
                </div>
                <?php
            }
            ?>
            <div class="form-group   col-md-1">
                <label>&nbsp;&nbsp;&nbsp;</label><br />
                <button type="submit" class="btn btn-success ">Save</button>
            </div>
        </div>
    </form>
</div>


<script>
    var tokenid = "<?php echo session_id(); ?>";
    // Auto Complete Code --------------------------------------------------------------
    $(function () {
        $("#sub_category").autocomplete({
            source: 'auto-complete.php?type=sub_category&tbl=ecom_sub_category_master&tkn=' +
                tokenid
        });
    });


    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });



</script>


<?php include 'includes/footer.php'; ?>