<?php

require_once('../config.php');
require_once('../functions.php');

if(isset($_POST['create-account'])) {
	$fname = $_POST['first-name'];
	$lname = $_POST['last-name'];
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$pass1 = $_POST['create-password'];
	$pass2 = $_POST['confirm-password'];

	if(has_special_char($fname) || has_special_char($lname)) {
		$_SESSION['create']['fname'] = $fname;
		$_SESSION['error']['fname'] = 'is-invalid';

		// Testing
		header('Location: ../../');
	}

}

?>