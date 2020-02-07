<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/inc/config.php');

if(!$_SESSION['active'] || !$_SESSION['manager']) {
	header('Location: /delectable/public_html/');
}

$title = "Delectable | For Restaurants";
require_once(INCLUDE_PATH . 'header.php');
?>

<!-- Restaurant Dashboard For Managers -->


<?php
require_once(INCLUDE_PATH . 'header.php');
?>