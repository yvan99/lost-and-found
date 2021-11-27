<?php require 'inc/css.php' ?>
<body id="bg">
<div class="page-wraper">
<div id="loading-area"></div>
    <!-- Content -->
    <div class="page-content bg-white login-style2" style="background-image: url(assets/homepage/images/background/bg6.jpg); background-size: cover;">
        <div class="section-full">
            <!-- Login Page -->
            <div class="container">
                <div class="row">
					<div class="col-lg-6 col-md-6 d-flex">
						<div class="text-white max-w400 align-self-center">
							<div class="logo">
								<a href="index.html"><img src="assets/homepage/images/logo-white2.png" alt=""></a>
							</div>
							<h2 class="m-b10">Login To You Now</h2>
							<p class="m-b40">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
							<ul class="list-inline m-a0">
								<li><a target="_blank" href="https://www.facebook.com/" class="site-button white facebook circle "><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="https://www.linkedin.com/" class="site-button white linkedin circle "><i class="fa fa-linkedin"></i></a></li>
								<li><a target="_blank" href="https://www.instagram.com/" class="site-button white instagram circle "><i class="fa fa-instagram"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/" class="site-button white twitter circle "><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="login-2 submit-resume p-a30 seth">
							<div class="tab-content nav">
								<form id="login" class="tab-pane active col-12 p-a0 ">
									<p class="font-weight-600">If you have an account with us, please log in.</p>
									<div class="form-group">
										<label>E-Mail Address*</label>
										<div class="input-group">
											<input name="dzName" required="" class="form-control" placeholder="Your Email Address" type="email">
										</div>
									</div>
									<div class="form-group">
										<label>Password *</label>
										<div class="input-group">
											<input name="dzName" required="" class="form-control " placeholder="Type Password" type="password">
										</div>
									</div>
									<div class="text-center">
										<button class="site-button float-left">login</button>
										<a data-toggle="tab" href="#forgot-password" class="site-button-link forget-pass m-t15 float-right"><i class="fa fa-unlock-alt"></i> Forgot Password</a> 
									</div>
								</form>
								<form id="forgot-password" class="tab-pane fade  col-12 p-a0">
									<p>We will send you an email to reset your password. </p>
									<div class="form-group">
										<label>E-Mail address *</label>
										<div class="input-group">
											<input name="dzName" required="" class="form-control" placeholder="Your Email Address" type="email">
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
    <button class="scroltop fa fa-chevron-up" ></button>
</div>
<?php require 'inc/js.php' ?>