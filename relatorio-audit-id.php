<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	$var = "teste";

	$findme = "/hca/";
	$pos = stripos($_SERVER['REQUEST_URI'], $findme);
	if ($pos === false) {$idaudit = str_replace("/relatorio-audit-id.php?id=", "", $_SERVER['REQUEST_URI']);
	}else{ $idaudit = str_replace("/hca/relatorio-audit-id.php?id=", "", $_SERVER['REQUEST_URI']);}

	if (is_numeric($idaudit)){}
	else{
				header("Location: relatorio-audit.php?error=noid"); //Retornará à pag anterior
	}

	require 'inc/dbh.inc.php';
	///// Carrega a auditoria pelo código
	$sql = "SELECT * FROM audit WHERE idAudit=?";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: rop-remove.php?error=sqlerror2"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a verificação
		mysqli_stmt_bind_param($stmt, "i", $idaudit);
		mysqli_stmt_execute($stmt);
		$resultAudit = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($resultAudit);
		if (!isset($row)) $token = 0;
		else{
		$token = 1;
		$version = $row['versionRop'];
		$dtmes = $row['monthAudit'];
		$dtano = $row['yearAudit'];
		$nome = $row['uidfullUsers'];
		$idauditor = $row['idUsers'];
		$setor = $row['uidSetor'];
		$idsetor = $row['idSetor'];
		$dtini = $row['startAudit'];
		$dtfim = $row['endAudit'];
		$comentario = $row['commentAudit'];
		}
	}

	if ($token==1){
		///// Carrega os grupos
		$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
		$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
		if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
			header("Location: rop-remove.php?error=sqlerror2"); //Retornará à pag anterior
			exit();
		}
		else{ //Se a conexão for bem sucedida, fará a verificação
			mysqli_stmt_bind_param($stmt, "i", $version);
			mysqli_stmt_execute($stmt);
			$resultGrupo = mysqli_stmt_get_result($stmt);
			$nGrupo = 1;
			while($rowGroup = mysqli_fetch_assoc($resultGrupo)){
				$gruponome[$rowGroup['numGroup']]=$rowGroup['nameGroup'];
				$grupoqtrops[$rowGroup['numGroup']]=$rowGroup['qtropGroup'];
				$nGrupo++;
			}
		}

		///// Carrega os rops
		$sql = "SELECT * FROM rop INNER JOIN ropgroup ON rop.idGroup = ropgroup.idGroup WHERE versionRop =?";
		$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
		if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
			header("Location: rop-remove.php?error=sqlerror2"); //Retornará à pag anterior
			exit();
		}
		else{ //Se a conexão for bem sucedida, fará a verificação
			mysqli_stmt_bind_param($stmt, "i", $version);
			mysqli_stmt_execute($stmt);
			$resulRop = mysqli_stmt_get_result($stmt);
			while($rowRop = mysqli_fetch_assoc($resulRop)){
				$ropnome[$rowRop['numGroup']][$rowRop['numRop']] = $rowRop['labelRop'];
				$class[$rowRop['numGroup']][$rowRop['numRop']] = $rowRop['classRop'];
				$resp[$rowRop['numGroup']][$rowRop['numRop']]['C'] = 0;
				$resp[$rowRop['numGroup']][$rowRop['numRop']]['NC'] = 0;
				$resp[$rowRop['numGroup']][$rowRop['numRop']]['P'] = 0;
				$resp[$rowRop['numGroup']][$rowRop['numRop']]['NA'] = 0;
				$respinfo[$rowRop['numGroup']][$rowRop['numRop']] = "";
			}
		}

		///// Carrega as respostas desta auditoria
		$sql = "SELECT * FROM answer WHERE idAudit=?";
		$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
		if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
			header("Location: rop-remove.php?error=sqlerror2"); //Retornará à pag anterior
			exit();
		}
		else{ //Se a conexão for bem sucedida, fará a verificação
			mysqli_stmt_bind_param($stmt, "i", $idaudit);
			mysqli_stmt_execute($stmt);
			$resulResp = mysqli_stmt_get_result($stmt);
			while($rowResp = mysqli_fetch_assoc($resulResp)){
				$resp[ $rowResp['numGroup'] ][ $rowResp['numRop'] ][ $rowResp['resultAnswer'] ]++;
				if ($rowResp['infoAnswer']=="" OR $rowResp['infoAnswer']==NULL){}
				else{
					$respinfo[ $rowResp['numGroup'] ][ $rowResp['numRop'] ] = $respinfo[ $rowResp['numGroup'] ][ $rowResp['numRop'] ]." ".$rowResp['infoAnswer']." ,";
				}

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

	<title>Relatório Auditoria | Sistema HcA</title> <!-- Site Title -->

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
			 							Relatório da Auditoria
			 						</h1>
									<p style="color: #8c8c8c;"> </p>
			 					</div>
			 					<div class="border1"></div>
								<!--================ Start Content Area =================-->
								<!-- === Informações da Auditoria === -->
								<div class="row justify-content-between" style="color: #8c8c8c;">
									<div class="col-md-4" align="left">
										<?php echo "Id. da auditoria: ".$idaudit; ?>
									</div>
									<div class="col-md-4" align="left">
										<?php if ($token) echo "Versão: ".$version; else echo "Versão: --";?>
									</div>
									<div class="col-md-4" align="left">
										<?php if ($token) echo "Data: ".$dtmes."/".$dtano;  else echo "Data: --/--";?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c;">
									<div class="col-md-7" align="left">
										<?php if ($token) echo "Auditor: ".$nome;  else echo "Auditor: --";?>
									</div>
									<div class="col-md-1" align="left"> </div>
									<div class="col-md-4" align="left">
										<?php if ($token) echo "Id. do Auditor: ".$idauditor;  else echo "Id. do Auditor: --";?>
									</div>
								</div>
								<div class="row justify-content-between" style="color: #8c8c8c;">
									<div class="col-md-4" align="left">
										<?php if ($token) echo "Setor: ".$setor;  else echo "Setor: --";?>
									</div>
									<div class="col-md-4" align="left">
										<?php if ($token) echo "Id do Setor: ".$idsetor;  else echo "Id do Setor: --";?>
									</div>
									<div class="col-md-4" align="left">
									</div>
								</div>
								<br>
								<div class="row justify-content-between align-items-center" style="color: #8c8c8c;">
									<div class="col-md-4" align="left">
										<?php echo "Data e Hora"; ?>
									</div>
									<div class="col-md-4" align="left">
										<?php if ($token) {$dtiniformatado = date_create($dtini); $dtiniformatado = date_format($dtiniformatado, 'd/m/Y H:i:s');echo "Início: ".$dtiniformatado; }  else echo "Início: --";?>
									</div>
									<div class="col-md-4" align="left">
										<?php if ($token) {$dtfimformatado = date_create($dtfim); $dtfimformatado = date_format($dtfimformatado, 'd/m/Y H:i:s');echo "Término: ".$dtfimformatado; }  else echo "Término: : --";?>
									</div>
								</div>
								<div class="border1"></div>
								<!-- === Informações da Auditoria === -->

								<?php
									if ($token==1){
								?>

								<form action="inc/auditdel.inc.php" method="post">
								<div class="row justify-content-center">
									<div class="col-lg-6 col-md-8">
										<!--button class="btn" type="submit" name="auditar" id="submit-button" style="display:none;">Gravar Auditoria</button-->
										<button type="button" class="btn" data-toggle="modal" id="submit-button-modal" data-target="#exampleModalCenter"
										<?php
										if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
										?>
											style="background-color: #ff4d5d;
											border: 2px solid #ff4d5d;"
										<?php
										  }else{
										?>
												style="background-color: #ff4d5d;
											  border: 2px solid #ff4d5d;
												display: none;"
										<?php
										  }
										?>
										>Apagar Auditoria</button>

									</div>
								</div>
								<?php if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){ ?>
									<div class="border1"></div>
								<?php } ?>

								<input type="hidden" name="idauditoriadel" value="<?php echo $idaudit; ?>">

								<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">Confirmação</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												Ao confirmar a exclusão da auditoria de ID <?php echo $idaudit; ?>,<br>
												todas as respostas desta auditoria serão excluídas <br>
												e esta ação não pode ser revertida. <br>
												Deseja apagar esta auditoria?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #ff4d5d; border: 2px solid #ff4d5d;">Não</button>
												<button type="submit" name="antiauditar" class="btn btn-primary" id="submit-button">Sim, deletar auditoria</button>
											</div>
										</div>
									</div>
								</div>
							</form>


								<section class="team-area section-gap-top">
									<div class="container">
										<!-- THE HTML TABLE DATA -->
									<div class="table-responsive">
										<table class="table table-striped" cellpadding="0" cellspacing="0" id="resultTable">
											<?php
												for ($i=1; $i < $nGrupo; $i++){
											?>
												<tr>
													<th>Grupo <?php echo $i; ?>: <?php echo " "; echo $gruponome[$i]; ?></th>
													<th>C</th>
													<th>NC</th>
													<th>P</th>
													<th>NA</th>
												</tr>
											<?php
													for ($j=1; $j <= $grupoqtrops[$i]; $j++){
											?>
														<tr>
															<td align="left"><?php echo $i; echo "."; echo $j; echo ". "; echo $ropnome[$i][$j];?></td>
															<td><?php echo $resp[ $i ][ $j ]['C'];?></td>
															<td><?php echo $resp[ $i ][ $j ]['NC'];?></td>
															<td><?php echo $resp[ $i ][ $j ]['P'];?></td>
															<td><?php echo $resp[ $i ][ $j ]['NA'];?></td>
														</tr>
														<tr>
															<td align="left"><small>Informação: <?php if ( $respinfo[ $i ][ $j ]=="" OR $respinfo[ $i ][ $j ]==NULL ) echo "Nenhuma"; else echo rtrim($respinfo[ $i ][ $j ], ',');?></small></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
											<?php
													}
												}
											?>
											<tr>
												<th>Comentário da Auditoria</th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
											</tr>
											<tr>
												<td align="left"><small><?php if ( $comentario=="" OR $comentario==NULL ) echo "Nenhum comentário"; else echo $comentario;?></small></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</table>
									</div>
								</div>
							</section>
							<?php
							}else{
							?>
							<br><br><br>
								<p style="font-size: 26px; color: #8c8c8c;"> Auditoria não encontrada. </p>
							<?php
							}
							?>




								<!--================ End Content Area =================-->
			 				</div>
			 			</div>
			 		</div>
			 	</section>

		 	<!--================ End Team Area =================-->
	   </div>
		 <!--================ Start Footer Area =================-->
		 <br><br><br><br><br><br>
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
