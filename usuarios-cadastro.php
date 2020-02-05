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
							<label class="backbtn" onclick="<?php echo $linkusers; ?>"><i class="fas fa-angle-left"></i></label>
							Cadastro de Usuário
						</h1>
					</div>
				</div>
			</div>
			<div class="border1"></div>
			<div class="row justify-content-md-center">
				<div class="col-lg-6 col-md-8">
					<h5 class="mb-30" style="color: #4db8ff;">Os campos marcados com  *  são obrigatórios.</h3>
					<form action="#">
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-user" aria-hidden="true"></i></div>
							<input type="text" name="first_name" placeholder="Nome *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-user-friends" aria-hidden="true"></i></div>
							<input type="text" name="last_name" placeholder="Sobrenome *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sobrenome *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-birthday-cake" aria-hidden="true"></i></div>
							<input type="text" id="birth-date" name="first_name" placeholder="Data de Nascimento * DD/MM/AAAA" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Data de Nascimento * DD/MM/AAAA'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
							<input type="text" name="email" placeholder="Email *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-lock" aria-hidden="true"></i></div>
							<input type="text" name="password1" placeholder="Senha *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-lock" aria-hidden="true"></i></div>
							<input type="text" name="password2" placeholder="Repita a senha *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repita a senha *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-user-tie" aria-hidden="true"></i></div>
							<input type="text" name="cargo" placeholder="Cargo *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cargo *'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
							<input type="text" id="cpf" name="cpf" placeholder="CPF *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPF *'"
							 required class="single-input">
						</div>
						<div class="mt-10">
							<div class="switch-wrap d-flex">
								<div class="primary-switch">
									<input type="checkbox" id="primary-switch">
									<label for="primary-switch"  ></label>
								</div>
								<label style="margin-left: 20px;"> Administrador? * </label>
							</div>
						</div>
						<button class="btn" type="submit" name="usuario-cadastrar">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Team Area =================-->

	<!--================ Start Footer Area =================-->
	<footer class="footer-area section-gap static-bottom">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-1"></div>
				<div class="col-3"><img src="img/logologin.png" alt="" style="width:30px; height:30px;"></div>
				<div class="col-8">Sistema Healthcare Assessment</div>
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
</body>

</html>
