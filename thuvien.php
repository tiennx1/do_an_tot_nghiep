<?php

include 'ketnoi/ketnoi.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
?>
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/ico/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/ico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/ico/favicon-16x16.png">
	<link rel="manifest" href="assets/ico/manifest.json">
	<link rel="mask-icon" href="assets/ico/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="assets/ico/favicon.ico">
	<meta name="msapplication-config" content="assets/ico/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<title>Thư viện</title>

	<!-- CSS Plugins -->
	<link rel="stylesheet" href="assets/plugins/lightbox/css/lightbox.min.css">
	<link rel="stylesheet" href="assets/plugins/flickity/flickity.min.css">

	<!-- CSS Global -->
	<link rel="stylesheet" href="assets/css/gallery.css">
    <link rel="stylesheet" href="styles_using/light_box.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles_using/font.css">
    <link rel="stylesheet" href="styles_using/home_giaodien.css">
    <link rel="stylesheet" href="styles_using/oder-slider.css">
    <script src="https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js"></script>
  </head>
  

	<?php include 'user/user_header.php'?>
	

	<?php include 'darklight.php';?>
	<!-- GALLERY
	================================================== -->
	<section class="section section_gallery">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Heading -->
					<h2 class="section__heading text-center" style="margin-top:150px">
						Thư viện
					</h2>

					<!-- Subheading -->
					<p class="section__subheading text-center">
						Nơi có rất nhiều ảnh về quán của chúng tôi
					</p>

				</div>
			</div> <!-- / .row -->
			<div class="row section_gallery__grid">
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/coffee.jpg" data-lightbox="gallery">
						<img src="assets/img/coffee.jpg" class="img-fluid" alt="...">
					</a>

				</div>
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/16.jpg" data-lightbox="gallery">
						<img src="assets/img/16.jpg" class="img-fluid" alt="...">
					</a>

				</div>
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/13.jpg" data-lightbox="gallery">
						<img src="assets/img/13.jpg" class="img-fluid" alt="...">
					</a>

				</div>
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/background1.jpg" data-lightbox="gallery">
						<img src="assets/img/background1.jpg" class="img-fluid" alt="...">
					</a>

				</div>
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/ga4.jpg" data-lightbox="gallery">
						<img src="assets/img/ga4.jpg" class="img-fluid" alt="...">
					</a>

				</div>
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/18.jpg" data-lightbox="gallery">
						<img src="assets/img/18.jpg" class="img-fluid" alt="...">
					</a>

				</div>
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/hakka.jpg" data-lightbox="gallery">
						<img src="assets/img/hakka.jpg" class="img-fluid" alt="...">
					</a>

				</div>
				<div class="col-6 col-sm-6 col-md-4 section_gallery__grid__item">

					<a href="assets/img/32.jpg" data-lightbox="gallery">
						<img src="assets/img/32.jpg" class="img-fluid" alt="...">
					</a>

				</div>
			</div> <!-- / .row -->
		</div> <!-- / .container -->
	</section>

	<?php include 'ketnoi/user_footer.php';?>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- JS Plugins -->
     <script src="javascript/java.js"></script>

	<!-- JS Custom -->

	<script src="javascript/theme1.js"></script>
  </body>
</html>
