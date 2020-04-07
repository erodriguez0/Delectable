<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(isset($_SESSION['admin_id'])):
	header('Location: /delectable/public_html/admin/dashboard/'); exit();
elseif(isset($_SESSION['emp_id'])):
	header('Location: /delectable/public_html/business/dashboard/'); exit();
elseif(isset($_GET['search']) && !empty($_GET['search'])):
$title = "Delectable | Delicious Food Waiting For You";
require_once(INCLUDE_PATH . 'header.php');
require_once(INCLUDE_PATH . 'navbar.php');
require_once(INCLUDE_PATH . 'functions.php');
$term = (isset($_GET['search'])) ? $_GET['search'] : "";
$zip = (isset($_GET['zip'])) ? $_GET['zip'] : "";
$miles = (isset($_GET['miles'])) ? $_GET['miles'] : 5;
$rating = (isset($_GET['rating'])) ? $_GET['rating'] : "";
$city = (isset($_GET['city'])) ? $_GET['city'] : "";
$state = (isset($_GET['state'])) ? (string) $_GET['state'] : 0;
$res_select = (isset($_GET['res'])) ? $_GET['res'] : "";
$cat_select = (isset($_GET['cat'])) ? $_GET['cat'] : "";
$diet_select = (isset($_GET['diet'])) ? $_GET['diet'] : "";
if(!empty($zip)) {
    $city = "";
    $state = "0";
}

if(invalid_searcH($term)) {
    header('Location: /delectable/public_html/'); exit();
}
?>
<script type="text/javascript">
    var state = "<?php echo $state; ?>";
    var miles = "<?php echo $miles; ?>";
    var rating = "<?php echo $rating; ?>";
    var res_select = <?php echo json_encode($res_select); ?>;
    var cat_select = <?php echo json_encode($cat_select); ?>;
    var diet_select = <?php echo json_encode($diet_select); ?>;
