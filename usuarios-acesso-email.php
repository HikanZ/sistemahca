<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access-admin.php";
  require "inc/dbh.inc.php";
  if (!empty($_SESSION['liberaoubloqueia'])){
		$email = $_SESSION['liberaoubloqueia'];
    unset($_SESSION['liberaoubloqueia']);
  }else{
		if (isset($_POST['usuario-acesso'])){}else{
	    header("Location: usuarios-acesso.php?error=wrongaccess");
			exit();
	  }

	  $email = $_POST['emailnotnull'];
	}

  $sql = "SELECT * FROM users WHERE emailUsers=?";
  $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: usuarios-acesso.php?error=connectionerror"); //Retornará à pag anterior
    exit();
  }
  else{ //Se a conexão for bem sucedida, fará a consulta
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultUser = mysqli_stmt_get_result($stmt);
    $rowUser = mysqli_fetch_assoc($resultUser);
  }
  if ($rowUser['adminSystem'] > $_SESSION['admincheck'] ) {
    header("Location: usuarios-acesso.php?error=lowleveluser");
		exit();
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

	<title>Acesso | Sistema HcA</title> <!-- Site Title -->

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
                    <label class="backbtn" onclick="<?php echo $linkaccessuser; ?>"><i class="fas fa-angle-left"></i></label>
                    Acesso do Usuário
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
                        <div class="card profile-card-3" style="height:740px;">
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
                                $linkaccess = "window.location.href='usuarios-acesso.php'";
                              }?>
                              <a data-tooltip-location="bottom" style=" color:#4db8ff; font-size:10px; top:-32px; ; z-index:100000;">&nbsp;</a>
                              <img src="<?php echo $rowUser['avatarLinkUser']; ?>" alt="profile-image" class="profile"/>
                            </div>
                            <div class="card-content" >
                                <h2><?php echo $rowUser['uidUsers']; echo ' '; echo $rowUser['uidLastUsers']; ?>
                                  <small><?php echo $rowUser['roleUsers']; ?> - <?php if ($rowUser['adminSystem']==1 || $rowUser['adminSystem']==7)
                                                                                        {if ($rowUser['adminSystem'] == 7) {echo 'Super Administrador';} else {echo 'Admininstrador';}} else echo 'Usuário';?></small>
                                  <small>
                                    <b>
                                    <?php if ($rowUser['activeUsers']==1){?> <b style="color: #4db8ff; font-weight: 100;">Conta ativa</b>
                                    <?php $textobotao = "Bloquear conta"; }else{ ?> <b style="color: #ff4d5d; font-weight: 100;">Conta bloqueada</b>
                                    <?php $textobotao = "Liberar conta";} ?>
                                    </b>
                                  </small>
                                </h2>
																<?php if($rowUser['activeUsers']==0){ $colorbase="#4db8ff"; $display="grid"; }else{$colorbase="#ff4d5d"; $display="none";}?>
                                <div class="border1" style="margin: 10px auto;"></div>

																<form action="inc/useraccess.inc.php" method="post">
																	<input type="hidden" name="idusuarioacc" value="<?php echo $rowUser['idUsers'];?>">
																	<input type="hidden" name="action" value="<?php echo $rowUser['activeUsers'];?>">
																	<input type="hidden" name="whoDeactivate" value="<?php echo $_SESSION['userId'];?>">

																<?php if($rowUser['activeUsers']==0){ ?>
																	<input type="hidden" name="whoDeactivate" value="">
																	<input type="hidden" name="motiveDeactivate" value="">
																	<?php
																	$sql = "SELECT * FROM users WHERE idUsers=?";
																	$stmt = mysqli_stmt_init($conn);
																	if(!mysqli_stmt_prepare($stmt, $sql)){
																		header("Location: ../usuarios-acesso.php?error=sqlerror");
																		exit();
																	}else{
																		mysqli_stmt_bind_param($stmt, "i", $rowUser['whoDeactivate']);
																		mysqli_stmt_execute($stmt); // Executa o statement
																		$result = mysqli_stmt_get_result($stmt);
																		$row1 = mysqli_fetch_assoc($result);
																	}
																	?>
	                                <div class="d-flex flex-row bd-highlight mb-3">
	                                  <div class="p-2 bd-highlight">
	                                    <h5>Bloqueado por: <small><?php echo "("; echo $rowUser['whoDeactivate']; echo ") "; echo $row1['uidUsers']." ".$row1['uidLastUsers']; ?></small></h5>
	                                  </div>
	                                </div>
	                                <div class="d-flex flex-row bd-highlight mb-3">
	                                  <div class="p-2 bd-highlight">
	                                    <h5>Data da desativação: <small><?php echo $rowUser['dateDeactivate']; ?></small></h5>
	                                  </div>
	                                </div>
	                                <div class="d-flex flex-row bd-highlight mb-3">
	                                  <div class="p-2 bd-highlight">
	                                    <h5>Motivo: <small><?php echo $rowUser['motiveDeactivate']; ?></small></h5>
	                                  </div>
	                                </div>

																<?php }else{ ?>

																	<div class="d-flex flex-row bd-highlight mb-3">
	                                  <div class="p-2 bd-highlight">
	                                    Motivo do bloqueio (Campo obrigatório):
	                                  </div>
																	</div>
																	<textarea class="form-control" id="motiveDeactivate" type="textarea" rows="4" name="motiveDeactivate" placeholder="Insira o motivo do bloqueio."
																	onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira o motivo do bloqueio.'" style="border-bottom: 1px solid #4db8ff;"
																	required class="single-input"></textarea>


																<?php }?>
																	<small>&nbsp;</small>
																	<button class="btn" type="submit" name="liberar-bloquear-acesso" style="cursor: <?php echo $cursortype; ?>; background-color: <?php echo $colorbase;?>; border: 2px solid <?php echo $colorbase;?>;"><?php echo $textobotao; ?></button>
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
	<script src="js/searchuser.js"></script>
</body>
</html>
