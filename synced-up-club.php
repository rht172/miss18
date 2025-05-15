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


        <section>
            <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
                <div>
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/refer/refer.jpg">
                    </div>
                </div>
        </section>


        <section class=" position-relative overflow-hidden pt-8 pb-8" data-bs-theme="" id="products" style="background-color: #FFF4E2;">
            <div class="container position-relative">

                <div class="pt-5 pb-0">
                    <div>
                        <h2 class=" text-center ">HOW IT WORKS</h2>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-3 gy-5 gy-md-7 mt-0 pb-5">

                    <div class="col">
                        <div class="text-center">
                            <!-- <i class="ci-edit h3 mt-2 mb-4 text-primary" style="font-size: 3em;"></i> -->

                            <img src="img/icon/note.png" alt="" width='60'>

                            <h3 class="mb-2 mt-2 text-center ">Sign Up</h3>
                            <p class="text-center ">
                                Get 25 points <br> when you create an account.
                            </p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="text-center">
                            <!-- <i class="ci-diamond h3 mt-2 mb-4 text-primary" style="font-size: 3em;"></i> -->

                            <img src="img/icon/hand.png" alt="" width='60'>

                            <h3 class="mb-2 mt-2 text-center ">Earn Points
                            </h3>
                            <p class="text-center ">
                                Earn points every time <br> you shop with us.
                            </p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="text-center">
                            <!-- <i class="ci-gift h3 mt-2 mb-4 text-primary" style="font-size: 3em;"></i> -->

                            <img src="img/icon/gift.png" alt="" width='60'>

                            <h3 class="mb-2 mt-2 text-center ">Redeem
                            </h3>
                            <p class="text-center ">
                                Redeem your points for <br> exclusive discounts and free products.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="container-fluid pt-lg-3 mb-4 mb-sm-5 mt-4">
            <div class="text-center mb-4">
                <h1 class="hero__title heading-size-6 aos-animate" data-aos="hero" data-aos-anchor="#Rte--template--15694955642995__e811f1d1-d2c2-4aae-bef3-39e4af6eb0aa" data-aos-order="1"> Ways to Earn Points </h1>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/rupee1.png" alt="">
                            <!-- <i class="ci-rupee h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">Earn 10 Points</h3>
                            <p class="fs-sm text-muted">on every Rs 1000 Spent</p>
                        </div>
                    </a></div>
                <hr class="d-sm-none">
                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/rupee.png" alt="">
                            <!-- <i class="ci-rupee h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">Redeem Your Points</h3>
                            <p class="fs-sm text-muted">1 Point = Rs 1 Off</p>

                        </div>
                    </a></div>
                <hr class="d-sm-none">
                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/add-friend.png" alt="">
                            <!-- <i class="ci-user h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">25 Points</h3>
                            <p class="fs-sm text-muted">Create an account</p>

                        </div>
                    </a></div>
                <hr class="d-sm-none">

                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/birthdaycake.png" alt="">
                            <!-- <i class="ci-gift h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">50 Points</h3>
                            <p class="fs-sm text-muted">Birthday Gift</p>

                        </div>
                    </a></div>
                <hr class="d-sm-none">
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/whatsapp.png" alt="">
                            <!-- <i class="ci-message h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">20 Points</h3>
                            <p class="fs-sm text-muted">Sign up for Texts</p>

                        </div>
                    </a></div>
                <hr class="d-sm-none">

                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/gmail.png" alt="">
                            <!-- <i class="ci-mail h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">20 points</h3>
                            <p class="fs-sm text-muted">Sign up for Emails</p>

                        </div>
                    </a></div>
                <hr class="d-sm-none">

                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/instagram.png" alt="">
                            <!-- <i class="ci-instagram h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">10 Points</h3>
                            <p class="fs-sm text-muted">Follow us on Instagram</p>

                        </div>
                    </a></div>
                <hr class="d-sm-none">

                <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#" data-scroll="">
                        <div class="card-body text-center"><img class="h3 mt-2 mb-4 text-primary" src="assets/icons/facebook.png" alt="">
                            <!-- <i class="ci-facebook h3 mt-2 mb-4 text-primary"></i> -->
                            <h3 class="h6 mb-2">10 Points</h3>
                            <p class="fs-sm text-muted">Like us on Facebook</p>

                        </div>
                    </a></div>
                <hr class="d-sm-none">
            </div>
        </section>

    </main>
    </main>
    <!-- Footer-->

</body>

<?php include 'includes/footer.php' ?>

</html>