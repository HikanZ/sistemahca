<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access-admin.php";
?>
<!--================ End Require Area =================-->
<!DOCTYPE html>
<html lang="pt-br" class="">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 	<!-- Mobile Specific Meta -->
	<link rel="shortcut icon" href="img/fav.png"> 	<!-- Favicon-->
	<meta name="author" content="CodePixar"> 	<!-- Author Meta -->
	<meta name="description" content="">	<!-- Meta Description -->
	<meta name="keywords" content="">	<!-- Meta Keyword -->
	<meta charset="UTF-8">	<!-- meta character set -->

	<title>Usuários | Sistema HcA</title>	<!-- Site Title -->

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<!--link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet"-->
	<!-- CSS ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/availability-calendar.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body style="background: url('img/MainPiclite.png') center; background-attachment: fixed;">
	<!--================ Start Team Area =================-->
	<section class="team-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center">
					<div class="section-title" style="padding-bottom: 40px;">
						<h1 style="letter-spacing: 3px; text-transform: none;">
							<label class="backbtn" onclick="<?php echo $linkmenu; ?>"><i class="fas fa-angle-left"></i></label>
							Usuários
						</h1>
					</div>
				</div>
			</div>
			<div class="border1"></div>
			<div class="row">
				<!-- single member -->
				<div class="col-lg-4 col-md-4 flex">
					<div class="service-box">
						<div class="service-icon" onclick=" <?php echo $linkadduser; ?> ">
							<i class="fas fa-user-plus"></i>
						</div>
						<p class="title">Adicionar</p>
						<p class="desc">Adiciona um usuário</p>
					</div>
				</div>
				<!-- single member -->
				<div class="col-lg-4 col-md-4 flex">
					<div class="service-box">
						<div class="service-icon" onclick=" <?php echo $linksearchuser; ?> ">
							<i class="fas fa-user-tag"></i>
						</div>
						<p class="title">Pesquisar</p>
						<p class="desc">Procura e lista os usuários</p>
					</div>
				</div>
				<!-- single member -->
				<div class="col-lg-4 col-md-4 flex">
					<div class="service-box">
						<div class="service-icon" onclick=" <?php echo $linkaccessuser; ?> ">
							<i class="fas fa-user-shield"></i>
						</div>
						<p class="title">Acesso</p>
						<p class="desc">Libera ou bloqueia o acesso</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Team Area =================-->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/owl-carousel-thumb.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.tabs.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
