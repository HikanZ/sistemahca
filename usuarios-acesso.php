<!DOCTYPE html>
<html lang="pt-br" class="">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Minha Conta | Sistema HcA</title>

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<!--link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet"-->
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

	<!--================ Start Require Area =================-->
	<?php require "header.php" ?>
	<?php require "inc/links.php" ?>
	<!--================ End Require Area =================-->

	<!--================ Start Team Area =================-->
	<section class="team-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center">
					<div class="section-title" style="padding-bottom: 40px;">
						<h1 style="letter-spacing: 3px; text-transform: none;">
							<label class="backbtn" onclick="<?php echo $linkusers; ?>"><i class="fas fa-angle-left"></i></label>
							Acesso usuário
						</h1>
						<p>Obs.: Você deverá inserir o link completo, incluindo a extensão do tipo de imagem.</p>
						<p>As extensões podem ser do tipo .png .jpg </p>
						<p>Exemplo.: https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png </p>
						<p>Você pode clicar ou pressionar uma imagem e escolher a opção copiar endereço da imagem e inserir no campo abaixo.</p>
					</div>
				</div>
			</div>
			<div class="border1"></div>
			<form action="<?php echo $linksetoraddp ?>">
				<div class="row justify-content-md-center">

						<div class="col-lg-6 col-md-8">
							<h5 class="mb-30" style="color: #4db8ff;"></h3>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="fas fa-image" aria-hidden="true"></i></div>
									<input type="text" name="first_name" placeholder="Insira o link da imagem" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira o link da imagem'"
									 required class="single-input">
								</div>
								<button class="btn" type="submit" name="setor-cadastrar">Trocar avatar</button>
						</div>
				</div>
			</form>
		</div>
	</section>
	<!--================ End Team Area =================-->
	<!--================ Start Footer Area =================-->
	<footer class="footer-area section-gap fixed-bottom">
		<div class="container">
			<div class="row justify-content-md-center footer-inner">
				<div class="col-sm-2"></div>
				<div class="col-sm-2"><img src="img/logologin.png" alt="" style="width:40px; height:40px;"></div>
				<div class="col-sm-4">Sistema Healthcare Assessment</div>
				<div class="col-sm-2"></div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area =================-->
	<!-- Comentários: -->
	<!-- Link para a máscara de data e cpf: https://bootstrapstudio.io/tutorials/input-masks -->

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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script src="js/datemask.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/main.js"></script>
	<script src="js/searchuser.js"></script>
</body>

</html>
