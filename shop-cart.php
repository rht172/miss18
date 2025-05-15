<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_slider = new czDBAccess();
$obj_class_sub_slider = new czDBAccess();
$obj_class_parallax = new czDBAccess();
$obj_class_feature_product = new czDBAccess();
$obj_class_product = new czDBAccess();
$obj_class_top_selling = new czDBAccess();

//Assign Table Name
$obj_class_slider->varTableName = 'slider_table';
$obj_class_sub_slider->varTableName = 'sub_slider_table';
$obj_class_parallax->varTableName = 'parallax_table';
$obj_class_feature_product->varTableName = 'featured_product_table';
$obj_class_product->varTableName = 'product_table_ecom';
$obj_class_top_selling->varTableName = 'top_selling_table';

?>

<!DOCTYPE html>
<html lang="en">


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


    <!-- Page Title-->
    <div class="page-title-overlap bg-secondary pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="product-category.php?page=1">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 text-light mb-0">Your cart</h1>
        </div>
      </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- List of items-->
        <section class="col-lg-8 " id="product-list">
          <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
            <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2"
              href="product-category.php?page=1"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
          </div>


        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
          <div class="bg-white rounded-3 shadow-lg p-4">
            <div class="py-2 px-xl-2">
              <div class="text-center mb-4 pb-3 border-bottom">
                <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                <h3 class="fw-normal text-dark">₹<span class='whole-total'></span></h3>
              </div>

              <div class="accordion" id="order-options">


              </div><a class="btn btn-dark btn-shadow d-block w-100 mt-4" href="checkout-details.php"><i
                  class="ci-card fs-lg me-2"></i>Proceed to Checkout</a>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </main>



  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


