<?php include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'customer_table';

//Init Variables
$tid = "";
$fname = "";
$lname = "";
$street = "";
$city = "";
$state = "";
$pin_code = "";
$email = "";
$password = "";
$phone_number = "";
$country = "";



//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
  $processName = "insert";
}


// //Insert Process-----------------------------------------------------------------------------------------------------------------
// if (czGet('key1') == "insert") {
//   //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert
//   $company_name = czPostForSQL('company_name');
//   if (strlen($company_name) > 0) {

//     //Assign values to Variable from Post Method
//     $fname = czPostForSQL('fname');
//     $lname = czPostForSQL('lname');
//     $street = czPostForSQL('street');
//     $city = czPostForSQL('city');
//     $state = czPostForSQL('state');
//     $pin_code = czPostForSQL('pin_code');
//     $email = czPostForSQL('email');
//     $password = czPostForSQL('password');
//     $phone_number = czPostForSQL('phone_number');
//     $country = czPostForSQL('country');


//     //Convert to Numeric
//     // $rate = (float) $rate;
//     $created_on = date("Y-m-d");
//     $created_by = $_SESSION['user_name'];

//     //Initilize The File Upload Process

//     //Get Value to form Insert Query
//     $insertFeilds = "company_name,display_name,b_street_l1,b_street_l2,b_city,b_state,b_zip,b_country,s_street_l1,s_street_l2,s_city,s_state,s_zip,s_country,email,landline,mobile,fax,website,other_details,tin,tan,cst,pan,service_tax,department,payable_opening_balance,receivable_opening_balance,bonus_point,contact_person_name,conatct_person_mobile,approved_status,image_logo_url,contact_type,credit_amount,credit_days,price_list,a1,a2,a3,a4,a5,ad6,ad7,ad8,ad9,ad10,ad11,ad12,ad13,ad14,ad15,date_of_birth,accounts_manager,date_of_anniversary,bank_details,agent_name,dealer_name,last_updated_date,rating,royality_points,short_name,code,referance_name,created_on,created_by";
//     $insertValues = "'$company_name','$display_name','$b_street_l1','$b_street_l2','$b_city','$b_state','$b_zip','$b_country','$s_street_l1','$s_street_l2','$s_city','$s_state','$s_zip','$s_country','$email','$landline','$mobile','$fax','$website','$other_details','$tin','$tan','$cst','$pan','$service_tax','$department','$payable_opening_balance','$receivable_opening_balance','$bonus_point','$contact_person_name','$conatct_person_mobile','$approved_status','$image_logo_url','$contact_type','$credit_amount','$credit_days','$price_list','$a1','$a2','$a3','$a4','$a5','$ad6','$ad7','$ad8','$ad9','$ad10','$ad11','$ad12','$ad13','$ad14','$ad15','$date_of_birth','$accounts_manager','$date_of_anniversary','$bank_details','$agent_name','$dealer_name','$last_updated_date','$rating','$royality_points','$short_name','$code','$referance_name','$created_on','$created_by'";
//     //Insert Process
//     $insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
//     FileUploadJPG("company_image", $insertStatus, "attachments/customers/");
//     //Redirect URL after Insert - $insertStatus == "Success" || $insertStatus > 0
//     if ($insertStatus > 0) {
//       header("Location: b2b-my.php?key1=insertSuccess&insertID=".$insertStatus);
//       exit();
//     } else {
//       header("Location: b2b-my.php?key1=insertFailed");
//       exit();
//     }
//   }
// }

//Update Process --------------------------------------------------------------------------------------------------------------------
if (czGet('key1') == "update") {
  //Get The Base Value, Before Insert - Since it is a Post Method, To Stop, Multiple Insert

  //Get Update Key
  $updateKey = czGet('pk');



  //Assign values to Variable from Post Method
  $fname = czPostForSQL('fname');
  $lname = czPostForSQL('lname');
  $street = czPostForSQL('street');
  $city = czPostForSQL('city');
  $state = czPostForSQL('state');
  $pin_code = czPostForSQL('pin_code');
  $email = czPostForSQL('email');
  $password = czPostForSQL('password');
  $phone_number = czPostForSQL('phone_number');
  $country = czPostForSQL('country');

  //Get Value to form Update Query
  $updateValueAndFeilds = "fname = '$fname',lname = '$lname',street = '$street',city = '$city',state = '$state',pin_code = '$pin_code',email = '$email',password = '$password',phone_number = '$phone_number',country = '$country'";
  $updateWhereClasuse = "tid='$updateKey'";
  //Update Process
  $UpdateStatus = $obj_class_main->updateData($updateValueAndFeilds, $updateWhereClasuse);

  //Redirect URL after update
  if ($UpdateStatus == "Success") {
    header("Location: b2b-my.php?key1=updateSuccess&updateKey=" .$updateKey);
    exit();
  } else {
    header("Location: b2b-my.php?key1=updateFailed");
    exit();
  }
}


