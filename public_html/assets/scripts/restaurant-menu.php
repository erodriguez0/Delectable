<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');
require_once(INCLUDE_PATH . 'functions.php');

if(isset($_POST['add_category'])) {
	$cat = $_POST['category_name'];
	$desc = (isset($_POST['category_description'])) ? $_POST['category_description'] : "";
	$lid = $_POST['loc_id'];
	$res = array("error" => false, "error_msg" => "", "cat_id" => 0);
	
	// 
	if(empty($cat) || strlen($cat) > 32) {
		$res["error"] = true;
		$res["error_msg"] = "Category name must be 1-32 characters long";
		echo json_encode($res); exit();
	}

	if(strlen($desc) > 255) {
		$res["error"] = true;
		$res["error_msg"] = "Category description too long";
		echo json_encode($res); exit();
	}

	if(!$res["error"]) {
		$query = $conn->prepare("INSERT INTO menu_item_category (item_cat_name, item_cat_description, fk_loc_id) VALUES (:name, :description, :lid)");
		$query->bindParam(":name", $cat, PDO::PARAM_STR);
		$query->bindParam(":description", $desc, PDO::PARAM_STR);
		$query->bindParam(":lid", $lid, PDO::PARAM_INT);
		if($query->execute()) {
			$cid = $conn->lastInsertId();
			$res["cat_id"] = $cid;
			echo json_encode($res);
		} else {
			$res["error"] = true;
			$res["error_msg"] = "Error creating category";
			echo json_encode($res);
		}
	} else {
		$res["error"] = true;
		$res["error_msg"] = "Error creating category";
		echo json_encode($res);
	}
}

?>