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
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create-account-modal">Create Account or Login</button>

					<!-- Create Account/Login Modal -->
					<div class="modal fade" id="create-account-modal" tabindex="-1" role="dialog">
						<!-- Large Modal -->
						<div class="modal-dialog modal-dialog-centered modal-lg">
							<div class="modal-content">
								<!-- Header -->
								<div class="modal-header">
									<h5 class="modal-title">Create Account or Login</h5>
									<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
								</div>

								<!-- Modal Body -->
								<div class="modal-body">

									<!-- Fit Content To Modal -->
									<!-- Two Forms / Two Columns -->
									<div class="container-fluid">
										<div class="row">

											<!-- Create Account Form -->
											<form class="col-6" method="POST" action="./inc/scripts/create-account.php">
												<!-- Name Fields -->
												<div class="row pt-4">
													<div class="col-6">
														<input type="text" class="form-control <?php echo $_SESSION['error']['fname']; ?>" name="first-name" placeholder="First Name" value="<?php echo $_SESSION['create']['fname']; ?>" required>
													</div>
													<div class="col-6">
														<input type="text" class="form-control <?php echo $_SESSION['error']['lname']; ?>" name="last-name" placeholder="Last Name" value="<?php echo $_SESSION['create']['lname']; ?>">
													</div>
												</div>
												<!-- Username -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="text" class="form-control <?php echo $_SESSION['error']['uname']; ?>" name="username" placeholder="Userame" value="<?php echo $_SESSION['create']['uname']; ?>">
													</div>
												</div>
												<!-- Email -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="email" class="form-control <?php echo $_SESSION['error']['email']; ?>" name="email" placeholder="Email" value="<?php echo $_SESSION['create']['email']; ?>">
													</div>
												</div>
												<!-- Create Password -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="password" class="form-control" name="create-password" placeholder="Create Password">
													</div>
												</div>
												<!-- Confirm Password -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
													</div>
												</div>
												<!-- Submit Create Account Form -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="submit" class="btn btn-primary" name="create-account" value="Create Account">
													</div>
												</div>
											</form>

											<!-- Login Form -->
											<form class="col-6">
												<!-- Username -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="text" class="form-control <?php echo $_SESSION['error']['uname']; ?>" name="username" placeholder="Userame" value="<?php echo $_SESSION['form']['uname']; ?>">
													</div>
												</div>
												<!-- Password -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="password" class="form-control" name="password" placeholder="Password">
													</div>
												</div>
												<!-- Submit Login Form -->
												<div class="row pt-4">
													<div class="col-12">
														<input type="submit" class="btn btn-primary" name="login-account" value="Login">
													</div>
												</div>
											</form>
										</div>
										<!-- ./Row -->
									</div>
									<!-- ./Container Fluid -->
								</div>
								<!-- ./Modal Body -->

								<!-- Modal Footer -->
								<!-- TODO: Links for restaurant owners etc. -->
								<div class="modal-footer">
									
								</div>
							</div>
						</div>
					</div>

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

// Unset sticky form input and errors
unset($_SESSION['error']);
unset($_SESSION['create']);

require_once('./inc/footer.php');
?>