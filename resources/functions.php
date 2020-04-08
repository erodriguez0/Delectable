<?php

// GLOBAL FUNCTIONS

// Does string contain letters
function has_letter($string) {
    return preg_match( '/[a-zA-Z]/', $string );
}

// Does string contain numbers
function has_number($string) {
    return preg_match( '/\d/', $string );
}

// Does string contain special characters
function has_special_char($string) {
    return preg_match('/[^a-zA-Z\d]/', $string);
}

// Check if password contains number, 
// letter, special char, and length
function password_check($pass = '') {
	if(!has_number($pass) || !has_letter($pass) || !has_special_char($pass) || strlen($pass) < 8 || strlen($pass) > 128) { return false; }

	return true;
}

function sort_by_name_asc($a, $b) {
	$a = $a["res_name"];
	$b = $b["res_name"];

	if($a == $b) return 0;
	return ($a < $b) ? -1 : 1;
}

function sort_by_name_desc($a, $b) {
	$a = $a["res_name"];
	$b = $b["res_name"];

	if($a == $b) return 0;
	return ($a > $b) ? -1 : 1;
}

function invalid_search($term) {
	return preg_match('/[^a-zA-Z\d .\-\']/', $term);
}

// Checks if number is formatted as N,2
function is_currency($number) {
  return preg_match("/^-?[0-9]+(?:\.[0-9]{2})?$/", $number);
}

function is_invalid_name($string) {
	return preg_match('/[^a-zA-Z\-\d ]/', $string);
}

function is_invalid_address($string) {
	return preg_match('/[^a-zA-Z\-\d #,.]/', $string);
}

function is_invalid_zip($string) {
	return preg_match('/[^\d\-]/', $string);
}

function is_invalid_phone($string) {
	return preg_match('/[^\d\- ()]/', $string);
}

function is_invalid_text($string) {
	return preg_match('/[^a-zA-Z\-\d .!]/', $string);
}

function is_invalid_price($number) {
	return preg_match('/[^\d\.]/', $number);
}

function is_valid_price_format($number) {
	return preg_match('/^(0|[1-9]\d*)(\.\d{1,2})?$/', $number);
}

// Iterate through array of keys/fields
// and return an array using the field names
// as keys
function post_fields_to_array_keys($arr) {
	$tmp = array();
	foreach ($required as $field) {
		if(isset($_POST[$field]) && !empty($_POST[$field])) {
			$tmp[$field] = $_POST[$field];
		}
	}
	return $tmp;
}

// ADMIN DASHBOARD FUNCTIONS

function restaurant_list($conn) {
	$query = $conn->prepare("SELECT * FROM restaurant, location WHERE res_id = fk_res_id");
	try {
		$query->execute();
		return $query->fetchAll();
	} catch (PDOException $e) {
		
	}
}

function restaurant_info($conn, $id) {
	$query = $conn->prepare("SELECT * FROM restaurant, location WHERE res_id = fk_res_id AND loc_id = :id");
	$query->bindParam(":id", $id);

	try {
		$query->execute();
		return $query->fetch();
	} catch(PDOException $e) {

	}
}

function restaurant_managers($conn, $id) {
	$query = $conn->prepare("SELECT * FROM employee WHERE fk_loc_id = :id AND emp_manager = 1");
	$query->bindParam(":id", $id, PDO::PARAM_INT);

	try {
		$query->execute();
		return $query->fetchAll();
	} catch(PDOException $e) {

	}
}

function restaurant_employees($conn, $id) {
	$query = $conn->prepare("SELECT * FROM employee WHERE fk_loc_id = :id AND emp_manager = 0");
	$query->bindParam(":id", $id, PDO::PARAM_INT);

	try {
		$query->execute();
		return $query->fetchAll();
	} catch(PDOException $e) {

	}	
}

function employee_list($conn) {
	$query = $conn->prepare("SELECT * FROM employee");

	try {
		$query->execute();
		return $query->fetchAll();
	} catch (PDOException $e) {
		
	}
}

function employee_info($conn, $id) {
	$query = $conn->prepare("
		SELECT emp_first_name, emp_last_name, emp_email, emp_username, emp_last_login, emp_created, emp_address_1, emp_address_2, emp_city, emp_state, emp_postal_code, emp_phone, emp_status, res_name, loc_id, loc_address_1, loc_address_2, loc_city, loc_state, loc_postal_code, loc_phone 
		FROM employee
		LEFT JOIN location ON
		loc_id = fk_loc_id
		LEFT JOIN restaurant ON
		res_id = fk_res_id 
		WHERE emp_id = :eid
		");
	$query->bindParam(":eid", $id, PDO::PARAM_INT);

	try {
		$query->execute();
		return $query->fetch();
	} catch (PDOException $e) {
		
	}
}

function menu_item_categories($conn, $id) {
	$lid = $id;
	$sql = "SELECT item_cat_id, item_cat_name, item_cat_description FROM menu_item_category WHERE fk_loc_id = :lid";
	$query = $conn->prepare($sql);
	$query->bindParam(":lid", $lid, PDO::PARAM_INT);
	if($query->execute()) {
		return $query->fetchAll();
	}
}

function menu_items($conn, $id) {
	$cid = $id;
	$sql = "SELECT item_id, item_name, item_description, item_price FROM menu_item WHERE fk_item_cat_id = :cid";
	$query = $conn->prepare($sql);
	$query->bindParam(":cid", $cid, PDO::PARAM_INT);
	if($query->execute()) {
		return $query->fetchAll();
	}
}

function restaurant_filter($conn, $term, $city, $state, $zip, $miles, $rating) {
	$term = "%" . $term . "%";
	$sql = "SELECT res_id, res_name, res_slogan, res_description, loc_id, loc_city, loc_state FROM restaurant, location WHERE fk_res_id = res_id AND (res_name LIKE :term OR res_description LIKE :term)";
	$query = $conn->prepare($sql);
	$query->bindParam(":term", $term, PDO::PARAM_STR);
	if($query->execute()) {
		return $query->fetchAll();
	}
}
?>