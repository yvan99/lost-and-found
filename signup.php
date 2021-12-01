<?php require 'inc/css.php' ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/core/init.php';
if (isset($_POST['signup'])) {
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['passwordconfirm'];
	if (empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($password) || empty($confirmPassword)) {
		$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Empty fields found ,check your form </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
	} elseif ($password != $confirmPassword) {
		$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Password mismatch </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
	} else {
		$client = new client($fname, $lname, $phone, $email, $password);
		$client->signup();
	}
}



?>
<body style="overflow:hidden;">

<div id="loading-area"></div>
<div class="page-wraper">
	<?php require 'inc/header.php' ?>
	<!-- contact area -->
	<div class="section-full content-inner browse-job bg-white" >
		<!-- Product -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 m-b10">
					<div class="card max-w700 radius-sm m-auto m-t70plus border-0">
						<div class="tab-content">
							<?php echo @$message; ?>
							<form id="login" class="tab-pane active" method="post">
								<h4 class="font-weight-700 m-b5">PERSONAL INFORMATION</h4>
								<p class="font-weight-600">If you have an account with us, please log in.</p>
								<div class="row">
									<div class="form-group col-6">
										<label class="font-weight-700">First Name *</label>
										<input name="firstname" class="form-control" type="text">
									</div>
									<div class="form-group col-6">
										<label class="font-weight-700">Last Name *</label>
										<input name="lastname" class="form-control" type="text">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-6">
										<label class="font-weight-700">E-MAIL *</label>
										<input name="email" class="form-control" type="text">
									</div>


									<div class="form-group col-6">
										<label class="font-weight-700">Phone number</label>
										<input name="phone" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-6">
										<label class="font-weight-700">Password *</label>
										<input name="password" class="form-control" type="password">
									</div>
									<div class="form-group col-6">
										<label class="font-weight-700">Confirm Password *</label>
										<input name="passwordconfirm" class="form-control" type="password">
									</div>
								</div>
								<div class="text-left">
									<button class="site-button button-lg" name="signup">Get started</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Product END -->
	</div>
	<!-- contact area  END -->
</div>

<!-- scroll top button -->
<button class="scroltop fa fa-arrow-up"></button>

<?php require 'inc/js.php' ?>