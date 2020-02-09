<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access-admin.php";
	if (isset($_POST['rop-ano-cadastrar'])) {} else{
		header("Location: rop-ano.php?error=wrongaccess");
		exit();
	}
	$version = $_POST['ano_rop'];
	$numgroup = $_POST['num_group'];
	require 'inc/dbh.inc.php';
	if ( empty($version) || empty($numgroup)){
		header("Location: rop-ano.php?error=emptyfields");
		exit();
	}else{
		$sql = "SELECT versionGroup FROM ropgroup WHERE versionGroup=?";
		// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
		// evitando que o mesmo seja corrompido ou destruído
		$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
		if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
			header("Location: rop-ano.php?error=sqlerror1"); //Retornará à pag anterior
			exit();
		}else{ //Se a conexão for bem sucedida, fará a verificação
			mysqli_stmt_bind_param($stmt, "s", $version);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			// A variável $resultCheck armazena a qtde de linha que retornou da consulta
			$resultCheck = mysqli_stmt_num_rows($stmt);
			// Se houver mais do que 0 resultados (ou seja 1 ou mais)
			// Significa que o email já foi utilizado, retornando à pag anterior
			if ($resultCheck > 0) {
				header("Location: new-rop.php?error=versiontaken");
				exit();
			}
		}
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

	<title>ROPs | Sistema HcA</title>	<!-- Site Title -->

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
									<label class="backbtn" onclick="<?php echo $linkrop; ?>"><i class="fas fa-angle-left"></i></label>
									Cadastrar grupos do ROP
								</h1>
								<p> Versão: <?php echo $version; ?> </p>
							</div>
						</div>
					</div>
					<div class="border1"></div>
					<form action="<?php echo $linkropfinal ?>" method="post">
						<input type="hidden" name="ano_rop" value="<?php echo $version; ?>"/>
						<input type="hidden" name="num_group" value="<?php echo $numgroup; ?>"/>
						<div class="row justify-content-md-center">
							<div class="col-lg-6 col-md-8">
								<h5 class="mb-30" style="color: #4db8ff;"></h3>
									<?php for ($i = 1; $i <= $numgroup; $i++) { ?>
										<div class="input-group mt-10">
											<small> Grupo <?php echo $i; ?></small>
											<input type="text" id="search-val-name" name="nomegrupo<?php echo $i; ?>" placeholder="Digite o nome do grupo <?php echo $i; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite o nome do grupo <?php echo $i; ?>'"
											 required class="single-input">
											 <input type="text" id="search-val-name" name="numropgrupo<?php echo $i; ?>" placeholder="Digite o número de ROPs do grupo <?php echo $i; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite o número de ROPs do grupo <?php echo $i; ?>'"
 											 required class="single-input">
										</div>
									<?php } ?>
									<small>&nbsp;</small>
									<button class="btn" type="submit" name="rop-grupo-cadastrar">Próxima Etapa (2/3)</button>
							</div>
						</div>
					</form>
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
