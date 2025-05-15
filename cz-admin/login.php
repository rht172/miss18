<?php include 'includes/myFunctions.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>CloudZoo360</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }

        .login-form form {
            margin-bottom: 15px;
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">

        <div class="login-form">
            <form action="loginauth.php" method="post">
                <div class="text-center">
                    <img src="assets/img/login-logo.png" />
                </div>
                <br />
                <?php

                if (czGet('key1') == "invalidlogin") {
                    echo '<div class="alert alert-danger">
                        <strong>Oops!</strong> Sorry Invalid Login.
                    </div>';
                }

                if (czGet('key1') == "notActive") {
                    echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> Your Id was Terminated! Kindly Contact Your HR.
                    </div>';
                }
                ?>
                <h2>Sign in</h2>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Enter Username" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>

            </form>
            <p class="text-center"><a href="https://cloudzoo.in">(c) CloudZoo India Softwares 2023.</a></p>
        </div>

    </div>
</body>

</html>