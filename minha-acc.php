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

<!--================ Start Require Area =================-->
<?php require "header.php" ?>
<?php require "inc/links.php" ?>
<!--================ End Require Area =================-->

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
		 							<label class="backbtn" onclick="<?php echo $linkmenu; ?>"><i class="fas fa-angle-left"></i></label>
		 							Minha Conta
		 						</h1>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="border1"></div>
		 		</div>
		 	</section>

		 	<section class="section team-area section-gap-top">
		 		<div class="container">
		 			<div class="row justify-content-lg-center">
		 			<!--Profile Card 3-->
		 			    		<div class="col-md-6">
		 			    		    <div class="card profile-card-3">
		 			    		        <div class="background-block">
		 			    		            <!--img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="profile-sample1" class="background"/-->
		 			    		        </div>
		 			    		        <div class="profile-thumb-block">
		 												<a onclick="<?php echo $linkaccavatar; ?>" data-tooltip="Clique para alterar o seu avatar" data-tooltip-location="bottom" style="cursor:pointer;color:#4db8ff; font-size:10px; top:-32px; ; z-index:100000;">Alterar</a>
		 			    		            <img src="img/card-1-back1.png" alt="profile-image" class="profile"/>
		 			    		        </div>
		 			    		        <div class="card-content">
		 			                    <h2>Guilherme Kanashiro<small>Estagiário - Super Administrador</small></h2>
		 													<div class="border1" style="margin: 25px auto;"></div>
		 													<form action="#">
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-user" aria-hidden="true"></i></div>
		 															<input type="text" name="first_name" placeholder="Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'"
		 															 required class="single-input">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-user-friends" aria-hidden="true"></i></div>
		 															<input type="text" name="last_name" placeholder="Sobrenome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sobrenome'"
		 															 required class="single-input">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-birthday-cake" aria-hidden="true"></i></div>
		 															<input type="text" id="birth-date" name="first_name" placeholder="Data de Nascimento DD/MM/AAAA" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Data de Nascimento DD/MM/AAAA'"
		 															 required class="single-input">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
		 															<input type="text" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"
		 															 required class="single-input">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-user-tie" aria-hidden="true"></i></div>
		 															<input type="text" name="cargo" placeholder="Cargo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cargo'"
		 															 required class="single-input">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
		 															<input type="text" id="cpf" name="cpf" placeholder="CPF" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPF'"
		 															 required class="single-input">
		 														</div>
		 														<!--div class="mt-10">
		 															<div class="switch-wrap d-flex">
		 																<div class="primary-switch">
		 																	<input type="checkbox" id="primary-switch">
		 																	<label for="primary-switch"  ></label>
		 																</div>
		 																<label style="margin-left: 20px;"> Administrador? * </label>
		 															</div>
		 														</div-->
		 														<button class="btn" type="submit" name="usuario-cadastrar">Atualizar os meus dados</button>
		 														<h2><small onclick="<?php echo $linkaccpassword; ?>" style="color: #4db8ff; cursor:pointer;">Trocar a senha</small></h2>
		 													</form>
		 			                </div>
		 	                </div>
		 	                <!--p class="mt-3 w-100 float-left text-center"><strong>Modren Profile Card</strong></p-->
		 			    		</div>
		 						</div>
		 			</div>
		 	</section>



		 	<!--================ End Team Area =================-->
	   </div>
		 <!--================ Start Footer Area =================-->
		 <br><br>
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
</body>

</html>
