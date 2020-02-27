<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access-admin.php";
	if (isset($_POST['rop-remove'])) {
			require 'inc/dbh.inc.php';
	}else{
			header("Location: rop-remove.php?error=wrongaccess1");
		  exit();
		}
		$versaodel = $_POST['ano_rop'];
		$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: rop-remove.php?error=sqlerror1");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "i", $versaodel);
			mysqli_stmt_execute($stmt);
			$resultGroup = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($resultGroup);
			if ($row == NULL){ $recado = "Essa versão não existe.";}else{$recado=""; $actRop = $row['versionActive'];}

		}

		///// Carrega os grupos dessa versão
		$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
		$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
		if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
			header("Location: rop-remove.php?error=sqlerror2"); //Retornará à pag anterior
			exit();
		}
		else{ //Se a conexão for bem sucedida, fará a verificação
			mysqli_stmt_bind_param($stmt, "i", $versaodel);
			mysqli_stmt_execute($stmt);
			$resultGroup = mysqli_stmt_get_result($stmt);
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
	    <!--================ Start Content Area =================-->
			<section class="team-area section-gap-top">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 text-center">
							<div class="section-title" style="padding-bottom: 40px;">
								<h1 style="letter-spacing: 3px; text-transform: none;">
									<label class="backbtn" onclick="<?php echo $linkropremove; ?>"><i class="fas fa-angle-left"></i></label>
									Confirmação da remoção da versão <?php echo $versaodel; ?> de ROPs
								</h1>
								<p>Nota: A versão não será excluída, mas bloqueada, impedindo que a mesma seja respondida.</p>
								<p>Somente a última versão é utilizada no questionário.</p>
								<p>Clique <b style="color: #4db8ff; cursor: pointer;" onclick="<?php echo $linkroplist; ?>">aqui</b> se deseja ver uma lista das versões de ROPs.</p>
								<p><b style="color: #ff4d5d;"><?php echo $recado; ?></b></p>
								<br>
								<?php if ($actRop){ ?>
									<h4 style="color: #4db8ff;"> Essa versão está ativa no momento, ao confirmar abaixo você estará bloqueando-a. </h4>
								<?php }else{  ?>
									<h4 style="color: #ff4d5d;"> Essa versão está desativada no momento, ao confirmar abaixo você estará ativando-a. </h4>
								<?php }  ?>
							</div>
						</div>
					</div>
					<?php if ($row != NULL){ ?>
						<div class="border1"></div>

						<section class="team-area section-gap-top">
							<div class="container">
								<!-- THE HTML TABLE DATA -->
							<div class="table-responsive">
								<table class="table table-striped" cellpadding="0" cellspacing="0" id="resultTable">
									<?php
										while($rowGroup = mysqli_fetch_assoc($resultGroup)){
									?>
										<tr>
											<th>Grupo <?php echo $rowGroup['numGroup']; ?>: <?php echo " "; echo $rowGroup['nameGroup']; ?></th>
										</tr>
										<?php
										$sql = "SELECT * FROM rop WHERE versionRop=? AND idGroup=?";
										$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
										if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
											header("Location: audit.php?error=sqlerror3"); //Retornará à pag anterior
											exit();
										}
										else{ //Se a conexão for bem sucedida, fará a verificação
											mysqli_stmt_bind_param($stmt, "ii", $versaodel, $rowGroup['idGroup']);
											mysqli_stmt_execute($stmt);
											$resultRop = mysqli_stmt_get_result($stmt);
											while($rowRop = mysqli_fetch_assoc($resultRop)){
										?>
												<tr>
													<td><?php echo $rowGroup['numGroup']; echo "."; echo $rowRop['numRop']; echo ". "; echo $rowRop['labelRop'];?></td>
												</tr>
								<?php
											}
										}//fim else
									}//fim while grupo
								?>
								</table>
							</div>
							</div>
						</section>

						<form action="inc/ropaccess.inc.php" method="post">
							<input type="hidden" name="version" value="<?php echo $versaodel; ?>">
							<input type="hidden" name="active" value="<?php echo $actRop; ?>">
							<div class="row justify-content-md-center">
									<div class="col-lg-6 col-md-8">
										<h5 class="mb-30" style="color: #4db8ff;"></h3>
											<div class="input-group mt-10">
												Digite &#34;Confirma&#34; no campo abaixo para validar a remoção desta versão
												<input type="text" id="search-val-name" name="box_de_confirmacao" placeholder="Digite &#34;Confirma&#34; para validar a remoção desta versão" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite &#34;Confirma&#34; para validar a remoção desta versão'"
												 required class="single-input">
											</div>
											<button class="btn" type="submit" name="confirmar-rop-access">Remover ROPs</button>
									</div>
							</div>
						</form>
					<?php } ?>
				</div>
			</section>
	    <!--================ End Content Area =================-->
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
