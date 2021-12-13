<?php require 'inc/css.php';
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/lost-and-found/server/core/init.php';
?>

<body id="bg" style="overflow:hidden;">
    <div id="loading-area"></div>
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>

        <!-- Create Account -->
        <div class="section-full content-inner-2 browse-job bg-white">
            <div class="container">
                <!-- <div class="text-center emp-res">
                    <h1>Report document</h1>
                    <p>Complete Your Steps</p>
                </div> -->
                						
							<?php
							$session=$_SESSION['clientIdLost'];
							if (isset($session)) {
                                $mess = '';
                            }
                            else{
                                $mess = 'none';
                            }
							?>

                <div class="job-bx max-w800 m-auto">
                    <div class="row">
                        <div class="col-lg-6 m-tb10">
                            <div class="create-box bg-gray">
                                <div class="m-b30">
                                    <img src="assets/homepage/images/school-bag.png" width="80" alt="">
                                </div>
                                <div class="clearifx">
                                    <h6 class="m-b10">I Lost document</h6>
                                    <p class="m-b20">I have at least 1 month of work experience</p>
                                    <a href="reportlost" class="site-button" style="display: <?php echo $mess; ?> ;">Report Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 m-tb10">
                            <div class="create-box bg-gray">
                                <div class="m-b30">
                                    <img src="assets/homepage/images/backpack.png" width="80" alt="">
                                </div>
                                <div class="clearifx">
                                    <h6 class="m-b10">I Found a document</h6>
                                    <p class="m-b20">I have just graduated/I haven't worked after graduation</p>
                                    <a href="account-fresher.html" class="site-button" style="display: <?php echo $mess; ?> ;">Report now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Create Account END -->

    </div>

    <?php require 'inc/js.php';