<script>
  var tokenid = '<?php echo session_id(); ?>'

  // tokenid = '';
  // var storedJsonString = localStorage.getItem("added_cart");

  // if (storedJsonString != null) {
  //   var storedArray = JSON.parse(storedJsonString);

  //   for (let i = 0; i < added_cart.length; i++) {
  //     var cart = added_cart[i];
  //     sku = cart.sku;
  //     qty = cart.qty;
  //     rate = cart.rate;
  //     size = cart.size;

  //     var xhr_8 = new XMLHttpRequest();
  //     // Set up the API call

  //     xhr_8.open("GET", 'api-call.php?type=get_sku_details&sku=' + sku + '&tkn=' + tokenid, true);

  //     // console.log(xhr_8);
  //     // Handle the response from the API
  //     xhr_8.onreadystatechange = function() {
  //       if (xhr_8.readyState === 4 && xhr_8.status === 200) {
  //         var data = JSON.parse(xhr_8.responseText);
  //         data.forEach(function(row) {
  //           tid = row.tid;
  //           ext_file_1 = row.ext_file_1;

  //           // Create HTML content for the product item
  //           var productHTML = `
  //           <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
  //               <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
  //                   <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html">
  //                       <img src="cz-admin/attachments/product/product_thumb/tid-${tid}.${ext_file_1}" width="160" alt="Product">
  //                   </a>
  //                   <div class="pt-2">
  //                       <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">${sku}</a></h3>
  //                       <div class="fs-sm"><span class="text-muted me-2">Size:</span>${size}</div>
  //                       <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div>
  //                       <div class="fs-lg text-accent pt-2">₹${rate}.<small>00</small></div>
  //                   </div>
  //               </div>
  //               <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
  //                   <label class="form-label" for="quantity${i}">Quantity</label>
  //                   <input class="form-control" type="number" id="quantity${i}" min="1" value="${qty}">
  //                   <button class="btn btn-link px-0 text-danger" type="button">
  //                       <i class="ci-close-circle me-2"></i>
  //                       <span class="fs-sm">Remove</span>
  //                   </button>
  //               </div>
  //           </div>
  //       `;

  //           // Append the product HTML to the product-list element
  //           document.getElementById('product-list').insertAdjacentHTML('beforeend', productHTML);


  //         });

  //       }

  //     }
  //     xhr_8.send();


  //   }
  // }



  var storedJsonString = localStorage.getItem("added_cart");
  // console.log(storedJsonString);

  if (storedJsonString != null) {
    var storedArray = JSON.parse(storedJsonString);
    // console.log(storedArray);

    // Loop through storedArray
    for (let i = 0; i < storedArray.length; i++) {
      (function(i) { // Using a closure to capture the value of i
        var cart = storedArray[i];
        // console.log(cart);
        var sku = cart.sku;
        var qty = cart.qty;
        var rate = cart.rate;
        var size = cart.size;
        var subscribe = cart.subscribe;


        var xhr_8 = new XMLHttpRequest();
        // Set up the API call
        xhr_8.open("GET", 'api-call.php?type=get_sku_details&sku=' + sku + '&tkn=' + tokenid, true);

        // Handle the response from the API
        xhr_8.onreadystatechange = function() {
          if (xhr_8.readyState === 4 && xhr_8.status === 200) {
            var data = JSON.parse(xhr_8.responseText);

            data.forEach(function(row) {
              var tid = row.tid;
              var ext_file_1 = row.ext_file_1;
              var size = row.size;
              var sku = row.sku;
              var colour = row.colour;
              if (subscribe > 0) {
                var row_tot = ((Number(qty) * Number(subscribe)) * Number(rate));
              } else {
                var row_tot = (Number(qty) * Number(rate));
              }
              // console.log(sku);
              // console.log(size);


              // Create HTML content for the product item
              var productHTML = `
              <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom product-div">
                  <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
                      <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="product-page.php?key1=${row.tid}&sku=${row.sku}">
                          <img src="cz-admin/attachments/product/product_thumb/tid-${tid}.${ext_file_1}" width="160" alt="Product">
                      </a>
                      <div class="pt-2">
                          <h3 class="product-title fs-base mb-2"><a href="product-page.php?key1=${row.tid}&sku=${row.sku}" class='sku_cart'>${sku}</a></h3>
                          <div class="fs-sm"><span class="text-muted me-2">Variant/Size:</span>${cart.size}</div>
                          <div class="fs-lg text-accent pt-2">₹<span class='sell_price'>${row_tot}</span></div>
                      </div>
                  </div>
                  <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                      <label class="form-label" for="quantity${i}">Quantity<span class="subscribe_month">${subscribe > 0 ? `&nbsp;&times;&nbsp;${subscribe}&nbsp;Month` : ''}</span></label>
                      <input class="form-control qty-change" type="number" id="quantity${i}"  min="1" value="${qty}" readonly>
                      <button class="btn btn-link px-0 text-danger" type="button" id="btn-row-remove">
                          <i class="ci-close-circle me-2"></i>
                          <span class="fs-sm">Remove</span>
                      </button>
                      <span class='row-total subtotal_shop_cart d-none'>${row_tot}</span>
                  </div>
              </div>
              `;

              // Append the product HTML to the product-list element
              document.getElementById('product-list').insertAdjacentHTML('beforeend', productHTML);
            });
          }
        };
        xhr_8.send();
      })(i); // Pass i to the closure
    }
  }



  $("body").on("click", "#btn-row-remove", function() {
    $(this).closest(".product-div").remove();
    sku_cart = $(this).closest('.product-div').find('.sku_cart').html();
    // console.log(sku_cart);

    // Retrieve the stored cart items from localStorage
    var storedJsonString = localStorage.getItem("added_cart");

    if (storedJsonString != null) {
      // Parse the stored JSON string to get the array of cart items
      var storedArray = JSON.parse(storedJsonString);

      // Find the index of the cart item to remove based on its SKU
      var existingIndex = storedArray.findIndex(function(obj) {
        return obj.sku === sku_cart;
      });

      // Check if the cart item with the specified SKU exists
      if (existingIndex !== -1) {
        // Remove the cart item from the array using splice
        storedArray.splice(existingIndex, 1);

        // Update the localStorage with the modified array
        localStorage.setItem("added_cart", JSON.stringify(storedArray));
      }


      // console.log(JSON.parse(localStorage.getItem("added_cart")));
      added_cart = JSON.parse(localStorage.getItem("added_cart"));
      // console.log(added_cart);

      if (added_cart) {
        $('.cart_qty_cls').html(added_cart.length);
      } else {
        $('.cart_qty_cls').html(0);
      }

      calculateTotal()
    }

  });


  $("body").on("change", ".qty-change", function() {
    // console.log('fdnb');
    row_total(this);
    add_to_cart(this);
  });

  $("body").on("keyup", ".qty-change", function() {
    row_total(this);
    add_to_cart(this);
  });

  function row_total(qty_val) {
    qty = $(qty_val).val();

    price = $(qty_val).closest('.product-div').find('.sell_price').html();
    var sub = $(qty_val).closest('.product-div').find('.subscribe_month').html();

    sub = parseInt(sub.match(/\d+/));

    if (sub > 0) {
      tot_qty = (qty * Number(sub)) * Number(price);
    } else {
      tot_qty = qty * Number(price);
    }

    $(qty_val).closest('.product-div').find('.row-total').html(tot_qty);

    calculateTotal();
  }


  function add_to_cart(thisRow) {

    var quantity = $(thisRow).val();
    var selling_price = $(thisRow).closest('.product-div').find('.sell_price').html().trim();
    var upn = $(thisRow).closest('.product-div').find('.sku_cart').html().trim();
    var subscribe = $(thisRow).closest('.product-div').find('.subscribe_month').html().trim();

    // console.log(subscribe);


    // Use a regular expression to match numeric values
    subscribe = parseInt(subscribe.match(/\d+/));

    subscribe = subscribe.toString();

    // console.log(subscribe);


    // console.log(quantity);
    var cartItem = {
      sku: upn,
      qty: quantity,
      rate: selling_price,
      subscribe: subscribe
    };

    // Retrieving and parsing the array of objects
    var storedJsonString = localStorage.getItem("added_cart");

    if (storedJsonString != null) {
      var storedArray = JSON.parse(storedJsonString);

      // Find the index of an object with matching SKU and size
      var existingIndex = storedArray.findIndex(function(obj) {
        return obj.sku === cartItem.sku;
      });

      if (existingIndex !== -1) {
        // Update the existing item
        storedArray[existingIndex] = cartItem;
      } else {
        // Add the new item
        storedArray.push(cartItem);
      }

      var jsonString = JSON.stringify(storedArray);
      localStorage.setItem("added_cart", jsonString);
    } else {
      var jsonString = JSON.stringify([cartItem]);
      localStorage.setItem("added_cart", jsonString);
    }

    // Swal.fire({
    //     icon: 'success',
    //     title: 'Cool...',
    //     text: 'Added to Cart!',
    //     confirmButtonColor: '#3085d6',
    // });


    // console.log(JSON.parse(localStorage.getItem("added_cart")));
    added_cart = JSON.parse(localStorage.getItem("added_cart"));
    // console.log(added_cart);

    if (added_cart) {
      $('.cart_qty_cls').html(added_cart.length);
    } else {
      $('.cart_qty_cls').html(0);
    }

  }


  function calculateTotal() {
    var wholeTotal = 0;

    $('.row-total').each(function() {
      wholeTotal = Number(wholeTotal) + Number($(this).html());
      // console.log(Number($(this).html()));
      // console.log('hii');
    });
    // console.log(wholeTotal);

    $('.whole-total').html(wholeTotal);
  }


  $(document).ready(function() {
    $('.qty-change').each(function() {
      row_total(this);
    });

    setTimeout(calculateTotal, 50);
  });



  //   function calculateTotal_js() {
  //     var wholeTotal = 0;
  //     var rowTotalElements = document.querySelectorAll('.row-total');

  //     rowTotalElements.forEach(function (element) {

  //         wholeTotal += parseFloat(element.innerHTML);
  //     });

  //     document.querySelector('.whole-total').innerHTML = wholeTotal;
  // }




  // $(document).ready(function() {
  //     function calculateTotal_1() {
  //         var wholeTotal = 0;

  //         $('.row-total').each(function() {
  //             wholeTotal = Number(wholeTotal) + Number($(this).html());
  //         });

  //         $('.whole-total').html(wholeTotal);
  //     }

  //     // Call the function once the DOM is fully loaded
  //     setTimeout(calculateTotal_1, 100);
  // });
</script>

</html>