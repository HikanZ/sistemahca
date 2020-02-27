<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	require 'inc/dbh.inc.php';
?>
<?php

	$sql = "SELECT * FROM audit";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: relatorio.php?error=connectionerrorhist"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_execute($stmt);
		$resultAudit = mysqli_stmt_get_result($stmt);
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

	<title>Histórico Auditorias | Sistema HcA</title>	<!-- Site Title -->

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
		 							<label class="backbtn" onclick="<?php echo $linkreport; ?>"><i class="fas fa-angle-left"></i></label>
		 							Histórico de Auditorias
		 						</h1>
								<p>Clique na auditoria para um relatório completo.</p>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="border1"></div>
		 			<div class="row justify-content-md-center">
						<div class="col-lg-6 col-md-8">
		 					<h5 class="mb-30" style="color: #4db8ff;"></h3>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="far fa-newspaper" aria-hidden="true"></i></div>
									<input type="text" id="search-val-name" name="first_name" placeholder="ID da auditoria" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ID da auditoria'"
									 required class="single-input">
								</div>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="far fa-hospital" aria-hidden="true"></i></div>
									<input type="text" id="cpf2" name="cpf2" placeholder="Setor ou ID do Setor" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Setor ou ID do Setor'"
									 required class="single-input">
								</div>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="far fa-calendar-alt" aria-hidden="true"></i></div>
									<input type="text" id="datauditid" name="email" placeholder="Data" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Data'"
									 required class="single-input">
								</div>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="fas fa-calendar-check" aria-hidden="true"></i></div>
									<input type="text" id="cargo" name="cargo" placeholder="Versão" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Versão'"
									 required class="single-input">
								</div>
								<div class="input-group-icon mt-10">
		 							<div class="icon"><i class="far fa-id-card" aria-hidden="true"></i></div>
		 							<input type="text" id="iduserid" name="idusern" placeholder="ID, Nome e/ou Sobrenome do auditor" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ID, Nome e/ou Sobrenome do auditor'"
		 							 required class="single-input">
		 						</div>
								<div class="mt-10" style="display:none;">
									<div class="switch-wrap d-flex">
										<div class="primary-switch">
											<input type="checkbox" name="searchvalhasphone" id="primary-switch-user" class="checkradio" checked>
											<label for="primary-switch-user"  ></label>
										</div>
										<label style="margin-left: 20px;"> Ativo? </label>
									</div>
								</div>

		 				</div>
		 			</div>
		 		</div>
		 	</section>

		 	<section class="team-area section-gap-top">
		 		<div class="container">
		 			<!-- THE HTML TABLE DATA -->
		 		<div class="table-responsive">
		 			<table class="table table-striped" cellpadding="0" cellspacing="0" id="resultTable">
		 				  <tr>
		 				    <th>ID</th>
		 						<th>ID - Setor</th>
		 				    <th>Data</th>
		 				    <th>Versão</th>
		 				    <th>ID - Auditor</th>
		 				  </tr>
							<?php
							while ($rowAudit = mysqli_fetch_assoc($resultAudit)){
								$linkauditview = "window.location.href='relatorio-audit-id.php?id=".$rowAudit['idAudit']."'";
								?>
								<tr onclick="<?php echo $linkauditview;?>">
									<td><?php echo $rowAudit['idAudit']; ?></td>
									<td><?php echo $rowAudit['idSetor']; echo ' - '; echo $rowAudit['uidSetor']; ?></td>
									<td><?php echo $rowAudit['monthAudit']; echo '/'; echo $rowAudit['yearAudit']; ?></td>
									<td><?php echo $rowAudit['versionRop']; ?></td>
									<td><?php echo $rowAudit['idUsers']; echo ' - '; echo $rowAudit['uidfullUsers']; ?></td>
								</tr>
							<?php
							}//fim while
							?>
		 			</table>
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
	<script src="js/searchaudit.js"></script>
</body>

</html>