</script>
<form method="GET" action="./" id="restaurant-search">
<div id="search-results" class="container after-nav">
    <div class="row pt-3">
        <div class="col-12 px-md-0">
            <div class="row no-gutters">
                <div class="sort-dd col-6 col-md-3 pl-0 order-2 order-md-1 mt-3 mt-md-0">
                    <!-- <span class="pr-2">Sort: </span> -->
                    <select class="form-control">
                        <option>Rating</option>
                        <option>Alphabetical</option>
                    </select>
                </div>
                <div class="col-6 d-md-none order-2 order-md-1 mt-3 mt-md-0">
                    <button class="btn btn-primary d-block d-lg-none btn-block border rounded mb-3" data-toggle="collapse" type="button" data-toggle="collapse" data-target="#filter-bar">Filter</button>
                </div>
                <div class="search-box col-12 col-md-9 mt-md-0 pl-md-3 pr-0 order-1 order-md-2">
                    <!-- <form class="w-100" method="GET" action="./"> -->
                        <div class="input-group">
                            <input id="search-restaurants" type="text" class="form-control" placeholder="Look up restaurants" name="search" value="<?php echo $term; ?>">
                            <div class="input-group-append">
                                <input id="search-restaurants-btn" class="btn btn btn-primary rounded-right border" type="submit" value="Search" onclick="return validate_search();">
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3 col-xl-3 mt-3 px-md-0">

            <div id="filter-bar" class="collapse d-hidden d-lg-block bg-light p-3">
            <!-- <form method="GET" action="./"> -->
            <label>Find Nearby</label>
            <?php 
            echo ((!empty($zip) && !empty($miles)) || (!empty($state) && !empty($city))) ? '
            <button id="reset-radius" class="btn-link-alt table-link text-link pr-0 float-right">Reset</button>' : ""; 
            ?>
            <div class="cb-list">
                <div class="row no-gutters">
                    <div class="col-8 pr-2">
                        <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $city; ?>">
                    </div>
                    <div class="col-4">
                        <select id="state-filter" class="form-control state-select" name="state" value="<?php echo $state; ?>">
                            <option value="0">State</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center row no-gutters">
                    <div class="col-5">
                        <hr>
                    </div>
                    <div class="1">
                        <small>OR</small>
                    </div>
                    <div class="col-5">
                        <hr>
                    </div>
                </div>
                <input type="number" class="form-control" pattern="\b\d{5}\b" placeholder="Zip Code" name="zip" value="<?php echo $zip; ?>">
                <div class="row no-gutters mt-3">
                    <div class="col-7">
                        <select id="mile-radius" class="form-control w-50 d-inline miles-filter" name="miles">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                        </select>
                        <label class="pl-2">Miles</label>
                    </div>
                    <div class="col-5">
                        <input type="submit" class="btn btn-primary rounded mb-2 btn-block" value="Update">
                    </div>
                </div>
            </div>
            <!-- </form> -->
            <!-- ./Distance Filter -->

            <!-- <form method="GET" action="./"> -->
            <label class="mt-3">Rating</label>
            <?php 
            echo (isset($rating) && !empty($rating)) ? '
            <button id="reset-rating" class="btn-link-alt table-link text-link pr-0 float-right mt-3">Reset</button>' : ""; 
            ?>
            <div class="cb-list">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="4" name="rating">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="3" name="rating">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="2" name="rating">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="1" name="rating">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="0" name="rating">
                        No Reviews
                    </label>
                </div>
                <!-- <input type="submit" class="btn btn-primary rounded mb-2 mt-3 btn-block" value="Update"> -->
            </div>
            <!-- </form> -->
            <!-- ./Rating Checkboxes -->

            <label class="mt-3">Cuisine</label>
            <?php 
            echo (isset($cat_select) && !empty($cat_select)) ? '
            <button id="reset-cat-select" class="btn-link-alt table-link text-link pr-0 float-right mt-3">Reset</button>' : ""; 
            ?>
            <div class="cb-list cat-filter"><div class="cb-list-child">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="1" name="cat[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="2" name="cat[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="3" name="cat[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="4" name="cat[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="5" name="cat[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="6" name="cat[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="7" name="cat[]">Res 1
                    </label>
                </div>
            </div>
            <!-- <input type="submit" class="btn btn-primary rounded mt-3 btn-block" value="Update"> -->
            </div>

            <!-- <form method="GET" action="./"> -->
            <label class="mt-3">Restaurants</label>
            <?php 
            echo (isset($res_select) && !empty($res_select)) ? '
            <button id="reset-res-select" class="btn-link-alt table-link text-link pr-0 float-right mt-3">Reset</button>' : ""; 
            ?>
            <div class="cb-list res-filter"><div class="cb-list-child">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="1" name="res[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="2" name="res[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="3" name="res[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="4" name="res[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="5" name="res[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="6" name="res[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="7" name="res[]">Res 1
                    </label>
                </div>
            </div>
            <!-- <input type="submit" class="btn btn-primary rounded mt-3 btn-block" value="Apply Filter"> -->
            </div>
            <!-- </form> -->
            <!-- ./Restaurant List -->

                        <!-- <form method="GET" action="./"> -->
            <label class="mt-3">Dietary Need</label>
            <?php 
            echo (isset($diet_select) && !empty($diet_select)) ? '
            <button id="reset-diet-select" class="btn-link-alt table-link text-link pr-0 float-right mt-3">Reset</button>' : ""; 
            ?>
            <div class="cb-list diet-filter"><div class="cb-list-child">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="1" name="diet[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="2" name="diet[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="3" name="diet[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="4" name="diet[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="5" name="diet[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="6" name="diet[]">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="7" name="diet[]">Res 1
                    </label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary rounded mt-3 btn-block" value="Apply Filter">
            </div>
            <!-- </form> -->
            <!-- ./Diet List -->

        </div>
        <!-- ./Filter Container -->
        </div>
        <div class="col-12 col-lg-9 col-xl-9">
            <div class="row">

                <!-- Restaurant Card -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 pt-3">
                    <div class="card">
                        <img class="card-img" src="https://via.placeholder.com/150">
                        <div class="card-body">
                            <h4 class="card-title">Subway</h4>
                            <h6 class="card-subtitle mb-2 text-muted d-flex align-items-center">
                                <span class="fas fa-star star-checked"></span>
                                <span class="fas fa-star star-checked"></span>
                                <span class="fas fa-star star-checked"></span>
                                <span class="fas fa-star star-checked"></span>
                                <span class="fas fa-star"></span>
                                <span class="ml-2">-</span>
                                <span class="ml-2" style="color: #85bb65; font-family: Helvetica;">$$</span><span style="font-family: Helvetica;">$$$</span>
                            </h6>
                            <p class="card-text">
                                The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.             
                            </p>
                            <div class="d-flex align-items-center">
                                <a href="#" class="btn btn-primary mt-3 btn-sm card-btn"><i class="fas fa-calendar-alt"></i> Reserve</a>
                                <a href="#" class="btn btn-primary mt-3 btn-sm ml-2 card-btn"><i class="fas fa-shopping-cart"></i> Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Restaurant Card -->

            </div>
            <!-- ./Restaurants List Row -->
        </div>
    </div>
</div>
</form>

<?php
else:

$title = "Delectable | Delicious Food Waiting For You";
require_once(INCLUDE_PATH . 'header.php');
require_once(INCLUDE_PATH . 'navbar.php');
?>
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
    <div class="overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white text-uppercase">
                        Delectable
                    </h1>
                    <p class="lead text-white">
                        Skip the line. Table reservations at your fingertips.
                    </p>
                    <div class="masthead-input mx-auto w-50">
                        <form method="GET" action="./">
                        <div class="input-group mb-3">
                            <input id="search-restaurants" type="text" class="form-control" placeholder="Look up restaurants" name="search">
                            <div class="input-group-append">
                                <input id="search-restaurants-btn" class="btn btn btn-primary rounded-right border" type="submit" value="Search" onclick="return validate_search();">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Page Content -->
<section class="py-5">
    <div class="container">
        <h2 class="font-weight-light">Page Content</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ab nulla dolorum autem nisi officiis blanditiis voluptatem hic, assumenda aspernatur facere ipsam nemo ratione cumque magnam enim fugiat reprehenderit expedita.</p>
    </div>
</section>
<?php
endif;
unset($_SESSION['error']);
require_once(INCLUDE_PATH . 'footer.php');
?>