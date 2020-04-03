<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(isset($_SESSION['admin_id']) || isset($_SESSION['emp_id']) || isset($_SESSION['cust_id'])):
	header('Location: /delectable/public_html/'); exit();
else:

$title = "Delectable | Login or Sign Up";
$bodyClasses = "";
require_once(INCLUDE_PATH . 'header.php');
require_once(INCLUDE_PATH . 'navbar.php');
$SUfname = (isset($_SESSION['signup']['fname'])) ? htmlspecialchars($_SESSION['signup']['fname']) : "";
$SUlname = (isset($_SESSION['signup']['lname'])) ? htmlspecialchars($_SESSION['signup']['lname']) : "";
$SUuname = (isset($_SESSION['signup']['uname'])) ? htmlspecialchars($_SESSION['signup']['uname']) : "";
$SUemail = (isset($_SESSION['signup']['email'])) ? htmlspecialchars($_SESSION['signup']['email']) : "";
$LIuname = (isset($_SESSION['login']['uname'])) ? htmlspecialchars($_SESSION['login']['uname']) : "";
?>

<div class="container h-100 mt-5 pt-5">
	<div class="form-wrap row justify-content-center">
		<div class="col-12 col-md-6 col-lg-5 col-xl-4">
			<h1 class="h3 subheader-border">Sign Up</h1>
			<div class="alert signup-alert alert-danger d-none"></div>
			<div class="row mt-3">
				<div class="col pr-1">
					<input type="text" class="form-control rounded-0" placeholder="First Name" value="<?php echo $SUfname; ?>">
				</div>
				<div class="col pl-1">
					<input type="text" class="form-control rounded-0" placeholder="Last Name" value="<?php echo $SUlname; ?>">
				</div>
			</div>
			<input type="text" class="form-control rounded-0 mt-3" placeholder="Username" value="<?php echo $SUuname; ?>">
			<input type="email" class="form-control rounded-0 mt-3" placeholder="Email Address" value="<?php echo $SUemail; ?>">
			<input type="password" class="form-control rounded-0 mt-3" placeholder="Create Password">
			<input type="password" class="form-control rounded-0 mt-3" placeholder="Confirm Password">
			<button class="btn btn-primary btn-block mt-3">Create Account</button>
		</div>
		<div class="col-12 col-md-6 col-lg-5 col-xl-4 mt-3 mt-md-0">
			<h1 class="h3 subheader-border">Login</h1>
			<div class="alert login-alert alert-danger d-none"></div>
			<input type="text" class="form-control rounded-0 mt-3" placeholder="Username" value="<?php echo $LIuname; ?>">
			<input type="password" class="form-control rounded-0 mt-3" placeholder="Password">
			<button class="btn btn-primary btn-block mt-3">Login</button>
		</div>
	</div>
</div>

<?php
unset($_SESSION['signup']);
unset($_SESSION['login']);
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>