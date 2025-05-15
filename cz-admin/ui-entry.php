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
                    <h1 class="m-0">Entries</h1>
                    <hr>
                </div>


                <div class="form-row">
                    <a class="cbutton navbar-brand btn btn-light btn-lg cz-button" href="film-entry-my.php">
                        <img src="assets\icons\tape.png" />&nbsp;&nbsp;
                        Flim Entry</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button " href="gum-entry-my.php"><img
                            src="assets\icons\glue (2).png" />&nbsp;Gum
                        Entry</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button " href="printing-entry-my.php"><img
                            src="assets\img\printing-machine.png" />Printing Entry</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button " href="coating-entry-my.php"><img
                            src="assets\icons\spray-paint.png" />Coating Entry</a>



                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button" href="slitting-entry-my.php"><img
                            src="assets\icons\slit.png" />&nbsp;&nbsp;Slit Entry</a>

                    <a class="navbar-brand cbutton btn btn-light btn-lg cz-button" href="costing-entry-my.php"><img
                            src="assets\icons\budget.png" />&nbsp;&nbsp;Cost Entry</a>

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