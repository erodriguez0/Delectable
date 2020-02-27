<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

// Redirect if not logged in
if(!$_SESSION['admin_id']):
	header('Location: /delectable/public_html/');

// Display message if no manager access granted
elseif(!$_SESSION['manager'] || !isset($_SESSION['manager'])):
	$title = "Delectable | For Restaurants";
	require_once(INCLUDE_PATH . 'header.php');
?>
	<h1 class="text-center">Contact Support To Finalize Registration</h1>
	<h3 class="text-center">(###) ###-####</h3>

<?php
	require_once(INCLUDE_PATH . 'header.php');

// Display dashboard if they have manager access
else:

$title = "Delectable | For Restaurants";
require_once(INCLUDE_PATH . 'header.php');

require_once(INCLUDE_PATH . 'business/manager/dashboard-nav.php');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    
</div>
</main>

<?php
require_once(INCLUDE_PATH . 'header.php');
endif;
?>