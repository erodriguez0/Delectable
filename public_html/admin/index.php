<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(isset($_SESSION['admin_id'])):
	header('Location: /delectable/public_html');
else:

$title = "Delectable | Admin Portal";
require_once(INCLUDE_PATH . 'header.php');
?>
<div class="row mx-0">
	<div class="col-12">
		<h1 class="text-center py-3">Admin Portal</h1>
		<form method="POST" action="/delectable/resources/scripts/admin-login.php">
			<div class="row">
				<div class="col-12">
					<div class="admin-form-wrap mx-auto">
						<?php if(isset($_SESSION['error'])): ?>
							<div class="alert alert-danger">
								<?php echo $_SESSION['error']; ?>
							</div>
						<?php endif; ?>
						<input class="form-control mb-3" type="text" placeholder="Username" value="<?php echo $_SESSION['login']['uname']; ?>" name="admin-username" required>
						<input class="form-control mb-3" type="password" placeholder="Password" name="admin-password" required>
						<input class="btn btn-primary btn-block" type="submit" value="Login" name="admin-login">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
unset($_SESSION['error']);
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>