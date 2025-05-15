<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

//Class Declaration
$obj_class_main = new czDBAccess();
$obj_class_product = new czDBAccess();


//Assign Table Name
$obj_class_main->varTableName = 'ecom_order_main_table';
$obj_class_product->varTableName = 'ecom_order_product_table';
?>

<div class="container-fluid">
  <div class="container mb-5 mt-4">
    <!-- <div class="row col-md-12 m-0 mb-2">
      <div class="col-md-3 p-0">
        <img class="img-fluid" src="../assets/images/CloudZoo360SupportGirl.jpg" alt="">
      </div>
      <div class="col-md-9 mt-2 p-0 mt-0 align-self-center">
        <h2 class="paragraph mb-0">Hello!
          <?php echo $_SESSION['user_name'] ?>
        </h2>
        <p class="m-1">Welcome Back to CZ-Admin, Looks Like a Great Day is Waiting for you...</p>

        <p class="m-1"><span class="para">90472 84433 | 90470 96633</span> (Mon-Fri : 10.00 AM to 6.00 PM)</p>
        <p class="m-1 mb-2">For 24&times;7&times;365 Customer Support, ping us to <span
            class="supportmail">support@cloudzoo.in</span></p>
        <a class="supportbutton btn btn-dark mb-2" href="https://cloudzoo.in/support.php" target="_blank">Contact
          Support
          Center</a>
      </div>
    </div> -->


    <div class="row mt-5 pt-4">
      <div class="col-sm-3">
        <div class="card bg-light cz-dashboard-card shadow">
          <div class="card-body">
            <div class="row parent_img">
              <span class='tab-color' style="background-color: #1C1D21;"></span>
              <h4>
                <?php
                $currentDate = new DateTime();

                $monthStartDate = $currentDate->format('Y-m-d');

                $order_count = 0;
                $result = $obj_class_main->selectData_customqry("SELECT count(tid) as order_count  from ecom_order_main_table WHERE order_date = '$monthStartDate'");
                while ($row = $result->fetch_assoc()) {
                  $order_count = $row['order_count'];
                }
                // echo $order_count . ' ' . 'Nos';
                ?>
              </h4>
              <div class="count-container">
                <p>
                <h4>
                  <?php echo $order_count ?>
                </h4> &nbsp; <b>Nos</b></p>

              </div>

            </div>
            <a>Todays Order</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card  bg-light cz-dashboard-card shadow">
          <div class="card-body">
            <div class="row parent_img">
              <span class='tab-color' style="background-color: #B83F2E;"></span>
              <h4>
                <?php
                $currentDate = new DateTime();

                $monthStartDate = $currentDate->modify('first day of this month')->format('Y-m-d');
                // echo "Month start date: " . $monthStartDate . PHP_EOL;
                
                $monthEndDate = $currentDate->modify('last day of this month')->format('Y-m-d');
                // echo "Month end date: " . $monthEndDate . PHP_EOL;
                


                $month_count = 0;
                $result = $obj_class_main->selectData_customqry("SELECT count(tid) as month_count from ecom_order_main_table WHERE order_date >= '$monthStartDate' AND order_date < '$monthEndDate' ");
                while ($row = $result->fetch_assoc()) {
                  $month_count = $row['month_count'];
                }
                // echo $month_count . ' ' . 'Nos';
                ?>
              </h4>
              <div class="count-container">
                <p>
                <h4>
                  <?php echo $month_count ?>
                </h4> &nbsp; <b>Nos</b></p>

              </div>

            </div>
            <a>This Month Order Qty</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card  bg-light cz-dashboard-card shadow">
          <div class="card-body">
            <div class="row parent_img">
              <span class='tab-color' style="background-color: #214156;"></span>
              <h4>
                <?php
                $open_order = 0;
                $result = $obj_class_main->selectData_customqry("SELECT count(tid) as open_order from ecom_order_main_table WHERE order_status = 'Open'");
                while ($row = $result->fetch_assoc()) {
                  $open_order = $row['open_order'];
                }
                // echo $open_order . ' ' . 'Nos';
                ?>
              </h4>
              <div class="count-container">
                <p>
                <h4>
                  <?php echo $open_order ?>
                </h4> &nbsp; <b>Nos</b></p>

              </div>

            </div>
            <a>Open Orders</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card  bg-light cz-dashboard-card shadow">
          <div class="card-body">
            <div class="row parent_img">
              <span class='tab-color' style="background-color: #E19D22;"></span>
              <h4>
                <?php
                $active_customer = 0;
                $result = $obj_class_main->selectData_customqry("SELECT count(tid) as active_customer from customer_table");
                while ($row = $result->fetch_assoc()) {
                  $active_customer = $row['active_customer'];
                }
                // echo $active_customer . ' ' . 'Nos';
                ?>
              </h4>
              <div class="count-container">
                <p>
                <h4>
                  <?php echo $active_customer ?>
                </h4> &nbsp; <b>Nos</b></p>

              </div>

            </div>
            <a>Active Customers</a>
          </div>
        </div>
      </div>

    </div>


    <div class="row d-flex justify-content-center align-items-center mt-5 pt-3">

      <div class="col-md-8">
        <h5>Sales on last 30 days</h5><canvas id="status_stage_chart" class="mt-0"></canvas>
      </div><br>

    </div>


    <div class="row col-md-12 m-0 mb-2 mt-5">
      <div class="col-md-2"></div>
      <div class="col-md-3 p-0">
        <img class="img-fluid" src="../assets/images/CloudZoo360SupportGirl.jpg" alt="">
      </div>
      <div class="col-md-7 mt-2 p-0 mt-0 align-self-center">
        <h2 class="paragraph mb-0">Hello!
          <?php echo $_SESSION['user_name'] ?>
        </h2>
        <p class="m-1">Welcome Back to TnA, Looks Like a Great Day is Waiting for you...</p>

        <p class="m-1"><span class="para">90472 84433 | 90470 96633</span> (Mon-Fri : 10.00 AM to 6.00 PM)</p>
        <p class="m-1 mb-2">For 24&times;7&times;365 Customer Support, ping us to <span
            class="supportmail">support@cloudzoo.in</span></p>
        <a class="supportbutton btn btn-dark mb-2" href="https://cloudzoo.in/support.php" target="_blank">Contact
          Support
          Center</a>
      </div>
    </div>



  </div>

