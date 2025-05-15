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

        <!-- BANNER -->
        <section>
            <div class="tns-carousel-inner"
                data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
                <div>
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/sub/sub.jpg">
                    </div>
                </div>
        </section>


        <!-- Icon -->
        <section class="container-fluid" style="background-color : #FDFADB">
            <div>
                <div class="row pt-5 pb-5">
                    <div class="d-flex justify-content-center">
                        <h1>How it Works</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class=" h-100" href="#" data-scroll="">
                            <div class="card-body text-center mb-5">
                                <img class="h3 mt-2 mb-4 text-primary" src="assets/icons/subsubscription1.jpg" alt=""
                                    style="max-width: 200px;">
                                <!-- <i class="ci-bag h3 mt-2 mb-4 text-primary" style="font-size: 3em;"></i> -->
                                <h3 class="h6 fw-bold fs-lg mb-2">Shop Your Favorites</h3>
                                <p class="fs-sm text-muted">Choose a product and <br> “Subscribe Upto 20%”.
                                </p>
                            </div>
                        </a></div>
                    <hr class="d-sm-none">

                    <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class=" h-100" href="#" data-scroll="">
                            <div class="card-body text-center mb-5">
                                <img class="h3 mt-2 mb-4 text-primary" src="assets/icons/subsubscription2.jpg" alt=""
                                    style="max-width: 200px;">
                                <!-- <i class="ci-loudspeaker h3 mt-2 mb-4 text-primary" style="font-size: 3em;"></i> -->
                                <h3 class="h6 mb-2 fw-bold fs-lg">Create Your Subscription</h3>
                                <p class="fs-sm text-muted"> Things Change Adjust Your
                                    <br> Subscription.
                                </p>
                            </div>
                        </a></div>
                    <hr class="d-sm-none">

                    <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class=" h-100" href="#" data-scroll="">
                            <div class="card-body text-center mb-5">
                                <img class="h3 mt-2 mb-4 text-primary" src="assets/icons/subsubscription3.jpg" alt=""
                                    style="max-width: 200px;">
                                <!-- <i class="ci-frozen h3 mt-2 mb-4 text-primary" style="font-size: 3em;"></i> -->
                                <h3 class="h6 mb-2 fw-bold fs-lg">Go With Your Flow </h3>
                                <p class="fs-sm text-muted">Get your ZOY Products <br> conveniently.
                            </div>
                        </a></div>
                    <hr class="d-sm-none">
                </div>
            </div>
        </section>


        <!-- <section >
            <div class="d-lg-flex align-items-center ps-lg-0">
                <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/sub/sub.jpg">

            </div>
        </section> -->


        <section >
            <div class="d-lg-flex align-items-center ps-lg-0">
                <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/sub/how.jpg">

            </div>
        </section>


        <!-- Why Subscribe -->

        <!-- <section class="bg-dark position-relative overflow-hidden pt-8 mb-2 text-center" data-bs-theme="dark"
            id="products">
            <div class="container position-relative">

                <div class="pt-5 pb-2">
                    <div>
                        <h2 class=" text-center text-light">Why Subscribe?</h2>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-3 gy-5 gy-md-7 mt-3 pb-5">

                    <div class="col">
                        <div>
                            <img class="mb-3" src="img/shop/departments/sub1.jpg" alt="Image" class="img-fluid"
                                style="max-width: 300px;">
   
                            <h4 class="mb-2 mt-2 text-center text-light">Save on Every Order</h4>
                            <p class="text-center text-light">
                                Get your must-haves at 20% off <br>
                                + earn 2x the rewards points! And
                                don’t<br>forget free
                                shipping on orders over &#8377;999+.
                            </p>
                        </div>
                    </div>

                    <div class="col">
                        <div>
                            <img class="mb-3" src="img/shop/departments/sub2.jpg" alt="Image" class="img-fluid"
                                style="max-width: 300px;">

                            <h4 class="mb-2 mt-2 text-center text-light">Never Run Out </h4>
                            <p class="text-center text-light">
                                With a subscription, <br> you’ll never have to make a last minute <br>
                                trip to the store
                                again.
                            </p>
                        </div>
                    </div>

                    <div class="col">
                        <div>
                            <img class="mb-3" src="img/shop/departments/sub3.jpg" alt="Image" class="img-fluid"
                                style="max-width: 300px;">

                            <h4 class="mb-2 mt-2 text-center text-light">Enjoy a Better Cycle</h4>
                            <p class="text-center text-light">
                                Put clean cycle care on repeat and <br> feel your best, all cycle long.
                            </p>
                        </div>
                    </div>
                    <div>
                        <P>&nbsp;</P>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- FAQ -->
        <section>
            <div class="container py-3 my-md-3 pt-5">
                <h2 class="h6 pb-3 mb-2 text-center">FAQ</h2>
                <div class="accordion mb-2" id="payment-method">
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button" href="#card1"
                                data-bs-toggle="collapse">How can I subscribe to ZOY?
                            </a></h3>
                        <div class="accordion-collapse collapse show" id="card1" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>It’s easy: Visit the ZOY subscription page, build your subscription, and receive
                                    ZOY at your door.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points2"
                                data-bs-toggle="collapse">Why should I subscribe to ZOY?</a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points2" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>Our subscription makes life easier. Save time with auto-deliveries, enjoy fully
                                    customizable subscriptions of your favourite self-care items, and save 20% on
                                    every order.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points3"
                                data-bs-toggle="collapse">Can I customise my subscription?</a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points3" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>Of course! You can customise your subscription order by product, quantity, and
                                    delivery cadence.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points4"
                                data-bs-toggle="collapse">Will my subscription be renewed automatically after I sign
                                up?</a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points4" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>Great question! Yes, your subscription will be renewed automatically
                                    according to your original settings. However, you can change the subscription
                                    preferences in your profile by choosing to adjust, skip, or cancel the
                                    subscription.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points5"
                                data-bs-toggle="collapse">Can I make changes in my subscription?</a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points5" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>Yes, you can! You’re able to make changes to your next delivery by visiting:
                                    My Account in your ZOY profile at least 24 hours prior to your next renewal
                                    date. If your order processes with any incorrect information, simply edit your
                                    info on the account page.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points6"
                                data-bs-toggle="collapse">When do I need to make changes to meet the deadline of my next
                                subscription?
                            </a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points6" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>To meet the deadline of your next subscription delivery, you need to make
                                    changes to your order at least 24 hours before your next renewal date.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points7"
                                data-bs-toggle="collapse">Can I put my subscription on hold?</a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points7" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>Unfortunately, we are unable to place holds on subscriptions at this time.
                                    Therefore, we recommend that you either switch your subscription to a
                                    bi-monthly delivery or skip your next few orders.</p>
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


</html>