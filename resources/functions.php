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
	if(!has_number($pass) || !has_letter($pass) || !has_special_char($pass) || strlen($pass) < 8) { return false; }

	return true;
}

// ADMIN DASHBOARD FUNCTIONS

function restaurant_list($conn) {
	$query = $conn->prepare("SELECT * FROM restaurant, location WHERE res_id = loc_id");
	try {
		$query->execute();
		return $query->fetchAll();
	} catch (PDOException $e) {
		
	}
}

function restaurant_info($conn, $id) {
	$query = $conn->prepare("SELECT * FROM restaurant, location WHERE res_id = loc_id AND loc_id = :id");
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

?>