</div>



<?php


$today = date('Y-m-d');

$distinct_assigned_to_result = $obj_class_main->selectData_customqry(
  "SELECT ecom_order_main_table.order_date,sum(total_amount) as amount from ecom_order_product_table left join ecom_order_main_table on ecom_order_product_table.main_id_fk = ecom_order_main_table.tid WHERE order_date >= DATE_SUB('$today', INTERVAL 30 DAY) group by order_date;"
);

$stageChartCount = '';
$stageChartName = '';
$i = 0;
// loop to fetch and store values keys and their corresponding values in array named $data
while ($row = $distinct_assigned_to_result->fetch_assoc()) {
  if ($i == 0) {
    $stageChartName = "'" . $row['order_date'] . "'";
    $stageChartCount = "'" . $row['amount'] . "'";
  } else {
    $stageChartName = $stageChartName . ",'" . $row['order_date'] . "'";
    $stageChartCount = $stageChartCount . ",'" . $row['amount'] . "'";
  }
  $i = $i + 1;
}


?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php

echo '<script>
var ctx = document.getElementById("status_stage_chart").getContext("2d");
var myChart = new Chart(ctx, {
    type: "line",
    data: {';
echo "  labels: [" . $stageChartName . "],  ";
echo 'datasets: [{
            label: "Sales",
            data: [' . $stageChartCount . '],
            backgroundColor:"rgba(0, 157, 226)"
        }]
    },
    options: {

        responsive: true,
        plugins: {
          legend: {
            position: "top",
          }
        }
      }
});
</script>';
?>


<?php include 'includes/footer.php'; ?>


<script>

  var tokenid = "<?php echo session_id(); ?>";

  document.addEventListener('DOMContentLoaded', function () {
    // This function will run when the document is ready
    function update_profile_img() {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', 'api-call.php?type=update_profile_img' + '&tkn=' + tokenid, true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          const data = xhr.responseText;
          // Handle the response data here
          console.log(data);
        }
      };
      xhr.send();
    }

    // Call the function when the document is ready
    update_profile_img();
  });



</script>