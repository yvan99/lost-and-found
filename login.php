<?php
require 'inc/server.php';
require 'inc/css.php' ;
if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];
	if (empty($email) || empty($password)) {
		$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Empty fields found ,check your form </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
	} else {
		$client = new client();
		$result = $client->signin($email, $password);
	}
}
?>

<body id="bg">
	<div class="page-wraper" >
	<?php require 'inc/header.php' ?>
		<!-- <div id="loading-area"></div> -->
		<!-- Content -->
		<div class="page-content bg-white login-style2" style="background-image: url(assets/homepageimages/background/bg6.jpg); background-size: cover;">
			<div class="section-full">
				<!-- Login Page -->
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 offset-lg-4">
							<div class="login-2 submit-resume p-a10 seth">
								<div class="tab-content nav">
									<?php echo @$message; ?>
									<form id="login" class="tab-pane active col-12 p-a0 " method="POST">
									<h2 class="font-weight-700 m-b5">Connect account </h2><br>
										<!-- <p class="font-weight-600">If you have an account with us, please log in.</p> -->
										<div class="form-group">
											<?php echo @$result; ?>
											<label>E-Mail Address*</label>
											<div class="input-group">
												<input name="email"  class="form-control" placeholder="Your Email Address" type="email">
											</div>
										</div>
										<div class="form-group">
											<label>Password *</label>
											<div class="input-group">
												<input name="password"  class="form-control " placeholder="Type Password" type="password">
											</div>
										</div>
										<div class="text-center">
											<button class="site-button float-left" name="login">login</button>
											<a class="btn btn-secondary text-dark loat-left" href="./">Back home</a>
											<!-- <a data-toggle="tab" href="#forgot-password" class="site-button-link forget-pass m-t15 float-right"><i class="fa fa-unlock-alt"></i> Forgot Password</a> -->
										</div>
									</form>
									<form id="forgot-password" class="tab-pane fade  col-12 p-a0">
										<p>We will send you an email to reset your password. </p>
										<div class="form-group">
											<label>E-Mail address *</label>
											<div class="input-group">
												<input name="dzName"  class="form-control" placeholder="Your Email Address" type="email">
											</div>
										</div>
										<div class="text-left">
											<a class="site-button outline gray" data-toggle="tab" href="#login">Back</a>
											<button class="site-button pull-right">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Login Page END -->
			</div>
		</div>
		<!-- Content END -->
		<?php require 'inc/footer.php' ?>
		<button class="scroltop fa fa-chevron-up"></button>
	</div>
	<?php require 'inc/js.php' ?>