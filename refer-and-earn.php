<!DOCTYPE html>
<html lang="en">

<style>
  .copiedtext {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    text-align: center;
    opacity: 0;
    transform: translateY(-1em);
    color: #000;
    transition: all .500s;
  }

  .copied .copiedtext {
    opacity: 1;
    transform: translateY(-4em);
  }


  button {
    position: relative;
    padding: 8px 10px;
    border: 2px dotted black;
    font-size: 0.835em;
    text-transform: uppercase;
    letter-spacing: 0.125em;
    font-weight: bold;
    color: #000;
    background: #fff;
    transition: background .275s;
  }

  button:hover,
  button:focus {
    background: #EA2237;
    color: #fff;
    cursor: pointer;
  }
</style>
<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_referral = new czDBAccess();

//Assign Table Name
$obj_class_main->varTableName = 'promo_code_master_table';
$obj_class_referral->varTableName = 'reward_points_factor_table';


//Main Table
$tid = "";
$promo_code = "";
$msg = "";
$create_date = "";
$from_date = date('Y-m-d');
$to_date = date('Y-m-d');
$created_by = "";
$created_on = "";
$percentage = "";



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


    <section>
      <div class="d-lg-flex align-items-center ps-lg-0">
        <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/refer/refer&earn.jpg">

      </div>
    </section>

    <section class="row g-0 mt-3">
      <div class="col-md-12 px-3  order-md-1">
        <div class="mx-auto py-lg-3">
          <!-- <h2 class="text-center">Refer And Earn <img class='mb-3' src="assets/icons/gift.png" style="max-width: 35px;"
              alt=""> -->
          </h2>
          <?php
          if (isset($_SESSION['email'])) {
            $customer_name = $_SESSION['email'];
          } else {
            $customer_name = '';
          }
          if (isset($_SESSION['tid'])) {
            $id = $_SESSION['tid'];
          } else {
            $id = 0;
          }
          // $customer_name = $_SESSION['customer_name'];
          // $id = $_SESSION['tid'];
          $cus_name = substr($customer_name, 0, 4);
          $cus_name = strtoupper($cus_name);
          // function generateReferralCode($length = 4)
          // {
          //   $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
          //   $referralCode = '';
          
          //   for ($i = 0; $i < $length; $i++) {
          //     $referralCode .= $characters[mt_rand(0, strlen($characters) - 1)];
          //   }
          
          //   return $referralCode;
          // }
          
          // $generate_Code = generateReferralCode(4);
          
          // $date = date('Y-m-d');
          // $day = date("d", strtotime($date));
          
          $generate_Code = $id * 7;
          $refer_code = $cus_name . $id . $generate_Code;
          $created_on = date('Y-m-d');
          // $created_by = $_SESSION['user_name'];
          $select_Feilds = "reward_factor";
          $result_referral = $obj_class_referral->selectData_customqry("SELECT * FROM reward_points_factor_table where `type` = 'Referral';");
          while ($row = $result_referral->fetch_assoc()) {
            $reward_factor = $row['reward_factor'];
          }
          $select_Feilds = "promo_code";
          $select_whereClause = "promo_code = '$refer_code'";
          $result_promo = $obj_class_main->selectData($select_Feilds, $select_whereClause);
          if ($result_promo->num_rows == 0) {
            // Insert Process 
            $insertFeilds = "promo_code,percentage,created_by,created_on,cus_id";
            $insertValues = "'$refer_code','$reward_factor','$created_by','$created_on','$id'";

            //Insert Process
            $insertID = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);
          }
          // echo $refer_code
          ?>
          <!-- <p class="text-center">Share ZOY with your friends, and get exclusive rewards<br>when they join the community.
          </p> -->
          <!-- <div class="text-center pb-4">
            <img src="img/refer_eran2.jpg" style="max-width: 300px" alt="">
          </div> -->
          <div class=" p-3 rounded-lg row shadow  " style="border-radius: 8px; background-color: #FDFADB">
            <div class="col-md-1"></div>
            <div class="col-md-7 d-flex align-items-center">
              <div>
                <h1 style="color:black">Refer Now</h1>
                <h3 style="color:black">Log in, and share your invite code. That's all you have to do.</h3>
              </div>
            </div>
            <div class="col-md-2 mt-4 mb-4 text-center ">
              <?php
              if (strlen($customer_name) > 0) {
                echo "<button class='btn btn-light' id='copy' style='background-color: #FCDBE6; padding:50px;' onClick='CopyToClipboard(\"to-copy\")'>
                <div id='to-copy'><h3 class='m-0' style='color:#AA336A;'>" . $refer_code . "</h3></div><span class='copiedtext' aria-hidden='true'>Copied</span>
              </button>";
              } else {
                echo "<button class='btn btn-light ' id='signinclick' style='background-color: #FCDBE6; padding:50px;' onClick='CopyToClipboard(' to-copy')'>
                <div id='to-copy'><a href='#signin-modal' ></a> <h3 class='m-0' style='color:#AA336A;'>GETCODE</h3></div>
              </button>";
              }
              ?>
              <!-- <button title="Copy promo code" id="copy" onClick="CopyToClipboard('to-copy')"><div id="to-copy">JULY15</div></button> -->
              <!-- <input class="" type="" value="<?php //echo $refer_code; 
              ?>" id="hiddenInput"> -->
            </div>
            <div class="col-md-2"></div>
          </div>
    </section>

