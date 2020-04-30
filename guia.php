<!--================ Start Require Area =================-->
<?php require "header.php" ?>
<?php require "inc/links.php" ?>
<?php require "inc/access.php"; ?>
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

	<title>Guia | Sistema HcA</title> <!-- Site Title -->

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<!--link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet"-->
	<!-- CSS ============================================= -->
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
	<style>
	.our-team{
	    text-align: center;
	    overflow: hidden;
	    position: relative;
	}
	.our-team img{
	    width: 95%;
	    height: auto;
	    transition: all 0.5s ease-in-out 0s;
	}
	.our-team:hover img{ transform: scale(1.2); }
	.our-team .social{
	    list-style: none;
	    padding: 30px 15px;
	    margin: 0;
	    background: #0facf3;
	    border-bottom-right-radius: 50px;
	    position: absolute;
	    top: 0;
	    left: -50%;
	    transition: all 0.4s ease-in-out 0s;
	}
	.our-team:hover .social{ left: 0; }
	.our-team .social li{ display: block; }
	.our-team .social li a{
	    display: block;
	    padding: 4px 0;
	    font-size: 18px;
	    color: #fff;
	    transition: all 0.3s ease-in-out 0s;
	}
	.our-team .social li:first-child a{ padding-top: 0; }
	.our-team .social li:last-child a{ padding-bottom: 0; }
	.our-team .social li a:hover{ color: #000; }
	.our-team .team-content{
	    width: 100%;
	    padding: 2px 7px;
	    background: rgba(0, 0, 0, 0.6);
	    position: absolute;
	    bottom: 0;
	    left: 0;
	}
	.our-team .title{
	    font-size: 22px;
	    font-weight: bold;
	    letter-spacing: 1px;
	    color: #fff;
	    margin: 0 0 2px 0;
	}
	.our-team .post{
	    display: block;
	    font-size: 14px;
	    color: #0facf3;
	}
	@media only screen and (max-width: 990px){
	    .our-team{ margin-bottom: 30px; }
	}

	/* Start Team Area css
	============================================================================================ */
	@media (max-width: 767px) {
	  .team-area .col-lg-4:last-child .single-team-member {
	    margin-bottom: 0; } }

	.single-team-member .member-img {
	  overflow: hidden; }
	  .single-team-member .member-img img {
	    -webkit-transition: all 0.4s ease 0s;
	    -moz-transition: all 0.4s ease 0s;
	    -o-transition: all 0.4s ease 0s;
	    transition: all 0.4s ease 0s; }
	.single-team-member .proff {
	  margin-top: 30px;
	  text-align: center; }
	  @media (max-width: 767px) {
	    .single-team-member .proff {
	      margin-top: 15px; } }
	  .single-team-member .proff h4 {
	    font-weight: 700;
	    margin-bottom: 5px; }
	  .single-team-member .proff p {
	    margin: 0;
	    letter-spacing: 2px;
	    text-transform: uppercase;
	    font-size: 12px; }
	@media (max-width: 767px) {
	  .single-team-member {
	    margin-bottom: 30px;
	    text-align: center; } }
	.single-team-member:hover .member-img img {
	  transform: scale(1.1); }

	/* End Team Area css
	============================================================================================ */
	</style>
</head>

<body style="background: url('img/MainPiclite.png') center; background-attachment: fixed;">
	<div id="page-container">
	   <div id="content-wrap">
			 <!--================ Start Team Area =================-->
			 	<section class="team-area section-gap-top" style="padding-bottom: 0px;">
			 		<div class="container">
			 			<div class="row justify-content-center">
			 				<div class="col-md-8 text-center">
			 					<div class="section-title" style="padding-bottom: 40px;">
			 						<h1 style="letter-spacing: 3px; text-transform: none;" id="pubprojeto">
			 							<label class="backbtn" onclick="goBack()"><i class="fas fa-angle-left"></i></label>
			 							Guia de utilização
			 						</h1>
			 					</div>
			 					<div style="margin:50px auto auto auto;" class="border1"></div>
			 				</div>
			 			</div>
			 		</div>
			 	</section>
		 	<!--================ End Team Area =================-->
	   </div>
		 <section class="whole-wrap-2" >
			<div class="container">
				<div class="d-flex justify-content-around" style="padding-bottom: 50px;">
						<div class="col-lg-3 col-md-3 flex">
							<div class="service-box-g">
								<div class="service-icon-g" onclick=" <?php echo $linkauditguia; ?> ">
									<i class="fas fa-check-square"></i>
								</div>
								<div class="d-flex justify-content-center" style="font-family: OCR A Std, monospace; font-size: 15px; text-transform: uppercase; padding-top: 10px;">
									Auditoria
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 flex">
							<div class="service-box-g">
								<div class="service-icon-g" onclick=" <?php echo $linkreportguia; ?> ">
									<i class="fas fa-chart-pie"></i>
								</div>
								<div class="d-flex justify-content-center" style="font-family: OCR A Std, monospace; font-size: 15px; text-transform: uppercase; padding-top: 10px;">
									Relatórios
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 flex">
							<div class="service-box-g">
								<div class="service-icon-g" onclick=" <?php echo $linkaccguia; ?> ">
									<i class="fas fa-user-cog"></i>
								</div>
								<div class="d-flex justify-content-center" style="font-family: OCR A Std, monospace; font-size: 15px; text-transform: uppercase; padding-top: 10px;">
									Minha conta
								</div>
							</div>
						</div>
				</div>

				<?php
					if ( $_SESSION['admincheck']==1 || $_SESSION['admincheck']==7 ) {
					?>
				<div class="d-flex justify-content-around">
					<div class="col-lg-3 col-md-3 flex">
						<div class="service-box-g">
							<div class="service-icon-g" onclick=" <?php echo $linkusersguia; ?> ">
								<i class="fas fa-users"></i>
							</div>
							<div class="d-flex justify-content-center" style="font-family: OCR A Std, monospace; font-size: 15px; text-transform: uppercase; padding-top: 10px;">
								Usuários
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 flex">
						<div class="service-box-g">
							<div class="service-icon-g" onclick=" <?php echo $linkropguia; ?> ">
								<i class="fas fa-calendar-check"></i>
							</div>
							<div class="d-flex justify-content-center" style="font-family: OCR A Std, monospace; font-size: 15px; text-transform: uppercase; padding-top: 10px;">
								ROPs
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 flex">
						<div class="service-box-g">
							<div class="service-icon-g" onclick=" <?php echo $linksetorguia; ?> ">
								<i class="fas fa-hospital-alt"></i>
							</div>
							<div class="d-flex justify-content-center" style="font-family: OCR A Std, monospace; font-size: 15px; text-transform: uppercase; padding-top: 10px;">
								Setores
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			 </div>
		 </section>
		 <div style="margin:10px auto;" class="border1"></div>

		 <section class="whole-wrap" style="padding-top: 40px;"  id="auditoria">
	 		<div class="container">
				 <div class="section-top-border">
					 <h3 class="mb-30"  style="color:#fff; font-size: 20px;" ><i class="fas fa-angle-up" style="color:#4db8ff;" onclick=" <?php echo $linkguia; ?> "></i>&nbsp;&nbsp; Auditoria</h3>
					 <div class="d-flex justify-content-center">
						 <img src="img/auditoriaguia.png" alt="" width="610" height="880">
					 </div>
				 </div>
			 </div>
		 </section>
		 <div style="margin-top:60px;" class="border1"></div>
		 <section class="whole-wrap" style="padding-top: 40px;">
			<div class="container" id="relatorio">
				 <div class="section-top-border">
					 <h3 class="mb-30"  style="color:#fff; font-size: 20px;" ><i class="fas fa-angle-up" style="color:#4db8ff;" onclick=" <?php echo $linkguia; ?> "></i>&nbsp;&nbsp;Relatório</h3>
					 <div class="d-flex justify-content-center">
						 <img src="img/relatorioguia.png" alt="" width="610" height="880">
					 </div>
				 </div>
			 </div>
		 </section>
		 <div style="margin-top:60px;" class="border1"></div>
		 <section class="whole-wrap" style="padding-top: 40px;">
			<div class="container" id="perfil">
				 <div class="section-top-border">
					 <h3 class="mb-30"  style="color:#fff; font-size: 20px;" ><i class="fas fa-angle-up" style="color:#4db8ff;" onclick=" <?php echo $linkguia; ?> "></i>&nbsp;&nbsp;Minha conta</h3>
					 <div class="d-flex justify-content-center">
						 <img src="img/perfilguia.png" alt="" width="610" height="380">
					 </div>
				 </div>
			 </div>
		 </section>
		 <div style="margin-top:60px;" class="border1"></div>
		 <section class="whole-wrap" style="padding-top: 40px;">
			<div class="container" id="usuario">
				 <div class="section-top-border">
					 <h3 class="mb-30"  style="color:#fff; font-size: 20px;" ><i class="fas fa-angle-up" style="color:#4db8ff;" onclick=" <?php echo $linkguia; ?> "></i>&nbsp;&nbsp;Usuários</h3>
					 <div class="d-flex justify-content-center">
						 <img src="img/usuarioguia.png" alt="" width="610" height="880">
					 </div>
				 </div>
			 </div>
		 </section>
		 <div style="margin-top:60px;" class="border1"></div>
		 <section class="whole-wrap" style="padding-top: 40px;">
			<div class="container" id="rops">
				 <div class="section-top-border">
					 <h3 class="mb-30"  style="color:#fff; font-size: 20px;" ><i class="fas fa-angle-up" style="color:#4db8ff;" onclick=" <?php echo $linkguia; ?> "></i>&nbsp;&nbsp;ROPs</h3>
					 <div class="d-flex justify-content-center">
						 <img src="img/ropsguia.png" alt="" width="610" height="440">
					 </div>
				 </div>
			 </div>
		 </section>
		 <div style="margin-top:60px;" class="border1"></div>
		 <section class="whole-wrap" style="padding-top: 40px;">
			<div class="container" id="setores">
				 <div class="section-top-border">
					 <h3 class="mb-30"  style="color:#fff; font-size: 20px;" ><i class="fas fa-angle-up" style="color:#4db8ff;" onclick=" <?php echo $linkguia; ?> "></i>&nbsp;&nbsp;Setores</h3>
					 <div class="d-flex justify-content-center">
						 <img src="img/setoresguia.png" alt="" width="610" height="360">
					 </div>
				 </div>
			 </div>
		 </section>

		 <!--================ Start Footer Area =================-->
		 <br><br><br><br><br><br><br><br><br><br>
 	   <footer id="footer">
 			 <div class="container">
 	 			<div class="row justify-content-md-center">
 	 				<div class="col-1"></div>
 	 				<div class="col-3"><img src="img/logologin.png" alt="" style="width:30px; height:30px;"></div>
 	 				<div class="col-8">Sistema Healthcare Assessment</div>
 	 			</div>
 	 		</div>
 		 </footer>
	 	<!--================ End Footer Area =================-->
	 </div>



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
	<script>
		function goBack() {
			window.history.go(-1);
		}
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
			 $('html, body').hide();

			 if (window.location.hash) {
					 setTimeout(function() {
							 $('html, body').scrollTop(0).show();
							 $('html, body').animate({
									 scrollTop: $(window.location.hash).offset().top
									 }, 1000)
					 }, 0);
			 }
			 else {
					 $('html, body').show();
			 }
	 });
</script>
</body>

</html>
