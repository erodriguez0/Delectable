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
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	    <h1 class="h2">Menu</h1>
	</div>
	<div class="manager-main row">
		<div class="col-12 col-lg-6 restaurant-edit-form-wrap">

			<div class="row">
                <div class="col-12">

                	<div class="add-category-wrapper">
                		<h1 class="h3 subheader-border">Add Category</h1>
                		<div class="menu-add-form mt-3">
                			<input id="add-category-name" class="form-control rounded-0 mt-3" type="text" name="add-category-name" placeholder="Category name...">
                			<button id="add-category-btn" class="btn btn-primary btn-block mt-3" role="button">Add Category</button>
                		</div>
                	</div>

                	<!-- Add Category Form -->
                	<div class="add-item-wrapper mt-3">
	                	<h1 class="h3 subheader-border">Add Item</h1>
	                	<div class="menu-add-form mt-3">
	                		<select id="add-item-category" class="w-100 custom-select rounded-0" name="add-item-category">
	                			<option value="0">Choose category...</option>
	                			<!-- Grab list from DB -->
	                		</select>
	                		<div class="row">
		                		<div class="col-12 col-lg-8">
		                			<input id="add-item-name" class="form-control rounded-0 mt-3" type="text" name="add-item-name" placeholder="Item name...">
		                		</div>
		                		<div class="col-12 col-lg-4">
		                			<input id="add-item-price" class="form-control rounded-0 mt-3" type="number" name="add-item-price" placeholder="$0.00" min="0.00" max="10000.00" step="0.01">
		                		</div>
		                	</div>
	                		<textarea id="add-item-description" class="form-control rounded-0 mt-3" name="add-item-description" placeholder="Item description..." rows="6"></textarea>
	                		<button id="add-item-btn" class="btn btn-primary btn-block mt-3" role="button">Add Item</button>
	                	</div>
	                </div>
	                <!-- ./Add Item Form -->
                </div>
            </div>
		</div>

		<div class="col-12 col-lg-6 restaurant-edit-form-wrap mt-3 mt-lg-0">
			<div class="row">
                <div class="col-12">
                	<h1 class="h3 subheader-border">Menu Preview</h1>

                	<!-- Menu Category -->
            		<h1 class="h5 subheader-border mt-3 row mx-0">
            			<div class="col-9 pl-0">
            				Burgers
            			</div>
            			<div class="col-3 pr-0 text-right">
            				<small class="">
            					<a href="#" class="text-link">Edit</a>
            					|
            					<a href="#" class="text-link">Remove</a>
            				</small>
            			</div>
            		</h1>

                	<div class="menu-list">

                		<!-- Menu Item -->
                		<div class="menu-item row mt-3">
	                		<div class="col-2 d-flex justify-content-center align-items-center pr-0">
	                			<img src="https://via.placeholder.com/50" class="img-thumbnail rounded-0">
	                		</div>

	                		<div class="col-8 d-flex justify-content-left align-items-center">
	                			Super Banger Burger
	                		</div>

	                		<div class="col-2 d-flex justify-content-center align-items-center pl-0">
                				<span class="text-success">$4.99</span>
                			</div>

	                		<div class="col-12 d-flex justify-content-center align-items-center text-muted mt-3">
	                			<small><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus arcu porttitor convallis sagittis. Quisque volutpat nisl commodo lacus pulvinar ullamcorper.</i></small>
	                		</div>

	                		<div class="col-12 mt-3">
								<div class="btn-group special" role="group">
									<button type="button" class="btn btn-primary btn-sm">Edit Item</button>
									<button type="button" class="btn btn-primary btn-sm">Remove</button>
								</div>
	                		</div>
	                	</div>
	                	<!-- ./Menu Item -->

	                	<!-- Menu Item -->
	                	<div class="menu-item row mt-3">
	                		<div class="col-2 d-flex justify-content-center align-items-center pr-0">
	                			<img src="https://via.placeholder.com/50" class="img-thumbnail rounded-0">
	                		</div>

	                		<div class="col-8 d-flex justify-content-left align-items-center">
	                			Banger Burger Jr
	                		</div>

	                		<div class="col-2 d-flex justify-content-center align-items-center pl-0">
                				<span class="text-success">$3.99</span>
                			</div>

	                		<div class="col-12 d-flex justify-content-center align-items-center text-muted mt-3">
	                			<small><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus arcu porttitor convallis sagittis. Quisque volutpat nisl commodo lacus pulvinar ullamcorper.</i></small>
	                		</div>

	                		<div class="col-12 mt-3">
								<div class="btn-group special" role="group">
									<button type="button" class="btn btn-primary btn-sm">Edit Item</button>
									<button type="button" class="btn btn-primary btn-sm">Remove</button>
								</div>
	                		</div>
	                	</div>
	                	<!-- ./Menu Item -->
	                	
                	</div>
                	<div class="mt-2"></div>
                	<!-- ./Menu Category -->
                </div>
            </div>
		</div>
	</div>
</main>

<?php
endif;
require_once(INCLUDE_PATH . 'footer.php');
?>