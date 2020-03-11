<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
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

	<title>Menu | Sistema HcA</title> <!-- Site Title -->

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
						<h1 style="letter-spacing: 3px; text-transform: none;">Bem vindo, <?php echo $_SESSION['userUid']; ?></h1>
						<p> <b id="dayweek" style="font-weight: 100; color: #595959;"></b>, <b id="day" style="font-weight: 100; color: #595959;"></b> de <b id="month" style="font-weight: 100; color: #595959;"></b> de <b id="year" style="font-weight: 100; color: #595959;"></b></p>
						<p> Login número: <?php echo $_SESSION['countLogin']; ?>. Data do último login: <?php $datashow = date_create($_SESSION['lastLogin']); echo date_format($datashow, 'd/m/Y H:i:s'); ?>.</p>
					</div>
				</div>
			</div>
			<div class="border1"></div>
			<?php
				if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
					?>
					<div class="row">
						<!-- single member -->
						<div class="col-lg-4 col-md-4 flex">
							<div class="service-box">
								<div class="service-icon" onclick=" <?php echo $linkusers; ?> ">
									<i class="fas fa-users"></i>
								</div>
								<p class="title">Usuários</p>
								<p class="desc">Gerenciar usuários</p>
							</div>
						</div>

						<!-- single member -->
						<div class="col-lg-4 col-md-4 flex">
							<div class="service-box">
								<div class="service-icon" onclick=" <?php echo $linkrop; ?> ">
									<i class="fas fa-calendar-check"></i>
								</div>
								<p class="title">ROPs</p>
								<p class="desc">Gerenciar a versão</p>
							</div>
						</div>

						<!-- single member -->
						<div class="col-lg-4 col-md-4 flex">
							<div class="service-box">
								<div class="service-icon" onclick=" <?php echo $linksetor; ?> ">
									<i class="fas fa-hospital-alt"></i>
								</div>
								<p class="title">Setores</p>
								<p class="desc">Gerenciar os setores</p>
							</div>
						</div>
					</div>
					<div class="border1"></div>
					<?php
				}
			?>

			<div class="row mt-40">
					<!-- single member -->
					<div class="col-lg-4 col-md-4 flex">
						<div class="service-box">
							<div class="service-icon" onclick=" <?php echo $linkaudit; ?> ">
								<i class="fas fa-check-square"></i>
							</div>
							<p class="title">Check-List</p>
							<p class="desc">Iniciar Auditoria</p>
						</div>
					</div>
					<!-- single member -->
					<div class="col-lg-4 col-md-4 flex">
						<div class="service-box">
							<div class="service-icon" onclick=" <?php echo $linkreport; ?> ">
								<i class="fas fa-chart-pie"></i>
							</div>
							<p class="title">Relatório</p>
							<p class="desc">Visão geral e relatórios</p>
						</div>
					</div>
					<!-- single member -->
					<div class="col-lg-4 col-md-4 flex">
						<div class="service-box">
							<div class="service-icon" onclick=" <?php echo $linkacc; ?> ">
								<i class="fas fa-user-cog"></i>
							</div>
							<p class="title">Minha Conta</p>
							<p class="desc">Gerenciar a conta</p>
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
	<script>
		var d = new Date();
		var days = ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"];
		document.getElementById("dayweek").innerHTML = days[d.getDay()];
		document.getElementById("day").innerHTML = d.getDate();
		var months = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
		document.getElementById("month").innerHTML = months[d.getMonth()];
		document.getElementById("year").innerHTML = d.getFullYear();
	</script>
</body>

</html>
