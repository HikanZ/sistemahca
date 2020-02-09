<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	require 'inc/dbh.inc.php';
?>
<?php
	///// Carrega os setores
	$sql = "SELECT * FROM setor WHERE stateSetor=1";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: audit.php?error=connectionerror1"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_execute($stmt);
		$resultSetor = mysqli_stmt_get_result($stmt);
	}

	///// Busca a última versão
	$sql = "SELECT versiongroup FROM ropgroup ORDER BY versiongroup DESC LIMIT 1;";
	// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
	// evitando que o mesmo seja corrompido ou destruído
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: audit.php?error=connectionerror2"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_execute($stmt);
		$resultVersion = mysqli_stmt_get_result($stmt);
		$rowVersion = mysqli_fetch_assoc($resultVersion);
		$version = $rowVersion['versiongroup'];
	}

	// CÓDIGO QUE BUSCA E CALCULA O NÚMERO DE GRUPOS DA ÚLTIMA VERSÃO
	$sql = "SELECT idGroup FROM ropgroup WHERE versionGroup=?;";
	// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
	// evitando que o mesmo seja corrompido ou destruído
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: menu.auditoria.php?error=sqlerror"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a verificação
		mysqli_stmt_bind_param($stmt, "s", $version);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		// A variável $resultCheck armazena a qtde de linha que retornou da consulta
		$resultCheck = mysqli_stmt_num_rows($stmt);
	}//FIM CÓDIGO QUE BUSCA E CALCULA O NÚMERO DE GRUPOS DA ÚLTIMA VERSÃO

	// CÓDIGO QUE BUSCA O NUM A QTDE DE ROPS DE CADA GRUPO
	$sql = "SELECT idGroup, nameGroup, numGroup, qtropGroup FROM ropgroup WHERE versionGroup=?;";
	// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
	// evitando que o mesmo seja corrompido ou destruído
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: menu.auditoria.php?error=sqlerror"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_bind_param($stmt, "s", $version);
		mysqli_stmt_execute($stmt);
		$resultGroup = mysqli_stmt_get_result($stmt);
		/*
		while ($row = mysqli_fetch_assoc($result)){
			echo '<br><br>';
			var_dump($result);
			echo '<br>';
			var_dump($row);
			echo '<br>';
			echo $row['idGroup'];
			echo $row['nameGroup'];
			echo $row['numGroup'];
			echo $row['qtropGroup'];
		}//fim while
		*/
	}
	// FIM CÓDIGO QUE BUSCA O NUM A QTDE DE ROPS DE CADA GRUPO

	// CÓDIGO QUE BUSCA AS ROPS DA ÚLTIMA VERSÃO
	$sql = "SELECT idRop, numRop, versionRop, idGroup, labelRop, classRop FROM rop WHERE versionRop=?;";
	// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
	// evitando que o mesmo seja corrompido ou destruído
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: menu.auditoria.php?error=sqlerror"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_bind_param($stmt, "s", $version);
		mysqli_stmt_execute($stmt);
		$resultRop = mysqli_stmt_get_result($stmt);
		$j = 1;
		while ($rowRop = mysqli_fetch_assoc($resultRop)){
			$idRop[$j] = $rowRop['idRop'];
			$numRop[$j] = $rowRop['numRop'];
			$versionRop[$j] = $rowRop['versionRop'];
			$idGroupRop[$j] = $rowRop['idGroup'];
			$labelRop[$j] = $rowRop['labelRop'];
			$classRop[$j] = $rowRop['classRop'];
			$j ++;
			/*
			echo $idRop[$j]; echo '<br>';
			echo $numRop[$j] ; echo '<br>';
			echo $versionRop[$j]; echo '<br>';
			echo $idGroupRop[$j]; echo '<br>';
			echo $labelRop[$j]; echo '<br>';
			echo $classRop[$j]; echo '<br>';
			echo '<br>';echo '<br>';
			*/
		}//fim while

	}
	// FIM CÓDIGO QUE BUSCA AS ROPS DE UMA DADA VERSÃO

	$i = 1;
	while ($row = mysqli_fetch_assoc($resultGroup)){
		//echo '<br><br>';
		//var_dump($resultGroup);
		//echo '<br>';
		//var_dump($row);
		$idGroup[$i] = $row['idGroup'];
		$nameGroup[$i] = $row['nameGroup'];
		$numGroup[$i] = $row['numGroup'];
		$qtropGroup[$i] = $row['qtropGroup'];
		/*echo $idGroup[$i];
		echo $nameGroup[$i];
		echo $numGroup[$i];
		echo $qtropGroup[$i];*/
		$i = $i +1;
	}//fim while


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

	<title>Auditoria | Sistema HcA</title>	<!-- Site Title -->

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
	/* CUSTOM RADIO BUTTON */
	.stv-radio-buttons-wrapper {
 	 clear: both;
 	 display: inline-block;
	 align-items: center;
	 vertical-align: middle;
 }
  .stv-radio-button {
 	 position: absolute;
 	 //left: -9999em;
 	 //top: -9999em;
	 visibility: hidden;
 }
  .stv-radio-button + label {
 	 float: left;
 	 padding: 0.3em 1em;
 	 cursor: pointer;
 	 /*border: 1px solid #28608f;*/
 	 margin-right: -1px;
 	 color: #fff;
 	 background-color: #428bca;
 }
  .stv-radio-button + label:first-of-type {
 	 border-radius: 0.7em 0 0 0.7em;
 }
  .stv-radio-button + label:last-of-type {
 	 border-radius: 0 0.7em 0.7em 0;
 }
  .stv-radio-button:checked + label {
 	 background-color: #3277b3;
 }
	/* END CUSTOM RADIO BUTTON */
	</style>
