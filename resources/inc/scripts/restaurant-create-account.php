<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/inc/config.php');
require_once(INCLUDE_PATH . 'functions.php');

if(isset($_POST['create-account'])) {
	$fname = $_POST['first-name'];
	$lname = $_POST['last-name'];
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$pass1 = $_POST['create-password'];
	$pass2 = $_POST['confirm-password'];

	// Check if name or username is not alphanumeric
	if(has_special_char($fname) || has_special_char($lname) || has_special_char($uname)) {
		$_SESSION['error']['footer'] = "Name and username must be alphanumeric<br>";
		$_SESSION['error']['fname'] = $_SESSION['error']['lname'] = $_SESSION['error']['uname'] = true;
	}

	if(!empty($_SESSION['error'])) {
		$_SESSION['create']['fname'] = htmlspecialchars($fname);
		$_SESSION['create']['lname'] = htmlspecialchars($lname);
		$_SESSION['create']['uname'] = htmlspecialchars($uname);
		header('Location: /delectable/public_html/business/');
	}
}

?>