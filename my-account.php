<?php
include 'includes/validateSession.php';
include 'header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
?>
<?php

//get The Process Name -insert or delete or update
$processName = czGet('key1');

// Assign Default Value to the Process Name
if (strlen($processName) == 0) {
    $processName = "insert";
}


$obj_class_main = new czDBAccess();
$obj_class_main->varTableName = 'customer_table';


$select_Feilds = "fname,lname,door_no,street,city,state,pin_code,email,password,created_on,phone_number,country";
$select_whereClause = "email = '" . $_SESSION['email'] . "'";
$result = $obj_class_main->selectData($select_Feilds, $select_whereClause);

while ($row = $result->fetch_assoc()) {

    $fname = $row['fname'];
    $lname = $row['lname'];
    $door_no = $row['door_no'];
    $street = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $pin_code = $row['pin_code'];
    $email = $row['email'];
    $password = $row['password'];
    $phone_number = $row['phone_number'];
    $country = $row['country'];

}

?>

<body class="theme-color-1">

    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>
                    <div class="theme-card">
                        <form class="theme-form" method="post" id="myForm">
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="email">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" <?php echo 'value="' . $fname . '"'; ?> placeholder="First Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" <?php echo 'value="' . $lname . '"'; ?> placeholder="Last Name" required>
                                </div>
                            </div>
                            <hr>

                            <div class="form-row row mb-3">
                                <div class="col-md-12">
                                    <h4><b>Address</b></h4>
                                </div>
                            </div>

                            <div class="form-row row">


                                <!-- <div class="col-md-2">
                                    <label for="door_no">Door-No</label>
                                    <input type="text" class="form-control" id="door_no" name="door_no"
                                        placeholder="Door-No" required>
                                </div> -->

                                <div class="col-md-7">
                                    <label for="street">Street</label>
                                    <input type="text" class="form-control" id="street" name="street" <?php echo 'value="' . $street . '"'; ?> placeholder="Street" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                        <?php echo 'value="' . $city . '"'; ?> required>
                                </div>

                                <div class="col-md-2">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="State"
                                        <?php echo 'value="' . $state . '"'; ?> required>
                                </div>

                                <div class="col-md-2">
                                    <label for="pin_code">Pin Code</label>
                                    <input type="text" class="form-control" id="pin_code" name="pin_code" <?php echo 'value="' . $pin_code . '"'; ?> placeholder="Pin code or Zip code" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" <?php echo 'value="' . $country . '"'; ?> placeholder="Country" required>
                                </div>

                            </div>
                            <hr>

                            <div class="form-row row">
                                <div class="col-md-4">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                        <?php echo 'value="' . $email . '"'; ?> required readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" <?php echo 'value="' . $phone_number . '"'; ?> placeholder="1234567890"
                                        pattern="[0-9]{10}" maxlength="10" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="review">Password</label>
                                    <input type="password" class="form-control" id="review" name="password" <?php echo 'value="' . $password . '"'; ?> placeholder="Enter your password" required
                                        readonly>
                                </div>

                                <div class="col-md-11">

                                </div>
                                <div class="col-md-1">
                                    <button type="submit" id="saveButton" class="btn btn-solid w-auto">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>

    <script>
        var tokenid = "<?php echo session_id(); ?>";

        document.getElementById('myForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Call your custom function
            autoverify_and_validate_email_with_http();
        });


        // document.addEventListener('DOMContentLoaded', function () {
        //     // Get the form element
        //     var form = document.getElementById('myForm');

        //     // Add an event listener for form submission
        //     form.addEventListener('submit', function (event) {
        //         // Prevent the default form submission
        //         event.preventDefault();

        //         // Call the function to handle the AJAX submission
        //         submitFormAjax();
        //     });

        //     function submitFormAjax() {
        //         var formData = new FormData(form);
        //         var fname =document.getElementById("fname").value;

        //         // Send the form data using AJAX
        //         var xhr = new XMLHttpRequest();
        //         xhr.open('POST', 'api-call.php?type=myaccount&fname=' + '&tkn=' + tokenid, true);
        //         xhr.onreadystatechange = function () {
        //             if (xhr.readyState === XMLHttpRequest.DONE) {
        //                 if (xhr.status === 200) {
        //                     var data = xhr.responseText;
        //                     // Successful response, you can handle the response here
        //                     console.log('Form submitted successfully');
        //                 } else {
        //                     // Handle error
        //                     console.error('Form submission failed');
        //                 }
        //             }
        //         };
        //         xhr.send(formData);
        //     }
        // });


        function autoverify_and_validate_email_with_http() {
            var email = document.getElementById('email').value;
            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var street = document.getElementById('street').value;
            var city = document.getElementById('city').value;
            var state = document.getElementById('state').value;
            var pin_code = document.getElementById('pin_code').value;
            var country = document.getElementById('country').value;
            var phone_number = document.getElementById('phone_number').value;

            var xhr = new XMLHttpRequest();
            xhr.open('GET',
                'api-call.php?&type=myaccount&email=' +
                email + '&lname=' + lname + '&street=' + street + '&city=' + city + '&state=' + state + '&pin_code=' + pin_code + '&country=' + country + '&phone_number=' + phone_number + '&fname=' + fname + '&tkn=' + tokenid, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var data = xhr.responseText;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Cool',
                            text: "Your Profile Updated Successfully.",
                            icon: 'success',
                            showCancelButton: false, // Hide the Cancel button
                            confirmButtonColor: '#28A745',
                            confirmButtonText: 'OK', // Change the Confirm button text to 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php';
                            }
                        });
                    }
                }
            };
            xhr.send();
        };



    </script>
</body>