</head>
<body style="background: url('img/MainPiclite.png') center; background-attachment: fixed;">
	<div id="page-container">
	   <div id="content-wrap">
	    <!--================ Start Content Area =================-->
			<section class="team-area section-gap-top">
				<a name="top" id="top"> </a>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 text-center">
							<div class="section-title" style="padding-bottom: 40px;">
								<h1 style="letter-spacing: 3px; text-transform: none;">
									<label class="backbtn" onclick="<?php echo $linkmenu; ?>"><i class="fas fa-angle-left"></i></label>
									Auditoria
								</h1>
							</div>
						</div>
					</div>
					<div class="border1"></div>
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-8">
							<p class="mb-30" >Versão: <?php echo $version; ?></p>
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-hospital" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select2">
									<select>
										<option selected disabled>Selecione o setor</option>
										<?php
											while ($rowSetor = mysqli_fetch_assoc($resultSetor)){
										?>
											<option value="<?php echo $rowSetor['uidSetor']; ?>"><?php echo $rowSetor['uidSetor']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="border2"></div>
					<div class="row justify-content-md-center">
						<div class="col-lg-12 col-md-8">
							<form action="#" method="post">
								<div class="container">
									<div class="accordion" id="accordion" name="accordion">
									<?php for ($i=1; $i <= $resultCheck; $i++) { ?>
										<div class="card">
											<div class="card-header" id="heading<?php echo $rowGroup['numGroup']; ?>">
												<h5 class="mb-0"  data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php if ($i==1) echo 'true'; else echo 'false';?>" aria-controls="collapse<?php echo $i; ?>" href="#collapse<?php $i; ?>">
													<button class="<?php if ($rowGroup['numGroup']==1) echo 'btnA'; else echo 'btnA collapsed';?>" type="button">
														Grupo <?php echo $numGroup[$i]; ?>: <?php echo $nameGroup[$i]; ?>
													</button>
												</h5>
											</div>
											<div id="collapse<?php echo $i; ?>" class="<?php if ($i==1) echo 'collapse show'; else echo 'collapse';?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
												<div class="card-body">
													<?php for ($j=1; $j <= $qtropGroup[$i]; $j++) { ?>
														<?php $countRop++ ?>
															<div id="example-<?php echo $numGroup[$i];?><?php echo $j;?>" class="content" display="flex">
																<div class="row d-inline-flex justify-content-start align-items-center">
																	<div class="col-md-1 my-auto">
																		<button type="button" id="btnAdd-<?php echo $numGroup[$i];?><?php echo $j;?>" class="btn btn-primary btn-sm" style="width:35px; height:35px; font-size:15px; background:#337ab7; border:none;">
																			<i class="fas fa-plus" style="width:20px; height:20px; font-size:10px;"></i>
																		</button>
																	</div>
																	<div class="col-md-10 my-auto" style="font-size:15px;">
																		<?php echo $numGroup[$i];?>.<?php echo $j;?>. <?php echo $labelRop[$countRop]; ?>
																	</div>
																</div>
																<div class="row group d-inline-flex justify-content-start align-items-center">
																	<div class="col-md-1 my-auto">
																		<button type="button" class="btn btn-danger btnRemove btn-sm" style="width:35px; height:35px; font-size:15px; background:#d9534f; border:none;">
																			<i class="fas fa-minus" style="width:20px; height:20px; font-size:10px;"></i>
																		</button>
																	</div>
																	<div class="col-md-8 my-auto" style="font-size:12px;">
																		<div class="stv-radio-buttons-wrapper">
																			<input type="radio" class="stv-radio-button" name="rop<?php echo$i.$j;?>[0]" value="C" id="rop<?php echo $i; echo $j; ?>1" checked />
																			<label for="rop<?php echo $i; echo $j; ?>1" style="width:90px;">Conforme</label>
																			<input type="radio" class="stv-radio-button" name="rop<?php echo$i.$j;?>[0]" value="NC" id="rop<?php echo $i; echo $j; ?>2" />
																			<label for="rop<?php echo $i; echo $j; ?>2" style="width:110px;">Não conforme</label>
																			<input type="radio" class="stv-radio-button" name="rop<?php echo$i.$j;?>[0]" value="P" id="rop<?php echo $i; echo $j; ?>3" />
																			<label for="rop<?php echo $i; echo $j; ?>3" style="width:90px;">Parcial</label>
																			<input type="radio" class="stv-radio-button" name="rop<?php echo$i.$j;?>[0]" value="NA" id="rop<?php echo $i; echo $j; ?>4" />
																			<label for="rop<?php echo $i; echo $j; ?>4" style="width:100px;">Não aplica</label>
																		</div>
																	</div>
																	<div class="col-md-3 my-auto" style="font-size:15px;">
																		<input type="text" name="info<?php echo $i; echo $j; ?>[]" placeholder="Informação adicional" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Informação adicional'"
																		 class="single-input" style="width:250px; top:-50px;">
																	</div>
																</div>
															</div>
														<?php
															}
														?>
												</div>
											</div>
										</div>
									<?php
										}
									?>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-lg-6 col-md-8">
										<small>&nbsp;</small>
										<button class="btn" type="submit" name="usuario-cadastrar">Gravar Auditoria</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
	    <!--================ End Content Area =================-->
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
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/owl-carousel-thumb.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.tabs.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script src="js/datemask.js"></script>
	<script src="js/main.js"></script>
 <script src="js/vendor/bootstrap.min.js"></script>
   <script src="js/jquery.multifield.js"></script>
 <script>
 	<?php for ($i=1; $i <= $resultCheck; $i++) { ?>
 		<?php for ($j=1; $j <= $qtropGroup[$i]; $j++) { ?>
 			$('#example-<?php echo $numGroup[$i];?><?php echo $j;?>').multifield({
 				section: '.group',
 				btnAdd:'#btnAdd-<?php echo $numGroup[$i];?><?php echo $j;?>',
 				btnRemove:'.btnRemove'
 			});
 		<?php
 		}?>

 	<?php
 	} /* FOR $i dos Grupos */?>
 </script>
</body>

</html>
