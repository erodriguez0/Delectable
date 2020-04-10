<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');
require_once(INCLUDE_PATH . 'functions.php');

if(isset($_POST['restaurant_hours'])) {
	$lid = $_POST['loc_id'];
	$day = $_POST['day'];
	$query = $conn->prepare("SELECT * FROM location_hours WHERE hours_day = :day AND fk_loc_id = :lid");
	$query->bindParam(":day", $day, PDO::PARAM_INT);
	$query->bindParam(":lid", $lid, PDO::PARAM_INT);
	if($query->execute()) {
		echo json_encode($query->fetch());
	}
}
?>