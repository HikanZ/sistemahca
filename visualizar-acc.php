	<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access-admin.php";
	require 'inc/dbh.inc.php';
?>
<?php

		$findme = "/hca/";
		$pos = stripos($_SERVER['REQUEST_URI'], $findme);
		if ($pos === false) {$idusuario = str_replace("/visualizar-acc.php?search=success&fieldmail=", "", $_SERVER['REQUEST_URI']);
		}else{ $idusuario = str_replace("/hca/visualizar-acc.php?search=success&fieldmail=", "", $_SERVER['REQUEST_URI']);}
		$sql = "SELECT * FROM users WHERE idUsers=?";
		$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
		if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
			header("Location: usuarios.php?error=connectionerror"); //Retornará à pag anterior
			exit();
		}
		else{ //Se a conexão for bem sucedida, fará a consulta
			mysqli_stmt_bind_param($stmt, "i", $idusuario);
			mysqli_stmt_execute($stmt);
			$resultUser = mysqli_stmt_get_result($stmt);
			$rowUser = mysqli_fetch_assoc($resultUser);
			//$_SESSION['emailacc'] = $emailrequest;
			/*var_dump($rowUser);*/
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

	<title>Usuários | Sistema HcA</title>	<!-- Site Title -->

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
		 							<label class="backbtn" onclick="<?php echo $linksearchuser; ?>"><i class="fas fa-angle-left"></i></label>
		 							Alterar Dados de Conta
		 						</h1>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</section>

		 	<section class="section team-area section-gap-top">
		 		<div class="container">
		 			<div class="row justify-content-lg-center">
		 			<!--Profile Card 3-->
		 			    		<div class="col-md-6">
		 			    		    <div class="card profile-card-3" style="height:840px;">
		 			    		        <div class="background-block">
		 			    		            <!--img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="profile-sample1" class="background"/-->
		 			    		        </div>
		 			    		        <div class="profile-thumb-block" >
														<?php if( $rowUser['adminSystem'] > $_SESSION['admincheck'] ){
															$linkresetavatar = "window.location.href='#'";
															$cursortype = "no-drop";
															$linkpwdreset = "window.location.href='#'";
															$linkform = "#";
															$linkaccess = "window.location.href='#'";
														}else{
															$linkresetavatar = "window.location.href='inc/avatarreset.inc.php'";
															$cursortype = "pointer";
															$linkpwdreset = "window.location.href='inc/passwordreset.inc.php?password=reset&fieldmail=".$rowUser['emailUsers']."'";
															$linkform = "inc/dataupdate.inc.php";
															$_SESSION['liberaoubloqueia']=$rowUser['emailUsers'];
															$linkaccess = "window.location.href='usuarios-acesso-email.php'";
															$_SESSION['idchange'] = $rowUser['emailUsers'];
														}?>
		 												<a onclick="<?php echo $linkresetavatar; ?>" data-tooltip="Clique para resetar este avatar" data-tooltip-location="bottom" style="  cursor:<?php echo $cursortype; ?>;  color:#4db8ff; font-size:10px; top:-32px; ; z-index:100000;">Resetar</a>
		 			    		          <img src="<?php echo $rowUser['avatarLinkUser']; ?>" alt="profile-image" class="profile" style="  cursor:<?php echo $cursortype; ?>;" />
		 			    		        </div>
		 			    		        <div class="card-content">
		 			                    <h2><?php echo $rowUser['uidUsers']; echo ' '; echo $rowUser['uidLastUsers']; ?>
		 														<small><?php echo $rowUser['roleUsers']; ?> - <?php if ($rowUser['adminSystem']==1 || $rowUser['adminSystem']==7)
																 																											{if ($rowUser['adminSystem'] == 7) {echo 'Super Administrador';} else {echo 'Admininstrador';}} else echo 'Usuário';?></small>
		 														<small>
																	<b onclick="<?php echo $linkaccess; ?>" style="cursor:<?php echo $cursortype; ?>;">
		 															<?php if ($rowUser['activeUsers']==1){?> <b style="color: #4db8ff; font-weight: 100;">Conta ativa</b>
		 															<?php }else{ ?> <b style="color: red; font-weight: 100;">Conta bloqueada</b>
		 															<?php } ?>
																	</b> <b style="font-weight: 100;">&nbsp;&nbsp;&nbsp;</b>
																	<b onclick="<?php echo $linkpwdreset; ?>" style="/*color: #4db8ff;*/ cursor:<?php echo $cursortype; ?>; font-weight: 100;" data-tooltip="Clique para resetar a senha. A senha nova é o CPF da pessoa, somente números" data-tooltip-location="bottom" >Resetar a senha</b>
																</small>
		 													</h2>
		 													<div class="border1" style="margin: 10px auto;"></div>
		 													<form action="<?php echo $linkform; ?>" method="post">
																<input type="hidden" name="idusuarioacc" value="<?php echo $rowUser['idUsers'];?>" placeholder="<?php echo $rowUser['idUsers'];?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $rowUser['idUsers'];?>'" style="/*visibility:hidden;*/ margin: 0; height:5px; width:5px;">
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-user" aria-hidden="true"></i></div>
		 															<input type="text" class="single-input" name="nome" value="<?php echo $rowUser['uidUsers'];?>" placeholder="<?php echo $rowUser['uidUsers'];?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $rowUser['uidUsers'];?>'">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-user-friends" aria-hidden="true"></i></div>
		 															<input type="text" class="single-input" name="sobrenome" value="<?php echo $rowUser['uidLastUsers'];?>" placeholder="<?php echo $rowUser['uidLastUsers'];?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $rowUser['uidLastUsers'];?>'">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-birthday-cake" aria-hidden="true"></i></div>
		 															<input type="text" id="birth-date" class="single-input" name="dtnasc" value="<?php echo $rowUser['birthUsers'];?>" placeholder="<?php echo $rowUser['birthUsers'];?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $rowUser['birthUsers'];?>'">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
		 															<input type="text" class="single-input" name="email" value="<?php echo $rowUser['emailUsers']; ?>" placeholder="<?php echo $rowUser['emailUsers']; $_SESSION['emailchange'] = $rowUser['emailUsers']; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $rowUser['emailUsers']; ?>'">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-user-tie" aria-hidden="true"></i></div>
		 															<input type="text" class="single-input" name="cargo" value="<?php echo $rowUser['roleUsers']; ?>" placeholder="<?php echo $rowUser['roleUsers']; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $rowUser['roleUsers']; ?>'">
		 														</div>
		 														<div class="input-group-icon mt-10">
		 															<div class="icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
		 															<input type="text" id="cpf" class="single-input" name="cpf" value="<?php echo $rowUser['cpfUser']; ?>" placeholder="<?php echo $rowUser['cpfUser']; $_SESSION['cpfchange'] = $rowUser['cpfUser']; ?>	" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $rowUser['cpfUser']; ?>'">
		 														</div>
																<?php if( $rowUser['adminSystem'] > $_SESSION['admincheck'] ){ } else{ /*  */?>
			 														<div class="input-group-icon mt-10">
			 															<div class="icon"><i class="fa fa-hand-pointer" aria-hidden="true"></i></div>
			 															<div class="form-select" id="default-select2">
			 																<select name="tipousuario">
			 																	<option selected disabled value="<?php $rowUser['adminSystem'] ?>">Selecione o tipo de conta</option>
			 																	<option value="0">Usuário</option>
			 																	<option value="1">Administrador</option>
																				<?php if ($_SESSION['admincheck']==7 ){ ?>
																					<option value="7">Super Administrador</option>
																				<?php } ?>
			 																</select>
			 															</div>
			 														</div>
																<?php } ?>
																<small>&nbsp;</small>
		 														<button class="btn" type="submit" name="alterar-cadastro" style="cursor:<?php echo $cursortype; ?>;">Alterar dados cadastrais</button>


		 													</form>
															<div class="border1" style="margin: 20px auto;"></div>
															<h2><small>Número de logins: <?php echo $rowUser['countLogin']; ?> </small></h2>
															<h2><small>Data do último login: <?php echo $rowUser['lastLogin']; ?> </small></h2>
		 			                </div>
		 	                </div>
		 	                <!--p class="mt-3 w-100 float-left text-center"><strong>Modren Profile Card</strong></p-->
		 			    		</div>
		 						</div>
			 			</div>
			 	</section>
		 	 <!--================ End Team Area =================-->
	   </div>
		 <!--================ Start Footer Area =================-->
		 <br><br><br><br>
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
	<script src="js/searchuser.js"></script>
</body>

</html>
