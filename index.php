<?php
require_once('./inc/config.php');

$title = "Delectable | Reserved For You";
require_once('./inc/header.php');

if(!$_SESSION['active']):
?>

<!-- Viewport Cover -->
<div class="row fit-viewport mx-auto">

	<!-- Column With Background Image (Viewport Cover) -->
	<div class="col-12 welcome-bg px-0">

		<!-- Overlay To Darken Image -->
		<div class="overlay">		

			<!-- Container For Landing Page Content -->
			<!-- Centered Vertically And Horizontally -->
			<div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">

				<!-- Company Name -->
				<h1 class="welcome-title">Delectable</h1>

				<!-- Login/Sign In -->
				<div class="welcome-btn-group pt-3">
					<button type="button" class="btn btn-primary btn-lg">Create Account</button>
					<button type="button" class="btn btn-secondary btn-lg">Login</button>
				</div>

				<div class="welcome-restaurant pt-3">
					<a href="#" class="nav-link text-white welcome-link">
						Own A Restaurant?
					</a>
				</div>

				<!-- Company Statement -->
				<div class="welcome-about text-white pt-5 px-5 px-md-4 px-lg-2 px-xl-0">
					<div class="paragraph-container mx-auto">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida elit metus, quis aliquet arcu blandit id. Duis eu diam gravida eros ornare imperdiet. Etiam in nisl sollicitudin, mollis nunc eget, condimentum elit. Vivamus a rutrum mauris. Nam ac ligula scelerisque, vestibulum lacus sed, rhoncus mi.</p>
					</div>
				</div>
			</div>
			<!-- ./Container -->
		</div>
		<!-- ./Overlay -->
	</div>
	<!-- ./Col -->
</div>
<!-- ./Row -->

<?php
endif;

require_once('./inc/footer.php');
?>