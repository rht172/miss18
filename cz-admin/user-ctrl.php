<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'user_table';

//Init Variables
$tid = "";
$email_address = "";
$password = "";
$account_name = "";
$user_type = "";
$m_access = "";
$email_account = "";
$staff_name = "";
$ext_file = "";
$fl_img = "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}


//Insert Process-----------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "insert") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
  $email_address = czPostForSQL('email_address');
  if (strlen($email_address) > 0) {

    //Assign values to Variable from Post Method
    $email_address = czPostForSQL('email_address');
    $password = czPostForSQL('password');
    $account_name = czPostForSQL('account_name');
    $user_type = czPostForSQL('user_type');
    $m_access = czPostForSQL('m_access');
    $email_account = czPostForSQL('email_account');
    $staff_name = czPostForSQL('staff_name');

    //Get Extension Code
    $path_parts = pathinfo($_FILES["profile_image"]["name"]);
    $profileImage = isset($path_parts['extension']) ? $path_parts['extension'] : '';

    if (strlen($profileImage) == 0) {

      // Extract the first letter from the user's name and convert to uppercase
      $firstLetter = strtoupper(substr($email_address, 0, 1));
 
      // Create a blank image with dimensions 100x100
      $imageWidth = 100;
      $imageHeight = 100;
      $image = imagecreate($imageWidth, $imageHeight);

      // Set the background color (here, we use a White color)
      $bgColor = imagecolorallocate($image, 255, 255, 255);

      // Set the text color (Light Blue)
      $textColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));

      // Set the font (you can adjust the path and size to your preference)
      $font = 'assets\fonts\segoe\Segoe UI Bold.ttf'; // Replace with your font path
      $fontSize = 60;

      // Calculate the position to center the text in the image
      // $textWidth = imagefontwidth($fontSize) * strlen($firstLetter);
      $textWidth = imagettfbbox($fontSize, 0, $font, $firstLetter)[4] - imagettfbbox($fontSize, 0, $font, $firstLetter)[0];
      $textX = ($imageWidth - $textWidth) / 2;
      $textY = ($imageHeight - $fontSize) / 2;

      // Add the first letter to the image
      imagettftext($image, $fontSize, 0, $textX, $textY + $fontSize, $textColor, $font, $firstLetter);


      $profileImage = "jpg";

      $fl_img = "insert";

    }


    //Get Value to form Insert Query
    $insertFeilds = "email_address,password,account_name,user_type,m_access,email_account,staff_name,ext_file";
    $insertValues = "'$email_address','$password','$account_name','$user_type','$m_access','$email_account','$staff_name','$profileImage'";
    //Insert Process
    $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
    FileUploadJPG("company_image", $insertStatus, "attachments/customers/");
    //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
    if ($insertStatus > 0) {
      FileUpload("profile_image", 'tid-' . $insertStatus, "attachments/profile/", $profileImage);

      if ($fl_img == "insert") {
        $filePath = 'attachments/profile/' . 'tid-' . $insertStatus . '.jpg';
        imagejpeg($image, $filePath);
      }

      header("Location: user-my.php?key1=insertSuccess");
      exit();
    } else {
      header("Location: user-my.php?key1=insertFailed");
      exit();
    }
  }
}

//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

  //Get Update Key
  $updateKey = czGet('pk');

  if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    echo "Attachment selected";
    $result = $obj_class_main->selectData_customqry("SELECT ext_file from user_table where tid = $updateKey");
    while ($row = $result->fetch_assoc()) {
      if (strlen($row['ext_file']) > 0) {
        unlink("attachments/profile/" . 'tid-' . $updateKey . '.' . $row['ext_file']);
      }
    }
  } else {
    echo "No file photo selected.";
  }

  //Assign values to Variable from Post Method
  $email_address = czPostForSQL('email_address');
  $password = czPostForSQL('password');
  $account_name = czPostForSQL('account_name');
  $user_type = czPostForSQL('user_type');
  $m_access = czPostForSQL('m_access');
  $email_account = czPostForSQL('email_account');
  $staff_name = czPostForSQL('staff_name');



  //Convert to Numeric
  $last_updated_on = date("Y-m-d");

  //Initilize The File Upload Process

  //Get Value to form Update Query
  $updateValueAndFeilds = "email_address = '$email_address',password = '$password',account_name = '$account_name',user_type = '$user_type',m_access = '$m_access',email_account = '$email_account',staff_name = '$staff_name'";
  $updateWhereClasuse = "tid = '$updateKey'";
  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  //Redirect URL after update
  if ($UpdateStatus == "Success") {

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
      //Get Extension Code
      $path_parts1 = pathinfo($_FILES["profile_image"]["name"]);
      $profile_image = $path_parts1['extension'];

      $updateValueAndFeilds_1 = "ext_file = '$profile_image'";
      $updateWhereClasuse_1 = "tid = '$updateKey'";
      FileUpload("profile_image", 'tid-' . $updateKey, "attachments/profile/", $profile_image);
      //Update Process
      $UpdateStatus1 = $obj_class_main->updateData($updateValueAndFeilds_1, $updateWhereClasuse_1);
    }

    header("Location: user-my.php?key1=updateSuccess");
    exit();
  } else {
    header("Location: user-my.php?key1=updateFailed");
    exit();
  }
}


