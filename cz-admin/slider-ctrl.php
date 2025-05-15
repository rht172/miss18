<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'slider_table';

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
$bg_color = "";

//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "insert") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
    $slider_header = czPostForSQL('slider_header');
    if (strlen($slider_header) > 0) {

        //Assign values to Variable from Post Method
        $tid = czPostForSQL('tid');
        $slider_header = czPostForSQL('slider_header');
        $slider_header_2 = czPostForSQL('slider_header_2');
        $slider_header_3 = czPostForSQL('slider_header_3');
        $slider_button_url = czPostForSQL('slider_button_url');
        $created_on = czPostForSQL('created_on');
        $created_by = czPostForSQL('created_by');
        $last_updated_on = czPostForSQL('last_updated_on');
        $last_updated_by = czPostForSQL('last_updated_by');
        $ext_file = czPostForSQL('ext_file');
        $bg_color = czPostForSQL('bg_color');

        //Convert to Numeric
        $created_on = date("Y-m-d");
        $last_updated_on = date("Y-m-d");
        $created_by = $_SESSION['user_name'];
        $last_updated_by = $_SESSION['user_name'];

        //Get Extension Code
        $path_parts = pathinfo($_FILES["category_image"]["name"]);
        $extFileUpload = $path_parts['extension'];

        //Get Value to form Insert Query
        $insertFeilds = "slider_header,slider_header_2,slider_header_3,slider_button_url,created_on,created_by,last_updated_on,last_updated_by,ext_file,bg_color";
        $insertValues = "'$slider_header','$slider_header_2','$slider_header_3','$slider_button_url','$created_on','$created_by','$last_updated_on','$last_updated_by','$extFileUpload','$bg_color'";
        //Insert Process
        $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
        FileUpload("category_image", 'tid-' . $insertStatus, "attachments/slider/", $extFileUpload);
        //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
        if ($insertStatus > 0) {
            header("Location: slider-my.php?key1=insertSuccess");
            exit();
        } else {
            header("Location:slider-my.php?key1=insertFailed");
            exit();
        }
    }
}

//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {

    //Get Update Key
    $updateKey = czGet('pk');


    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] === UPLOAD_ERR_OK) {
        echo "Attachment selected";
        $result = $obj_class_main->selectData_customqry("SELECT ext_file from slider_table where tid = $updateKey");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file']) > 0) {
                unlink("attachments/slider/tid-" . $updateKey . '.' . $row['ext_file']);
            }
        }
    } else {
        echo "No file selected.";
    }




    //Assign values to Variable from Post Method
    $tid = czPostForSQL('tid');
    $slider_header = czPostForSQL('slider_header');
    $slider_header_2 = czPostForSQL('slider_header_2');
    $slider_header_3 = czPostForSQL('slider_header_3');
    $slider_button_url = czPostForSQL('slider_button_url');
    $created_on = czPostForSQL('created_on');
    $created_by = czPostForSQL('created_by');
    $last_updated_on = czPostForSQL('last_updated_on');
    $last_updated_by = czPostForSQL('last_updated_by');
    $ext_file = czPostForSQL('ext_file');
    $bg_color = czPostForSQL('bg_color');

    //Convert to Numeric
    $last_updated_on = date("Y-m-d");
    $last_updated_by = $_SESSION['user_name'];

    //Get Extension Code
    $path_parts = pathinfo($_FILES["category_image"]["name"]);
    $extFileUpload = $path_parts['extension'];

    //Get Value to form Update Query
    $updateValueAndFeilds = "slider_header = '$slider_header',slider_header_2 = '$slider_header_2',slider_header_3 = '$slider_header_3',slider_button_url = '$slider_button_url',last_updated_on = '$last_updated_on',last_updated_by = '$last_updated_by',bg_color = '$bg_color'";

    $updateWhereClasuse = "tid='$updateKey'";

    //Update Process
    $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

    if ($UpdateStatus == "Success") {
        //Get Value to form Update Query
        if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == UPLOAD_ERR_OK) {
            //Get Extension Code
            $path_parts1 = pathinfo($_FILES["category_image"]["name"]);
            $extFileUpload = $path_parts1['extension'];

            $updateValueAndFeilds = "ext_file = '$extFileUpload'";
            $updateWhereClasuse = "tid = '$updateKey'";
            FileUpload("category_image", 'tid-' . $updateKey, "attachments/slider/", $extFileUpload);
            //Update Process
            $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);
        }

    }



    //Redirect URL after update
    if ($UpdateStatus == "Success" || $UpdateStatus1 == "Success") {
        header("Location: slider-my.php?key1=updateSuccess");
        exit();
    } else {
        header("Location: slider-my.php?key1=updateFailed");
        exit();
    }
}


