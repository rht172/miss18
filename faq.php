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


        <!-- Page Title (Light)-->
        <div class="bg-secondary py-4">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                        class="ci-home"></i>Home</a></li>
                            <!-- <li class="breadcrumb-item text-nowrap"><a href="help-topics.html">Help center</a>
                            </li> -->
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">FAQ
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                    <h1 class="h3 mb-0">FAQ</h1>
                </div>
            </div>
        </div>

        <div class="container py-3 my-md-3">
            <h2 class="h6 pb-3 mb-2 text-center">PRODUCT</h2>
            <div class="accordion mb-2" id="payment-method">
                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button" href="#card1"
                            data-bs-toggle="collapse">1.Are all ZOY products made with clean ingredients?
                        </a></h3>
                    <div class="accordion-collapse collapse show" id="card1" data-bs-parent="#payment-method">
                        <div class="accordion-body">
                            <p>ZOY strives to use as many clean ingredients as possible, while ensuring maximum
                                effectiveness and safety for your body and skin</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points2"
                            data-bs-toggle="collapse">2.Are ZOY products safe for all ages?</a></h3>
                    <div class="accordion-collapse collapse" id="points2" data-bs-parent="#payment-method">
                        <div class="accordion-body">
                            <p>Yes! ZOY period care products are safe for even the most sensitive skin.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points3"
                            data-bs-toggle="collapse">3.What size are ZOY pads?</a></h3>
                    <div class="accordion-collapse collapse" id="points3" data-bs-parent="#payment-method">
                        <div class="accordion-body">
                            <ul>
                                <p>1.Medicated Sanitary Pads has,</p>
                                <li> Light Flow: 245MM </li>
                                <li> Medium Flow: 280MM </li>
                                <li> Heavy Flow: 335MM </li>
                                <br>
                                <p>2.Herbal Sanitary Pads has,</p>
                                <li> Medium Flow:290MM </li>
                                <li> Heavy Flow:340MM</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points4"
                            data-bs-toggle="collapse">4. What size are Therapy Pad liners?</a></h3>
                    <div class="accordion-collapse collapse" id="points4" data-bs-parent="#payment-method">
                        <div class="accordion-body">
                            <li>Panty linear: 160MM</li>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points5"
                            data-bs-toggle="collapse">
                            5.How do I wash Reusable Period Underwear?
                        </a></h3>
                    <div class="accordion-collapse collapse" id="points5" data-bs-parent="#payment-method">
                        <div class="accordion-body">
                            <p>For gently used period panties, simply toss them in with your regular laundry.
                                For soaked period panties, pre-rinse in cold water and machine wash on cold
                                with your regular laundry cycle. We recommend air-drying.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points6"
                            data-bs-toggle="collapse">
                            6.How are ZOY period care products different than other conventional products?
                        </a></h3>
                    <div class="accordion-collapse collapse" id="points6" data-bs-parent="#payment-method">
                        <div class="accordion-body">
                            <p> We are proud to use responsibly sourced, certified organic cotton that is safely
                                grown without harsh pesticides and synthetic chemicals in all of our
                                disposable period care products. Because our period care products are made
                                with clean ingredients without any irritating chemicals, women with all skin
                                types and menstrual conditions can rely on ZOY.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUBSCRIPTION -->

        <div class="container py-3 my-md-3">
            <h2 class="h6 pb-3 mb-2 text-center">SUBSCRIPTION</h2>
            <div class="accordion mb-2" id="payment-method_1">
                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button" href="#card2"
                            data-bs-toggle="collapse">1.How can I subscribe to ZOY?
                        </a></h3>
                    <div class="accordion-collapse collapse show" id="card2" data-bs-parent="#payment-method_1">
                        <div class="accordion-body">
                            <p>It’s easy: Visit the ZOY subscription page, build your subscription, and receive
                                ZOY at your door.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points7"
                            data-bs-toggle="collapse">2.Why should I subscribe to ZOY?</a></h3>
                    <div class="accordion-collapse collapse" id="points7" data-bs-parent="#payment-method_1">
                        <div class="accordion-body">
                            <p>Our subscription makes life easier. Save time with auto-deliveries, enjoy fully
                                customizable subscriptions of your favourite self-care items, and save 10% on
                                every order.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points8"
                            data-bs-toggle="collapse">3.Can I customise my subscription?</a></h3>
                    <div class="accordion-collapse collapse" id="points8" data-bs-parent="#payment-method_1">
                        <div class="accordion-body">
                            <p>Of course! You can customise your subscription order by product, quantity, and delivery
                                cadence.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points9"
                            data-bs-toggle="collapse">4.Will my subscription be renewed automatically after I sign
                            up?</a></h3>
                    <div class="accordion-collapse collapse" id="points9" data-bs-parent="#payment-method_1">
                        <div class="accordion-body">
                            <p>Great question! Yes, your subscription will be renewed automatically
                                according to your original settings. However, you can change the subscription
                                preferences in your profile by choosing to adjust, skip, or cancel the subscription.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points10"
                            data-bs-toggle="collapse">5.Can I make changes in my subscription?
                            </a></h3>
                    <div class="accordion-collapse collapse" id="points10" data-bs-parent="#payment-method_1">
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
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points11"
                            data-bs-toggle="collapse">6.When do I need to make changes to meet the deadline of my next
                            subscription?</a></h3>
                    <div class="accordion-collapse collapse" id="points11" data-bs-parent="#payment-method_1">
                        <div class="accordion-body">
                            <p>To meet the deadline of your next subscription delivery, you need to make changes to your
                                order at least 24 hours before your next renewal date.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points12"
                            data-bs-toggle="collapse">7.Can I put my subscription on hold?</a></h3>
                    <div class="accordion-collapse collapse" id="points12" data-bs-parent="#payment-method_1">
                        <div class="accordion-body">
                            <p>Unfortunately, we are unable to place holds on subscriptions at this time.Therefore, we
                                recommend that you either switch your subscription to a bi-monthly delivery or skip your
                                next few orders.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ORDER -->

        <div class="container py-5 my-md-3">
            <h2 class="h6 pb-3 mb-2 text-center">ORDER</h2>
            <div class="accordion mb-2" id="payment-method_2">
                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button" href="#card3"
                            data-bs-toggle="collapse">1.Do you have discount codes that I can use on my order?
                        </a></h3>
                    <div class="accordion-collapse collapse show" id="card3" data-bs-parent="#payment-method_2">
                        <div class="accordion-body">
                            <p>We offer exclusive offers for our email subscribers. Please sign up to enjoy deals on
                                your favourite Rael products. Offers or discount codes cannot be combined.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points20"
                            data-bs-toggle="collapse">2.When will an out of stock product be available again?</a></h3>
                    <div class="accordion-collapse collapse" id="points20" data-bs-parent="#payment-method_2">
                        <div class="accordion-body">
                            <p>Our customer favourites may sell out fast! Sign up for our emails to get first-access to
                                back-in-stock items and new product launches.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points21"
                            data-bs-toggle="collapse">3.Can I modify my order?</a></h3>
                    <div class="accordion-collapse collapse" id="points21" data-bs-parent="#payment-method_2">
                        <div class="accordion-body">
                            <p>We are unable to make modifications to existing orders at time. Please email us at
                                support@cloudzoo.in.in and we will do everything we can to assist you further.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points23"
                            data-bs-toggle="collapse">4.How do I track my package?</a></h3>
                    <div class="accordion-collapse collapse" id="points23" data-bs-parent="#payment-method_2">
                        <div class="accordion-body">
                            <p>After your package is shipped, you will receive an email containing tracking information within 24-48 hours.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer-->
    <?php include 'includes/footer.php' ?>

</body>


</html>