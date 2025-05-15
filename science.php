<!DOCTYPE html>
<html lang="en">


<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';



include 'includes/title.php';
?>
<!-- Body-->


<style>
  .yoga-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    /* Ensures the rotated image doesn't overflow its container */
  }

  .yoga-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    animation: rotateYoga 50s linear infinite;
    /* Adjust the duration and timing function as needed */
  }

  .girl-image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    max-width: 100%;
    max-height: 100%;
  }

  @keyframes rotateYoga {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
  }


  .loader {
    /* width: 100%;
    height: 300px; */
    /* display: flex;
    justify-content: center;
    align-items: center; */
    font-size: 150px;
    /* Larger font size */
    font-weight: bold;
    /* Bolder font weight */
    background: linear-gradient(to right, #FF7FBA, #FAD6B4);
    /* Gradient background */
    -webkit-background-clip: text;
    /* Clip text to the background's shape */
    -webkit-text-fill-color: transparent;
    /* Hide the text color */
  }

  @media screen and (max-width: 768px) {
    .loader {
      font-size: 100px;
    }

  }



  @media screen and (min-width: 769px) and (max-width: 1050px) {

    .loader {
      font-size: 100px;
    }
  }


  @media screen and (max-width: 768px) {
    .mobile_margin {
      margin: 50px;
    }

  }


  .mobile_padding {
    padding-bottom: 100px;
  }



  @media screen and (max-width: 768px) {
    .mobile_padding {
      padding-bottom: 50px;
    }

  }


  /* #video-container {
  position: relative;
}

#background-video {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -1;
} */
</style>

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
        <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/science/science1.jpg">

      </div>
    </section>

    <section class="p-5">
      <div class="row">
        <!-- <div class="col-md-6" id="video-container">
          <video autoplay muted loop id="background-video">
            <source src="img/science/womb.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div> -->
        <!-- <div class="col-md-6" id="image-container">
  <img src="img/science/womb-1.jpg" alt="">
</div> -->
        <!-- <div class="col-md-6" style="background-image: url('img/science/womb-1.jpg'); background-size: cover;">
                    </div> -->


        <div class="col-md-6 d-lg-flex align-items-center ps-lg-0">
          <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/science/womb-1.jpg">

        </div>

        <div class="col-md-6">
          <h3>CULMINATION OF TECHNOLOGY & NATURE</h3>
          <p STYLE="text-align: justify ">

            ZOY Pad is invented for every Women Period Wellness. Our researchers focused on the
            ABSORBENTS, the most important core component of sanitary napkins with a functional chip. As women - the
            "LIFE GIVERS", deserve the utmost care for the most sensitive and important part of their body, 'THE
            VAGINA'. So we have chosen every component backed with Health +Science +Nature.
          </p>


          <h3>WHY FOCUS ON VAGINAL HYGIENE?</h3>
          <p STYLE="text-align: justify">
            Vaginal heath is the nucleus of every girl's life from blooming into a woman to
            becoming a mother. Scientists state the fact that negligence of vaginal hygiene leads to
            major health problems like PCOD, UTI, fertility issues and much more. Ensuring vaginal health is the most
            responsible way of Empowering a women.
          </p>

          <h3>TRANSFORMING YOUR RELATIONSHIP TO WOMB SPACE</h3>
          <!-- <ul STYLE="text-align: justify"> -->
          <p>
            We believe that transforming our relationship to the womb space is a vital step towards improving our
            relationships with ourselves, each other, and the planet. These are our most sensitive areas, our pleasure
            centers, and the places that we grow and give birth from.
          </p>
          <p>Enhancer pads have much to offer in the way of
            transforming this relationship. The feeling of cool herbs inhale on the vagina can be calming, cleansing
            and
            rejuvenating.
          </p>
          <p>The vagina, the womb space, the yoni whatever word you choose to call it’s the incredible
            source of all human life, so let’s take the very best care of this place together.
          </p>
          <!-- </ul> -->






        </div>
      </div>
    </section>



    <section style="background-color: black; color:white;">

      <div class="row m-3" style="color:white;">
        <div class="d-flex justify-content-center mt-3">
          <h1 class='text-center' style="color:white;">Balance Your Hormones to keep your Body, Mind and Soul happy.
          </h1>

        </div>
        <div class="d-flex justify-content-center">
          <p class="custom_font_size text-center">
            Hormones act in a synergistic manner with each other. If one is out of balance, others are likely to be as
            well. These signals “Tell your Body what to do and when to do it”.
          </p>
        </div>
        <div class="row mb-3">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <div>
              <h3 class="d-flex justify-content-center text-center" style="color:white;">HORMONES IN SYNERGY</h3>
              <br>
              <div class="row">
                <div class="col-md-3 "></div>
                <div class="col-md-6  text-left">
                  <p class='fs-6 '>Regular Periods.</p>
                  <p class='fs-6 '>Sleep Well.</p>
                  <p class='fs-6 '>Happy Mood.</p>
                  <p class='fs-6 '>Healthy Metabolism.</p>
                </div>
                <div class="col-md-3 "></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 rotate_img" style="height:500px;">
            <div class="yoga-container">
              <img src="img/nft/Yoga-bg.svg" alt="Yoga background" class="yoga-background">
              <img src="img/nft/girl-1.png" alt="Girl" class="girl-image" width='430'>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <div>
              <h3 class="d-flex justify-content-center text-center" style="color:white;">HORMONES OUT OF SYNERGY
              </h3>
              <br>
              <div class="row">
              <div class="col-md-3 "></div>
              <div class="col-md-6  text-left">
                <p class='fs-6'>Irregular Periods.</p>
                <p class='fs-6'>Low Energy Level.</p>
                <p class='fs-6'>Depression.</p>
                <p class='fs-6'>Obesity.</p>
              </div>
              <div class="col-md-3 "></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section id='first_counter'>

      <h1 class='text-center mt-5 mb-5 fw-bold'>YOUR VAGINAL HEALTH IS THE CORE OF YOUR FEMININE BEING</h1>

      <div class="row p-3">
        <div class="col-md-4">
          <div class="row d-flex align-items-center">

            <div class="loader text-center" id="loader">

            </div>
            <h1 class="text-center ">FERTILITY</h1>
            <div class="d-flex justify-content-center">

              <p class='text-center para_width'>Healthy vaginal conditions including balanced pH and prevention of
                infection positively influences 95% success in fertility.</p>
            </div>
          </div>

          <div class="row d-flex align-items-center">

            <div class="loader text-center" id="loader_1">

            </div>
            <h1 class="text-center ">PERIODS</h1>
            <div class="d-flex justify-content-center">

              <p class='text-center para_width'>Practicing good hygiene, choosing the right sanitary products and
                avoiding irritants can promote 90% vaginal wellbeing during periods.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex align-items-center">
          <img src="img/science/02_1.jpg" alt="" width='900'>
        </div>

        <div class="col-md-4">
          <div class="row d-flex align-items-center">

            <div class="loader text-center" id="loader_2">

            </div>
            <h1 class="text-center ">SEX DRIVE</h1>
            <div class="d-flex justify-content-center">

              <p class='text-center para_width'>Optimal vaginal health with balanced hormones, good lubrication and
                non-infection influences 80% satisfied sexual drive.</p>
            </div>
          </div>

          <div class="row d-flex align-items-center">

            <div class="loader text-center" id="loader_3">

            </div>
            <h1 class="text-center ">HEALTH</h1>
            <div class="d-flex justify-content-center">

              <p class='text-center para_width'>Maintaining vaginal health is Integral to 70% overall feminine being.
                Regular hygiene practice is essential for promoting vaginal health and overall health.</p>
            </div>
          </div>

        </div>
      </div>
    </section>





    <!-- <section id='second_counter'>
      <div class="row p-3">

        <div class="col-md-6">
          <div class="row d-flex align-items-center">

            <div class="loader text-center" id="loader_2">

            </div>
            <h1 class="text-center ">SEX DRIVE</h1>
            <div class="d-flex justify-content-center">

              <p class='text-center para_width'>Optimal vaginal health with balanced hormones, good lubrication and
                non-infection influences 80% satisfied sexual drive.</p>
            </div>
          </div>

          <div class="row d-flex align-items-center">

            <div class="loader text-center" id="loader_3">

            </div>
            <h1 class="text-center ">HEALTH</h1>
            <div class="d-flex justify-content-center">

              <p class='text-center para_width'>Maintaining vaginal health is Integral to 70% overall feminine being.
                Regular hygiene practice is essential for promoting vaginal health and overall health.</p>
            </div>
          </div>

        </div>


        <div class="col-md-6 d-flex align-items-center">
          <img src="img/science/02_1.jpg" alt="" width='800'>
        </div>
      </div>
    </section> -->



    <section style="background-color: black; color:white !important;">
      <div class="container p-0 pt-4">

        <h1 class='text-center text-white mb-5 fw-bold'>NOT ALL SANITARY PADS ARE SAFE</h1>


        <div class="row d-flex justify-content-evenly mobile_padding">
          <div class="col-md-5 d-flex justify-content-center align-items-center">
            <img src="img/science/leaf_1.jpg">
          </div>
          <div class="col-md-5 d-flex align-items-center">
            <div class='mobile_margin'>
              <h1 class='text-white fw-bold'>01</h1>
              <h4 class='text-white fw-bold'>WE SELECT THE RIGHT INGREDIENTS FOR MENSTRUAL PROBLEMS</h4>
              <p class='text-white'>Our products are treated with high-end technology and healthy herbs to overcome menstrual problems.</p>
            </div>
          </div>

        </div>


        <div class="row d-flex justify-content-evenly mobile_padding">
          <div class="col-md-5 d-flex align-items-center order-md-1 order-2">
            <div class='mobile_margin'>
              <h1 class='text-white fw-bold'>02</h1>
              <h4 class='text-white fw-bold'>OUR FUNCTIONAL PAD TECHNOLOGY</h4>
              <p class='text-white'>
                With the help of science we encapsulated graphene, tea polyphenols, anion, far-infrared,
                nano-silver, super oxide dismutase, gluthaione, magnetic and chitin technology for vaginal wellbeing of
                women With the help of nature we infused extracts from herbs such as snow Lotus, nut grass, warmwood,
                Angelica, Cnidium, Sophora and ginger to benefit users health in its own way.
              </p>
            </div>
          </div>
          <div class="col-md-5 d-flex justify-content-center align-items-center order-md-2 order-1">
            <img src="img/science/atom.jpg">
          </div>
        </div>



        <div class="row d-flex justify-content-evenly mobile_padding">
          <div class="col-md-5 d-flex justify-content-center align-items-center">
            <img src="img/science/hologram_1.jpg">
          </div>
          <div class="col-md-5 d-flex align-items-center">
            <div class='mobile_margin'>
              <h1 class='text-white fw-bold'>03</h1>
              <h4 class='text-white fw-bold'>WE NOURISH THE WOMB</h4>
              <p class='text-white'>Our pad combines protection + care + solutions to overcome and heal vaginal disorders
                in natural way.</p>
            </div>
          </div>

        </div>


        <div class="row d-flex justify-content-evenly mobile_padding">

          <div class="col-md-5 d-flex align-items-center order-md-1 order-2">
            <div class='mobile_margin'>
              <h1 class='text-white fw-bold'>04</h1>
              <h4 class='text-white fw-bold'>CARE WITH ZOY</h4>
              <p class='text-white'>
                Zoy is a natural, healthy, high quality feminine period partner that not just care but Empowers the
                womb.</p>
            </div>
          </div>
          <div class="col-md-5 d-flex justify-content-center align-items-center order-md-2 order-1">
            <img src="img/science/zoy_science2_1.jpg">
          </div>

        </div>


      </div>
    </section>



  </main>
  <!-- Footer-->
</body>

<script>




  const loader = document.getElementById("loader");

  // Function to update the loader with the count
  function updateLoader(count) {
    loader.textContent = count + '%'; // Add '%' symbol
  }

  // Function to start the counting loader
  function startLoader() {
    let count = 0;
    const interval = setInterval(() => {
      updateLoader(count);
      count++;
      if (count > 95) {
        clearInterval(interval);
      }
    }, 50); // Change the interval for desired speed
  }

  // Start the loader when the page loads
  startLoader();



  const loader_1 = document.getElementById("loader_1");

  // Function to update the loader with the count
  function updateLoader_1(count) {
    loader_1.textContent = count + '%'; // Add '%' symbol
  }

  // Function to start the counting loader
  function startLoader_1() {
    let count = 0;
    const interval = setInterval(() => {
      updateLoader_1(count);
      count++;
      if (count > 90) {
        clearInterval(interval);
      }
    }, 50); // Change the interval for desired speed
  }

  // Start the loader when the page loads
  startLoader_1();



  const loader_2 = document.getElementById("loader_2");

  // Function to update the loader with the count
  function updateLoader_2(count) {
    loader_2.textContent = count + '%'; // Add '%' symbol
  }

  // Function to start the counting loader
  function startLoader_2() {
    let count = 0;
    const interval = setInterval(() => {
      updateLoader_2(count);
      count++;
      if (count > 80) {
        clearInterval(interval);
      }
    }, 50); // Change the interval for desired speed
  }

  // Start the loader when the page loads
  startLoader_2();





  const loader_3 = document.getElementById("loader_3");

  // Function to update the loader with the count
  function updateLoader_3(count) {
    loader_3.textContent = count + '%'; // Add '%' symbol
  }

  // Function to start the counting loader
  function startLoader_3() {
    let count = 0;
    const interval = setInterval(() => {
      updateLoader_3(count);
      count++;
      if (count > 70) {
        clearInterval(interval);
      }
    }, 50); // Change the interval for desired speed
  }

  // Start the loader when the page loads
  startLoader_3();



  // Function to check if 25% of the element is in viewport
  function isElementPartiallyInViewport(el) {
    const rect = el.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    const quarterHeight = windowHeight * 0.25; // 25% of the viewport height

    return (
      rect.top <= windowHeight - quarterHeight &&
      rect.bottom >= quarterHeight
    );
  }

  // Function to handle scroll event
  function handleScroll() {
    const section = document.getElementById('first_counter'); // Assuming this is the section you want to trigger the loader in
    if (isElementPartiallyInViewport(section)) {
      startLoader();
      startLoader_1();
      startLoader_2();
      startLoader_3();
      window.removeEventListener('scroll', handleScroll); // Remove the scroll listener once triggered
    }
  }


  // // Function to handle scroll event
  // function handleScroll_1() {
  //   const section = document.getElementById('second_counter'); // Assuming this is the section you want to trigger the loader in
  //   if (isElementPartiallyInViewport(section)) {
  //     startLoader_2();
  //     startLoader_3();
  //     window.removeEventListener('scroll', handleScroll_1); // Remove the scroll listener once triggered
  //   }
  // }

  // Add scroll event listener
  window.addEventListener('scroll', handleScroll);
  // window.addEventListener('scroll', handleScroll_1);







</script>
<?php include 'includes/footer.php' ?>

</html>