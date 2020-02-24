<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(isset($_POST['loc_update'])) {
	$lid = $_POST['lid'];
	$add1 = $_POST['add1'];
	$add2 = $_POST['add2'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];

	$query = $conn->prepare("UPDATE location SET loc_address_1 = :add1, loc_address_2 = :add2, loc_phone = :phone, loc_city = :city, loc_state = :state, loc_postal_code = :zip WHERE loc_id = :lid");
	$query->bindParam(":add1", $add1, PDO::PARAM_STR);
	$query->bindParam(":add2", $add2, PDO::PARAM_STR);
	$query->bindParam(":phone", $phone, PDO::PARAM_STR);
	$query->bindParam(":city", $city, PDO::PARAM_STR);
	$query->bindParam(":state", $state, PDO::PARAM_STR);
	$query->bindParam(":zip", $zip, PDO::PARAM_STR);
	$query->bindParam(":lid", $lid, PDO::PARAM_INT);

	try {
		$query->execute();
	} catch(PDOException $e) {

	}
}

if(isset($_POST['employee_search'])) {
	$input = $_POST['employee_search'];

	$query = $conn->prepare("SELECT * FROM employee WHERE emp_username = :input AND emp_manager = 0");
	$query->bindParam(":input", $input, PDO::PARAM_STR);
	try {
		$query->execute();
		echo json_encode($query->fetchAll());
	} catch(PDOException $e) {
		return $input;
	}
}

if(isset($_POST['add_manager']) && isset($_POST['emp_id']) && isset($_POST['loc_id'])) {
	$eid = $_POST['emp_id'];
	$lid = $_POST['loc_id'];

	$query = $conn->prepare("UPDATE employee SET emp_manager = 1, fk_loc_id = :lid WHERE emp_id = :eid");
	$query->bindParam(":lid", $lid, PDO::PARAM_INT);
	$query->bindParam(":eid", $eid, PDO::PARAM_INT);
	try {
		$query->execute();
	} catch(PDOException $e) {
		
	}
}

if(isset($_POST['remove_manager'])) {
	$eid = $_POST['remove_manager'];

	$query = $conn->prepare("UPDATE employee SET emp_manager = 0 WHERE emp_id = :eid");
	$query->bindParam(":eid", $eid, PDO::PARAM_INT);
	try {
		$query->execute();
	} catch(PDOException $e) {
		
	}
}

?>