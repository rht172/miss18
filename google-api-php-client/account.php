<?php
session_start();

include_once("config.php");
include_once("includes/functions.php");
include '../includes/dbAccessClass.php';
include '../includes/myFunctions.php';
include '../includes/theme-constants.php';


$obj_class_main = new czDBAccess();

$obj_class_main->varTableName = 'customer_table';


if (isset($_REQUEST['code'])) {
	$gClient->authenticate();
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	//DB Insert
	// $gUser = new Users();
	// $gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
	$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
	// header("location: account-profile.php");
	$_SESSION['token'] = $gClient->getAccessToken();
} else {
	$authUrl = $gClient->createAuthUrl();
}



if (!isset($_SESSION['google_data'])):
	header("Location:index.php");
endif;
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login with Google Account by CodexWorld</title>
	<style type="text/css">
		h1 {
			font-family: Arial, Helvetica, sans-serif;
			color: #999999;
		}

		.wrapper {
			width: 600px;
			margin-left: auto;
			margin-right: auto;
		}

		.welcome_txt {
			margin: 20px;
			background-color: #EBEBEB;
			padding: 10px;
			border: #D6D6D6 solid 1px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border-radius: 5px;
		}

		.google_box {
			margin: 20px;
			background-color: #FFF0DD;
			padding: 10px;
			border: #F7CFCF solid 1px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border-radius: 5px;
		}

		.google_box .image {
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<h1>Google Profile Details </h1>
		<?php
		// echo '<div class="welcome_txt">Welcome <b>' . $_SESSION['google_data']['given_name'] . '</b></div>';
		// echo '<div class="google_box">';
		// echo '<p class="image"><img src="' . $_SESSION['google_data']['picture'] . '" alt="" width="300" height="220"/></p>';
		// echo '<p><b>Google ID : </b>' . $_SESSION['google_data']['id'] . '</p>';
		// echo '<p><b>Name : </b>' . $_SESSION['google_data']['name'] . '</p>';
		// echo '<p><b>Email : </b>' . $_SESSION['google_data']['email'] . '</p>';
		// echo '<p><b>Gender : </b>' . $_SESSION['google_data']['gender'] . '</p>';
		// echo '<p><b>Locale : </b>' . $_SESSION['google_data']['locale'] . '</p>';
		// echo '<p><b>Google+ Link : </b>' . $_SESSION['google_data']['link'] . '</p>';
		// echo '<p><b>You are login with : </b>Google</p>';
		// echo '<p><b>Logout from <a href="http://localhost/zoy-care/web/session-logout.php?logout">Google</a></b></p>';
		// echo '</div>';


		$email = $_SESSION['google_data']['email'];
		$password = $_SESSION['google_data']['id'];
		$first_name = $_SESSION['google_data']['given_name'];
		$created_on = date("Y-m-d");
        $reward_points = 50;

		$result = $obj_class_main->selectData_customqry("SELECT tid from customer_table where email = '$email';");

		if ($result->num_rows == 0) {
			$insertFeilds = "fname,email,password,created_on,reward_points";
			$insertValues = "'$first_name','$email','$password','$created_on','$reward_points'";
			//Insert Process
			$insertStatus = $obj_class_main->insertDataWithReturnValue($insertFeilds, $insertValues);

			if($insertStatus > 0) {
				header("Location: ". constant("Base_URL")."loginauth.php");
			}


		} else {
			header("Location: ". constant("Base_URL")."loginauth.php");

		}


		?>
	</div>
</body>

</html>