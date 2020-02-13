<!--================ Start Require Area =================-->
<?php require "header.php";

//Se uma sessão já estiver iniciada, ou seja, alguém já estiver logado
if (isset($_SESSION['userId'])) {
	header("Location: index.php"); //encaminhará automaticamente para o menu principal.
	exit(); // e encerra evitando qualquer carregamento e consumo desnecessário de banda.
}
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

	<title>HcA</title>	<!-- Site Title -->

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet">
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

	<!--================ Start Content Area =================-->
    <div class="wrapper-main">
      <div class="d1">
        <img src="img/logologin.png" alt="">
      </div>
      <div class="login">
        <form class="" action="inc/login.inc.php" method="post">
          <h1>Login</h1>
          <div class="textbox align-items-center">
            <i class="fas fa-user"></i>
            <input type="text" name="loginmail" placeholder="Email" required class="single-input">
          </div>

          <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="loginpwd" placeholder="Senha" autocomplete="new-password" required class="single-input">
          </div>
          <button class="btn" type="submit" name="login2-submit">Entrar</button>
					<a onclick="window.location.href='pub-cadastro.php'" style="text-align: center; font-weight: 100; color: #4db8ff; cursor:pointer;"> Cadastre-se </a> <a> | </a> <a onclick="window.location.href='pub-esquecisenha.php'" style="text-align: center; font-weight: 100; color: #4db8ff; cursor:pointer;"> Esqueci a minha senha </a>
        </form>
      </div>
    </div>
	<!--================ End Content Area =================-->

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