//Filter Section ------------------------------------------------------------------------------
if (czGet('key1') == "filter") {

  $pageNo = czGet('pageNo');
  ?>
  <div class="table-responsive">
    <table class="table table-striped ">
      <thead>
        <tr>
          <th class="w-5 text-center"><input type="checkbox" onclick="toggleAllCheckboxes('myTable')"></th>
          <th class="w-5 text-center">ID</th>
          <th class="w-5 text-center">Profile Img</th>
          <th class="w-5">User Name</th>
          <th class="w-20">Account Name</th>
          <th class="w-20">Email Account</th>
          <th class="w-20">User Account Type</th>
          <th class="w-20">Staff Name</th>
          <!-- <th class="w-5">Update</th> -->


        </tr>
      </thead>
      <tbody id="myTable">




        <?php


        //ini value for Select Query
        $temp_Feilds = "tid,email_address,password,account_name,user_type,m_access,email_account,staff_name,ext_file";
        $temp_whereClause = "";

        //Assign values to Variable from Post Method for Filter 
        $email_address = czPostForSQL('email_address');

        $account_name = czPostForSQL('account_name');
        $user_type = czPostForSQL('user_type');


        $staff_name = czPostForSQL('staff_name');

        //Filter Query For Where Clause
        $temp_whereClause = whereClasueQueryGenerator('email_address', '=', $email_address, $temp_whereClause);

        $temp_whereClause = whereClasueQueryGenerator('account_name', '=', $account_name, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('user_type', '=', $user_type, $temp_whereClause);


        $temp_whereClause = whereClasueQueryGenerator('staff_name', '=', $staff_name, $temp_whereClause);



        // Select Date To Display In Table
        $limitString = "";
        if ($pageNo > 0) {
          if ($pageNo == 1) {
            $limitString = " limit 0,100";
          } else {
            $limitString = " limit " . ($pageNo * 100) . ",100";
          }
        }
        $result = $obj_class_main->selectData($temp_Feilds, $temp_whereClause, $limitString);

        //Loop Through Select Result
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo '<td class="text-center" ><input type="checkbox"  value="' . $row['tid'] . '"></td>';
          echo "<td class='text-center' ><a href='user-add.php?key1=update&updateKey=" . $row['tid'] . " ' class='btn btn-success btn-sm'
          id='updateBtn'>#" . $row['tid'] . "</td>";
          ?>

          <td class="td_filter_reports text-center">
            <img class="table-img-view"
              src="attachments/profile/<?php echo 'tid-' . $row['tid'] ?>.<?php echo $row['ext_file'] ?>" alt="">
          </td>

          <?php
          // echo "<td>" . $row['tid'] . "</td>";
          echo "<td>" . $row['email_address'] . "</td>";
          echo "<td>" . $row['account_name'] . "</td>";
          echo "<td>" . $row['email_account'] . "</td>";
          echo "<td>" . $row['user_type'] . "</td>";
          echo "<td>" . $row['staff_name'] . "</td>";


          //Update Call
          // echo "<td><a href='user-add.php?key1=update&updateKey=" . $row['tid'] . "' class='btn btn-success btn-sm'>Update</td>";

          echo "</tr>";
        }

        echo '</tbody>
      </table></div>';

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


    $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file from user_table where $temp_whereClause");
    while ($row = $result->fetch_assoc()) {
      if (strlen($row['ext_file']) > 0) {
        unlink("attachments/profile/tid-" . $row['tid'] . '.' . $row['ext_file']);
      }
    }


  } else {
    $temp_whereClause = "tid  = '" . $deleteKeyValue . "'";


    $result = $obj_class_main->selectData_customqry("SELECT tid, ext_file from user_table where $temp_whereClause");
    while ($row = $result->fetch_assoc()) {
      if (strlen($row['ext_file']) > 0) {
        unlink("attachments/profile/tid-" . $row['tid'] . '.' . $row['ext_file']);
      }
    }

  }

  $curdStatus = $obj_class_main->deleteData($temp_whereClause);

  // Notify Based On Delete Status
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