<?php require 'inc/css.php' ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';
if(isset($_POST['signup'])){
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];


$client = new client($fname,$lname,$phone,$email,$password);

$client->signup();
}



?>
<div id="loading-area"></div>
<div class="page-wraper">
<?php require 'inc/header.php' ?>
<!-- contact area -->
<div class="section-full content-inner browse-job bg-white shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 m-b10">
						<div class="card max-w700 radius-sm m-auto border-1">
							<div class="tab-content">
								<form id="login" class="tab-pane active" method="post">
									<h4 class="font-weight-700 m-b5">PERSONAL INFORMATION</h4>
									<p class="font-weight-600">If you have an account with us, please log in.</p>
									<div class="row">
                                    <div class="form-group col-6">
										<label class="font-weight-700">First Name *</label>
										<input name="firstname" required="" class="form-control" type="text">
									</div>
									<div class="form-group col-6">
										<label class="font-weight-700">Last Name *</label>
										<input name="lastname" required="" class="form-control" type="text">
									</div>
                                    </div>

                                    <div class="row">
									<div class="form-group col-6">
										<label class="font-weight-700">E-MAIL *</label>
										<input name="email" required="" class="form-control" type="text">
									</div>


                                    <div class="form-group col-6">
										<label class="font-weight-700">Phone number</label>
										<input name="phone" required="" class="form-control" type="text">
									</div>
                                    </div>

									<div class="form-group col-6">
										<label class="font-weight-700">Password *</label>
										<input name="password" required="" class="form-control" type="password">
									</div>
									<div class="text-left">
										<button class="site-button button-lg outline outline-2" name="signup">CREATE ACCOUNT</button>
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
    <button class="scroltop fa fa-arrow-up" ></button>

    <?php require 'inc/js.php' ?>