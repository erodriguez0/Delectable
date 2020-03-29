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

require_once(INCLUDE_PATH . 'functions.php');

$title = "Delectable | For Restaurants";
require_once(INCLUDE_PATH . 'header.php');

require_once(INCLUDE_PATH . 'business/manager/dashboard.php');

$managers = restaurant_managers($conn, $_SESSION['loc_id']);

$employees = restaurant_employees($conn, $_SESSION['loc_id']);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 mb-3">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	    <h1 class="h2">Employees</h1>
	</div>
	<div class="manager-main row">
		<div class="col-12 col-lg-6 restaurant-edit-form-wrap">
			<h1 class="h3 subheader-border">Create Employee Account</h1>
			<div class="alert create-emp-alert d-none"></div>
			<div class="add-employee-form mt-3">
				<div class="row">
					<div class="col-12 col-lg-6">
						<input type="text" name="emp-first-name" class="form-control" placeholder="First Name" id="create-emp-first-name">
					</div>
					<div class="col-12 col-lg-6">
						<input type="text" name="emp-last-name" class="form-control mt-3 mt-lg-0" placeholder="Last Name" id="create-emp-last-name">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<input type="email" name="emp-email" class="form-control" placeholder="Enter Email" id="create-emp-email">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<input type="text" name="emp-username" class="form-control" placeholder="Create Username" id="create-emp-username">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<input type="password" name="emp-password-1" class="form-control" placeholder="Create Password" id="create-emp-password-1">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<input type="password" name="emp-password-2" class="form-control" placeholder="Confirm Password" id="create-emp-password-2">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<label class="switch">
							<input id="create-emp-manager" type="checkbox" name="emp-manager-access">
							<span class="status-slider"></span>
						</label>
						<label class="ml-3">Grant Manager Access</label>
					</div>
				</div>

				<div class="row">
					<div class="col-2 d-flex align-items-center justify-content-left">
						<small class="">Optional</small>
					</div>
					<div class="col-10">
						<hr>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<input type="text" name="emp-address-1" class="form-control" placeholder="Address">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 col-lg-4">
						<input type="text" name="emp-address-2" class="form-control" placeholder="Apt/Ste">
					</div>
					<div class="col-12 col-lg-5">
						<input type="tel" name="emp-phone" class="form-control mt-3 mt-lg-0" placeholder="Phone #">
					</div>
					<div class="col-12 col-lg-3">
						<input type="text" name="emp-postal-code" class="form-control mt-3 mt-lg-0" placeholder="Zip">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 col-lg-8">
						<input type="text" name="emp-city" class="form-control" placeholder="City">
					</div>
					<div class="col-12 col-lg-4">
						<input type="text" name="emp-state" class="form-control mt-3 mt-lg-0" placeholder="State">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<button type="button" name="emp-create-account" class="btn btn-primary btn-block" id="create-employee-account">Create Account</button>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-6 restaurant-edit-form-wrap mt-3 mt-lg-0">
			<h1 class="h3 subheader-border">Managers</h1>
			<div class="manager-list mt-3 overflow-x-fit" id="manager-list">
				<table class="table">
					<thead class="text-center">
						<th scope="col">Name</th>
						<th scope="col">Username</th>
						<th scope="col">Info</th>
						<th scope="col">Suspended</th>
					</thead>
					<tbody class="text-center">
					<?php
					foreach ($managers as $k):
						if($k["emp_id"] != $_SESSION["emp_id"]):
							$name = $k["emp_first_name"] . " " . $k["emp_last_name"];
							$uname = $k["emp_username"];
							$eid = $k["emp_id"];
							$status = ($k["emp_status"] == 0) ? "checked" : "";
					?>
						<tr>
							<td><?php echo $name; ?></td>
							<td><?php echo $uname; ?></td>
							<td><button class="btn-link-alt border-0 text-link table-link" value="<?php echo $eid; ?>" data-toggle="modal" data-target="#profile-modal">Profile</button></td>
							<td><input type="checkbox" name="" disabled="true" <?php echo $status; ?>></td>
						</tr>
					<?php
						endif;
					endforeach;
					?>
					</tbody>
				</table>
			</div>

			<h1 class="h3 subheader-border mt-3">Employees</h1>

			<div class="employee-list mt-3 overflow-x-fit" id="employee-list">
				<table class="table">
					<thead class="text-center">
						<th scope="col">Name</th>
						<th scope="col">Username</th>
						<th scope="col">Info</th>
						<th scope="col">Suspended</th>
					</thead>
					<tbody class="text-center">
					<?php
					foreach ($employees as $k):
						if($k["emp_id"] != $_SESSION["emp_id"]):
							$name = $k["emp_first_name"] . " " . $k["emp_last_name"];
							$uname = $k["emp_username"];
							$eid = $k["emp_id"];
							$status = ($k["emp_status"] == 0) ? "checked" : "";
					?>
						<tr>
							<td><?php echo $name; ?></td>
							<td><?php echo $uname; ?></td>
							<td><button class="btn-link-alt border-0 text-link table-link" value="<?php echo $eid; ?>">Profile</button></td>
							<td><input type="checkbox" name="" disabled="true" <?php echo $status; ?>></td>
						</tr>
					<?php
						endif;
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>

<!-- Profile Modal -->
<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile-modal-title">Employee Profile</h5>
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>First Name</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">Esteban</span>
                	</div>
                </div>
                <div class="row py-1">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Last Name</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">Rodriguez</span>
                	</div>
                </div>
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Username</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">erodriguez</span>
                	</div>
                </div>
                <div class="row py-1">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Email</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">example1@example.com</span>
                	</div>
                </div>
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Phone</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">6611234567</span>
                	</div>
                </div>
                <div class="row py-1">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Position</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">General Manager</span>
                	</div>
                </div>
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Salary</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">$42,000</span>
                	</div>
                </div>
                <div class="row py-1">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Address</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">123 California Ave.</span>
                	</div>
                </div>
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Apt/Ste</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">N/A</span>
                	</div>
                </div>
                <div class="row py-1">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>City</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">Bakersfield</span>
                	</div>
                </div>
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>State</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">CA</span>
                	</div>
                </div>
                <div class="row py-1">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Zip</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">93305</span>
                	</div>
                </div>
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Birth Date</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">01/01/1901</span>
                	</div>
                </div>
                <div class="row py-1">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Hired</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">01/01/1901</span>
                	</div>
                </div>
                <div class="row py-1 bg-light">
                	<div class="col-3 text-right border-right my-auto">
                		<span><b>Dismissed</b></span>
                	</div>
                	<div class="col-9 my-auto">
                		<span class="break-word">N/A</span>
                	</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	var lid = <?php echo $_SESSION['loc_id']; ?>;
</script>
<?php
endif;
require_once(INCLUDE_PATH . 'footer.php');
?>