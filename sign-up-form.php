<?php
if (!function_exists('czGet')) {
    include 'includes/myFunctions.php';
    // include 'css/theme.min.css';
    // include 'includes/title.php';
}



if (isset($_SESSION['tid'])) {
    $customer_id_001 = $_SESSION['tid'];
} else {
    $customer_id_001 = '';
}

$currentUrl = $_SERVER['REQUEST_URI'];
$sign_in = "";
$sign_up = "";
$fname = "";
$lname = "";
$email = "";
$pop_up = "";

if (strpos($currentUrl, 'checkout-details.php') == true && strlen($customer_id_001) == 0 && strpos($currentUrl, 'password_mismatch') == false && strpos($currentUrl, 'signup_success') == false) {
    $sign_in = 'active show';
    $checkout_details = 'checkout_details';
} else {
    $checkout_details = '';
}



$key1 = czGet('key1');

switch ($key1) {
    case "invalidlogin":
        $sign_in = 'active show';
        break;
    case "password_mismatch":
        $sign_up = 'active show';

        $fname = czGet('fname');
        $lname = czGet('lname');
        $email = czGet('email');
        break;
    case "signup_success":
        $sign_in = 'active show';
        break;
    default:
        $sign_in = 'active show'; // Or handle other cases differently
        break;
}




// Sign in with Google ---------------------------------------------------------



// include_once ("google-api-php-client/config.php");
// include_once ("google-api-php-client/includes/functions.php");

//print_r($_GET);die;

