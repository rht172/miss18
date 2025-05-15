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
//Class Declaration
$obj_class_main = new czDBAccess();
//Assign Table Name
$obj_class_main->varTableName = 'crm_lead_main_table';

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

<body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
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
        <div class="bg-secondary py-4">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                            <!-- <li class="breadcrumb-item text-nowrap"><a href="help-topics.html">Help center</a>
                            </li> -->
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Whole Sale & Retail</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                    <h1 class="h3 mb-0">Become A Partner</h1>
                </div>
            </div>
        </div>
        <div class="container py-5 mt-md-2 mb-2">
            <div class="row">
                <div class="col-md-12">
                    <center><img src="assets/images/wholesalesucces.jpg" alt="">
                        <h2>Thank you for your Request. </h2>
                        <h5>Our Sales team will contact you shortly for further discussion.</h5>
                    </center>
                </div>
            </div>
        </div>

    </main>
    <!-- Footer-->
    <?php include 'includes/footer.php' ?>

</body>
<script src="assets/js/cities.js"></script>
<script language="javascript">
    print_state("st");
</script>

</html>