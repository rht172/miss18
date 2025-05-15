<script>



function getSku(Size, color) {


  // console.log(color);
  var colour = color;

  // var colour = $('#color').val();
  var size = $(Size).val();
  var product_name = "<?php echo $product_name ?> ";
  // console.log(Size);

  // Assuming you're using XMLHttpRequest
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'api-call.php?colour=' + colour + '&product_name=' + product_name + '&size=' + Size +
    '&type=fetch_sku' + '&tkn=' +
    tokenid, true);

  // console.log(Size);
  xhr.onload = function () {
    if (xhr.status === 200) {

      const data = JSON.parse(xhr.responseText);
      // console.log(data);

      var sub_upto = data[0].sub_save_3;
      sub_upto = Number(sub_upto).toFixed();

      if (data[0].sub_category == "pads") {

        var s_p = data[0].selling_price;
        var p_mrp = data[0].mrp;
        var sub_1 = data[0].sub_save_1;
        var sub_2 = data[0].sub_save_2;
        var sub_3 = data[0].sub_save_3;

        var off_three = (s_p - ((sub_1 / 100) * s_p));
        var off_six = (s_p - ((sub_2 / 100) * s_p));
        var off_twelve = (s_p - ((sub_3 / 100) * s_p));



        $('.off_three').html("&#x20B9;" + off_three);
        $('.off_six').html("&#x20B9;" + off_six);
        $('.off_twelve').html("&#x20B9;" + off_twelve);
        $('.off_mrp').html(p_mrp);
      }

      $('#product_sku').html(data[0].sku);
      $('#product_selling_price').html(data[0].selling_price);
      $('#product_mrp').html(data[0].mrp);

      var product_tid = data[0].tid;

      var productImage_1 = document.getElementById('product_image_1');
      var newImageSrc_1 = 'cz-admin/attachments/product/product_thumb/tid-' + product_tid + '.' + data[0]
        .ext_file_1;
      productImage_1.src = newImageSrc_1;
      productImage_1.setAttribute('data-zoom', newImageSrc_1);

      var productImage_2 = document.getElementById('product_image_2');
      var newImageSrc_2 = 'cz-admin/attachments/product/product_image1/tid-' + product_tid + '.' + data[0]
        .ext_file_2;
      productImage_2.src = newImageSrc_2;
      productImage_2.setAttribute('data-zoom', newImageSrc_2);

      var productImage_3 = document.getElementById('product_image_3');
      var newImageSrc_3 = 'cz-admin/attachments/product/product_image2/tid-' + product_tid + '.' + data[0]
        .ext_file_3;
      productImage_3.src = newImageSrc_3;
      productImage_3.setAttribute('data-zoom', newImageSrc_3);

      var productImage_4 = document.getElementById('product_image_4');
      var newImageSrc_4 = 'cz-admin/attachments/product/product_image3/tid-' + product_tid + '.' + data[0]
        .ext_file_4;
      productImage_4.src = newImageSrc_4;
      productImage_4.setAttribute('data-zoom', newImageSrc_4);

      var productImage_01 = document.getElementById('product_image_01');
      var newImageSrc_01 = 'cz-admin/attachments/product/product_thumb/tid-' + product_tid + '.' + data[0]
        .ext_file_1;
      productImage_01.src = newImageSrc_01;

      var productImage_02 = document.getElementById('product_image_02');
      var newImageSrc_02 = 'cz-admin/attachments/product/product_image1/tid-' + product_tid + '.' + data[0]
        .ext_file_2;
      productImage_02.src = newImageSrc_02;
      // if(data[0].ext_file_2.length > 0) {
      // productImage_02.src = newImageSrc_02;
      // } else {
      //   productImage_02.removeAttribute('src')
      // }

      var productImage_03 = document.getElementById('product_image_03');
      var newImageSrc_03 = 'cz-admin/attachments/product/product_image2/tid-' + product_tid + '.' + data[0]
        .ext_file_3;
      productImage_03.src = newImageSrc_03;

      var productImage_04 = document.getElementById('product_image_04');
      var newImageSrc_04 = 'cz-admin/attachments/product/product_image3/tid-' + product_tid + '.' + data[0]
        .ext_file_4;
      productImage_04.src = newImageSrc_04;



    }
  };
  xhr.send();
}







function change_product_card(pname, variant) {

  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'api-call.php?pname=' + pname + '&variant=' + variant + '&type=fetch_product_card' + '&tkn=' +
    tokenid, true);
  xhr.onload = function () {
    // console.log(xhr);

    if (xhr.status === 200) {

      var data = JSON.parse(xhr.responseText);


      var productCardDiv = document.getElementById('product_card_div');

      // Clear existing content
      productCardDiv.innerHTML = '';


      data.forEach(function (row) {

        var product_card_size = "<?php echo $pt_size ?> ";

        var isSelected = product_card_size === row.size ? 'selected' : '';


        var flowColor = '';
        if (row.flow.includes('Heavy')) {
          flowColor = 'red';
        } else if (row.flow.includes('Medium')) {
          flowColor = 'green';
        } else if (row.flow.includes('Light')) {
          flowColor = 'gray';
        }

        var productHTML = `
          <div class="col-md-5 button_card ${isSelected}" id='box_btn' onclick='changeColor_card(this),getSku("${row.size}","${row.colour}")'>
          <div>
      <small><span id="red_dot" style="background-color: ${flowColor};"></span>&nbsp;
   <span>
        ${row.flow}
      </span></small>
    </div>

  <div><small><i class="text-green">✓</i> ${row.product_card}</small></div>



  <div>
    <small>Pads at <b>&nbsp;&#x20B9;${row.selling_price}</b>&nbsp;&nbsp;<del class="text-muted fs-xs">
    ${row.mrp}
  </del></small>
  </div>

</div>
          `;



        document.getElementById('product_card_div').insertAdjacentHTML('beforeend', productHTML);

      });



    }

  };
  xhr.send();


}



</script>