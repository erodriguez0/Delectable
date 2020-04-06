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
$term = $_GET['search'];
if(invalid_searcH($term)) {
    header('Location: /delectable/public_html/'); exit();
}
?>

<div id="search-results" class="container after-nav">
    <div class="row pt-3">
        <div class="col-12 px-0">
            <div class="row">
                <div class="sort-dd col-12 col-md-3 d-flex align-items-center">
                    <!-- <span class="pr-2">Sort: </span> -->
                    <select class="form-control">
                        <option>Rating</option>
                        <option>Alphabetical</option>
                    </select>
                </div>
                <div class="search-box col-12 col-md-9 mt-3 mt-md-0">
                    <form class="w-100" method="GET" action="./">
                        <div class="input-group">
                            <input id="search-restaurants" type="text" class="form-control" placeholder="Look up restaurants" name="search" value="<?php echo $term; ?>">
                            <div class="input-group-append">
                                <input id="search-restaurants-btn" class="btn btn btn-primary rounded-right border" type="submit" value="Search" onclick="return validate_search();">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3 col-xl-3 mt-3 bg-light p-3">
            <label>Rating</label>
            <div class="cb-list"><div class="cb-list-child">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">
                        <span class="fa fa-star star-checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">
                        No Reviews
                    </label>
                </div>
            </div></div>
            <!-- ./Rating Checkboxes -->

            <label class="mt-3">Restaurants</label>
            <div class="cb-list"><div class="cb-list-child">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Res 1
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Res 1
                    </label>
                </div>
            </div></div>
        </div>
        <div class="col-12 col-lg-9 col-xl-9">
    </div>
</div>

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