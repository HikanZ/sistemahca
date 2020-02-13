<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	require 'inc/dbh.inc.php';
	require 'inc/relatorio.inc.php';
	$respostas = array(1=>"Conforme", 2=>"Não Conforme", 3=>"Parcial", 4=>"Não Aplica");
	$respostasCurtas = array(1=>"C", 2=>"NC", 3=>"P", 4=>"NA");
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
<script>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
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
};

$("#chartContainerBar").CanvasJSChart(options);
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
								<div id="chartContainerBar" style="height: 370px; width: 100%;"></div>
						</div>
						<div class="row justify-content-start" style="color: #8c8c8c;">
								<div id="chartContainerLines" style="height: 370px; width: 100%;"></div>
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
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>

</html>
