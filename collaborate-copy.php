<!DOCTYPE html>
<html lang="en">


<style>
    @media (min-width: 768px) {
  .content_div {
    padding : 0%;
  }
}

</style>

<?php
session_start();
ob_start();

include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
?>
<?php
include 'includes/title.php';
?>
<?php

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



<body class="handheld-toolbar-enabled" >

    <noscript>
        <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>


    <?php
    include 'sign-up-form.php';
    ?>

    <main class="page-wrapper">

    
        <?php
        include 'includes/header.php';

        $processName = czGet('key1');

     
        if (strlen($processName) == 0) {
            $processName = "insert";
        }
        ?>
  

        <form action="collaborate-ctrl.php?key1=<?php echo $processName; ?>" method="post"
            enctype="multipart/form-data">
            <div class="container-fluid p-0 p-sm-3 " >
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center" style="background-color:rgb(213,241,253);">
                        <div class='col-md-8 mt-3 mb-2'>

                            <div class="row mt-4 mb-4">

                                <h1 class="d-flex justify-content-center h3 "><strong>LET'S COLLABORATE</strong></h1>

                            </div>

                            <div class="row mb-3">

                                <ul>
                                    <p class="fs-6 fw-bold"> &#x1f91d; ZOY is a new women’s health brand and community, leading
                                        the
                                        movement to Worship
                                        your Body.
                                    </p>
                                    <p class="fs-6 fw-bold">&#x1f91d; If you are a brand or influencer interested in
                                        collaborating with
                                        ZOY and joining our
                                        mission of female empowerment and community building, then we want to hear from
                                        you!
                                    </p>
                                    <p class="fs-6 fw-bold">&#x1f91d; Each collaboration opportunity is determined on a
                                        case-by-case
                                        basis. To get the
                                        conversation started, please fill out the form below. Include as much
                                        information about
                                        your idea or project as possible, and we will be sure to respond to your request
                                        within
                                        48 hours. We’re excited to team up and make great things happen together!
                                    </p>
                                </ul>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" style="font-weight:bold">Name</label>
                                    <input type="text" class="form-control lets_collo" id="name" name="contact_person"
                                        placeholder="Name" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="website" style="font-weight:bold">Website</label>
                                    <input type="text" class="form-control lets_collo" id="website" name="website"
                                        placeholder="Company Name" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="contact_number" style="font-weight:bold">Contact Number</label>
                                    <input type="text" class="form-control lets_collo" id="contact_number"
                                        name="contact_number" placeholder="XXXXXXXXXX" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email" style="font-weight:bold">E-Mail</label>
                                    <input type="text" class="form-control lets_collo" id="email" name="email"
                                        placeholder="examble@examble.com" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="other_details" style="font-weight:bold">Address</label>
                                    <input type="text" class="form-control lets_collo" id="other_details"
                                        name="other_details" placeholder="Address" autocomplete="off" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="state" style="font-weight:bold">State</label>
                                    <select onchange="print_city('state', this.selectedIndex);" id="st" name="state"
                                        class="form-control lets_collo" required></select>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="review" style="font-weight:bold">City</label>
                                    <select id="state" name="city" class="form-control lets_collo" required></select>
                                </div>
                                <div class="col-md-6">
                                    <label for="review" style="font-weight:bold">Pincode</label>
                                    <input type="text" class="form-control lets_collo" id="reference_no"
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
                    <div class="col-md-6" style="background-image: url('img/sub/let-coll.jpg'); background-size: cover;">
                    </div>  

                </div>
            </div>
        </form>


    </main>
    <?php include 'includes/footer.php' ?>
    </body>









<script src="assets/js/cities.js"></script>
<script language="javascript">
    print_state("st");
</script>

</html>

















    <?php
    include 'sign-up-form.php';

        include 'includes/header.php';


        $processName = czGet('key1');

     
        if (strlen($processName) == 0) {
            $processName = "insert";
        }
        ?>
  

        <form action="collaborate-ctrl.php?key1=<?php echo $processName; ?>" method="post"
            enctype="multipart/form-data">
            <div class="container-fluid content_div" >
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center" style="background-color:rgb(213,241,253);">
                        <div class='col-md-8 mt-3 mb-2'>

                            <div class="row mt-4 mb-4">

                                <h1 class="d-flex justify-content-center h3 "><strong>LET'S COLLABORATE</strong></h1>

                            </div>

                            <div class="row mb-3">

                                <ul>
                                    <p class="fs-6 fw-bold"> &#x1f91d; ZOY is a new women’s health brand and community, leading
                                        the
                                        movement to Worship
                                        your Body.
                                    </p>
                                    <p class="fs-6 fw-bold">&#x1f91d; If you are a brand or influencer interested in
                                        collaborating with
                                        ZOY and joining our
                                        mission of female empowerment and community building, then we want to hear from
                                        you!
                                    </p>
                                    <p class="fs-6 fw-bold">&#x1f91d; Each collaboration opportunity is determined on a
                                        case-by-case
                                        basis. To get the
                                        conversation started, please fill out the form below. Include as much
                                        information about
                                        your idea or project as possible, and we will be sure to respond to your request
                                        within
                                        48 hours. We’re excited to team up and make great things happen together!
                                    </p>
                                </ul>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" style="font-weight:bold">Name</label>
                                    <input type="text" class="form-control lets_collo" id="name" name="contact_person"
                                        placeholder="Name" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="website" style="font-weight:bold">Website</label>
                                    <input type="text" class="form-control lets_collo" id="website" name="website"
                                        placeholder="Company Name" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="contact_number" style="font-weight:bold">Contact Number</label>
                                    <input type="text" class="form-control lets_collo" id="contact_number"
                                        name="contact_number" placeholder="XXXXXXXXXX" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email" style="font-weight:bold">E-Mail</label>
                                    <input type="text" class="form-control lets_collo" id="email" name="email"
                                        placeholder="examble@examble.com" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="other_details" style="font-weight:bold">Address</label>
                                    <input type="text" class="form-control lets_collo" id="other_details"
                                        name="other_details" placeholder="Address" autocomplete="off" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="state" style="font-weight:bold">State</label>
                                    <select onchange="print_city('state', this.selectedIndex);" id="st" name="state"
                                        class="form-control lets_collo" required></select>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="review" style="font-weight:bold">City</label>
                                    <select id="state" name="city" class="form-control lets_collo" required></select>
                                </div>
                                <div class="col-md-6">
                                    <label for="review" style="font-weight:bold">Pincode</label>
                                    <input type="text" class="form-control lets_collo" id="reference_no"
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
                    <div class="col-md-6" style="background-image: url('img/sub/let-coll.jpg'); background-size: cover;">
                    </div>  

                </div>
            </div>
        </form>

    <?php include 'includes/footer.php' ?>
