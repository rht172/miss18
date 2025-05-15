<!-- product-add -->
<?php include 'includes/validateSession.php'; ?>
<?php include 'includes/header.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
?>


<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">




            <div class="row mt-3">
                <div class="container-fluid">
                    <h1 class="m-0">Report Master</h1>
                    <hr>
                </div>


                <div class="form-row">
                    <a class="cbutton navbar-brand btn btn-light btn-lg cz-button" href="film-report.php">
                        <img src="assets\icons\tape.png" />&nbsp;&nbsp;
                        Flim Ledger</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button col px-md-5" href="gum-report.php">Gum
                        Ledger</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button col px-md-5"
                        href="coating-report.php">Coating Ledger</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button" href="slitting-report.php"><img
                            src="assets\icons\slit.png" />&nbsp;&nbsp;Slit Ledger</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button" href="costing-report.php"><img
                            src="assets\icons\budget.png" />&nbsp;&nbsp;Cost Ledger</a>
                </div>

            </div>

            <!-- <div class="row mt-3">

                <div class="col-sm-10">          

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button" href="#"><img
                            src="assets/img/ContactEmployee.png" />n</a>
                </div>

            </div> -->

        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>