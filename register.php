<?php
session_start();
?>
<?php
// include 'header.php';
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">
    <title>CloudZoo</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/simple-notify.min.css" />


    <script src="assets/js/simple-notify.min.js"></script>
    <script src="assets/js/czjs.js"></script>



    <!-- <script src="assets/js/czjs.js"></script> -->


</head>

<body class="theme-color-1">

    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>
                    <div class="theme-card">
                        <form class="theme-form" action="user-ctrl.php?key1=insert" method="post" id="myForm">
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="email">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname"
                                        placeholder="First Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname"
                                        placeholder="Last Name" required>
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
                                    <input type="text" class="form-control" id="street" name="street"
                                        placeholder="Street" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                        required>
                                </div>

                                <div class="col-md-2">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="State"
                                        required>
                                </div>

                                <div class="col-md-2">
                                    <label for="pin_code">Pin Code</label>
                                    <input type="text" class="form-control" id="pin_code" name="pin_code"
                                        placeholder="Pin code or Zip code" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Country" required>
                                </div>

                            </div>
                            <hr>

                            <div class="form-row row">
                                <div class="col-md-4">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                        onchange="autoverify_and_validate_email_with_http()" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                        placeholder="1234567890" pattern="[0-9]{10}" maxlength="10" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="review">Password</label>
                                    <input type="password" class="form-control" id="review" name="password"
                                        placeholder="Enter your password" required>
                                </div>

                                <div class="col-md-9">

                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-solid w-auto">create
                                        Account</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
    <!-- </center> -->
    <script src="assets/js/czjs.js"></script>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- fly cart ui jquery-->
    <script src="assets/js/jquery-ui.min.js"></script>

    <!-- exitintent jquery-->
    <script src="assets/js/jquery.exitintent.js"></script>
    <script src="assets/js/exit.js"></script>

    <!-- slick js-->
    <script src="assets/js/slick.js"></script>

    <!-- menu js-->
    <script src="assets/js/menu.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="assets/js/bootstrap-notify.min.js"></script>

    <!-- Fly cart js-->
    <script src="assets/js/fly-cart.js"></script>

    <!-- Theme js-->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var tokenid = "<?php echo session_id(); ?>";




        function autoverify_and_validate_email_with_http() {
            var email = document.getElementById('email').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET',
                'api-call.php?&type=singleData&tbl=customer_table&feildName=email&whereFeildName=email&whereValue=' +
                email + '&tkn=' + tokenid, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var data = xhr.responseText;
                    if (email == data) {

                        // $('#customAlert').modal('show');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Email already exists !',
                            confirmButtonColor: '#3085d6',
                        });

                    }
                }
            };
            xhr.send();
        };

        var form = document.getElementById('myForm');


        document.getElementById('myForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission behavior

            var email = document.getElementById('email').value;
            var xhr = new XMLHttpRequest();

            xhr.open('GET',
                'api-call.php?&type=singleData&tbl=customer_table&feildName=email&whereFeildName=email&whereValue=' +
                email + '&tkn=' + tokenid, true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    var data = xhr.responseText;
                    if (email === data) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Email already exists !',
                            confirmButtonColor: '#3085d6',
                        });

                    } else {
                        document.getElementById('myForm').submit(); // Submit the form if email doesn't exist
                    }
                }
            };

            xhr.send();
        });

        // function hideCustomAlert() {
        //     $('#customAlert').modal('hide');
        //     $('#email').focus();
        //     $('#email').css('color', 'red');

        // }
    </script>
</body>