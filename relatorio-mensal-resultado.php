<!--================ Start Require Area =================-->
<?php
	if (isset($_POST['relatorio-mensal'])) {} else{
		header("Location: relatorio-mensal.php?error=wrongaccess");
		exit();
	}
	if (!isset($_POST['mes'])) {
		header("Location: relatorio-mensal.php?error=monthnotselected");
		exit();
	}
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	require 'inc/dbh.inc.php';
	require 'inc/relatoriom.inc.php';
	$respostas = array(1=>"Conforme", 2=>"Não Conforme", 3=>"Parcial", 4=>"Não Aplica");
	$respostasCurtas = array(1=>"C", 2=>"NC", 3=>"P", 4=>"NA");
	switch ($_POST['mes']) {
		case "01":
			$mesnome = "Janeiro";
			break;
		case "02":
			$mesnome = "Fevereiro";
			break;
		case "03":
			$mesnome = "Março";
			break;
		case "04":
			$mesnome = "Abril";
			break;
		case "05":
			$mesnome = "Maio";
			break;
		case "06":
			$mesnome = "Junho";
			break;
		case "07":
			$mesnome = "Julho";
			break;
		case "08":
			$mesnome = "Agosto";
			break;
		case "09":
			$mesnome = "Setembro";
			break;
		case "10":
			$mesnome = "Outubro";
			break;
		case "11":
			$mesnome = "Novembro";
			break;
		case "12":
			$mesnome = "Dezembro";
			break;
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

	<title>Relatório - Mensal | Sistema HcA</title> <!-- Site Title -->

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<!--link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet"-->
	<!-- CSS ============================================= -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<link rel="stylesheet" href="css/styleradar.css">
	<style>
	/* unvisited link */
	a:link {
		color: #8c8c8c !important;
	}

	a:focus {
		color: #8c8c8c !important;
	}

	/* visited link */
	a:visited {
		color: #8c8c8c !important;
	}

	/* mouse over link */
	a:hover {
		color: #4db8ff !important;
	}

	/* selected link */
	a:active {
		color: #8c8c8c !important;
	}
	</style>

</head>

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
window.onload = function () {
var chart = new CanvasJS.Chart("chartContainerBar",{
	animationEnabled: true,
	theme: "dark2",
	title:{
		text: "Atributos do Setor"
	},
	axisY:{
		title:"Respostas"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [
		<?php
			for ($i=1; $i<=4; $i++){ ?>
				{
				type: "stackedColumn",
				name: "<?php echo $respostas[$i]; ?>",
				showInLegend: "true",
				yValueFormatString: "",
				dataPoints: [
					<?php for ($j=1; $j<=$numGroup; $j++){
						switch ($i) {
				    case 1:
				        echo '{ y: '.($numAnswerMaior[$j]["C"]+$numAnswerMenor[$j]["C"]).', label: "'.$nameGroup[$j].'"}';
				        break;
				    case 2:
				        echo '{ y: '.($numAnswerMaior[$j]["NC"]+$numAnswerMenor[$j]["NC"]).', label: "'.$nameGroup[$j].'"}';
				        break;
				    case 3:
				        echo '{ y: '.($numAnswerMaior[$j]["P"]+$numAnswerMenor[$j]["P"]).', label: "'.$nameGroup[$j].'"}';
				        break;
						case 4:
						 		echo '{ y: '.($numAnswerMaior[$j]["NA"]+$numAnswerMenor[$j]["NA"]).', label: "'.$nameGroup[$j].'"}';
								break;
						}

						if ($j!=$numGroup) echo ",";
					}
					?>
				]
			}
			<?php
			if ($i!=4) echo ',';
			}
		?>
	]

});
chart.render();

var chart = new CanvasJS.Chart("chartContainerBarMaior",{
	animationEnabled: true,
	theme: "dark2",
	title:{
		text: "Atributos do Setor (Maior)"
	},
	axisY:{
		title:"Respostas"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [
		<?php
			for ($i=1; $i<=4; $i++){ ?>
				{
				type: "stackedColumn",
				name: "<?php echo $respostas[$i]; ?>",
				showInLegend: "true",
				yValueFormatString: "",
				dataPoints: [
					<?php for ($j=1; $j<=$numGroup; $j++){
						switch ($i) {
				    case 1:
				        echo '{ y: '.$numAnswerMaior[$j]["C"].', label: "'.$nameGroup[$j].'"}';
				        break;
				    case 2:
				        echo '{ y: '.$numAnswerMaior[$j]["NC"].', label: "'.$nameGroup[$j].'"}';
				        break;
				    case 3:
				        echo '{ y: '.$numAnswerMaior[$j]["P"].', label: "'.$nameGroup[$j].'"}';
				        break;
						case 4:
						 		echo '{ y: '.$numAnswerMaior[$j]["NA"].', label: "'.$nameGroup[$j].'"}';
								break;
						}

						if ($j!=$numGroup) echo ",";;
					}
					?>
				]
			}
			<?php
			if ($i!=4) echo ',';
			}
		?>
	]

});
chart.render();

var chart = new CanvasJS.Chart("chartContainerBarMenor",{
	animationEnabled: true,
	theme: "dark2",
	title:{
		text: "Atributos do Setor (Menor)"
	},
	axisY:{
		title:"Respostas"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [
		<?php
			for ($i=1; $i<=4; $i++){ ?>
				{
				type: "stackedColumn",
				name: "<?php echo $respostas[$i]; ?>",
				showInLegend: "true",
				yValueFormatString: "",
				dataPoints: [
					<?php for ($j=1; $j<=$numGroup; $j++){
						switch ($i) {
				    case 1:
				        echo '{ y: '.$numAnswerMenor[$j]["C"].', label: "'.$nameGroup[$j].'"}';
				        break;
				    case 2:
				        echo '{ y: '.+$numAnswerMenor[$j]["NC"].', label: "'.$nameGroup[$j].'"}';
				        break;
				    case 3:
				        echo '{ y: '.+$numAnswerMenor[$j]["P"].', label: "'.$nameGroup[$j].'"}';
				        break;
						case 4:
						 		echo '{ y: '.$numAnswerMenor[$j]["NA"].', label: "'.$nameGroup[$j].'"}';
								break;
						}

						if ($j!=$numGroup) echo ",";;
					}
					?>
				]
			}
			<?php
			if ($i!=4) echo ',';
			}
		?>
	]

});
chart.render();

}
</script>
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
			 							<label class="backbtn" onclick="<?php echo $linkreportmonth; ?>"><i class="fas fa-angle-left"></i></label>
			 							Relatório de <?php echo $mesnome." de "; echo $_POST['anoSelecionado']; ?>
			 						</h1>
			 					</div>
			 					<div class="border2" style="margin:30px auto;"></div>
			 				</div>
			 			</div>
						<!--================ Start Content Area =================-->
						<div class="row justify-content-center" style="color: #8c8c8c;">
							<div class="col-md-2" >
								<?php
									if ($uidSetor == "Todos os setores"){
										echo $uidSetor;
									}else{
										echo "Setor: (".$idSetor.")".$uidSetor;
									}
								?>
							</div>
							<div class="col-md-2">
								<?php echo "Versão: ".$version; ?>
							</div>
							<div class="col-md-2">
								<?php echo "Número de Grupos: ".$numGroup; ?>
							</div>
							<div class="col-md-2">
								<?php echo "Total de Itens: ".$numTotalRop; ?>
							</div>
						</div>
						<div class="row justify-content-center" style="color: #8c8c8c;">
							<div class="col-md-8">
								<?php
								echo "Lista das auditorias (".mysqli_num_rows($resultidAudit)."): ";
								$countid = 1;
								while($rowidAudit = mysqli_fetch_assoc($resultidAudit)){
									$link[$countid] = "relatorio-audit-id.php?id=".$rowidAudit['idAudit'];
									//$link[$countid] = "window.open(".$link.",'_blank')";
									//$link[$countid] = "window.location.href='relatorio-audit-id.php?id=".$rowidAudit['idAudit']."'";
								?>
									<a href="<?php echo $link[$countid]; ?>" target="_blank" style="cursor:pointer;"><?php echo $rowidAudit['idAudit'];?> </a>

								<?php
									$countid++;
								}
								?>
							</div>
						</div>

						<div class="border2" style="margin:30px auto;"></div>

						<div class="row justify-content-center" style="color: #8c8c8c;">
							<div class="col-lg-10">
									<div id="chartContainerBar" style="height: 400px; width: 100%;"></div>
							</div>
						</div>
						<div class="row justify-content-center" style="color: #8c8c8c;">
							<div class="col-lg-10">
								<div class="table-responsive">
									<table class="table table-striped" cellpadding="0" cellspacing="0" id="resultTable">
											<tr>
												<th>Grupo</th>
												<th>Conforme</th>
												<th>Não Conforme</th>
												<th>Parcial</th>
												<th>Não Aplica</th>
											</tr>
											<?php
											for ($w=1; $w<=$numGroup; $w++){ ?>
												<tr>
													<td><?php echo $nameGroup[$w]; ?>
															<br>
															<?php
																$totalgrupo = $numAnswerMaior[$w]["C"]+$numAnswerMenor[$w]["C"]+$numAnswerMaior[$w]["NC"]+$numAnswerMenor[$w]["NC"]+$numAnswerMaior[$w]["P"]+$numAnswerMenor[$w]["P"]+
																$numAnswerMaior[$w]["NA"]+$numAnswerMenor[$w]["NA"];
															echo "Total: ".$totalgrupo;?>
													</td>
													<td>Total: <?php echo ($numAnswerMaior[$w]["C"]+$numAnswerMenor[$w]["C"]);?> <br>Maior: <?php echo $numAnswerMaior[$w]["C"];?> <br>Menor: <?php echo $numAnswerMenor[$w]["C"];?></td>
													<td>Total: <?php echo ($numAnswerMaior[$w]["NC"]+$numAnswerMenor[$w]["NC"]);?> <br>Maior: <?php echo $numAnswerMaior[$w]["NC"];?> <br>Menor: <?php echo $numAnswerMenor[$w]["NC"];?></td>
													<td>Total: <?php echo ($numAnswerMaior[$w]["P"]+$numAnswerMenor[$w]["P"])?> <br>Maior: <?php echo $numAnswerMaior[$w]["P"];?> <br>Menor: <?php echo $numAnswerMenor[$w]["P"];?></td>
													<td>Total: <?php echo ($numAnswerMaior[$w]["NA"]+$numAnswerMenor[$w]["NA"])?> <br>Maior: <?php echo $numAnswerMaior[$w]["NA"];?> <br>Menor: <?php echo $numAnswerMenor[$w]["NA"];?></td>
												</tr>
											<?php
											} ?>
									</table>
								</div>
							</div>
						</div>
						<div class="border2" style="margin:20px auto;"></div>
						<div class="row justify-content-start" style="color: #8c8c8c;">
							<div class="col-lg-6">
								<div id="chartContainerBarMaior" style="height: 400px; width: 100%;"></div>
							</div>
							<div class="col-lg-6">
								<div id="chartContainerBarMenor" style="height: 400px; width: 100%;"></div>
							</div>
						</div>
						<div class="border2" style="margin:20px auto;"></div>
						<!--div class="row justify-content-start" style="color: #8c8c8c;">
							<?php for ($cg = 1; $cg <= $numGroup; $cg++){ ?>
								<div id="chartContainerG<?php echo $cg; ?>" style="height: 400px; width: 100%;"></div>
							<?php } ?>
						</div-->

						<?php //var_dump($rop); ?>
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
											<th>Total</th>
										</tr>
									<?php
											for ($j=1; $j <= $grupoqtrops[$i]; $j++){
									?>
												<tr>
													<?php
														if (!isset($rop[ $i ][ $j ]['C']) ) $rop[ $i ][ $j ]['C']=0;
														if (!isset($rop[ $i ][ $j ]['NC']) ) $rop[ $i ][ $j ]['NC']=0;
														if (!isset($rop[ $i ][ $j ]['P']) ) $rop[ $i ][ $j ]['P']=0;
														if (!isset($rop[ $i ][ $j ]['NA']) ) $rop[ $i ][ $j ]['NA']=0;
													?>
													<td align="left"><?php echo $i; echo "."; echo $j; echo ". "; echo $ropnome[$i][$j];?> </td>
													<td><?php echo $rop[ $i ][ $j ]['C'];  ?> </td>
													<td><?php echo $rop[ $i ][ $j ]['NC']; ?> </td>
													<td><?php echo $rop[ $i ][ $j ]['P'];  ?> </td>
													<td><?php echo $rop[ $i ][ $j ]['NA']; ?> </td>
													<td><?php $totalG2 = $rop[ $i ][ $j ]['C']+$rop[ $i ][ $j ]['NC']+$rop[ $i ][ $j ]['P']+$rop[ $i ][ $j ]['NA']; echo $totalG2; ?> </td>
												</tr>
									<?php
											}
										}
									?>
								</table>
							</div>
						</div>
					</section>
					<div class="border2" style="margin:20px auto;"></div>

						<!--================ End Content Area =================-->
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
</body>

</html>
