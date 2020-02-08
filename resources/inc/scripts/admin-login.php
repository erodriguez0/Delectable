<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/inc/config.php');
require_once(INCLUDE_PATH . 'functions.php');

if(isset($_POST['admin-login'])) {
	$uname = $_POST['admin-uname'];
	$pass = $_POST['admin-pass'];

	$query = $conn->prepare("SELECT * FROM administrator WHERE admin_username = :uname");

}

?>