<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access.php";
	require 'inc/dbh.inc.php';
?>
<!--================ End Require Area =================-->
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

	// CÓDIGO PARA ARMAZENAR O DATETIME AO INICIAR A AUDITORIA
	try{
			$DT = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo') );
	}catch( Exception $e )
	{
			exit();
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
	<style>

	.radio-inline{
		cursor:pointer;
	}

	.radio-inline label {
	  margin-right: 15px;
	  line-height: 32px;
		cursor: pointer;
	}

	.radio-inline input {
	  -webkit-appearance: none;
	  -moz-appearance: none;
	  appearance: none;

	  border-radius: 50%;
	  width: 16px;
	  height: 16px;

	  border: 1.5px solid #999;
	  transition: 0.2s all linear;
	  margin-right: 5px;

	  position: relative;
	  top: 4px;
		cursor:pointer;
	}

	.radio-inline input:checked {
		color: #4db8ff;
	  border: 8px solid #4db8ff;
	}

	.radio-inline:checked ~ label {
  color: #337ab7;
	}
	</style>
</head>
<body style="background: url('img/MainPiclite.png') center; background-attachment: fixed;">
	<div id="page-container">
	   <div id="content-wrap">
	    <!--================ Start Content Area =================-->
			<section class="team-area section-gap-top">
				<div class="container">
				<!-- FORMULÁRIO -->
				<form action="inc/audit.inc.php" method="post">
	 			 <!-- HIDDEN INPUTS -->
	 			 <input type="hidden" name="version" value="<?php echo $version; ?>">
	 			 <input type="hidden" name="startAudit" value="<?php echo $DT->format('Y-m-d H:i:s'); ?>">
	 			 <input type="hidden" name="uidfullUser" value="<?php echo $_SESSION['userUid']. " " . $_SESSION['userLastUid']; ?>">
	 			 <!-- END HIDDEN INPUTS -->
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
								<div class="form-select required" id="default-select2">
									<select name="setor">
										<option selected disabled>Selecione o setor</option>
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
					<div class="border2"></div>
					<div class="row justify-content-md-center">
						<div class="col-lg-12 col-md-8">
							  <div class="container">
							    <div class="accordion" id="accordion" name="accordion" style="display:none;">
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
							                  <div class="row d-flex justify-content-start align-items-center">
																	<div class="col-md-1">
							                      <button type="button" id="btnAdd-<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>" class="btn btn-primary btn-sm" style="width:35px; height:35px; font-size:15px; background:#337ab7; border:none;">
							                        <i class="fas fa-plus" style="width:20px; height:20px; font-size:10px;"></i>
							                      </button>
																	</div>
																		<?php echo $rowGroup['numGroup']; echo "."; echo $rowRop['numRop']; echo ". "; echo $rowRop['labelRop'];?>
							                  </div>

																<div class="row clone d-flex flex-row justify-content-start align-items-center">
																	<div class="col-md-1">
																		<button type="button" class="btn btn-danger btnRemove btn-sm" style="width:35px; height:35px; font-size:15px; background:#d9534f; border:none;">
																			<i class="fas fa-minus" style="width:20px; height:20px; font-size:10px;"></i>
																		</button>
																	</div>
																	<!-- Default inline 1-->
																	<label class="radio-inline" style="margin-right: 25px; width:90px;">
																		<input type="radio" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop']; ?>[0]" style="margin-right: 5px;" value="C" >Conforme</label>
																	<label class="radio-inline" style="margin-right: 25px; width:115px;">
																		<input type="radio" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop']; ?>[0]" style="margin-right: 5px;" value="NC">Não conforme</label>
																	<label class="radio-inline" style="margin-right: 25px; width:90px;">
																		<input type="radio" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop']; ?>[0]" style="margin-right: 5px;" value="P">Parcial</label>
																	<label class="radio-inline" style="margin-right: 25px; width:90px;">
																		<input type="radio" name="rop<?php echo$rowGroup['numGroup'].$rowRop['numRop']; ?>[0]" style="margin-right: 5px;" value="NA" checked>Não aplica</label>

																	<input type="text" Name="info<?php echo $rowGroup['numGroup']; echo $rowRop['numRop']; ?>[]" placeholder="ROP<?php echo $rowGroup['numGroup']; echo "."; echo $rowRop['numRop']; ?> Informação adicional" onfocus="this.placeholder = ''"
																	onblur="this.placeholder = 'ROP<?php echo $rowGroup['numGroup']; echo "."; echo $rowRop['numRop']; ?> Informação adicional'" class="single-input" style="width:250px;">
																	<div class="border3"></div>
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
									<div class="card">
									  <div class="card-header" id="headingComment">
									    <h5 class="mb-0"  data-toggle="collapse" data-target="#collapseComment" aria-expanded="false" aria-controls="collapseComment" href="#collapseComment">
									      <button class="btnA" type="button">
									        Comentário
									      </button>
									    </h5>
									  </div>
									  <div id="collapseComment" class="collapse" aria-labelledby="headingComment" data-parent="#accordion">
									    <div class="card-body">
									      <div class="form-g">
									        Insira um comentário sobre esta auditoria (opcional):
									        <textarea class="form-control" id="inputlg" type="textarea" rows="2" name="comment" placeholder="Insira o seu comentário aqui."
													onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira o seu comentário aqui.'" style="border-bottom: 1px solid #4db8ff;"></textarea>
									      </div>
									    </div>
									  </div>
									</div> <!-- END CARD -->

							  </div> <!-- END ACCORDIONS -->
							  </div>
							  <div class="row justify-content-center">
							    <div class="col-lg-6 col-md-8">
							      <small>&nbsp;</small>
							      <!--button class="btn" type="submit" name="auditar" id="submit-button" style="display:none;">Gravar Auditoria</button-->
										<button type="button" class="btn" data-toggle="modal" id="submit-button-modal" data-target="#exampleModalCenter" style="display:none;">Gravar Auditoria</button>

							    </div>
							  </div>
								<!-- Modal -->
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
												Ao confirmar a gravação, não poderá alterar os dados depois. <br>
												Para excluir uma auditoria, somente um administrador poderá fazê-lo. <br>
												Deseja gravar a auditoria?
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #ff4d5d; border: 2px solid #ff4d5d;">Não, vou revisar</button>
								        <button type="submit" name="auditar" class="btn btn-primary" id="submit-button">Sim, gravar auditoria</button>
								      </div>
								    </div>
								  </div>
								</div>
								<!-- Fim Modal -->
						</div>
					</div>
				</form>
				</div>
			</section>
	    <!--================ End Content Area =================-->
		</div>
	   <!--================ Start Footer Area =================-->
	   <br><br><br><br><br>
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
<script>
  //Fonte: https://codepen.io/JeffAspen/pen/qOyLRB
	$(document).ready(function() {
	 // Executed when select is changed
		$("select").on('change',function() {
				var x = this.selectedIndex;

				if (x == "") {
					 $("#submit-button-modal").hide();
					 $("#accordion").hide();
				} else {
					 $("#submit-button-modal").show();
					 $("#accordion").show();
				}
		});

		// It must not be visible at first time
		$("#submit-button-modal").css("display","none");
		$("#accordion").css("display","none");
	});
</script>
</body>

</html>
