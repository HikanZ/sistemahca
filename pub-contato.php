<!--================ Start Require Area =================-->
<?php require "header.php" ?>
<?php require "inc/links.php" ?>
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

	<title>Projeto | Sistema HcA</title> <!-- Site Title -->

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
			 	<section class="team-area section-gap-top">
			 		<div class="container">
			 			<div class="row justify-content-center">
			 				<div class="col-md-8 text-center">
			 					<div class="section-title" style="padding-bottom: 40px;">
			 						<h1 style="letter-spacing: 3px; text-transform: none;">
			 							<label class="backbtn" onclick="goBack()"><i class="fas fa-angle-left"></i></label>
			 							CONTATO
			 						</h1>
			 					</div>
			 					<div style="margin:50px auto;" class="border1"></div>
			 				</div>
			 			</div>
			 		</div>
			 	</section>
		 	<!--================ End Team Area =================-->
	   </div>
		 <section class="team-area section-gap">
	 		<div class="container-fluid justify-content-md-center">
	 			<div class="row justify-content-center">
	 				<div class="col-md-8 text-center">
	 					<div class="section-title">
	 						<h3 style="color:#fff; font-size: 20px;">Titulo cima <br> continuação do título</h3>
	 					</div>
	 				</div>
	 			</div>
	 			<div class="row justify-content-center" >

					<div class="col-md-2 col-sm-6" style="margin: auto 50px;">
							<div class="our-team">
									<img src="img/card/card-1.png" alt="">
									<ul class="social">
											<li><a href="#" class="fab fa-facebook"></a></li>
											<li><a href="#" class="fab fa-instagram"></a></li>
											<li><a href="#" class="fab fa-google-plus"></a></li>
											<li><a href="#" class="fab fa-linkedin"></a></li>
											<li><a href="#" class="fab fa-twitter"></a></li>
									</ul>
									<div class="team-content">
											<h3 class="title" style="font-size:18px;">Profª Dra Flávia</h3>
											<span class="post">Orientadora</span>
									</div>
							</div>
					</div>

					<div class="col-md-2 col-sm-6" style="margin: auto 50px;">
							<div class="our-team">
									<img src="img/card/card-2.jpg" alt="">
									<ul class="social">
											<li><a href="#" class="fab fa-facebook"></a></li>
											<li><a href="#" class="fab fa-instagram"></a></li>
											<li><a href="#" class="fab fa-google-plus"></a></li>
											<li><a href="#" class="fab fa-linkedin"></a></li>
											<li><a href="#" class="fab fa-twitter"></a></li>
									</ul>
									<div class="team-content">
											<h3 class="title" style="font-size:18px;">Renata Siqueira</h3>
											<span class="post">Idealizadora</span>
									</div>
							</div>
					</div>

					<div class="col-md-2 col-sm-6" style="margin: auto 50px;">
						<div class="our-team">
							<img src="img/card/card-3.png" alt="">
							<ul class="social" style="height: 40%;">
									<li><a href="https://www.instagram.com/zeron0s/" target="_blank" class="fab fa-instagram"></a></li>
									<li><a href="https://twitter.com/CronicasOmeria" target="_blank" class="fab fa-twitter"></a></li>
							</ul>
							<div class="team-content">
									<h3 class="title" style="font-size:18px;">Guilherme</h3>
									<span class="post">Desenvolvedor</span>
							</div>
						</div>
        </div>

	 			</div>
	 		</div>
	 	</section>

		 <!--================ Start Footer Area =================-->
		 <br><br><br><br><br><br><br><br>
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
</body>

</html>