//Filter Section ------------------------------------------------------------------------------
if (czGet('key1') == "filter") {

    $pageNo = czGet('pageNo');
    ?>

    <table class="table table-striped ">
        <thead>
            <tr>
                <th class='w-5'><input type="checkbox" onclick="toggleAllCheckboxes('myTable')"></th>
                <th class=' w-5 '>Tid</th>
                <th class=' w-5 '>Slider Header</th>
                <th class=' w-5 '>Slider Header 2</th>
                <th class=' w-5 '>Slider Header 3</th>
                <th class=' w-5 '>Slider Button Url</th>
                <th class=' w-5 '>Ext File</th>
                <th class=' w-5 '>BG Color</th>
                <th class="w-5">Update</th>
            </tr>
        </thead>
        <tbody id="myTable">




            <?php


            //ini value for Select Query
            $temp_Feilds = "tid,slider_header,slider_header_2,slider_header_3,slider_button_url,created_on,created_by,last_updated_on,last_updated_by,ext_file,bg_color";
            $temp_whereClause = "";

            //Assign values to Variable from Post Method for Filter 
            $slider_header = czPostForSQL('slider_header');
            $created_on_from = czPostForSQL('created_on_from');
            $created_on_to = czPostForSQL('created_on_to');
            $last_updated_on_from = czPostForSQL('last_updated_on_from');
            $last_updated_on_to = czPostForSQL('last_updated_on_to');

            //Filter Query For Where Clause
            $temp_whereClause = whereClasueQueryGenerator('slider_header', '=', $slider_header, $temp_whereClause);
            $temp_whereClause = whereClasueQueryGeneratorForDate('created_on', $created_on_from, $created_on_to, $temp_whereClause);
            $temp_whereClause = whereClasueQueryGeneratorForDate('last_updated_on', $last_updated_on_from, $last_updated_on_to, $temp_whereClause);


            // Select Date To Display In Table
            $limitString = "";
            if ($pageNo > 0) {
                if ($pageNo == 1) {
                    $limitString = " limit 0,100";
                } else {
                    $limitString = " limit " . (($pageNo * 100) - 99) . "," . ($pageNo * 100);
                }
            }
            $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause, $limitString);

            //Loop Through Select Result
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo '<td><input type="checkbox" name="' . $row['tid'] . '" value="' . $row['tid'] . '"></td>';
                echo "<td>" . $row['tid'] . "</td>";
                echo "<td>" . $row['slider_header'] . "</td>";
                echo "<td>" . $row['slider_header_2'] . "</td>";
                echo "<td>" . $row['slider_header_3'] . "</td>";
                echo "<td>" . $row['slider_button_url'] . "</td>";
                echo "<td>" . $row['ext_file'] . "</td>";
                echo "<td>" . $row['bg_color'] . "</td>";

                //Update Call
                echo "<td><a href='slider-add.php?key1=update&updateKey=" . $row['tid'] . "' class='btn btn-success btn-sm'>Update</td>";

                echo "</tr>";
            }

            echo '</tbody>
      </table>';

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

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file from slider_table where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file']) > 0) {
                unlink("attachments/slider/tid-" . $row['tid'] . '.' . $row['ext_file']);
            }
        }

    } else {
        $temp_whereClause = "tid  = '" . $deleteKeyValue . "'";

        $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file from slider_table where $temp_whereClause");
        while ($row = $result->fetch_assoc()) {
            if (strlen($row['ext_file']) > 0) {
                unlink("attachments/slider/tid-" . $row['tid'] . '.' . $row['ext_file']);
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