if (isset($_REQUEST['code'])) {
    $gClient->authenticate();
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

// if (isset($_SESSION['token'])) {
//     $gClient->setAccessToken($_SESSION['token']);
// }

// if ($gClient->getAccessToken()) {
//    // $userProfile = $google_oauthV2->userinfo->get();
//     //DB Insert
//     // $gUser = new Users();
//     // $gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
//     //$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
//     // header("location: account-profile.php");
//     $_SESSION['token'] = $gClient->getAccessToken();
// } else {
//     $authUrl = $gClient->createAuthUrl();
// }


?>
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header bg-secondary">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link fw-medium <?php echo $sign_in ?>" href="#signin-tab"
                            data-bs-toggle="tab" role="tab" aria-selected="true"><i
                                class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium <?php echo $sign_up ?>" href="#signup-tab"
                            data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign
                            up</a></li>
                </ul>
                <?php if ($checkout_details != "checkout_details") { ?>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php } ?>
            </div>
            <div class="modal-body tab-content py-4">

                <div id="incorrect_psw">

                </div>


                <?php

                if (czGet('key1') == "invalidlogin") {
                    echo '<div class="alert alert-danger" id="invalid_login">
                  <strong>Oops!</strong> Sorry Invalid Login.
                  </div>';
                } else if (czGet('key1') == "password_mismatch") {
                    echo '<div class="alert alert-danger" id="password_mismatch">
                  <strong>Oops!</strong> Password Mismatch..
                  </div>';
                }


                ?>
                <script>
                    var myParamKey1 = getUrlParameter("key1");

                    if (myParamKey1.length > 0) {

                        // Function to hide the alert div
                        if (myParamKey1 == 'invalidlogin') {
                            function hideAlert() {
                                document.getElementById('incorrect_psw').innerHTML = "";
                                var alertDiv = document.getElementById('invalid_login');
                                alertDiv.style.display = 'none';
                            }
                        } else if (myParamKey1 == 'password_mismatch') {
                            function hideAlert() {
                                document.getElementById('incorrect_psw').innerHTML = "";
                                var alertDiv = document.getElementById('password_mismatch');
                                alertDiv.style.display = 'none';
                            }
                        }

                        // Set a timeout of 5 seconds (5000 milliseconds)
                        var timeout = 5000;
                        setTimeout(hideAlert, timeout);
                    }
                </script>

                <!-- login form ---------------------------------------------------------------------------------- -->


                <form class="needs-validation tab-pane fade show <?php echo $sign_in ?>" autocomplete="off" novalidate
                    id="signin-tab" action="loginauth.php?checkout_details=<?php echo $checkout_details ?>"
                    method="post">
                    <div class="mb-3">
                        <label class="form-label" for="si-email">Email address</label>
                        <input class="form-control" type="email" id="si-email" name="email"
                            placeholder="example@example.com" required autocomplete="off">
                        <div class="invalid-feedback">Please provide a valid email address.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="si-password">Password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="si-password" name="password" required
                                autocomplete="off">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <!-- <div class="mb-3 d-flex flex-wrap justify-content-between">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="si-remember">
                            <label class="form-check-label" for="si-remember">Remember me</label>
                        </div><a class="fs-sm" href="#">Forgot password?</a>
                    </div> -->


                    <!-- <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6Lf7QQElAAAAAJL-nju7RoeJh0X57mHOu5FZatA4"
                        data-callback="verifyCaptcha">
                    </div> -->


                    <button class="btn btn-success btn-shadow d-block w-100 mt-3" type="submit">Sign in</button>

                </form>


                <!-- sign up form --------------------------------------------------------------------------------------- -->


                <form class="needs-validation tab-pane fade sign_up_form <?php echo $sign_up ?>" autocomplete="off"
                    id="signup-tab" action="user-ctrl.php?key1=sign_up&checkout_details=<?php echo $checkout_details ?>"
                    method="post">
                    <div class="mb-3">
                        <label class="form-label" for="first_name">First name</label>
                        <input class="form-control" type="text" id="first_name" name="first_name"
                            value="<?php echo $fname ?>" placeholder="First Name" required>
                        <div class="invalid-feedback">Please fill in your First name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="last_name">Last name</label>
                        <input class="form-control" type="text" id="last_name" name="last_name"
                            value="<?php echo $lname ?>" placeholder="Last Name" required>
                        <div class="invalid-feedback">Please fill in your Last name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email address</label>
                        <input class="form-control" type="email" id="email" name="email" value="<?php echo $email ?>"
                            placeholder="example@example.com" required autocomplete="off">
                        <div class="invalid-feedback">Please provide a valid email address.</div>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label" for="su-password">Password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="password" name="password" required>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="su-password-confirm">Confirm password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="confirm_password" name="confirm_password"
                                required>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div> -->

                    <div class="mb-3">
                        <label class="form-label" for="su-password">Password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="password" name="password" required
                                autocomplete="off">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox">
                                <span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="su-password-confirm">Confirm password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="confirm_password" name="confirm_password"
                                required autocomplete="off">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox">
                                <span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>


                    <div class="mb-3 d-none" id="verify_otp_div">
                        <label class="form-label" for="verify_otp">OTP</label>
                        <input class="form-control" type="text" id="verify_otp" name="verify_otp">
                    </div>


                    <div class="g-recaptcha d-flex justify-content-center"
                        data-sitekey="6Lf7QQElAAAAAJL-nju7RoeJh0X57mHOu5FZatA4" data-callback="verifyCaptcha">
                    </div>



                    <button class="btn btn-success btn-shadow d-block w-100 mt-3" type="submit" id="sign_up_otp">Sign
                        up</button>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS from a CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    var currentUrl = window.location.href;
    var cus001_id = "<?php echo $customer_id_001; ?>";
    let captcha = "";

    if (currentUrl.includes('checkout-details.php') && cus001_id.length === 0) {
        var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

        // Trigger the modal
        signInModal.show();

    } else {

    }


    var myParamKey2 = getUrlParameter("reward_points");


    if (myParamKey2 == "added") {
        Swal.fire({
            icon: 'success',
            title: 'Hurray...',
            text: '50 reward points Added to your account!!!',
            confirmButtonColor: 'green'
        });


        //Destroy key1 parameter after loading

        // Get the current URL
        var url = window.location.href;

        // Remove the parameters by creating a new URL without them
        var updatedURL = url
            .replace(/([?&])reward_points=.*?(&|$)/, '$1')
            .replace(/(&|\?)$/, '');

        // Replace the current URL with the updated one
        window.history.replaceState({}, document.title, updatedURL);

    }




    function verifyCaptcha(response) {
        // Sending a POST request to your server with the reCAPTCHA response
        fetch('verification_script.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'g-recaptcha-response=' + response
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (data.success === true) {
                    captcha = "success";
                } else {
                    captcha = "failed";
                }
                console.log(captcha);
            });
    }




    var myParamKey3 = getUrlParameter("key1");

    if (myParamKey3 == "invalidlogin") {
        // Swal.fire({
        //   icon: 'warning',
        //   title: 'Oops...',
        //   text: 'Invalid Login!',
        //   confirmButtonColor: '#ff0000'
        // });


        var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

        // Trigger the modal
        signInModal.show();


        // Destroy key1 parameter after loading

        // Get the current URL
        var url = window.location.href;

        // Remove the parameters by creating a new URL without them
        var updatedURL = url
            .replace(/([?&])key1=.*?(&|$)/, '$1')
            // .replace(/([?&])updateKey=.*?(&|$)/, '$1')
            // .replace(/([?&])insertID=.*?(&|$)/, '$1')
            .replace(/(&|\?)$/, '');

        // Replace the current URL with the updated one
        window.history.replaceState({}, document.title, updatedURL);

    }


    if (myParamKey3 == "password_mismatch") {

        var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

        // Trigger the modal
        signInModal.show();


        // Get the current URL
        var url = window.location.href;

        // Remove the parameters by creating a new URL without them
        var updatedURL = url
            .replace(/([?&])key1=.*?(&|$)/, '$1')
            .replace(/([?&])fname=.*?(&|$)/, '$1')
            .replace(/([?&])lname=.*?(&|$)/, '$1')
            .replace(/([?&])email=.*?(&|$)/, '$1')
            .replace(/(&|\?)$/, '');

        // Replace the current URL with the updated one
        window.history.replaceState({}, document.title, updatedURL);

    }



    if (myParamKey3 == "signup_success") {

        var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

        // Trigger the modal
        signInModal.show();


        // Get the current URL
        var url = window.location.href;

        // Remove the parameters by creating a new URL without them
        var updatedURL = url
            .replace(/([?&])key1=.*?(&|$)/, '$1')
            .replace(/(&|\?)$/, '');

        // Replace the current URL with the updated one
        window.history.replaceState({}, document.title, updatedURL);

    }

    let encodedString = "OEZrbVlaRmVZcVloYjMvanpwNUpHQT09Ojo7twL5IEX1ONLjk8jW0TWP";
    let decodedString = atob(encodedString);
   // console.log(decodedString);


    let t = 0;

    $(document).ready(function () {

        $(".sign_up_form").submit(function (event) {
            event.preventDefault(); // Prevent form submission by default

            var password = $("#password").val();

            // console.log(password);
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
            } else {

                if (captcha == 'success') {
                    var v_email = document.getElementById("email").value;

                    var xhr_1 = new XMLHttpRequest();
                    xhr_1.open('GET', 'api-call.php?type=verify_email' + '&email=' + v_email + '&tkn=' +
                        tokenid, true);
                    xhr_1.onload = function () {
                        if (xhr_1.status === 200) {
                            var data_1 = xhr_1.responseText;

                            if (data_1 == "already exists") {

                                document.getElementById('incorrect_psw').innerHTML = "";

                                var mailExistsSentHTML = `
                            <div class="alert alert-success" id="email_exists_div">
                  <strong>Cool!</strong> This email already exists..
                  </div>
            `;


                                document.getElementById('incorrect_psw').insertAdjacentHTML('beforeend', mailExistsSentHTML);


                                function mailExistsAlert() {
                                    var otpDiv = document.getElementById('email_exists_div');
                                    otpDiv.style.display = 'none';
                                }

                                var timeout = 5000;
                                setTimeout(mailExistsAlert, timeout);

                            } else {


                                if (t == 0) {

                                    document.getElementById('incorrect_psw').innerHTML = "";

                                    var mailSentHTML = `
                            <div class="alert alert-success" id="mail_sent_div">
                  <strong>Cool!</strong> OTP sent to your email..
                  </div>
            `;


                                    document.getElementById('incorrect_psw').insertAdjacentHTML('beforeend', mailSentHTML);


                                    function mailSentAlert() {
                                        var otpDiv = document.getElementById('mail_sent_div');
                                        otpDiv.style.display = 'none';
                                    }

                                    var timeout = 5000;
                                    setTimeout(mailSentAlert, timeout);

                                    t++;

                                }

                                $('#first_name').prop('readonly', true);
                                $('#last_name').prop('readonly', true);
                                $('#email').prop('readonly', true);
                                $('#password').prop('readonly', true);
                                $('#confirm_password').prop('readonly', true);
                                $('#verify_otp_div').removeClass('d-none');

                                var email = document.getElementById("email").value;
                                var first_name = document.getElementById("first_name").value;

                                var xhr = new XMLHttpRequest();
                                xhr.open('GET', 'api-call.php?type=verify_otp' + '&email=' + email + '&first_name=' +
                                    first_name + '&tkn=' +
                                    tokenid, true);
                                xhr.onload = function () {
                                    if (xhr.status === 200) {
                                        var data = xhr.responseText;


                                        var r_otp = data;
                                        // console.log(r_otp);


                                        let expiryTime = new Date().getTime() + 5 * 60 * 1000; // 5 minutes in milliseconds


                                        $("#sign_up_otp").on('click', function () {


                                            // console.log(expiryTime);

                                            if (new Date().getTime() > expiryTime) {

                                                // console.log(expiryTime);

                                                document.getElementById('incorrect_psw').innerHTML = "";

                                                var otpHTML = `
                            <div class="alert alert-danger" id="otp_time_out">
                  <strong>Oops!</strong> OTP Timed Out..
                  </div>
            `;


                                                document.getElementById('incorrect_psw').insertAdjacentHTML(
                                                    'beforeend', otpHTML);


                                                function hideOtpAlert() {
                                                    var otpDiv = document.getElementById('otp_time_out');
                                                    otpDiv.style.display = 'none';
                                                }

                                                var timeout = 5000;
                                                setTimeout(hideOtpAlert, timeout);


                                            } else {

                                                var verify_otp = document.getElementById("verify_otp").value;

                                                if (verify_otp == r_otp) {
                                                    $("form").unbind('submit').submit();
                                                } else {

                                                    document.getElementById('incorrect_psw').innerHTML = "";

                                                    var otpHTML = `
                            <div class="alert alert-danger" id="incorrect_otp">
                  <strong>Oops!</strong> Wrong OTP..
                  </div>
            `;


                                                    document.getElementById('incorrect_psw').insertAdjacentHTML(
                                                        'beforeend', otpHTML);


                                                    function hideOtpAlert() {
                                                        var otpDiv = document.getElementById('incorrect_otp');
                                                        otpDiv.style.display = 'none';
                                                    }

                                                    var timeout = 5000;
                                                    setTimeout(hideOtpAlert, timeout);

                                                }

                                                // console.log(r_otp);

                                            }

                                        });





                                    }
                                };
                                xhr.send();


                            }

                        }
                    };
                    xhr_1.send();
                } else {
                    alert("Recaptcha Failed!!!");
                }
            }


        });

    });







</script>