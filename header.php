<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 	<!-- Mobile Specific Meta -->
	<link rel="shortcut icon" href="img/fav.png"> 	<!-- Favicon-->
	<meta name="author" content="CodePixar"> 	<!-- Author Meta -->
	<meta name="description" content="">	<!-- Meta Description -->
	<meta name="keywords" content="">	<!-- Meta Keyword -->
	<meta charset="UTF-8">	<!-- meta character set -->

	<!--title>Sistema HcA</title-->	<!-- Site Title -->

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
<body>
	<header class="header-area">
	  <div class="container">
	    <div class="header-wrap">
	      <div class="header-top d-flex justify-content-between align-items-center navbar-expand-lg">
	        <div class="col-3 logo">
	          <a href="index.php"><!--img class="mx-auto" src="img/logo.png" alt=""-->Sistema HcA</a>
	        </div>
	        <nav class="col navbar navbar-expand-lg justify-content-end">

	          <!-- Toggler/collapsibe Button -->
	          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	            <span class="lnr lnr-menu" style="color: #4db8ff;"></span>
	          </button>

	          <!-- Navbar links -->
	          <div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
	            <ul class="navbar-nav justify-content-around w-100">
								<li class="nav-item">
	              </li>
	              <li class="nav-item">
	                <a class="nav-link" href="index.php" data-tooltip="Página Principal" data-tooltip-location="bottom">Home</a>
	              </li>
	              <li class="nav-item">
	                <a class="nav-link" href="pub-projeto.php#pubprojeto" data-tooltip="Saiba mais sobre o projeto" data-tooltip-location="bottom">Projeto</a>
	              </li>
	              <li class="nav-item">
	                <a class="nav-link" href="pub-projeto.php#pubcontato" data-tooltip="Entre em contato" data-tooltip-location="bottom">Contato</a>
	              </li>
	              <li class="nav-item">
	                <a class="nav-link" href="pub-projeto.php#pubsobre" data-tooltip="Saiba mais sobre esta plataforma online" data-tooltip-location="bottom">Sobre</a>
	              </li>
                <?php
                  if (empty($_SESSION['userId'])) {
                  }else{ ?>
                    <li class="nav-item">
    	                <a class="nav-link sair" href="inc/logout.inc.php" data-tooltip="Sair da sua conta" data-tooltip-location="bottom">Sair</a>
    	              </li>
                <?php
                  }
                ?>
	            </ul>
	          </div>
	        </nav>
	      </div>
	    </div>
	  </div>
	</header>

</body>
</html>
