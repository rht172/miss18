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
                   
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Whole Sale & Retail</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                    <h1 class="h3 mb-0">LET’S WORK TOGETHER!</h1>
                </div>
            </div>
        </div> -->

        <form action="wholesale-retail-ctrl.php?key1=<?php echo $processName; ?>" method="post"
            enctype="multipart/form-data">
            <!-- <div class="container-fluid p-0"> -->
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center mb-0 p-0" style="background-color:rgb(213,241,253);">
                        <div class='col-md-8 mt-4'>

                            <div class="row mt-3 mb-3">

                                <h1 class="d-flex justify-content-center h3 "><strong>Let's create a healthy lifestyle together!</strong></h1>

                            </div>

                            <div class="row mb-3">

                                <p class="fs-6 fw-bold">We are grateful for your interest in becoming an authorized ZOY
                                    stockist/Retailer. To
                                    become a Stockist, you must have a minimum experience/ interest in selling FMCG
                                    products.To Become Retailer you must have a retail storefront, booth, or online
                                    website
                                    with your own domain. After reviewing the below mentioned terms & policies, please
                                    complete the form below, and we will be in touch with you soon.</p>
                            </div>

                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="email" style="font-weight:bold">Name</label>
                                    <input type="text" class="form-control lets_collo" id="name" name="contact_person" <?php echo 'value="' . $contact_person . '"'; ?> placeholder="Name" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" style="font-weight:bold">Company Name</label>
                                    <input type="text" class="form-control lets_collo" id="company_name" name="company_name" <?php echo 'value="' . $company_name . '"'; ?> placeholder="Company Name" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="review" style="font-weight:bold">Contact Number</label>
                                    <input type="text" class="form-control lets_collo" id="contact_number" name="contact_number" placeholder="XXXXXXXXXX"
                                        <?php echo 'value="' . $contact_number . '"'; ?> autocomplete="off" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email" style="font-weight:bold">E-Mail</label>
                                    <input type="text" class="form-control lets_collo" id="email" name="email" <?php echo 'value="' . $email . '"'; ?> placeholder="examble@examble.com" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="email" style="font-weight:bold">Address</label>
                                    <input type="text" class="form-control lets_collo" id="other_details" name="other_details"
                                        <?php echo 'value="' . $other_details . '"'; ?> placeholder="Address" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="review" style="font-weight:bold">State</label>
                                    <select onchange="print_city('state', this.selectedIndex);" id="st" name="state"
                                        class="form-control lets_collo"  required></select>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="review" style="font-weight:bold">City</label>
                                    <select id="state" name="city" class="form-control lets_collo" required></select>
                                </div>
                                <div class="col-md-6">
                                    <label for="review" style="font-weight:bold">Pincode</label>
                                    <input type="text" class="form-control lets_collo" id="reference_no" name="reference_no" placeholder="XXX-XXX" <?php echo 'value="' . $reference_no . '"'; ?> autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6 mb-4">
                                    <label for="review" style="font-weight:bold">You Want To Become</label>
                                    <select type="select" class="form-select lets_collo" id="category" name="category" <?php echo 'value="' . $category . '"'; ?> required>
                                        <option value=""></option>
                                        <option value="Stockist">Stockist</option>
                                        <option value="Reseller">Reseller</option>
                                        <option value="C & F">C & F</option>
                                        <option value="Retailer">Retailer</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-md-6 d-none">
                                    <label for="review" style="font-weight:bold">Lead Source</label>
                                    <input type="text" class="form-control lets_collo" id="lead_source" name="lead_source"
                                        value="zoygirl.com" required>
                                </div>
                                <div class="col-md-6 d-none">
                                    <label for="review" style="font-weight:bold">Stage</label>
                                    <input type="text" class="form-control lets_collo" id="lead_status" name="lead_status"
                                        value="Not Yet Assigned" required>
                                </div>


                                <div class="g-recaptcha" data-sitekey="6Lf7QQElAAAAAJL-nju7RoeJh0X57mHOu5FZatA4">
                                </div>


                                <div class="col-md-6">
                                    <label for="">&nbsp;</label>
                                    <br>
                                    <button type="submit" class="btn btn-primary float-right">Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 p-0"> -->
                    <div class="col-md-6" style="background-image: url('img/sub/bap-1.jpg'); background-size: cover;">
                    </div>
                    <!-- </div> -->
                </div>
            <!-- </div> -->
        </form>




        <section class="container">
            <div class="container py-3 my-md-3 ">
                <h2 class="h6 pb-3 mb-2 text-center" style="color:#fe696a;">TERMS AND POLICIES:</h2>
                <div class="accordion mb-2" id="payment-method">
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button" href="#card1"
                                data-bs-toggle="collapse">STOCKIST:
                            </a></h3>
                        <div class="accordion-collapse collapse" id="card1" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>Minimum investment of Rs. 4 to 5 Lakhs is required for opening orders. Re-orders with
                                    a minimum of one lakh is encouraged.We greatly encourage the implementation of
                                    classes, demos, and workshops to build customer and community awareness. In order
                                    to help do so, we offer related support and resources to our stockists.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points2"
                                data-bs-toggle="collapse">MRP/MAP</a></h3>
                        <div class="accordion-collapse collapse" id="points2" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <ul>
                                    <li>ZOY will provide an MRP and MAP (minimum advertised price) in order to maintain
                                        a
                                        healthy sales model. If a stockist chooses to place products for sale at a
                                        discount,
                                        the
                                        wholesale account shall not discount the products more than 15% below MRP.</li>
                                    <li>Permission for special sale events beyond the 15% discount by the wholesale
                                        account
                                        must be requested in writing to info@zoycare.in & get approved as a special
                                        case.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points3"
                                data-bs-toggle="collapse">RETAILER:</a></h3>
                        <div class="accordion-collapse collapse" id="points3" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>For Retailers Order minimum is 100 packs, Re-orders have no minimum.To become
                                    Retailer, you must currently have retail storefront, a booth within a large retail
                                    store in
                                    great location, or you must have an independent domain owned by you that is
                                    currently
                                    live with an active URL and shopping cart function. Applications to sell on third
                                    party
                                    websites such as Amazon, Flipkart,Meesho and other E-market places are not
                                    permitted.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points4"
                                data-bs-toggle="collapse">WHOLESALE PRICING</a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points4" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>All prices are listed in Indian Rupees. Prices are subject to change without notice.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points5"
                                data-bs-toggle="collapse">
                                PAYMENTS
                            </a></h3>
                        <div class="accordion-collapse collapse" id="points5" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>We accept credit card payments and Net Banking required at the time your order is
                                    placed. Pre-orders will be charged at time of shipping.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points6"
                                data-bs-toggle="collapse">
                                SHIPPING
                            </a></h3>
                        <div class="accordion-collapse collapse" id="points6" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>Shipping is not included in the cost of goods. Your final invoice will reflect the
                                    detailed
                                    shipping cos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <!-- Footer-->
    <?php include 'includes/footer.php' ?>

</body>





<script src="assets/js/cities.js"></script>
<script language="javascript">
    print_state("st");
</script>

</html>