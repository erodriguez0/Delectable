<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');
require_once(INCLUDE_PATH . 'functions.php');

if(isset($_POST['load_layout'])) {
	$lid = $_POST['loc_id'];
	$res = array("error" => false, "error_msg" => "", "data" => array());
	$sql = "";
	$sql .= "SELECT AVG(w.review_rating) AS avg_rating, COUNT(*) AS num_of_reviews, t.* ";
	$sql .= "FROM `table` t, review w, reservation r ";
	$sql .= "WHERE t.table_id = r.fk_table_id AND w.fk_rsvn_id = r.rsvn_id AND r.fk_loc_id = :lid ";
	$sql .= "GROUP BY t.table_id";
	$query = $conn->prepare($sql);
	$query->bindParam(":lid", $lid, PDO::PARAM_INT);
	if($query->execute()) {
		$rows = $query->fetchAll();
		if(count($rows) > 0) {
			foreach($rows as $k) {
				$row = array(
					"avg" => $k["avg_rating"],
					"num_of_reviews" => $k["num_of_reviews"],
					"id" => $k["table_id"],
					"uuid" => $k["table_uuid"],
					"num" => $k["table_number"],
					"seats" => $k["table_seats"],
					"type" => $k["table_type"],
					"height" => $k["table_height"],
					"width" => $k["table_width"],
					"left" => $k["table_left"],
					"top" => $k["table_top"],
					"deg" => $k["table_angle"]
				);
				$res["data"][] = $row;
			}
		}

		$sql = "SELECT * FROM `object` WHERE fk_loc_id = :lid";
		$query = $conn->prepare($sql);
		$query->bindParam(":lid", $lid, PDO::PARAM_INT);
		if($query->execute()) {
			$rows = $query->fetchAll();
			if(count($rows) > 0) {
				foreach($rows as $k) {
					$row = array(
						"id" => $k["object_id"],
						"uuid" => $k["object_uuid"],
						"type" => $k["object_type"],
						"height" => $k["object_height"],
						"width" => $k["object_width"],
						"left" => $k["object_left"],
						"top" => $k["object_top"],
						"deg" => $k["object_angle"]
					);
					$res["data"][] = $row;
				}
			}
			echo json_encode($res); exit();	
		}
	}
	$res["error"] = true;
	$res["error_msg"] = "Could not retrieve review information";
	echo json_encode($res); exit();
}

?>