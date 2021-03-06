<!--================ Start Require Area =================-->
<?php require "header.php" ?>
<?php
/*
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}*/
//echo randomPassword();
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

	<title>Recuperar senha | Sistema HcA</title> <!-- Site Title -->

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
							<label class="backbtn" onclick="window.location.href='login.php'"><i class="fas fa-angle-left"></i></label>
							Esqueci minha senha
						</h1>
					</div>
				</div>
			</div>
			<div class="border1"></div>
			<div class="row justify-content-md-center">
				<div class="col-lg-6 col-md-8">
					<h5 class="mb-30" style="color: #4db8ff;">Os campos marcados com  *  são obrigatórios.</h5>
					<p style="color: #8c8c8c;">Por medida de segurança, ao trocar a senha, sua conta estará bloqueada e deverá ser liberada por um administrador do sistema.</p>
					<form action="pub-trocarsenha.php" method="post" autocomplete="off">
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-birthday-cake" aria-hidden="true"></i></div>
							<input type="text" id="birth-date" name="dtnasc" placeholder="Data de Nascimento * DD/MM/AAAA" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Data de Nascimento * DD/MM/AAAA'"
							 required class="single-input" autocomplete="off">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
							<input type="text" name="email" placeholder="Email *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email *'"
							 required class="single-input" autocomplete="off">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
							<input type="text" id="cpf" name="cpf" placeholder="CPF *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPF *'"
							 required class="single-input" autocomplete="off">
						</div>
						<button class="btn" type="submit" name="recuperar-senha">Solicitar nova senha</button>
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
