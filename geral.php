<!--================ Start Require Area =================-->
<?php require "header.php" ?>
<?php require "inc/links.php" ?>
<?php require "inc/dbh.inc.php" ?>
<?php
if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
  }else{
    header("Location: sistema.php");
    exit();
  }

///// Carrega a auditoria pelo código
$sql = "SELECT * FROM audit";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
	header("Location: sistema.php?error=sqlerror1"); //Retornará à pag anterior
	exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
	mysqli_stmt_execute($stmt);
	$resultAudit = mysqli_stmt_get_result($stmt);
	$audit = mysqli_num_rows($resultAudit);
}

$sql = "SELECT * FROM users";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
	header("Location: sistema.php?error=sqlerror1"); //Retornará à pag anterior
	exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
	mysqli_stmt_execute($stmt);
	$resultAudit = mysqli_stmt_get_result($stmt);
	$users = mysqli_num_rows($resultAudit);
}

$sql = "SELECT * FROM setor";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
	header("Location: sistema.php?error=sqlerror1"); //Retornará à pag anterior
	exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
	mysqli_stmt_execute($stmt);
	$resultAudit = mysqli_stmt_get_result($stmt);
	$setor = mysqli_num_rows($resultAudit);
}

$sql = "SELECT * FROM answer";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
	header("Location: sistema.php?error=sqlerror1"); //Retornará à pag anterior
	exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
	mysqli_stmt_execute($stmt);
	$resultAudit = mysqli_stmt_get_result($stmt);
	$answer = mysqli_num_rows($resultAudit);
}

$sql = "SELECT * FROM rop";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
	header("Location: sistema.php?error=sqlerror1"); //Retornará à pag anterior
	exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
	mysqli_stmt_execute($stmt);
	$resultAudit = mysqli_stmt_get_result($stmt);
	$rop = mysqli_num_rows($resultAudit);
}

$sql = "SELECT * FROM ropgroup";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
	header("Location: sistema.php?error=sqlerror1"); //Retornará à pag anterior
	exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
	mysqli_stmt_execute($stmt);
	$resultAudit = mysqli_stmt_get_result($stmt);
	$ropgroup = mysqli_num_rows($resultAudit);
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

	<title>Servidor | Sistema HcA</title> <!-- Site Title -->

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
			 							<label class="backbtn" onclick="goBack()"><i class="fas fa-angle-left"></i></label>
			 							Geral
			 						</h1>
			 					</div>
			 					<div style="margin:50px auto;" class="border1"></div>
								<div class="row justify-content-between" style="color: #8c8c8c; margin:50px auto;">
									<div class="col-md-10" align="left" >
										<?php echo "Número de tabelas: 6"; ?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c; margin:50px auto;">
									<div class="col-md-10" align="left">
										<?php echo "Número total de usuários (ativo e inativo): ".$users; ?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c; margin:50px auto;">
									<div class="col-md-10" align="left">
										<?php echo "Número total de grupos: ".$ropgroup; ?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c; margin:50px auto;">
									<div class="col-md-10" align="left">
										<?php echo "Número total de itens ROPs: ".$rop; ?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c; margin:50px auto;">
									<div class="col-md-10" align="left">
										<?php echo "Número total de setores: ".$setor; ?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c; margin:50px auto;">
									<div class="col-md-10" align="left">
										<?php echo "Número total de auditorias: ".$audit; ?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c; margin:50px auto;">
									<div class="col-md-10" align="left">
										<?php echo "Número total de respostas das auditorias: ".$answer; ?>
									</div>
								</div>
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
	<script>
		function goBack() {
			window.history.go(-1);
		}
	</script>
</body>

</html>
