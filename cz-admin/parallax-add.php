<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'parallax_table';

//Init Variables
$tid = "";
$slider_header = "";
$slider_header_2 = "";
$slider_header_3 = "";
$slider_button_url = "";
$created_on = "";
$created_by = "";
$last_updated_on = "";
$last_updated_by = "";
$ext_file = "";

//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,slider_header,slider_header_2,slider_header_3,slider_button_url,created_on,created_by,last_updated_on,last_updated_by,ext_file";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
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

        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>Parallax Master</h1><br>


    <form action="parallax-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group   col-md-3">
                <label>Slider Header</label>
                <input type="text" class="form-control" <?php echo 'value="' . $slider_header . '"'; ?>
                    id="slider_header" name="slider_header" autofocus>
            </div>

            <div class="form-group   col-md-3">
                <label>Slider Header 2</label>
                <input type="text" class="form-control" <?php echo 'value="' . $slider_header_2 . '"'; ?>
                    id="slider_header_2" name="slider_header_2">
            </div>

            <div class="form-group   col-md-3">
                <label>Slider Header 3</label>
                <input type="text" class="form-control" <?php echo 'value="' . $slider_header_3 . '"'; ?>
                    id="slider_header_3" name="slider_header_3">
            </div>

            <div class="form-group   col-md-3">
                <label>Slider Button Url</label>
                <input type="text" class="form-control" <?php echo 'value="' . $slider_button_url . '"'; ?>
                    id="slider_button_url" name="slider_button_url">
            </div>
            <div class="col-md-3">
                <p class="mb-2">Attachments</p>
                <div class="form-group col-md-12">
                    <input type="file" class="custom-file-input" id="category_image" name="category_image"
                        accept=".png, .jpg, .jpeg">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

            <?php

            if (strlen($ext_file) > 0) {
                ?>
                <div class="col-md-6">
                    <img src="attachments/parallax/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file ?>" alt="img"
                        class="img-thumbnail">
                </div>
                <?php
            }
            ?>

        </div>
        <div class="float-right">
            <label>&nbsp;&nbsp;&nbsp;</label><br />
            <button type="submit" class="btn btn-success ">Save</button>
        </div>
    </form>
</div>


<script>
    var tokenid = "<?php echo session_id(); ?>";
    // Auto Complete Code --------------------------------------------------------------
    $(function () {
        $("#slider_header").autocomplete({
            source: 'auto-complete.php?type=slider_header&tbl=parallax_table&tkn=' +
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