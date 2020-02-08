<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/inc/config.php');

if($_SESSION['active']):
	header('Location: /delectable/public_html');
else:

$title = "Delectable | Admin Portal";
require_once(INCLUDE_PATH . 'header.php');
?>
<div class="row mx-0">
	<div class="col-12">
		<h1 class="text-center py-3">Admin Portal</h1>
		<form method="POST" action="/delectable/resources/inc/scripts/admin-login.php">
			<div class="row">
				<div class="col-12">
					<div class="admin-form-wrap mx-auto">
						<input class="form-control mb-3" type="text" placeholder="Username" value="<?php echo $_SESSION['login']['uname']; ?>" required>
						<input class="form-control mb-3" type="password" placeholder="Password" required>
						<input class="btn btn-primary btn-block" type="submit" value="Login">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>