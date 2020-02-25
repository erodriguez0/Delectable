<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(isset($_SESSION['emp_id'])):
	header('Location: /delectable/public_html/admin/dashboard/');
elseif(isset($_SESSION['admin_id'])):
	header('Location: /delectable/public_html/business/restaurant/');
else:

$title = "Delectable | ";
require_once(INCLUDE_PATH . 'header.php');
?>

<!-- Navigation -->
<nav id="home-nav" class="navbar navbar-expand-lg navbar-dark shadow fixed-top">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="#">Delectable</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/delectable/public_html/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/delectable/public_html/business/">Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/delectable/public_html/admin/">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
                    <input class="form-control" type="text" name="restaurant-search" placeholder="Search restaurants">
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
unset($_SESSION['error']);
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>