//Filter Section ------------------------------------------------------------------------------
if (czGet('key1') == "filter") {

  $pageNo = czGet('pageNo');
  ?>


  <div class="" id="tab_filter">
    <table class="table table_filter table-striped table-bordered" id="reportTable">
      <thead class="thead_filter">
        <tr>
          <th><input type="checkbox" id="allcb"
              onclick="toggleAllCheckbox()"></th>
              <th style="width: 130px">TID</th>
          <th class="th_filter">First Name</th>
          <th class="th_filter">Last Name</th>
          <th class="th_filter">Email</th>
          <th class="th_filter">Street</th>
          <th class="th_filter" >City</th>
          <th class="th_filter" >State</th>
          <th class="th_filter" >Country</th>
          <th class="th_filter" >Zip Code</th>
          <th class="th_filter">Phone Number</th>
        </tr>
      </thead>
      <tbody id="myTable" class="tbody_filter">




        <?php


        //ini value for Select Query
        $temp_Feilds = "tid,fname,lname,street,city,state,pin_code,email,phone_number,country";
        $temp_whereClause = "";

        $fname = czPostForSQL('fname');
        $lname = czPostForSQL('lname');
        $city = czPostForSQL('city');
        $state = czPostForSQL('state');
        $pin_code = czPostForSQL('pin_code');
        $email = czPostForSQL('email');
        $phone_number = czPostForSQL('phone_number');
        $country = czPostForSQL('country');

        //Filter Query For Where Clause
        $temp_whereClause = whereClasueQueryGenerator('fname', '=', $fname, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('lname', '=', $lname, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('pin_code', '=', $pin_code, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('city', '=', $city, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('state', '=', $state, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('email', '=', $email, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('phone_number', '=', $phone_number, $temp_whereClause);
        $temp_whereClause = whereClasueQueryGenerator('country', '=', $country, $temp_whereClause);

        // Select Date To Display In Table
        $limitString = "";
        if ($pageNo > 0) {
          if ($pageNo == 1) {
            $limitString = " limit 0,50";
          } else {
            $limitString = " limit " . ($pageNo * 100) . ",100";
          }
        }
        $result = $obj_class_main->selectDataOrderBy($temp_Feilds, $temp_whereClause, $limitString);

        //Loop Through Select Result
        while ($row = $result->fetch_assoc()) {
          echo "<tr class='tr_filter'>";

          echo '<td><input type="checkbox" name="' . $row['tid'] . '" value="' . $row['tid'] . '"> </td>';
      echo '<td> <a href="b2b-add.php?key1=update&updateKey=' . $row['tid'] . '" class="btn btn-success btn-sm"> #' . $row['tid'] . '</td>';
          echo "<td class='td_filter'>" . $row['fname'] . "</td>";
          echo "<td class='td_filter'>" . $row['lname'] . "</td>";
          echo "<td class='td_filter'>" . $row['email'] . "</td>";

          echo "<td class='td_filter'>" . $row['street'] . "</td>";

          echo "<td class='td_filter'>" . $row['city'] . "</td>";
          echo "<td class='td_filter'>" . $row['state'] . "</td>";

          echo "<td class='td_filter'>" . $row['country'] . "</td>";

          echo "<td class='td_filter'>" . $row['pin_code'] . "</td>";
          echo "<td class='td_filter'>" . $row['phone_number'] . "</td>";
      
          echo "</tr>";
        }

        echo '</tbody>
      </table>
      </div>';

        pagination($pageNo);


}



//Delete Process-----------------------------------------------------------------------------------------------------------------------
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
                    <strong>Cool!</strong> ID-'. $deleteKeyValue .' Deleted Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>';
  } else {
    // If Delete Failed'
    echo '<div class="alert alert-danger" id="success-alert">
    <strong>Oops!</strong> Something Went Wrong, Data Not Delete Properly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  }
}