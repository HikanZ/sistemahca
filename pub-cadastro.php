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
	<title>Usuários | Sistema HcA</title>

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<!--link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet"-->
	<!--
			CSS
			============================================= -->
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
							<label class="backbtn" onclick="window.location.href='login.php'"><i class="fas fa-angle-left"></i></label>
							Cadastre-se
						</h1>
						<p>Ao criar a sua conta, a mesma estará bloqueada.</p>
						<p>Contate um administrador para que o seu acesso seja liberado.</p>
					</div>
				</div>
			</div>
			<div class="border1"></div>
			<div class="row justify-content-md-center">
				<div class="col-lg-6 col-md-8">
					<h5 class="mb-30" style="color: #4db8ff;">Os campos marcados com  *  são obrigatórios.</h3>
					<form action="inc/signuppub.inc.php" method="post" autocomplete="off">
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-user" aria-hidden="true"></i></div>
							<input type="text" name="uid" placeholder="Nome *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-user-friends" aria-hidden="true"></i></div>
							<input type="text" name="uidlast" placeholder="Sobrenome *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sobrenome *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-birthday-cake" aria-hidden="true"></i></div>
							<input type="text" id="birth-date" name="birthdayuid" placeholder="Data de Nascimento * DD/MM/AAAA" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Data de Nascimento * DD/MM/AAAA'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
							<input type="text" name="mail" placeholder="Email *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-lock" aria-hidden="true"></i></div>
							<input type="password" name="pwd" placeholder="Senha *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha *'"
							 required class="single-input" autocomplete="new-password">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-lock" aria-hidden="true"></i></div>
							<input type="password" name="pwd-repeat" placeholder="Repita a senha *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repita a senha *'"
							 required class="single-input" autocomplete="new-password">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-user-tie" aria-hidden="true"></i></div>
							<input type="text" name="functionuid" placeholder="Cargo *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cargo *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
							<input type="text" id="cpf" name="cpfUser" placeholder="CPF *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPF *'"
							 required class="single-input">
						</div>
						<button class="btn" type="submit" name="signup-submit-pub">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Team Area =================-->
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
</body>

</html>
