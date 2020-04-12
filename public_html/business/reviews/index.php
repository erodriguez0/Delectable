<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

// Redirect if not logged in
if(!isset($_SESSION['manager'])):
	header('Location: /delectable/public_html/'); exit();

// Display dashboard if they have manager access
else:

$title = "Delectable | For Restaurants";
require_once(INCLUDE_PATH . 'header.php');
require_once(INCLUDE_PATH . 'business/manager/dashboard.php');
require_once(INCLUDE_PATH . 'functions.php');
$lid = $_SESSION['loc_id'];
$orders = restaurant_archived_orders($conn, $lid);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	    <h1 class="h2">Reviews</h1>
	</div>
	<div class="manager-main row">
		<div class="col-12 col-lg-4 col-xl-3">
			<h1 class="h3 subheader-border">Reservations</h1>

		</div>
		<div class="col-12 col-lg-8 col-xl-9">
			<h1 class="h3 subheader-border">Heat Map</h1>
			<div class="mt-3 overflow-x">
                <canvas id="canvas" width="720" height="540"></canvas>
            </div>
            <div class="mt-3">
            	<h1 class="h3 subheader-border">Reservation Details</h1>
            </div>
		</div>
	</div>
</main>
<script type="text/javascript">
	var lid = <?php echo $lid; ?>;
	var read_only_mode = true;
</script>
<?php
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>