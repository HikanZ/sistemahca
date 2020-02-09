<!--================ Start Require Area =================-->
<?php
	require "header.php";
	require "inc/links.php";
	require "inc/access-admin.php";
	require 'inc/dbh.inc.php';
?>
<?php

	$sql = "SELECT * FROM users";
	$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
	if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
		header("Location: usuarios.php?error=connectionerror"); //Retornará à pag anterior
		exit();
	}
	else{ //Se a conexão for bem sucedida, fará a consulta
		mysqli_stmt_execute($stmt);
		$resultUser = mysqli_stmt_get_result($stmt);
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
		 							<label class="backbtn" onclick="<?php echo $linkusers; ?>"><i class="fas fa-angle-left"></i></label>
		 							Pesquisar Usuários
		 						</h1>
								<p>Clique no usuário para ver a sua ficha e alterar os dados.</p>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="border1"></div>
		 			<div class="row justify-content-md-center">
						<div class="col-lg-6 col-md-8">
		 					<h5 class="mb-30" style="color: #4db8ff;"></h3>
		 						<div class="input-group-icon mt-10">
		 							<div class="icon"><i class="fas fa-user" aria-hidden="true"></i></div>
		 							<input type="text" id="search-val-name" name="first_name" placeholder="Nome e/ou Sobrenome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome e/ou Sobrenome'"
		 							 required class="single-input">
		 						</div>
		 						<div class="input-group-icon mt-10">
		 							<div class="icon"><i class="fas fa-id-card" aria-hidden="true"></i></div>
		 							<input type="text" id="cpf" name="cpf" placeholder="CPF" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPF'"
		 							 required class="single-input">
		 						</div>
		 						<div class="input-group-icon mt-10">
		 							<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
		 							<input type="text" id="search-email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"
		 							 required class="single-input">
		 						</div>
		 						<div class="input-group-icon mt-10">
		 							<div class="icon"><i class="fas fa-user-tie" aria-hidden="true"></i></div>
		 							<input type="text" id="cargo" name="cargo" placeholder="Cargo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cargo'"
		 							 required class="single-input">
		 						</div>
		 						<div class="mt-10">
		 							<div class="switch-wrap d-flex">
		 								<div class="primary-switch">
		 									<input type="checkbox" name="searchvalhasphone" id="primary-switch-user" class="checkradio" checked>
		 									<label for="primary-switch-user"  ></label>
		 								</div>
		 								<label style="margin-left: 20px;"> Ativo? </label>
		 							</div>
		 						</div>
		 				</div>
		 			</div>
		 		</div>
		 	</section>

		 	<section class="team-area section-gap-top">
		 		<div class="container">
		 			<!-- THE HTML TABLE DATA -->
		 		<div class="table-responsive">
		 			<table class="table table-striped" cellpadding="0" cellspacing="0" id="resultTable">
		 				  <tr>
		 				    <th>Nome</th>
		 						<th>CPF</th>
		 				    <th>Email</th>
		 				    <th>Cargo</th>
		 				    <th>Admin.</th>
								<th>Ativo</th>
		 				  </tr>
							<?php
							while ($rowUser = mysqli_fetch_assoc($resultUser)){
								$linkaccview = "window.location.href='visualizar-acc.php?search=success&fieldmail=".$rowUser['emailUsers']."'";
								?>
								<tr onclick="<?php echo $linkaccview;?>">
									<td><?php echo $rowUser['uidUsers']; echo ' '; echo $rowUser['uidLastUsers']; ?></td>
									<td><?php echo $rowUser['cpfUser']; ?></td>
									<td><?php echo $rowUser['emailUsers']; ?></td>
									<td><?php echo $rowUser['roleUsers']; ?></td>
									<td><?php if ($rowUser['adminSystem']==1 || $rowUser['adminSystem']==7) echo 'Sim';?></td>
									<td><?php if ($rowUser['activeUsers']==1) echo 'Sim';?></td>
								</tr>
							<?php
							}//fim while
							?>
		 			</table>
		 		</div>
		 		</div>
		 	</section>
		 	<!--================ End Team Area =================-->
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
