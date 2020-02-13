<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	require 'inc/dbh.inc.php';

	///// Busca o setor ou verifica se são todos
	if (isset($_POST['setor'])){
		if ($_POST['setor']=='ALL'){
			$uidSetor = "Todos os setores";
		}else{
			$idSetor = $_POST['setor'];
			$sql = "SELECT uidSetor FROM setor WHERE idSetor=?";
			$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
			if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
				header("Location: relatorio-anual.php?error=connectionerror3"); //Retornará à pag anterior
				exit();
			}
			else{ //Se a conexão for bem sucedida, fará a consulta
				mysqli_stmt_bind_param($stmt, "i", $idSetor);
				mysqli_stmt_execute($stmt);
				$resultSetor = mysqli_stmt_get_result($stmt);
				$rowSetor = mysqli_fetch_assoc($resultSetor);
				$uidSetor = $rowSetor['uidSetor'];
			}
		}
	}else{
		$uidSetor = "Todos os setores";
	}
	//echo "<br>";
	//echo $uidSetor;

	///// Define o ano para o relatório
	if (!isset($_POST['anoSelecionado'])){
		$anoSelecionado = date("Y");
	}else{
		$anoSelecionado = $_POST['anoSelecionado'];
	}
	//echo "<br>";
	//echo $anoSelecionado;

	///// Busca a última versão
	$sql = "SELECT versiongroup FROM ropgroup ORDER BY versiongroup DESC LIMIT 1;";
	// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
	// evitando que o mesmo seja corrompido ou destruído
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: relatorio-anual.php?error=connectionerror4"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_execute($stmt);
		$resultVersion = mysqli_stmt_get_result($stmt);
		$rowVersion = mysqli_fetch_assoc($resultVersion);
		$version = $rowVersion['versiongroup'];
	}
	//echo "<br>";
	//echo $version;

	///// Carrega os grupos dessa versão
	$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
	$stmtG = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmtG, $sql)) { //Se houver algum erro de sql
		header("Location: relatorio-anual.php?error=sqlerror5"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a verificação
		mysqli_stmt_bind_param($stmtG, "i", $version);
		mysqli_stmt_execute($stmtG);
		$resultGroup = mysqli_stmt_get_result($stmtG);
/*	while($rowGroup = mysqli_fetch_assoc($resultGroup)){
			echo $rowGroup['nameGroup'];
		}*/
		$resultCountGroup = $resultGroup;
		$numGroup = 0;
		$numTotalRop = 0;
		while($rowCountGroup = mysqli_fetch_assoc($resultCountGroup)){
					$numGroup++;
					$numRopPerGroup[$numGroup] = $rowCountGroup['qtropGroup'];
					$numTotalRop = $numTotalRop + $rowCountGroup['qtropGroup'];
					$nameGroup[$numGroup] = $rowCountGroup['nameGroup'];
					//echo "<br> Grupo ".$numGroup.": ";
					//echo $numRopPerGroup[$numGroup];
		}
	}
	//echo "<br>";
	//echo $numTotalRop;

	///// Carrega os grupos dessa versão e realiza a contagem de ROPs
	$sql = "SELECT * FROM rop WHERE versionRop=?";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: relatorio-anual.php?error=sqlerror6"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a verificação
		mysqli_stmt_bind_param($stmt, "i", $version);
		mysqli_stmt_execute($stmt);
		$resultRop = mysqli_stmt_get_result($stmt);
/*	while($rowGroup = mysqli_fetch_assoc($resultGroup)){
			echo $rowGroup['nameGroup'];
		}*/
		$resultCountRop = $resultRop;
		$i = 0;
		$j = 1;
		$t = 0;
		$numMaiorGroup[$j] = 0;
		$numMenorGroup[$j] = 0;
		$totalMaior = 0;
		$totalMenor = 0;
		$numMaiorGroup[$j] = 0;
		$numMenorGroup[$j] = 0;
		$numAnswerMaior[$j]["C"]=0;
		$numAnswerMaior[$j]["NC"]=0;
		$numAnswerMaior[$j]["P"]=0;
		$numAnswerMaior[$j]["NA"]=0;
		$numAnswerMenor[$j]["C"]=0;
		$numAnswerMenor[$j]["NC"]=0;
		$numAnswerMenor[$j]["P"]=0;
		$numAnswerMenor[$j]["NA"]=0;
		while($rowCountRop = mysqli_fetch_assoc($resultCountRop)){
					$i++;
					$t++;
					if ($rowCountRop['classRop']=="1"){
						$numMaiorGroup[$j]++;
						$totalMaior++;
					}else{
						$numMenorGroup[$j]++;
						$totalMenor++;
					}
					if ($t == $numRopPerGroup[$j]) {
						$j++;
						$t=0;
						if ($j <= $numGroup){
							$numMaiorGroup[$j] = 0;
							$numMenorGroup[$j] = 0;
							$numAnswerMaior[$j]["C"]=0;
							$numAnswerMaior[$j]["NC"]=0;
							$numAnswerMaior[$j]["P"]=0;
							$numAnswerMaior[$j]["NA"]=0;
							$numAnswerMenor[$j]["C"]=0;
							$numAnswerMenor[$j]["NC"]=0;
							$numAnswerMenor[$j]["P"]=0;
							$numAnswerMenor[$j]["NA"]=0;
						}
					}

		}
	}
	//echo "<br>";
	//var_dump($numMaiorGroup);
	//echo "<br>";
	//var_dump($numMenorGroup);

	///// Início da apuração e contagem das respostas
	if ($uidSetor == "Todos os setores"){
		$sql = "SELECT * FROM answer WHERE versionAudit=? AND yearAudit=?";
	}else{
		$sql = "SELECT * FROM answer INNER JOIN audit ON answer.idAudit = audit.idAudit WHERE versionAudit=? AND answer.yearAudit=? AND idSetor=?";
	}

	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: audit.php?error=sqlerror7"); //Retornará à pag anterior
		exit();
	}else{ //Se a conexão for bem sucedida, fará a verificação
		if ($uidSetor == "Todos os setores"){
			mysqli_stmt_bind_param($stmt, "is", $version, $anoSelecionado);
		}else{
			mysqli_stmt_bind_param($stmt, "isi", $version, $anoSelecionado, $idSetor);
		}

		mysqli_stmt_execute($stmt);
		$resultAnswer = mysqli_stmt_get_result($stmt);
		$resultCountAnswer = $resultAnswer;
		$numAnswerMaiorTotal["C"]=0;
		$numAnswerMaiorTotal["NC"]=0;
		$numAnswerMaiorTotal["P"]=0;
		$numAnswerMaiorTotal["NA"]=0;
		$numAnswerMenorTotal["C"]=0;
		$numAnswerMenorTotal["NC"]=0;
		$numAnswerMenorTotal["P"]=0;
		$numAnswerMenorTotal["NA"]=0;
		//echo "<br><br>";
		//var_dump($resultCountAnswer);
		//echo "<br><br>";
		while($rowCountRop = mysqli_fetch_assoc($resultCountAnswer)){
			if ($rowCountRop['classRop']){
				$numAnswerMaior[ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
				$numAnswerMaiorTotal[ $rowCountRop['resultAnswer'] ]++;
				if (!isset( $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] )){
					$numAnswerMaiorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] = 1;
				}else{
					$numAnswerMaiorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
				}
			}else{
				$numAnswerMenor[ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
				$numAnswerMenorTotal[ $rowCountRop['resultAnswer'] ]++;
				if (!isset( $numAnswerMenorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] )){
					$numAnswerMenorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] = 1;
				}else{
					$numAnswerMenorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
				}
			}



		}// Fim while fetch
	}
	//echo "<br>";
	//var_dump($numAnswerMaior);
	//echo "<br>";
	//echo "<br>";
	//var_dump($numAnswerMenor);
	//var_dump($numAnswerMaiorTotal);
	//echo "<br>";
	//var_dump($numAnswerMenorTotal);

	if ($uidSetor == "Todos os setores"){
		$sql = "SELECT * FROM audit WHERE versionRop=? AND yearAudit=?";
	}else{
		$sql = "SELECT * FROM audit WHERE versionRop=? AND idSetor=? AND yearAudit=?";
	}
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: audit.php?error=sqlerror8"); //Retornará à pag anterior
		exit();
	}else{ //Se a conexão for bem sucedida, fará a verificação
		if ($uidSetor == "Todos os setores"){
			mysqli_stmt_bind_param($stmt, "ii", $version, $anoSelecionado);
		}else{
			mysqli_stmt_bind_param($stmt, "iii", $version, $idSetor, $anoSelecionado);
		}
		mysqli_stmt_execute($stmt);
		$resultAudit = mysqli_stmt_get_result($stmt);
		$resultidAudit = $resultAudit;
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

	<title>Relatório - Anual | Sistema HcA</title> <!-- Site Title -->

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
			 							Relatório <?php echo $_POST['anoSelecionado']; ?>
			 						</h1>
			 					</div>
			 					<div class="border2" style="margin:30px auto;"></div>
			 				</div>
			 			</div>
						<!--================ Start Content Area =================-->
						<div class="row justify-content-start" style="color: #8c8c8c;">
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
						<div class="row justify-content-start" style="color: #8c8c8c; display:none">
							<div class="col-md-2">
								<?php echo "Respostas: "; ?>
							</div>
							<div class="col-md-2">
								<?php echo "C: Conforme"; ?>
							</div>
							<div class="col-md-2">
								<?php echo "NC: Não Conforme"; ?>
							</div>
							<div class="col-md-2">
								<?php echo "P: Parcial"; ?>
							</div>
							<div class="col-md-2">
								<?php echo "NA: Não Aplica"; ?>
							</div>
						</div>
						<div class="row justify-content-start" style="color: #8c8c8c;">
							<div class="col-md-12">
								<?php
								echo "Lista das auditorias:";
								while($rowidAudit = mysqli_fetch_assoc($resultidAudit)){

									echo " ".$rowidAudit['idAudit'];
								}
									echo ".";

								?>
							</div>
						</div>

						<div class="border2" style="margin:30px auto;"></div>

						<div class="row justify-content-start" style="color: #8c8c8c;">
								<div id="chartjs-radar" style="background:#fff; margin:20px;">
								  <canvas id="canvas" style="margin:20px;"></canvas>
								</div>
						</div>
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
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script><script  src="./radar.js"></script>
	<script>
	window.chartColors = {
	  red: 'rgb(255, 99, 132)',
	  orange: 'rgb(255, 159, 64)',
	  yellow: 'rgb(255, 205, 86)',
	  green: 'rgb(75, 192, 192)',
	  blue: 'rgb(54, 162, 235)',
	  purple: 'rgb(153, 102, 255)',
	  grey: 'rgb(231,233,237)'
	};

	window.randomScalingFactor = function() {
	  return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
	}

	var randomScalingFactor = function() {
	  return Math.round(Math.random() * 100);
	};

	var now = moment();
	var label1 ="Conforme";
	var label2 ="Não conforme";
	var label3 ="Parcial";
	var label4 ="Não Aplica";

	var color = Chart.helpers.color;
	var config = {
	  type: 'radar',
	  data: {
	    labels: [
				<?php
					for ($i=1; $i<=$numGroup; $i++){
						echo '"';
						echo $nameGroup[$i];
						if ($i == $numGroup) echo '"';
						else echo '",';
					}
					?>
	      ],
	    datasets: [{
	      label: label1,
	      backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
	      borderColor: window.chartColors.red,
	      pointBackgroundColor: window.chartColors.red,
	      data: [
					<?php
						for ($i=1; $i<=$numGroup; $i++){
							echo $numAnswerMaior[$i]["C"]+$numAnswerMenor[$i]["C"];
							if ($i == $numGroup) echo '';
							else echo ',';
						} ?>
					],
	      notes: ["none", "none", "none", "none"]
	    }, {
	      label: label2,
	      backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
	      borderColor: window.chartColors.blue,
	      pointBackgroundColor: window.chartColors.blue,
				data: [
					<?php
						for ($i=1; $i<=$numGroup; $i++){
							echo $numAnswerMaior[$i]["NC"]+$numAnswerMenor[$i]["NC"];
							if ($i == $numGroup) echo '';
							else echo ',';
						} ?>
					],
	      notes: ["none", "none", "none", "none"]
	    },{
	      label: label3,
	      backgroundColor: color(window.chartColors.purple).alpha(0.2).rgbString(),
	      borderColor: window.chartColors.purple,
	      pointBackgroundColor: window.chartColors.purple,
				data: [
					<?php
						for ($i=1; $i<=$numGroup; $i++){
							echo $numAnswerMaior[$i]["P"]+$numAnswerMenor[$i]["P"];
							if ($i == $numGroup) echo '';
							else echo ',';
						} ?>
					],
	      notes: ["none", "none", "none", "none"]
	    },{
	      label: label4,
	      backgroundColor: color(window.chartColors.yellow).alpha(0.2).rgbString(),
	      borderColor: window.chartColors.yellow,
	      pointBackgroundColor: window.chartColors.yellow,
				data: [
					<?php
						for ($i=1; $i<=$numGroup; $i++){
							echo $numAnswerMaior[$i]["NA"]+$numAnswerMenor[$i]["NA"];
							if ($i == $numGroup) echo '';
							else echo ',';
						} ?>
					],
	      notes: ["none", "none", "none", "none"]
	    } ]
	  },
	  options: {
	    legend: {
	      position: 'top',
	    },
	    title: {
	      display: true,
	      text: 'Respostas dos itens maiores e menores'
	    },
	    scale: {
	      ticks: {
	        beginAtZero: true
	      }
	    },
	    tooltips:{
	      enabled:false,
	      callbacks:{
	        label: function(tooltipItem, data){
	          var datasetLabel = data.datasets[tooltipItem.datasetIndex].label || '';
	          //This will be the tooltip.body
	          return datasetLabel + ': ' + tooltipItem.yLabel +': '+ data.datasets[tooltipItem.datasetIndex].notes[tooltipItem.index];
	        }
	      },
	      custom: function(tooltip){
	        // Tooltip Element
	      var tooltipEl = document.getElementById('chartjs-tooltip');
	      if (!tooltipEl) {
	        tooltipEl = document.createElement('div');
	        tooltipEl.id = 'chartjs-tooltip';
	        tooltipEl.innerHTML = "<table></table>"
	        document.body.appendChild(tooltipEl);
	      }
	      // Hide if no tooltip
	      if (tooltip.opacity === 0) {
	        tooltipEl.style.opacity = 0;
	        return;
	      }
	      // Set caret Position
	      tooltipEl.classList.remove('above', 'below', 'no-transform');
	      if (tooltip.yAlign) {
	        tooltipEl.classList.add(tooltip.yAlign);
	      } else {
	        tooltipEl.classList.add('no-transform');
	      }
	      function getBody(bodyItem) {
	        return bodyItem.lines;
	      }
	      // Set Text
	      if (tooltip.body) {
	        var titleLines = tooltip.title || [];
	        var bodyLines = tooltip.body.map(getBody);
	        var innerHtml = '<thead>';
	        titleLines.forEach(function(title) {
	          innerHtml += '<tr><th>' + title + '</th></tr>';
	        });
	        innerHtml += '</thead><tbody>';
	        bodyLines.forEach(function(body, i) {
	          var colors = tooltip.labelColors[i];
	          var style = 'background:' + colors.backgroundColor;
	          style += '; border-color:' + colors.borderColor;
	          style += '; border-width: 2px';
	          var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
	          innerHtml += '<tr><td>' + span + body + '</td></tr>';
	        });
	        innerHtml += '</tbody>';
	        var tableRoot = tooltipEl.querySelector('table');
	        tableRoot.innerHTML = innerHtml;
	      }
	      var position = this._chart.canvas.getBoundingClientRect();
	        console.log(tooltip);
	      // Display, position, and set styles for font
	      tooltipEl.style.opacity = 1;
	      tooltipEl.style.left = position.left + tooltip.caretX + 'px';
	      tooltipEl.style.top = position.top + tooltip.caretY + 'px';
	      tooltipEl.style.fontFamily = tooltip._fontFamily;
	      tooltipEl.style.fontSize = tooltip.fontSize;
	      tooltipEl.style.fontStyle = tooltip._fontStyle;
	      tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
	      }
	    }
	  }
	};
	window.onload = function() {
	  window.myRadar = new Chart(document.getElementById("canvas"), config);
	};
	var colorNames = Object.keys(window.chartColors);
	</script>
</body>

</html>
