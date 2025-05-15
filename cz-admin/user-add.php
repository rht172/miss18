<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_user_type = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'user_table';
$obj_class_user_type->varTableName = 'open_single_data_master';

//Init Variables
$email_address = "";
$password = "";
$account_name = "";
$user_type = "";
$m_access = "";
$email_account = "";
$staff_name = "";
$ext_file = "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}

//Select Data to Variable for Update Process
if (czGet('key1') == "update") {
    $select_Feilds = "tid,email_address,password,account_name,user_type,m_access,email_account,staff_name,ext_file";
    $select_whereClause = "tid = '" . czGet('updateKey') . "'";
    $result = $obj_class_main->selectData($select_Feilds, $select_whereClause);
    //$result = $obj_class_main->selectData_customqry("select sku,product_name,category,sub_category,super_sub_category,brand_name,selling_price from product_table where tid = '" . czGet('updateKey') . "' ");
    while ($row = $result->fetch_assoc()) {

        $tid = $row['tid'];
        $email_address = $row['email_address'];
        $password = $row['password'];
        $account_name = $row['account_name'];
        $user_type = $row['user_type'];
        $m_access = $row['m_access'];
        $email_account = $row['email_account'];
        $staff_name = $row['staff_name'];
        $ext_file = $row['ext_file'];



        $processName = 'update&pk=' . czGet('updateKey');
    }
}



?>


<div class="container-fluid">
    <h1>Add User</h1><br>

    <div class="row">
        <div class="col-md-10">
            <form action="user-ctrl.php?key1=<?php echo $processName; ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group   col-md-3">
                        <label>User Name</label>
                        <input type="text" class="form-control" <?php echo 'value="' . $email_address . '"'; ?>
                            id="email_address" name="email_address" autofocus required>
                    </div>

                    <div class="form-group   col-md-3">
                        <label>Password</label>
                        <input type="password" class="form-control" <?php echo 'value="' . $password . '"'; ?>
                            id="password" name="password">
                    </div>

                    <div class="form-group   col-md-3">
                        <label>Account Name</label>
                        <input type="text" class="form-control" <?php echo 'value="' . $account_name . '"'; ?>
                            id="account_name" name="account_name">


                    </div>

                    <div class="form-group   col-md-3">
                        <label>Email Account</label>
                        <input type="email" class="form-control" <?php echo 'value="' . $email_account . '"'; ?>
                            id="email_account" name="email_account">
                    </div>

                    <div class="form-group   col-md-3">
                        <label>User Account Type or User Group</label>
                        <input type="text" class="form-control" <?php //echo 'value="' . $user_type . '"'; ?>
                            id="user_type" name="user_type">
                    </div>

                    <div class="form-group   col-md-3">
                        <label>Staff Name</label>
                        <input type="text" class="form-control" <?php echo 'value="' . $staff_name . '"'; ?>
                            id="staff_name" name="staff_name">
                    </div>

                    <div class="col-md-3">
                        <p class="mb-2">Profile Image</p>
                        <div class="form-group col-md-12">
                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image"
                                accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group   col-md-1">
                        <label>&nbsp;&nbsp;&nbsp;</label><br />
                        <button type="submit" class="btn btn-success ">Save</button>
                    </div>
                </div>
            </form>

        </div>

        <?php

        if (strlen($ext_file) > 0) {
            ?>
            <div class="col-md-2">
                <img src="attachments/profile/<?php echo 'tid-' . $tid ?>.<?php echo $ext_file ?>" alt="img"
                    class="img-thumbnail">
            </div>
            <?php
        }
        ?>

    </div>
</div>


<script>
    var tokenid = "<?php echo session_id(); ?>";
    // Auto Complete Code --------------------------------------------------------------
    $(function () {
        $("#email_address").autocomplete({
            source: 'auto-complete.php?type=email_address&tbl=user_table&tkn=' +
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