<section>
  <div class='d-flex justify-content-center'>
              <!-- <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label> -->
              <a class="btn-share btn-whatsapp bs-whatsapp whatsappshare me-2 my-2" href="#"><i
                  class="ci-whatsapp"></i>Whatsapp</a>
              <a class="btn-share btn-twitter me-2 my-2 twittershare" href="#"><i class="ci-twitter"></i>Twitter</a><a
                class="btn-share btn-instagram me-2 my-2 instagramshare" href="#"><i
                  class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2 facebookshare" href="#"><i
                  class="ci-facebook"></i>Facebook</a>
  </div>
</section>

    <section class="container-fluid mt-3" style="background-color :  #DCF4FE">
      <h1 class="d-flex justify-content-center pt-3" style="color:#fe696a; ">How It Works:</h1>
      <div class="mt-3">

        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <a class="card h-100" data-scroll="">
              <div class="card-body text-center">
                <!-- <i class="ci-sign-in h3 mt-2 mb-4 text-primary"></i> -->
                <!-- <img class="mb-3" src="img/icon/login.png" alt=""> -->
                <div class='h-50' >
                  <h3 class="m-0">1. Sign in, or sign up:</h3>
                </div>
                <div>
                  <p class=" " style="color:black;">Log into, or create, your Zoy account to start referring.</p>
                </div>
              </div>
            </a>
          </div>


          <div class="col-xl-3 col-sm-6 mb-grid-gutter ">

            <a class="card h-100" data-scroll="">
              <div class="card-body text-center">
                <!-- <i class="ci-share h3 mt-2 mb-4 text-primary"></i> -->
                <!-- <img class="mb-2" src="img/icon/next.png" alt=""> -->
                <div class='h-50'>
                  <h3 class="m-0">2. Share your invite code:</h3>
                </div>
                <div>
                  <p class="" style="color:black;">Your friend receives ₹100 cashback in their Zoy Wallet when they
                    sign
                    up
                    with your code.</p>
                </div>
              </div>
            </a>

          </div>


          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <a class="card h-100" data-scroll="">
              <div class="card-body text-center ">
                <!-- <i class="ci-money-bag h3 mt-2 mb-4 text-primary"></i> -->
                <!-- <img class="mb-2" src="img/icon/money-back.png" alt=""> -->
                <div class='h-50'>
                  <h3 class="m-0">3. Get ₹100 cashback</h3>
                </div>
                <div>
                  <p class="" style="color:black;"> Get rewarded when your friend makes their first purchase. They get
                    Zoy
                    goodness, you get rewarded. Win-win!</p>
                </div>
              </div>
            </a>
          </div>


          <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <a class="card h-100" data-scroll="">
              <div class="card-body text-center ">
                <!-- <i class="ci-loading  h3 mt-2 mb-4 text-primary"></i> -->
                <!-- <img class="mb-3" src="img/icon/repeat.png" alt=""> -->
                <div class='h-50'>
                  <h3 class="m-0">4. Repeat. Reap the Rewards</h3>
                </div>
                <div>
                  <p class="" style="color:black;">Refer Zoy to more friends, and unlock more rewards every time.</p>
                </div>
              </div>
            </a>
          </div>


        </div>







      </div>
    </section>
    <section class="container">
      <div class="container py-3 my-md-3 ">
        <h2 class="h6 pb-3 mb-2 text-center" style="color:#fe696a;">FAQ</h2>
        <div class="accordion mb-2" id="payment-method">
          <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button" href="#card1" data-bs-toggle="collapse">1. Am I
                eligible?
              </a></h3>
            <div class="accordion-collapse collapse" id="card1" data-bs-parent="#payment-method">
              <div class="accordion-body">
                <p>As long as you have an account with Zoy, you will have your own personal code and can share away!
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points2"
                data-bs-toggle="collapse">2. Can I send my referral code to as many people as I want?</a></h3>
            <div class="accordion-collapse collapse" id="points2" data-bs-parent="#payment-method">
              <div class="accordion-body">
                <p>Definitely! There is no limit on the number of people you can refer. The more the merrier, so
                  spread the Zoy love!</p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points3"
                data-bs-toggle="collapse">3. I referred my friends, but I don’t see my referral reward. When will I
                get it?</a></h3>
            <div class="accordion-collapse collapse" id="points3" data-bs-parent="#payment-method">
              <div class="accordion-body">
                <p>We’re so glad you referred Zoy to your friends. You will have to wait till the order is
                  successfully delivered before you receive your referral cashback in your Zoy Wallet. You can then
                  use Zoy Cash for your next purchase.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points4"
                data-bs-toggle="collapse">4. I’ve just been referred. How do I redeem the discount?</a></h3>
            <div class="accordion-collapse collapse" id="points4" data-bs-parent="#payment-method">
              <div class="accordion-body">
                <ol>
                  <li> Click on your friend’s referral link<l>
                  <li> Create your Zoy account and enter the referral code during sign up</li>
                  <li> Make your first purchase using Zoy Cash on the payment page</li>
                </ol>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points5"
                data-bs-toggle="collapse">
                5. Can I use a campaign code and referral discount code at the same time?
              </a></h3>
            <div class="accordion-collapse collapse" id="points5" data-bs-parent="#payment-method">
              <div class="accordion-body">
                <p>Unfortunately you cannot use more than one code on a single purchase.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points6"
                data-bs-toggle="collapse">
                6. I have more questions!
              </a></h3>
            <div class="accordion-collapse collapse" id="points6" data-bs-parent="#payment-method">
              <div class="accordion-body">
                <p> Check out the full list of FAQs <a href="faq.php">here</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container py-3 my-md-3">
        <h2 class="h6 pb-3 mb-2 text-center" style="color:#fe696a;">Terms and Conditions</h2>
        <div class="accordion mb-2" id="terms-and-conditions">
          <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button" href="#card2" data-bs-toggle="collapse">1. Am I
                eligible?
              </a></h3>
            <div class="accordion-collapse collapse " id="card2" data-bs-parent="#terms-and-conditions">
              <div class="accordion-body">
                <p>The following terms and conditions ('Offer Terms') govern your use of the referral reward
                  (hereinafter referred to as the 'Offer' offered by Lagom Labs Private Limited (hereinafter
                  referred to as ('Zoy', 'we', 'us', 'our'). Customers that are using their personal referral code
                  are hereinafter referred to as 'Referrer' and any friend that you refer the Offer to are
                  hereinafter referred to as a 'Referred Friend'. References to 'you' may be to Referrers or
                  Referred Friends as the context requires.
                  <br>
                  <br>
                  <br>
                  <u>Offer Conditions</u>
                  <br>
                  <br>

                  Zoy reserves the right to refuse the issue of any Offer to any Referred Friend or Referrer at any
                  time.
                  The Offer shall be valid from 17 August 2022 onwards for a period as decided by Zoy from time to
                  time. Zoy reserves the right to amend, modify, cancel, update or withdraw any and all elements of
                  this Offer at any time without notice. Upon any premature suspension, inconvenience, cessation,
                  withdrawal, termination or closure by Zoy, no person shall be entitled to claim any loss of any
                  kind whatsoever.
                  The Offer is valid only on zoygirl.com and no other website/mobile application.
                  If Zoy reasonably believes that you have breached any of these Offer Terms, we reserve the right
                  to immediately suspend or terminate your use of any reward or offer without notifying you, and
                  without further liability to you, including without any liability in respect of you no longer
                  being able to participate in or benefit from any reward or offer.
                  You agree to be bound by these Offer Terms and any other relevant documentation on zoygirl.com
                  including any modifications, alternations or updates that we make including the general terms of
                  use available <a href="terms-conditions.php">here.</a> Where the context so requires, these Offer
                  Terms shall be read in consonance and not in derogation of general terms of use available <a
                    href="terms-conditions.php">here.</a>
                  <br>
                  <br>
                  <br>

                  <u>Offer Details</u>
                  <br><br>
                  For Referred Friend – INR 100 Cashback in their Zoy Wallet on the first purchase on zoygirl.com.
                  For Referrer – Earn INR 100 Cashback in their Zoy Wallet for every successful referral.

                  <u>Referrer Conditions</u>

                  When you send a communication to a Referred Friend, you confirm that: (i) you have a valid
                  customer account on zoygirl.com; (ii) any such Referred Friend is personally known to you; and
                  (iii) you have, where reasonably practical, obtained the consent of the Referred Friend before
                  contacting them.
                  You will not enter or otherwise use information of any third party or Referred Friend in order to
                  use the offer for any bulk email distribution, distribution to strangers, or any other promotion
                  of a personal link in a manner that would constitute or appear to constitute (in Zoy’s sole
                  discretion) unsolicited commercial email or 'spam'.
                  You will not open multiple accounts, including different email addresses, for the same person in
                  order to generate additional referral rewards.
                  The Referred Friend can be based in any country that Zoy currently ships to, except in
                  jurisdictions where the Offer is prohibited by law.
                  A Referred Friend must not be a current customer of Zoy under any email address or alias. A
                  Referred Friend must register with Zoy and successfully place an order for claiming the reward
                  under the Offer.
                  The Referrer will be eligible to receive the reward from the date of the Referred Friend receiving
                  their order.
                  The Referred Friend must not cancel the order prior to shipment and the order must not be
                  returned. Any rewards will be revoked if the order is returned and a refund is requested on the
                  order for which the reward was offered.
                  The Referred Friend reward cannot be claimed by the same person making the referral. Referred
                  Friend rewards cannot be combined with other discount codes in a single order.
                  The Referred Friend must use the Offer earned within seven days from the date of issue.
                  The validity of the earned rewards by Referrer is six months from the date of issue. The rewards
                  are non-transferable and cannot be exchanged for cash.
                  There are limits in place on how many and how frequently referrals can be made by any single
                  Referrer. Rewards may not be given if those limits are exceeded.
                  <br><br><br>
                  <u>General Conditions</u>
                  <br><br>
                  You are at least the minimum age permitted by applicable law to enter into these Offer Terms. You
                  will not use the Offer for any illegal or immoral purposes, or for any purpose other than your
                  participation in the Offer.
                  You will not use the Offer in any way that interrupts, damages or impairs them, or otherwise
                  renders the Offer less efficient.
                  You will not impersonate any other person (living or dead), misrepresent your connection with a
                  person or entity, or provide false or otherwise misleading information.
                  <br><br>
                  Participation in the Offer may require you to submit personal information about you and the users
                  you refer, such as name and email address. You agree to receive communications from us with regard
                  to your participation and all of the information you have or will provide to Zoy during your use
                  of the offer is true and accurate, to the best of your knowledge. Any and all information shared
                  by the Referrer or Referred Friend under this Offer shall be subject to the Privacy Policy of Zoy
                  available <a href="privacy-policy.php">here.</a>
                  <br><br>
                  These Offer Terms are governed by and construed in accordance with the laws of India. You agree to
                  submit to the exclusive jurisdiction of the courts at Mumbai, Maharashtra.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <hr>
  </main>
  <!-- Footer-->
</body>

<script>
  // function copyToClipboard() {
  //   var copyText = document.getElementById("copyText");
  //   var range = document.createRange();
  //   range.selectNode(copyText);
  //   window.getSelection().removeAllRanges();
  //   window.getSelection().addRange(range);
  //   try {
  //     var successful = document.execCommand('copy');
  //     var msg = successful ? 'successful' : 'unsuccessful';
  //     alert("Text copy was " + msg);
  //   } catch (err) {
  //     console.log('Oops, unable to copy');
  //   }
  //   window.getSelection().removeAllRanges();
  // }

  // function copyToClipboard() {
  //   var copyText = document.getElementById("copyText");
  //   var range = document.createRange();
  //   range.selectNode(copyText);
  //   window.getSelection().removeAllRanges();
  //   window.getSelection().addRange(range);
  //   document.execCommand("copy");
  //   window.getSelection().removeAllRanges();
  //   // alert("Text copied to clipboard: " + copyText.innerText);
  // }


  function CopyToClipboard(containerid) {
    var btnCopy = document.getElementById("copy");
    var main = document.getElementById("maincontent");
    // Create a new textarea element and give it id='temp_element'
    var textarea = document.createElement("textarea");
    textarea.id = "temp_element";
    // Optional step to make less noise on the page, if any!
    textarea.style.height = 0;
    // Now append it to your page somewhere, I chose <body>
    document.body.appendChild(textarea);
    // Give our textarea a value of whatever inside the div of id=containerid
    textarea.value = document.getElementById(containerid).innerText;
    // Now copy whatever inside the textarea to clipboard
    var selector = document.querySelector("#temp_element");
    selector.select();
    document.execCommand("copy");
    // Remove the textarea
    document.body.removeChild(textarea);
    // Add copied text after click
    if (document.execCommand("copy")) {
      btnCopy.classList.add("copied");

      var temp = setInterval(function () {
        btnCopy.classList.remove("copied");
        clearInterval(temp);
      }, 600);

    } else {
      console.info("document.execCommand went wrong…");
    }

  }




  $('#signinclick').on('click', function () {

    var signInModal = new bootstrap.Modal(document.getElementById('signin-modal'));

    // Trigger the modal
    signInModal.show();

  });




  
  $(document).ready(function () {
    $('.whatsappshare').click(function () {
        var whatsappUrl = "https://api.whatsapp.com/send?text= <?php echo $refer_code ?>";
        window.open(whatsappUrl);
    });
});





  $(document).ready(function () {
    $('.twittershare').click(function () {
      var twitterUrl = "https://twitter.com/intent/tweet?text=<?php echo $refer_code ?>";
      window.open(twitterUrl);
    });
  });





  $(document).ready(function () {
    $('.instagramshare').click(function () {
      // URL of the image or page you want to encourage users to share
      var imageUrl = '';

      // Check if Instagram app is available, then open it, otherwise open Instagram website
      var instagramAppUrl = 'instagram://library?AssetPath=' + encodeURIComponent(imageUrl);
      var instagramWebUrl = 'https://www.instagram.com/';

      // Try to open the Instagram app, if not available, open Instagram website
      window.location.href = instagramAppUrl;

      window.location.href = instagramWebUrl;

    });
  });



  // function copyToClipboard() {
  //   const input = document.getElementById("hiddenInput");
  //   input.select();
  //   document.execCommand("copy");
  //   input.blur(); // Deselect the input

  //   // alert("Text copied to clipboard!");
  // }
</script>
<?php include 'includes/footer.php' ?>

</html>