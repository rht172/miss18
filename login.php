<?php include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php'; ?>
<link rel="stylesheet" href="css/theme.min.css">


<?php

if (czGet('key1') == "invalidlogin") {
    echo '<div class="alert alert-danger" id="invalid_login">
                    <strong>Oops!</strong> Sorry Invalid Login.
                    </div>';
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    // <span aria-hidden="true">&times;</span>
    // </button>
}


?>
<script>
// Function to hide the alert div
function hideAlert() {
    var alertDiv = document.getElementById('invalid_login');
    alertDiv.style.display = 'none';
}

// Set a timeout of 5 seconds (5000 milliseconds)
var timeout = 5000;
setTimeout(hideAlert, timeout);
</script>


<script>
  
  $(document).ready(function() {
        $('title').html('LOGIN PAGE');
    });

</script>
