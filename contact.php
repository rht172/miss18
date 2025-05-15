<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
?>
<?php
include 'includes/title.php';
?>
<?php

//Init Variables
$tid = "";
$lead_source = "";
$company_name = "";
$contact_person = "";
$contact_person_designation = "";
$contact_number = "";
$email = "";
$product_name = "";
$category = "";
$qty = "";
$rate = "";
$amount = "";
$city = "";
$state = "";
$agent = "";
$priority = "";
$lead_stage = "";
$assigned_to = "";
$quote_no = "";
$reference_no = "";
$other_details = "";
$appoinment_on = "";
$created_by = "";
$created_on = "";
$last_updated_on = "";
$lead_status = "";
?>

<!-- Body-->

<body class="handheld-toolbar-enabled" >
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>

    <!-- Sign in / sign up modal-->
    <?php
    include 'sign-up-form.php';
    ?>

    <main class="page-wrapper">

        <!-- Navbar 3 Level (Light)-->
        <?php
        include 'includes/header.php';
        ?>
        <?php
        //get The Process Name -insert or delete or update
        $processName = czGet('key1');

        // Assign Default Value to the Process Name
        if (strlen($processName) == 0) {
            $processName = "insert";
        }
        ?>
        <!-- Page Title (Light)-->
        <!-- <div class="bg-secondary py-4">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i
                                        class="ci-home"></i>Home</a></li>
                
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Collaborate</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                    <h1 class="h3 mb-0">Let's Collaborate</h1>
                </div>
            </div>
        </div> -->


        <!-- <section class="container mt-3">
            <ul>
                <li class="fs-md">ZOY is a new women’s health brand and community, leading the movement to Worship
                    your Body.
                </li>
                <li class="fs-md">If you are a brand or influencer interested in collaborating with ZOY and joining our
                    mission of female empowerment and community building, then we want to hear from
                    you!
                </li>
                <li class="fs-md">Each collaboration opportunity is determined on a case-by-case basis. To get the
                    conversation started, please fill out the form below. Include as much information about
                    your idea or project as possible, and we will be sure to respond to your request within
                    48 hours. We’re excited to team up and make great things happen together!
                </li>
            </ul>


        </section> -->

        

        <form action="collaborate-ctrl.php?key1=<?php echo $processName; ?>" method="post"
            enctype="multipart/form-data">
            <div class="container-fluid p-0 p-sm-3 " >
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class='col-md-8 mt-3 mb-2'>

                            <div class="row mt-4 mb-4">

                                <h1 class="d-flex justify-content-center h3 "><strong>Contact Us</strong></h1>

                            </div>

                            <div class="row mb-3">
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" style="font-weight:bold">Name</label>
                                    <input type="text" class="form-control " id="name" name="contact_person"
                                        placeholder="Name" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="website" style="font-weight:bold">Website</label>
                                    <input type="text" class="form-control " id="website" name="website"
                                        placeholder="Company Name" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="contact_number" style="font-weight:bold">Contact Number</label>
                                    <input type="text" class="form-control " id="contact_number"
                                        name="contact_number" placeholder="XXXXXXXXXX" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email" style="font-weight:bold">E-Mail</label>
                                    <input type="text" class="form-control " id="email" name="email"
                                        placeholder="examble@examble.com" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="other_details" style="font-weight:bold">Address</label>
                                    <input type="text" class="form-control " id="other_details"
                                        name="other_details" placeholder="Address" autocomplete="off" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="state" style="font-weight:bold">State</label>
                                    <select onchange="print_city('state', this.selectedIndex);" id="st" name="state"
                                        class="form-control " required></select>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="review" style="font-weight:bold">City</label>
                                    <select id="state" name="city" class="form-control " required></select>
                                </div>
                                <div class="col-md-6">
                                    <label for="review" style="font-weight:bold">Pincode</label>
                                    <input type="text" class="form-control " id="reference_no"
                                        name="reference_no" placeholder="XXX-XXX" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">

                                <div class="col-md-12 mb-2 ">
                                    <label for="yourself" style="font-weight:bold">Tell us more about your
                                        project</label>
                                    <textarea class="lets_textarea" name="yourself" id="yourself" cols="50"
                                        rows="5"></textarea>
                                </div>



                                <div class="g-recaptcha " data-sitekey="6Lf7QQElAAAAAJL-nju7RoeJh0X57mHOu5FZatA4">
                                </div>


                                <div class="col-md-6">
                                    <label for="">&nbsp;</label>
                                    <br>
                                    <button type="submit" class="btn btn-primary float-right">Send</button>
                                </div>

                            </div>
                        </div>
                    </div>
            
                    <!-- <div class="col-md-6">
                        <img src="img/sub/let-coll.jpg" alt="">
                    </div> text-center order-md-2 mt-5 mb-5-->

                </div>
            </div>
        </form>


    </main>
    <!-- Footer-->
    <?php include 'includes/footer.php' ?>

</body>





<script src="assets/js/cities.js"></script>
<script language="javascript">
    print_state("st");
</script>
<script>
    // $(document).ready(function () {
    //     $('.').focus(function () {
    //         $(this).addClass('blue-background');
    //     });

    //     $('.').blur(function () {
    //         $(this).removeClass('blue-background');
    //     });
    // });

    $(document).ready(function() {
        $('title').html('CONTACT PAGE');
    });
</script>

</html>