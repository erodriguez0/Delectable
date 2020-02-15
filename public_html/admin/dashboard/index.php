<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/inc/config.php');

if(!$_SESSION['active']):
	header('Location: /delectable/public_html');
else:

$title = "Delectable | Admin Dashboard";
require_once(INCLUDE_PATH . 'header.php');
?>



<?php
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>