<?php require 'inc/css.php';
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';

?>
<div id="loading-area"></div>
<div class="page-wraper">
	<?php require 'inc/header.php' ?>
	<style>
		body {
			margin: 0;
			font-family: Open-sans, sans-serif;
		}

		h1,
		h2,
		h3 {
			font-family: Raleway, Helvetica, sans-serif;
		}

		h2 {
			font-size: 28px;
			font-weight: bold;
			margin-bottom: 30px;
			margin-top: 0;
		}

		.padded {
			padding: 100px 0;
		}

		.wrapper-grey {
			background: #Fff;
		}

		.avatar {
			width: 30px;
			border-radius: 50%;
		}

		.avatar-bordered {
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
			border: white 1px solid;
		}

		.avatar-large {
			width: 50px;
		}

		/* .banner {
  color: white;
  text-align: center;
  height: 100vh;
  background-size: cover !important;
  display: flex;
  align-items: center;
  justify-content: center;
}
.banner h1 {
  font-size: 50px;
  font-weight: bold;
  text-shadow: 0px 1px rgba(0, 0, 0, 0.2);
}
.banner p {
  font-size: 25px;
  font-weight: lighter;
  color: rgba(255, 255, 255, 0.8);
  margin-bottom: 50px;
} */

		.card {
			height: 250px;
			text-shadow: 0 1px 3px rgba(0, 0, 0, 0.6);
			background-size: cover !important;
			color: white;
			position: relative;
			border-radius: 5px;
			margin-bottom: 20px;
		}

		.card-user {
			position: absolute;
			right: 10px;
			top: 10px;
		}

		.card-category {
			position: absolute;
			top: 10px;
			left: 10px;
			font-size: 20px;
		}

		.card-description {
			position: absolute;
			bottom: 10px;
			left: 10px;
		}

		.card-description h2 {
			font-size: 22px;
		}

		.card-description p {
			font-size: 15px;
		}

		.card-link {
			position: absolute;
			top: 0;
			bottom: 0;
			width: 100%;
			z-index: 2;
			background: black;
			opacity: 0;
		}

		.card-link:hover {
			opacity: 0.1;
		}

		.features img {
			width: 100px;
		}

		.features h2 {
			font-size: 20px;
			margin-bottom: 10px;
		}

		.features p {
			font-size: 15px;
			font-weight: lighter;
		}
	</style>

	<!-- Content -->
	<div class="page-content bg-white">

		<!-- contact area -->
		<div class="content-block">
			<!-- Filters Search -->

			<div class="wrapper-grey padded">
				<div class="container">
					<h2 class="text-center">Your next trip</h2>
					<div class="row">
						<div class="col-4">
							<div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('https://i1.wp.com/handluggageonly.co.uk/wp-content/uploads/2015/05/IMG_2813-s.jpg?w=1600&ssl=1');">
								<div class="card-category">City</div>
								<div class="card-description">
									<h2>home</h2>
									<p>Lovely house</p>
								</div>
								<img class="card-user avatar avatar-large" src="https://github.com/lewagon/bootstrap-challenges/blob/master/11-Airbnb-search-form/images/anne.jpg?raw=true">
								<a class="card-link" href="#"></a>
							</div>
						</div>
						
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- scroll top button -->
<button class="scroltop fa fa-arrow-up"></button>

<?php require 'inc/js.php' ?>