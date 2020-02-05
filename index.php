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

				<!-- Company Statement -->
				<div class="welcome-about text-white pt-3">
					<p>Delectable blah blah blah...</p>
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