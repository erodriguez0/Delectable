<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/inc/config.php');
require_once(INCLUDE_PATH . 'functions.php');

if(isset($_POST['restaurant-create-account'])) {
	$fname = $_POST['first-name'];
	$lname = $_POST['last-name'];
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$pass1 = $_POST['create-password'];
	$pass2 = $_POST['confirm-password'];

	// Check if name or username is not alphanumeric
	if(has_special_char($fname)) {
		$_SESSION['error']['footer'] = "First name must be alphanumeric<br>";
		$_SESSION['error']['fname'] = true;
	}

	if(has_special_char($lname)) {
		$_SESSION['error']['footer'] .= "Last name must be alphanumeric<br>";
		$_SESSION['error']['lname'] = true;
	}

	if(has_special_char($uname)) {
		$_SESSION['error']['footer'] .= "Username must be alphanumeric<br>";
		$_SESSION['error']['uname'] = true;
	}

	// Confirm passwords match before validating password
	if($pass1 != $pass2) {
		$_SESSION['error']['footer'] .= "Passwords don't match<br>";
		$_SESSION['error']['pass1'] = true;
		$_SESSION['error']['pass2'] = true;
	} else {
		// Password must include one uppercase, lowercase,
		// special char, and be at least 8 characters long
		if(!password_check($pass1)) {
			$_SESSION['error']['footer'] .= "Password must be at least 8 characters and have at least one special character, uppercase, and lowercase<br>";
			$_SESSION['error']['pass1'] = true;
			$_SESSION['error']['pass2'] = true;
		}
	}

	if(!empty($_SESSION['error'])) {
		$_SESSION['create']['fname'] = htmlspecialchars($fname);
		$_SESSION['create']['lname'] = htmlspecialchars($lname);
		$_SESSION['create']['uname'] = htmlspecialchars($uname);
		$_SESSION['create']['email'] = htmlspecialchars($email);
		header('Location: /delectable/public_html/business/');
	}
}

?>