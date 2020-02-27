<?php

if (isset($_POST['recuperar-senha'])) {
  //Verifica se alguem chegou nessa página sem que tenha sido pelo submit do botão do login
  //Se chegou por aqui pelo botão, tudo bem, executará o código abaixo
  //Detalhe que as funções exit garante que se houver um erro terminará a execução no momento
  //Evitando que haja a conexão e execução de forma ilegal ou erronea.

  require 'inc/dbh.inc.php';
  $mailuid   = $_POST['email'];
  $dtnasc    = $_POST['dtnasc'];
  $cpf       = $_POST['cpf'];

  if (empty($mailuid) || empty($dtnasc) || empty($cpf)){
    header("Location: pub-esquecisenha.php?error=emptyfield1");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE emailUsers=? AND birthUsers=? AND cpfUser=?"; //Verifica se o email confere
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
      header("Location: pub-esquecisenha.php?error=sqlerror1"); //Retornará à pag anterior
      exit();
    }
    else { //Se o email conferir e não tiver erro de sql, a senha será conferida
      mysqli_stmt_bind_param($stmt, "sss", $mailuid, $dtnasc, $cpf);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        if ($row['activeUsers']!=1){
          //Verifica se a conta está ativa, se for diferente de 1, significa que não está ativa
          header("Location: pub-esquecisenha.php?error=accnotfound");
          exit();
        }
      }else {
        header("Location: pub-esquecisenha.php?error=accnotfound"); //Retornará à pag anterior
        exit();
      }
    }
  }

}
else{//Se chegou nessa pág de forma ilegal ou erronea (que não tenha sido pelo button)
  //Será expulso dessa pág retornando à pág que deveria ter vindo.
  header("Location: pub-esquecisenha.php");
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

	<title>Recuperar senha | Sistema HcA</title>	<!-- Site Title -->

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
									<label class="backbtn" onclick="window.location.href='pub-esquecisenha.php'"><i class="fas fa-angle-left"></i></label>
									Trocar a senha esquecida
								</h1>
                <p style="color: #8c8c8c;">Por medida de segurança, ao trocar a senha, sua conta estará bloqueada e deverá ser liberada por um administrador do sistema.</p>
							</div>
						</div>
					</div>
					<div class="border1"></div>
					<form action="inc/forgotpass.inc.php"  method="post" autocomplete="off">
            <input type="hidden" name="email" value="<?php echo $mailuid; ?>">
            <input type="hidden" name="dtnasc" value="<?php echo $dtnasc; ?>">
            <input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
						<div class="row justify-content-md-center">
								<div class="col-lg-6 col-md-8">
									<h5 class="mb-30" style="color: #4db8ff;"></h3>
										<div class="input-group-icon mt-10">
											<div class="icon"><i class="fas fa-unlock" aria-hidden="true"></i></div>
											<input type="password" id="password" name="password" placeholder="Digite a nova senha *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite a nova senha *'"
											 required class="single-input" data-pwmatch="NewPW" data-pwmatch-length="5"  autocomplete="off">
										</div>
										<div class="input-group-icon mt-10">
											<div class="icon"><i class="fas fa-lock" aria-hidden="true"></i></div>
											<input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Repita a nova senha *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repita a nova senha *'"
											 required class="single-input"  data-pwmatch="ConfirmPW"  autocomplete="off">
										</div>
										<span id="PasswordMatch" style="color:red; font-weight: 50;">As novas senhas são diferentes</span>
										<button class="btn" type="submit" name="pass-change-abc">Trocar a senha</button>
								</div>
						</div>
					</form>
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
	<script src="js/passwordchange.js"></script>
</body>

</html>
