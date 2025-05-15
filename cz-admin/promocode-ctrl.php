<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
include 'includes/theme-constants.php';

//Class Declaration
$obj_class_main = new czDBAccess();


//Assign Table Name
$obj_class_main->varTableName = 'promo_code_master_table';


//Init Variables
$tid = "";
$imei_no = "";
$drop_amount = "";
$stock_status = "";
$receive_status = "";
$created_on = "";
$created_by = "";
$product_sku = "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}


//Insert Process--------------------------------------------------------------------------
if (czGet('key1') == "insert") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert


    $promo_code = czPostForSQL('promo_code');
    $percentage = czPostForSQL('percentage');
    $from_date = czPostForSQL('from_date');
    $to_date = czPostForSQL('to_date');
    $created_by = $_SESSION['user_name'];
    $created_on = date('Y-m-d');


    // Insert Process 
    $insertFeilds = "promo_code,percentage,from_date,to_date,created_by,created_on";
    $insertValues = "'$promo_code','$percentage','$from_date','$to_date','$created_by','$created_on'";

    //Insert Process
    $insertID = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);

    // Redirect Once The Insert is Success
    if ($insertID > 0) {
        header("Location: promocode-my.php?key1=insertSuccess");
        exit(0);
    } else {
        header("Location: promocode-my.php?key1=insertFailed");
        exit(0);
    }
}



//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
    //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

    //Get Update Key
    $updateKey = czGet('pk');



    //Assign values to Variable from Post Method
    $promo_code = czPostForSQL('promo_code');
    $from_date = czPostForSQL('from_date');
    $to_date = czPostForSQL('to_date');
    $percentage = czPostForSQL('percentage');


    //Get Value to form Update Query
    $updateValueAndFeilds = "promo_code = '$promo_code',percentage = '$percentage',from_date = '$from_date',to_date = '$to_date'";
    $updateWhereClasuse = "tid = '$updateKey'";
    //Update Process
    $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

    //Redirect URL after update
    if ($UpdateStatus == "Success") {
        header("Location: promocode-my.php?key1=updateSuccess");
        exit();
    } else {
        header("Location: promocode-my.php?key1=updateFailed");
        exit();
    }
}




//Delete Process---------------------------------------------------------------------------------
if (czGet('key1') == "delete") {


    //Delete Query call
    $deleteKeyValue = czPostForSQL('delete_key');
    if (substr($deleteKeyValue, 0, 1) === ",") {
        $deleteKeyValue = substr($deleteKeyValue, 1);
    }
    if (strpos($deleteKeyValue, ',')) {
        $temp_whereClause = "tid in (" . $deleteKeyValue . ")";
    } else {
        $temp_whereClause = "tid  = '" . $deleteKeyValue . "'";
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







//Filter Section ------------------------------------------------------------------------------
if (czGet('key1') == "filter") {

    $pageNo = czGet('pageNo');

?>


    <div class="table-responsive">
        <table class="table table-striped table_filter_reports ">
            <thead class="thead_filter_reports">
                <tr class="tr_filter_reports">
                    <!-- <th class="th_filter"><input type="checkbox" id="allcb" onclick="toggleAllCheckbox()"></th> -->
                    <th class="th_filter_reports"><input type="checkbox" id="allcb" onclick="toggleAllCheckbox()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tid</th>
                    <th class="th_filter_reports">Promo Code</th>
                    <th class="th_filter_reports">Percentage</th>
                    <th class="th_filter_reports">From Date</th>
                    <th class="th_filter_reports">To Date</th>
                    <th class="th_filter_reports">Create Date</th>
                </tr>
            </thead>
            <tbody id="myTable" class="tbody_filter_reports">

                <?php

                //ini value for Select Query
                $temp_Feilds = "tid,promo_code,percentage,from_date,created_by,created_on";
                $temp_whereClause = "";
                //Assign values to Variable from Post Method for Filter 
                $tid = czPostForSQL('tid');
                $promo_code = czPostForSQL('promo_code');
                $percentage = czPostForSQL('percentage');
                $from_date = czPostForSQL('from_date');
                $created_by = czPostForSQL('created_by');

                $created_on_from = czPostForSQL('created_on_from');
                $created_on_to = czPostForSQL('created_on_to');


                //Filter Query For Where Clause
                $temp_whereClause = whereClasueQueryGenerator('promo_code' ,'=',$promo_code,$temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('percentage' ,'=',$percentage,$temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('from_date' ,'=',$from_date,$temp_whereClause);
                $temp_whereClause = whereClasueQueryGenerator('created_by' ,'=',$created_by,$temp_whereClause);
                $temp_whereClause = whereClasueQueryGeneratorForDate('created_on', $created_on_from, $created_on_to, $temp_whereClause);

                // Select Date To Display In Table
                $limitString = "";
                if ($pageNo > 0) {
                    if ($pageNo == 1) {
                        $limitString = " limit 0,100";
                    } else {
                        $limitString = " limit " . (($pageNo * 100) - 99) . "," . ($pageNo * 100);
                    }
                }

                $result = (strlen($temp_whereClause) > 0) ? $obj_class_main->selectData_customqry("SELECT * FROM promo_code_master_table where $temp_whereClause ORDER by tid DESC $limitString;") : $obj_class_main->selectData_customqry("SELECT * FROM promo_code_master_table ORDER by tid DESC $limitString;");


                //Loop Through Select Result
                while ($row = $result->fetch_assoc()) {

                ?>
                    <tr class="tr_filter_reports">
                        <td class="td_filter_reports"><input type="checkbox" id="copyId" value="<?php echo $row['tid'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href='promocode-add.php?key1=update&updateKey=<?php echo $row['tid'] ?>' class='btn btn-success btn-sm' id='updateBtn'>#
                                <?php echo $row['tid'] ?>
                        </td>
                        <td class="td_filter_reports">
                            <?php echo $row['promo_code'] ?>
                        </td>
                        <td class="td_filter_reports">
                            <?php echo $row['percentage'] ?>
                        </td>
                        <td class="td_filter_reports">
                            <?php echo $row['from_date'] ?>
                        </td>
                        <td class="td_filter_reports">
                            <?php echo $row['to_date'] ?>
                        </td>
                        <td class="td_filter_reports">
                            <?php echo $row['created_on'] ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- to display the total no. of counts and stats for filtered table  -->
<?php
    pagination($pageNo);
}

?>