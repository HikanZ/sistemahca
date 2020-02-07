<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access-admin.php";
	$version = $_POST['ano_rop']; echo $version; echo "<br>";
	$numgroup = $_POST['num_group']; echo $numgroup; echo "<br>";
	/*for ($i = 1; $i <= $numgroup; $i++) {
		echo "<br>"; echo $_POST['nomegrupo'.$i];
		echo " - "; echo $_POST['numropgrupo'.$i];
		for ($j = 1; $j <= $_POST['numropgrupo'.$i]; $j++ ){
			echo $j; echo " ";
		}
	}*/

?>
<!DOCTYPE html>
<html lang="pt-br" class="">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 	<!-- Mobile Specific Meta -->
	<link rel="shortcut icon" href="img/fav.png"> 	<!-- Favicon-->
	<meta name="author" content="CodePixar"> 	<!-- Author Meta -->
	<meta name="description" content="">	<!-- Meta Description -->
	<meta name="keywords" content="">	<!-- Meta Keyword -->
	<meta charset="UTF-8">	<!-- meta character set -->
	<!-- Site Title -->
	<title>ROPs | Sistema HcA</title>

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
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #4db8ff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
</head>

<body style="background: url('img/MainPiclite.png') center; background-attachment: fixed;">
	<div id="page-container">
	   <div id="content-wrap">
	    <!--================ Start Content Area =================-->
			<section class="team-area section-gap-top">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 text-center">
							<div class="section-title" style="padding-bottom: 40px;">
								<h1 style="letter-spacing: 3px; text-transform: none;">
									<label class="backbtn" onclick="<?php echo $linkrop; ?>"><i class="fas fa-angle-left"></i></label>
									Cadastrar ROPs
								</h1>
							</div>
						</div>
					</div>
					<div class="border1"></div>
					<form action="<?php echo $linkropfinal ?>">
						<div class="row justify-content-md-center">
							<div class="col-lg-6 col-lg-16">
								<?php
									for ($i = 1; $i <= $numgroup; $i++) {
									//echo "<br>"; echo $_POST['nomegrupo'.$i];
									//echo " - "; echo $_POST['numropgrupo'.$i];?>
									<b class="mb-30" style="color: #4db8ff; font-weight: 100;">Grupo <?php echo $i; ?>: <?php echo " "; echo $_POST['nomegrupo'.$i]; ?></b>
									<?php
									for ($j = 1; $j <= $_POST['numropgrupo'.$i]; $j++ ){ ?>
										<br>
										<small style="color: #bababa; font-weight: 100;">ROP <?php echo $i; echo "."; echo $j; ?></small>
										<div class="row">
											<div class="col-lg-10">
												<div class="input-group">
													<textarea rows="1" style="line-height:25px; height:60px;" type="text" id="rop<?php echo $i; echo "_"; echo $j; ?>" name="rop<?php echo $i; echo "_"; echo $j; ?>" placeholder="Insira a descrição do ROP <?php echo $i; echo "."; echo $j; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira a descrição do ROP <?php echo $i; echo "."; echo $j; ?>'"
													 required class="single-textarea"></textarea>
												</div>
											</div>
											<div class="col-sm-2">
												<label class="container" style="color: #bababa; font-weight: 100;">Maior
												  <input type="radio" checked="checked" name="radio">
												  <span class="checkmark"></span>
												</label>
												<label class="container" style="color: #bababa; font-weight: 100;">Menor
												  <input type="radio" name="radio">
												  <span class="checkmark"></span>
												</label>
												<!--div class="switch-wrap d-flex justify-content-between">
														<p style="color: #d1d1d1; font-weight: 100;">Maior</p>
														<div class="primary-radio">
															<input class="radio" type="radio" id="default-radio-1" name=radio value=1>
															<label class="radio" id="default-radio-1" for="default-radio-1"></label>
														</div>
												</div>
												<div class="switch-wrap d-flex justify-content-between">
														<p style="color: #d1d1d1; font-weight: 100;">Menor</p>
														<div class="primary-radio">
															<input class="radio" type="radio" id="default-radio-2" name=radio value=1>
															<label class="radio" id="default-radio-2" for="default-radio-2"></label>
														</div>
												</div-->
											</div>
										</div>
								<?php
								} ?>
							<br>
							<?php
								}?>





									<small>&nbsp;</small>
									<button class="btn" type="submit" name="usuario-cadastrar">Finalizar (3/3)</button>
							</div>
						</div>
					</form>
				</div>
			</section>
	    <!--================ End Content Area =================-->
	   </div>
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
</body>

</html>
