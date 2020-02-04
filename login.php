<!DOCTYPE html>
<html lang="zxx">

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
	<title>HCA</title>



	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet">
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

	<!--================ Start Header Area =================-->
	<?php
  require "header.php";
  ?>
	<!--================ End Header Area =================-->

	<!--================ Start banner Area =================-->
    <div class="wrapper-main">
      <div class="d1">
        <img src="img/logologin.png" alt="">
      </div>
      <div class="login">
        <form class="" action="index.php" method="post">
          <h1>Login</h1>
          <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="loginmail" placeholder="Email">
          </div>

          <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="loginpwd" placeholder="Senha" autocomplete="new-password">
          </div>
          <button class="btn" type="submit" name="login2-submit">Entrar</button>
					<a onclick="window.location.href='pub-cadastro.php'" style="text-align: center; font-weight: 100; color: #4db8ff; cursor:pointer;"> Cadastre-se </a> <a> | </a> <a onclick="window.location.href='pub-esquecisenha.php'" style="text-align: center; font-weight: 100; color: #4db8ff; cursor:pointer;"> Esqueci a minha senha </a>
        </form>

      </div>



    </div>


	<!--================ End banner Area =================-->



	<!--================ Start Footer Area =================-->

	<!--================ End Footer Area =================-->

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
	<script src="js/main.js"></script>


</body>

</html>
