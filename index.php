<?php 
require 'inc/server.php';
require 'inc/userCheck.php';
require 'inc/css.php';
?>

<body id="bg">
    <!--  <div id="loading-area"></div> -->
    <div class="page-wraper">
        <?php require 'inc/header.php' ?>
        <!-- Content -->
        <div class="page-content">
            <!-- Section Banner -->
            <div class="dez-bnr-inr dez-bnr-inr-sm main-slider">
                <div class="container">
                    <div class="dez-bnr-inr-entry align-m">
                        <div class="find-job-bx">

                            <a href="javascript:void(0);" class="button-lg offset-3 btn-warning rounded mb-2">Lost and
                                Found Management Information System</a>
                            <h4 class="text-white offset-4 mt-5"> <img src="assets/homepage/images/icons/search.png"
                                    alt=""> Find your document</h2>
                                <form class="dezPlaceAni offset-2" method="POST">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-6">
                                            <div class="form-group">
                                                <!-- <label>Search your Document</label> -->
                                                <div class="input-group">
                                                    <input type="text" id="search-box" class="form-control"
                                                        placeholder=""
                                                        style="border:none !important;background-color:transparent !important;height:40px !important;border-radius:4px;margin-left:40px;width:100%;">
                                                    <div id="suggesstion-box" class="offset-5"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-lg-2 col-md-6">
									<button type="submit" class="site-button btn-block">Find Document</button>
								</div> -->
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section Banner END -->
            <!-- About Us -->
            <div class="section-full job-categories content-inner-2 bg-white">
                <div class="container">
                    <div class="section-head d-flex head-counter clearfix">
                        <div class="mr-auto">
                            <h2 class="m-b5">Documents Categories</h2>
                            <!-- <h6 class="fw3">20+ Catetories work wating for you</h6> -->
                        </div>
                        <!-- <div class="head-counter-bx">
						<h2 class="m-b5 counter">1800</h2>
						<h6 class="fw3">Jobs Posted</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5 counter">4500</h2>
						<h6 class="fw3">Tasks Posted</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5 counter">1500</h2>
						<h6 class="fw3">Freelancers</h6>
					</div> -->
                    </div>
                    <div class="row sp20">
                        <?php 
					$categoryFetcher  =  select('*','document_type',"1");
					foreach ($categoryFetcher  as $category) :
					?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="icon-bx-wraper">
                                <div class="icon-content">
                                    <a href="#" class="dez-tilte"><?php echo $category['doctype_name'] ?></a>
                                    <!-- <p class="m-a0">198 Open Positions</p> -->

                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>

                        <!-- 
					<div class="col-lg-12 text-center m-t30">
						<a href="category-all-jobs.html" class="site-button radius-xl">All Categories</a>
					</div> -->
                    </div>
                </div>
            </div>
            <!-- About Us END -->



        </div>
        <!-- Content END-->
        <?php require 'inc/footer.php' ?>
        <!-- scroll top button -->
        <button class="scroltop fa fa-arrow-up"></button>
    </div>
    <?php require 'inc/js.php' ?>

    <script>
    $(document).ready(function() {
        $("#search-box").keyup(function() {
            $.ajax({
                type: "POST",
                url: "searchdoc",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    $("#search-box").css("background",
                        "#FFF url(assets/homepage/images/gif/loading.gif) no-repeat 165px"
                    );
                },
                success: function(data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background", "#FFF");
                }
            });
        });
    });

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script>