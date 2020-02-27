<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	require 'inc/dbh.inc.php';

	$sql = "SELECT * FROM setor WHERE stateSetor=1";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: relatorio-anual.php?error=connectionerror1"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_execute($stmt);
		$resultSetor = mysqli_stmt_get_result($stmt);
	}

	$sql = "SELECT yearAudit FROM audit GROUP BY yearAudit ORDER BY yearAudit DESC";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: relatorio-anual.php?error=connectionerror1"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_execute($stmt);
		$resultAno = mysqli_stmt_get_result($stmt);
		mysqli_stmt_execute($stmt);
		$resultAno2 = mysqli_stmt_get_result($stmt);
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

	<title>Relatório | Sistema HcA</title> <!-- Site Title -->

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
			 							Relatório
			 						</h1>
									<p>Selecione intervalo e o setor (ou todos os setores).</p>
			 					</div>
			 					<div class="border1"></div>
								<!--================ Start Content Area =================-->
								<!-- FORM -->
								<form action="relatorio-intervalo-resultado.php" method="post">
									<small style="color: #8c8c8c;">Intervalo entre: </small>
									<div class="row justify-content-md-center">
										<div class="col-md-7">
											<div class="input-group-icon mt-10">
												<div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
												<div class="form-select required" id="default-select4">
													<select name="anoSelecionadoIni">
														<option selected disabled>Selecione o ano de início</option>
														<?php
															while ($rowAno = mysqli_fetch_assoc($resultAno)){
														?>
															<option value="<?php echo $rowAno['yearAudit']; ?>"><?php echo $rowAno['yearAudit']; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row justify-content-md-center">
										<div class="col-md-7">
											<div class="input-group-icon mt-10">
												<div class="icon"><i class="fa fa-calendar-alt" aria-hidden="true"></i></div>
												<div class="form-select required" id="default-select2">
													<select name="mesIni">
														<option selected disabled>Selecione o mês de início</option>
															<option value="01">Janeiro</option>
															<option value="02">Fevereiro</option>
															<option value="03">Março</option>
															<option value="04">Abril</option>
															<option value="05">Maio</option>
															<option value="06">Junho</option>
															<option value="07">Julho</option>
															<option value="08">Agosto</option>
															<option value="09">Setembro</option>
															<option value="10">Outubro</option>
															<option value="11">Novembro</option>
															<option value="12">Dezembro</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<small style="color: #8c8c8c;">E</small>
									<div class="row justify-content-md-center">
										<div class="col-md-7">
											<div class="input-group-icon mt-10">
												<div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
												<div class="form-select required" id="default-select4">
													<select name="anoSelecionadoFim">
														<option selected disabled>Selecione o ano de fim</option>
														<?php
															while ($rowAno = mysqli_fetch_assoc($resultAno2)){
														?>
															<option value="<?php echo $rowAno['yearAudit']; ?>"><?php echo $rowAno['yearAudit']; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row justify-content-md-center">
										<div class="col-md-7">
											<div class="input-group-icon mt-10">
												<div class="icon"><i class="fa fa-calendar-alt" aria-hidden="true"></i></div>
												<div class="form-select required" id="default-select2">
													<select name="mesFim">
														<option selected disabled>Selecione o mês de fim</option>
															<option value="01">Janeiro</option>
															<option value="02">Fevereiro</option>
															<option value="03">Março</option>
															<option value="04">Abril</option>
															<option value="05">Maio</option>
															<option value="06">Junho</option>
															<option value="07">Julho</option>
															<option value="08">Agosto</option>
															<option value="09">Setembro</option>
															<option value="10">Outubro</option>
															<option value="11">Novembro</option>
															<option value="12">Dezembro</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<small>&nbsp;</small>
									<div class="row justify-content-md-center">
										<div class="col-md-7">
											<div class="input-group-icon mt-10">
												<div class="icon"><i class="fa fa-hospital" aria-hidden="true"></i></div>
												<div class="form-select" id="default-select2">
													<select name="setor">
														<option selected disabled>Selecione o setor</option>
															<option value="ALL">Todos os setores</option>
														<?php
															while ($rowSetor = mysqli_fetch_assoc($resultSetor)){
														?>
															<option value="<?php echo $rowSetor['idSetor']; ?>"><?php echo $rowSetor['uidSetor']; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row justify-content-center">
								    <div class="col-lg-6 col-md-8">
								      <small>&nbsp;</small>
								      <button class="btn" type="submit" name="relatorio-intervalo">Gerar relatório</button>
								    </div>
								  </div>
								</form>
								<!--================ End Content Area =================-->
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
	<script>
		function goBack() {
			window.history.go(-1);
		}
	</script>
</body>

</html>
