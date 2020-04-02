<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');
require_once(INCLUDE_PATH . 'functions.php');

if(isset($_POST['add_new_restaurant'])) {
	
}

if(isset($_POST['res_update'])) {
	$name = $_POST['name'];
	$slogan = $_POST['slogan'];
	$description = $_POST['desc'];
	$rid = $_POST['rid'];

	$query = $conn->prepare("UPDATE restaurant SET res_name = :name, res_slogan = :slogan, res_description = :description WHERE res_id = :rid");
	$query->bindParam(":name", $name, PDO::PARAM_STR);
	$query->bindParam(":slogan", $slogan, PDO::PARAM_STR);
	$query->bindParam(":description", $description, PDO::PARAM_STR);
	$query->bindParam(":rid", $rid, PDO::PARAM_INT);

	try {
		$query->execute();
	} catch(PDOException $e) {

	}
}

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

	$query = $conn->prepare("SELECT * FROM employee WHERE emp_username = :input AND emp_manager = 0 AND emp_status = 1");
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
	$data = array("error" => false, "error_msg" => "", "data" => array());

	$query = $conn->prepare("UPDATE employee SET emp_manager = 1, fk_loc_id = :lid WHERE emp_id = :eid");
	$query->bindParam(":lid", $lid, PDO::PARAM_INT);
	$query->bindParam(":eid", $eid, PDO::PARAM_INT);
	try {
		if($query->execute()) {
			$query = $conn->prepare("SELECT * FROM employee WHERE emp_id = :eid");
			$query->bindParam(":eid", $eid, PDO::PARAM_INT);
			$query->execute();
			$row = $query->fetch();
			$data["data"] = $row;
			echo json_encode($data);
		} else {
			$data['error'] = true;
			$data["error_msg"] = "Error updating database";
			echo json_encode($data);
		}
	} catch(PDOException $e) {
		$data["error"] = true;
		$data["error_msg"] = "Error connecting to database";
		echo json_encode($data);
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

if(isset($_POST['remove_employee'])) {
	$eid = $_POST['emp_id'];
	$data = array("error" => false, "error_msg" => "", "data" => array());

	$query = $conn->prepare("UPDATE employee SET emp_manager = 0, fk_loc_id = NULL WHERE emp_id = :eid");
	$query->bindParam(":eid", $eid, PDO::PARAM_INT);
	try {
		if($query->execute()) {
			echo json_encode($data);
		} else {
			$data['error'] = true;
			$data["error_msg"] = "Error updating database";
			echo json_encode($data);
		}
	} catch(PDOException $e) {
		$data["error"] = true;
		$data["error_msg"] = "Error connecting to database";
		echo json_encode($data);
	}
}


if(isset($_POST['employee_add_search'])) {
	$input = $_POST['search_input'];

	$query = $conn->prepare("SELECT * FROM employee WHERE emp_username = :input AND emp_manager = 0 AND emp_status = 1");
	$query->bindParam(":input", $input, PDO::PARAM_STR);
	try {
		$query->execute();
		$rows = $query->fetchAll();
		// $data = array(
		// 	'error' => false,
		// 	'data' => $rows
		// );
		echo json_encode($rows);
	} catch(PDOException $e) {
		return $input;
	}
}

if(isset($_POST['restaurant_add_employee'])) {
	$eid = $_POST['emp_id'];
	$lid = $_POST['loc_id'];
	$data = array("error" => false, "error_msg" => "", "data" => array());

	$query = $conn->prepare("UPDATE employee SET fk_loc_id = :lid WHERE emp_id = :eid");
	$query->bindParam(":lid", $lid, PDO::PARAM_INT);
	$query->bindParam(":eid", $eid, PDO::PARAM_INT);
	try {
		if($query->execute()){
			$query = $conn->prepare("SELECT * FROM employee WHERE emp_id = :eid");
			$query->bindParam(":eid", $eid, PDO::PARAM_INT);
			$query->execute();
			$row = $query->fetch();
			$data["data"] = $row;
			echo json_encode($data);
		} else {
			$data["error"] = true;
			$data["error_msg"] = "Error updating database";
			echo json_encode($data);
		}
	} catch(PDOException $e) {
		$data["error"] = true;
		$data["error_msg"] = "Error connecting to database";
		echo json_encode($data);
	}
}

?>