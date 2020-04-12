<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

// Redirect if not logged in
if(isset($_SESSION['admin_id']) || !isset($_SESSION['emp_id'])):
	header('Location: /delectable/public_html/');

// Display message if no manager access granted
elseif(isset($_SESSION['emp_id']) && !isset($_SESSION['manager'])):
	header('Location: /delectable/public_html/business/dashboard/');

// Display dashboard if they have manager access
else:

$title = "Delectable | For Restaurants";
require_once(INCLUDE_PATH . 'header.php');
require_once(INCLUDE_PATH . 'business/manager/dashboard.php');
require_once(INCLUDE_PATH . 'functions.php');
$lid = $_SESSION['loc_id'];
$orders = restaurant_pending_orders($conn, $lid);
// var_dump($orders);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	    <h1 class="h2">Orders</h1>
	</div>
	<div class="manager-main row">
		<div class="col-12 col-lg-4 col-xl-3">
			<h1 class="h3 subheader-border">Recent Orders</h1>

			<table class="table">
				<thead>
					<th scope="col">Order #</th>
					<th scope="col">Date</th>
					<th scope="col">Time</th>
					<th scope="col">View</th>
				</thead>
				<tbody>
					<?php
					foreach($orders as $o):
					$order_id = $o["order_id"];
					$rsvn_date = $o["rsvn_date"];
					$rsvn_slot = $o["rsvn_slot"];
					$rsvn_id = $o["rsvn_id"];
					$time = strtotime($rsvn_slot);
					?>
					<tr>
						<td><?php echo $order_id; ?></td>
						<td><?php echo $rsvn_date; ?></td>
						<td><?php echo date("h:i A", $time); ?></td>
						<td><button class=" btn-link-alt table-link text-link rounded btn-sm py-0" value="<?php echo $rsvn_id; ?>">View</button></td>
					</tr>
					<?php
					endforeach;
					?>
				</tbody>
			</table>
		</div>

		<div class="col-12 col-lg-8 col-xl-9 mt-3 mt-lg-0">
			<div class="order-form">
				<div class="row">
					<div class="col-12">

		    			<h1 class="h3 subheader-border invoice-title">Order #12345</h1>

			    		<div class="invoice-details">
			    			<div class="row">

			    				<div class="col-6 col-md-4 mb-3 mb-md-0">
			    					<address class="mb-0">
			    						<strong>Esteban Rodriguez</strong><br>
			    						1234 Example Street<br>
			    						Bakersfield, CA 93308<br>
			    						(661) 123-1234<br>
			    					</address>
			    				</div>

			    				<div class="col-6 col-md-4 mb-3 mb-md-0">
			    					<b>Payment Method:</b><br>
			    					<span>Visa **** 1234</span><br>
			    					<b>Email:</b><br>
		    						<span>esteban@example.com</span>
			    				</div>

			    				<div class="col-12 col-md-4">
			    					<b>Order Date:</b><br>
			    					<span>March 15, 2020</span><br>

			    					<b>Reservation Date:</b><br>
			    					<span>March 20, 2020</span><br>

			    					<b>Reserved:</b><br>
			    					<span>Table 4</span><br>
			    				</div>

			    			</div>

			    			<div class="row mt-3">

			    				<div class="col-12">

			    					<b>Staff</b>

			    					<div class="list-group list-group-flush mt-3">
										<a href="#" class="list-group-item list-group-item-action border-top-0">Esteban Rodriguez</a>
										<a href="#" class="list-group-item list-group-item-action">Alfredo Lara</a>
										<a href="#" class="list-group-item list-group-item-action">Michael Guzman</a>
										<a href="#" class="list-group-item list-group-item-action">Cesar Lara</a>
									</div>

			    				</div>

			    			</div>

			    			<div class="row mt-3">

			    				<div class="col-12">

			    					<b>Order Items</b>

			    					<table class="table mt-3">
			    						<thead>
			    							<th scope="col">#</th>
			    							<th scope="col">Item</th>
			    							<th scope="col">Price</th>
			    							<th scope="col">Qty</th>
			    							<th scope="col">Total</th>
			    						</thead>

			    						<tbody>
			    							<tr>
			    								<td>1</td>
			    								<td>Super Banger Burger</td>
			    								<td>$4.99</td>
			    								<td>2</td>
			    								<td>$9.98</td>
			    							</tr>
			    						</tbody>
			    					</table>

			    				</div>

			    			</div>

			    		</div>

			    	</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php
endif;
require_once(INCLUDE_PATH . 'footer.php');
?>