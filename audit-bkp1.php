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

	///// Carrega os grupos dessa versão
	$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: audit.php?error=sqlerror3"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a verificação
		mysqli_stmt_bind_param($stmt, "i", $version);
		mysqli_stmt_execute($stmt);
		$resultGroup = mysqli_stmt_get_result($stmt);
/*
		while($rowGroup = mysqli_fetch_assoc($resultGroup)){
			echo $rowGroup['nameGroup'];
		}
*/
	}


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
							  <div class="container" style="width:1000px;">
							    <div class="accordion" id="accordion" name="accordion">
							    <?php
							      while($rowGroup = mysqli_fetch_assoc($resultGroup)){
							    ?>
							      <div class="card">
							        <div class="card-header" id="heading<?php echo $rowGroup['numGroup']; ?>">
							          <h5 class="mb-0"  data-toggle="collapse" data-target="#collapse<?php echo $rowGroup['numGroup']; ?>" aria-expanded="<?php if ($rowGroup['numGroup']==1) echo 'true'; else echo 'false';?>" aria-controls="collapse<?php echo $rowGroup['numGroup']; ?>" href="#collapse<?php echo $rowGroup['numGroup']; ?>">
							            <button class="<?php if ($rowGroup['numGroup']==1) echo 'btnA'; else echo 'btnA collapsed';?>" type="button">
							              Grupo <?php echo $rowGroup['numGroup']; ?>: <?php echo " "; echo $rowGroup['nameGroup']; ?>
							            </button>
							          </h5>
							        </div>
							        <div id="collapse<?php echo $rowGroup['numGroup']; ?>" class="<?php if ($rowGroup['numGroup']==1) echo 'collapse show'; else echo 'collapse';?>" aria-labelledby="heading<?php echo $rowGroup['numGroup']; ?>" data-parent="#accordion">
							          <div class="card-body">
							          <?php
							            ///// Carrega os ROPs dessa versão
							            $sql = "SELECT * FROM rop WHERE versionRop=? AND idGroup=?";
							            $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
							            if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
							              header("Location: audit.php?error=sqlerror3"); //Retornará à pag anterior
							              exit();
							            }
							            else{ //Se a conexão for bem sucedida, fará a verificação
							              mysqli_stmt_bind_param($stmt, "ii", $version, $rowGroup['idGroup']);
							              mysqli_stmt_execute($stmt);
							              $resultRop = mysqli_stmt_get_result($stmt);
							              while($rowRop = mysqli_fetch_assoc($resultRop)){
							          ?>
							                <div id="example-<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>" class="content" display="flex">
							                  <div class="row">
							                    <div class="col-md-1 my-auto">
							                      <button type="button" id="btnAdd-<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>" class="btn btn-primary btn-sm" style="width:35px; height:35px; font-size:15px; background:#337ab7; border:none;">
							                        <i class="fas fa-plus" style="width:20px; height:20px; font-size:10px;"></i>
							                      </button>
							                    </div>
							                    <div class="col-md-11 my-auto" style="font-size:15px;">
																		<?php echo $rowGroup['numGroup']; echo "."; echo $rowRop['numRop']; echo ". "; echo $rowRop['labelRop'];?>
							                    </div>
							                  </div>
																<div class="row clone">
																	<div class="col-md-1">
																		<button type="button" class="btn btn-danger btnRemove btn-sm" style="width:35px; height:35px; font-size:15px; background:#d9534f; border:none;">
							                        <i class="fas fa-minus" style="width:20px; height:20px; font-size:10px;"></i>
							                      </button>
																	</div>
																	<div class="col-md-6">
																		<!-- Default inline 1-->
																		<div class="custom-control custom-radio custom-control-inline">
																		  <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
																		  <label class="custom-control-label" for="defaultInline1">Conforme</label>
																		</div>

																		<!-- Default inline 2-->
																		<div class="custom-control custom-radio custom-control-inline">
																		  <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
																		  <label class="custom-control-label" for="defaultInline2">Não Conforme</label>
																		</div>

																		<!-- Default inline 3-->
																		<div class="custom-control custom-radio custom-control-inline">
																		  <input type="radio" class="custom-control-input" id="defaultInline3" name="inlineDefaultRadiosExample">
																		  <label class="custom-control-label" for="defaultInline3">Parcial</label>
																		</div>

																		<!-- Default inline 4-->
																		<div class="custom-control custom-radio custom-control-inline">
																		  <input type="radio" class="custom-control-input" id="defaultInline4" name="inlineDefaultRadiosExample">
																		  <label class="custom-control-label" for="defaultInline4">Não Aplica</label>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<input type="text" Name=Teste placeholder="Teste" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Teste'" class="single-input">
																	</div>
																</div>

																<div class="row clone d-flex justify-content-around align-items-center">
																	<button type="button" class="btn btn-danger btnRemove btn-sm" style="width:35px; height:35px; font-size:15px; background:#d9534f; border:none;">
																		<i class="fas fa-minus" style="width:20px; height:20px; font-size:10px;"></i>
																	</button>
																	<!-- Default inline 1-->
																	<label class="radio-inline"><input type="radio" name="optradio" checked>Option 1</label>
																	<label class="radio-inline"><input type="radio" name="optradio">Option 2</label>
																	<label class="radio-inline"><input type="radio" name="optradio">Option 3</label>
																	<label class="radio-inline"><input type="radio" name="optradio">Option 4</label>

																	<input type="text" Name=Teste placeholder="Teste" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Teste'" class="single-input" style="width:300px;">
																</div>
							                </div>
							          <?php
							              }
							            }
							          ?>
							          </div>
							        </div>
							      </div> <!-- END CARD -->
							    <?php
							      }
							    ?>
							  </div> <!-- END ACCORDIONS -->
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
  <?php
		$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
		$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
		if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
			header("Location: audit.php?error=sqlerror3"); //Retornará à pag anterior
			exit();
		}
		else{ //Se a conexão for bem sucedida, fará a verificação
			mysqli_stmt_bind_param($stmt, "i", $version);
			mysqli_stmt_execute($stmt);
			$resultGroup = mysqli_stmt_get_result($stmt);
			while($rowGroup = mysqli_fetch_assoc($resultGroup)){
				///// Carrega os ROPs dessa versão
				$sql = "SELECT * FROM rop WHERE versionRop=? AND idGroup=?";
				$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
				if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
					header("Location: audit.php?error=sqlerror3"); //Retornará à pag anterior
					exit();
				}
				else{ //Se a conexão for bem sucedida, fará a verificação
					mysqli_stmt_bind_param($stmt, "ii", $version, $rowGroup['idGroup']);
					mysqli_stmt_execute($stmt);
					$resultRop = mysqli_stmt_get_result($stmt);
					while($rowRop = mysqli_fetch_assoc($resultRop)){ ?>
						$('#example-<?php echo $rowGroup["numGroup"]; echo $rowRop["numRop"]; ?>').multifield({
							section: '.clone',
							btnAdd:'#btnAdd-<?php echo $rowGroup["numGroup"]; echo $rowRop["numRop"]; ?>',
							btnRemove:'.btnRemove'
						});
	<?php
					}
			}
		}
	}
	?>
</script>
</body>

</html>
