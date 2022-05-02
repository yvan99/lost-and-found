	<!-- header -->
	<header class="site-header mo-left header fullwidth">
	    <!-- Main Header -->
	    <div class="sticky-header main-bar-wraper navbar-expand-lg">
	        <div class="main-bar clearfix">
	            <div class="container clearfix">

	                <!-- Nav Toggle Button -->
	                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
	                    data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
	                    aria-expanded="false" aria-label="Toggle navigation">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </button>
	                <!-- Extra Nav -->
	                <div class="extra-nav">
	                    <div class="extra-cell">
	                        <!-- <a href="javascript:void(0);" class="layout-btn">
								<input type="checkbox">
								<span class="mode-label"></span>
							</a> -->

	                        <?php

							@$session = $_SESSION['clientIdLost'];
							if (isset($session)) {
								$selectUser = select('*', 'client', "cli_id='$session'");
								foreach ($selectUser as $user) {
									# code...
								}
							?>
	                        <a href="profile" class="btn btn-warning"> <i class="fa fa-user"></i>
	                            <?php echo strtoupper($user['cli_fname'] . ' ' . $user['cli_lname']) ?></a>
	                        <a class="btn btn-danger" href="logout"> <i class="fa fa-power"></i> Logout</a>
	                        <?php } else { ?>
	                        <a href="signup" class="btn btn-warning"><i class="fa fa-user"></i> Sign Up</a>
	                        <a href="login" class="btn btn-warning"><i class="fa fa-lock"></i> Login</a>

	                        <?php } ?>


	                    </div>
	                </div>
	                <!-- Main Nav -->
	                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
	                    <div class="logo-header">
	                        <a href="index-2.html" class="logo"><img src="assets/homepage/images/logo.png" alt=""></a>
	                        <a href="index-2.html" class="logo-white"><img src="assets/homepage/images/logo-white.png"
	                                alt=""></a>
	                    </div>
	                    <ul class="nav navbar-nav">
	                        <li class="active">
	                            <a href="./">Home</a>

	                        </li>

	                        <li>
	                            <a href="about">about</a>

	                        </li>
	                        <!-- <li>
								<a href="javascript:void(0);">Browse Documents category</a>

							</li> -->
	                        <?php
							if ($session) {

							?><li>
	                            <a href="notifications">Best match</a>

	                        </li>

	                        <li>
	                            <a href="documentreport">Report document</a>

	                        </li>

	                        <li>
	                            <a href="myreports">My reports</a>

	                        </li>

	                        <li>
	                            <a href="myclaims">Document claims</a>

	                        </li>
	                        <?php } ?>


	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Main Header END -->
	</header>
	<!-- header END -->