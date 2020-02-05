<!DOCTYPE html>
<html lang="pt-br" class="">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Usuários | Sistema HcA</title>

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<!--link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet"-->
	<!--
			CSS
			============================================= -->
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

	<!--================ Start Require Area =================-->
	<?php require "header.php" ?>
	<?php require "inc/links.php" ?>
	<!--================ End Require Area =================-->

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
							<input type="text" id="search-val-city" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"
							 required class="single-input">
						</div>
						<div class="input-group-icon mt-10">
							<div class="icon"><i class="fas fa-user-tie" aria-hidden="true"></i></div>
							<input type="text" name="cargo" placeholder="Cargo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cargo'"
							 required class="single-input">
						</div>
						<div class="mt-10">
							<div class="switch-wrap d-flex">
								<div class="primary-switch">
									<input type="checkbox" name="searchvalhasphone" id="primary-switch" class="checkradio" checked>
									<label for="primary-switch"  ></label>
								</div>
								<label style="margin-left: 20px;"> Administrador? </label>
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
				  </tr>
				  <tr onclick="<?php echo $linkaccvisualize; ?>">
				    <td>Guilherme Kanashiro</td>
						<td>368.555.798.09</td>
				    <td>hitoshi.kanashiro@gmail.com</td>
						<td>Estagiário</td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Carmelo Waters</td>
						<td></td>
				    <td>Bloomington</td>
				    <td></td>
						<td></td>
				  </tr>
				  <tr>
				    <td>Denis Whitney</td>
						<td></td>
				    <td>Hondo</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Myles Akers</td>
						<td></td>
				    <td>Whitesboro</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>June Randall</td>
						<td></td>
				    <td>Oakhurst</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Christi Hubbard</td>
						<td></td>
				    <td>Lake City</td>
				    <td></td>
						<td></td>
				  </tr>
				  <tr>
				    <td>Savannah Lowery</td>
						<td></td>
				    <td>Helotes</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Bernard Contreras</td>
						<td></td>
				    <td>Irving</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Alvaro Chandler</td>
						<td></td>
				    <td>Killeen</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Rodrick Watts</td>
						<td></td>
				    <td>South Point</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Laverne Elder</td>
						<td></td>
				    <td>Hudson Oaks</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Rosa Contreras</td>
						<td></td>
				    <td>Winfield</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Tyson Smith</td>
						<td></td>
				    <td>Lopeno</td>
				    <td></td>
						<td></td>
				  </tr>
				  <tr>
				    <td>Roger Mora</td>
						<td></td>
				    <td>Ralls</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Sun Ward</td>
						<td></td>
				    <td>Sparks</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Abel Gould</td>
						<td></td>
				    <td>Log Cabin</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Calvin Stanley</td>
						<td></td>
				    <td>Meadow</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Nellie Klein</td>
						<td></td>
				    <td>Driscoll</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Angel Melendez</td>
						<td></td>
				    <td>Mason</td>
				    <td></td>
						<td></td>
				  </tr>
				  <tr>
				    <td>Wayne Blair</td>
						<td>555.555.555-55</td>
				    <td>Maud</td>
				    <td></td>
						<td></td>
				  </tr>
				  <tr>
				    <td>Chuck Elkins</td>
						<td></td>
				    <td>Carrizo Springs</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Gwendolyn Elkins</td>
						<td></td>
				    <td>Pawnee</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Gregorio Durham</td>
						<td></td>
				    <td>Hubbard</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Donna Combs</td>
						<td></td>
				    <td>Shiner</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Fabian Dorsey</td>
						<td></td>
				    <td>Bigfoot</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Dorothea Hodges</td>
						<td></td>
				    <td>Blue Mound</td>
				    <td></td>
						<td></td>
				  </tr>
				  <tr>
				    <td>Stephanie Mullen</td>
						<td></td>
				    <td>Ross</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Henrietta Guerrero</td>
						<td></td>
				    <td>Browndell</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Leopoldo Moyer</td>
						<td></td>
				    <td>Tahoka</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Breanna Fischer</td>
						<td></td>
				    <td>La Porte</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Charmaine Cowan</td>
						<td></td>
				    <td>Edroy</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Miranda Ortiz</td>
						<td></td>
				    <td>Bay</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Stacy Webb</td>
						<td></td>
				    <td>Santa Maria</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Ben Dejesus</td>
						<td></td>
				    <td>Lasara</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Ivan Calderon</td>
						<td></td>
				    <td>South Point</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Odell Simms</td>
						<td></td>
				    <td>Marshall</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Vanessa Miranda</td>
						<td></td>
				    <td>La Rosita</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Shayne Reilly</td>
						<td></td>
				    <td>Victoria</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Stewart David</td>
						<td></td>
				    <td>Nassau Bay</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Sharlene Berger</td>
						<td></td>
				    <td>Frankston</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Fritz Rucker</td>
						<td></td>
				    <td>Hawk Cove</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Justin Garner</td>
						<td></td>
				    <td>Venus</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Alexander Moran</td>
						<td></td>
				    <td>Glen Rose</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Werner Richard</td>
						<td></td>
				    <td>Dodson</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Dara Ryan</td>
						<td></td>
				    <td>Danbury</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Pam Bowers</td>
						<td></td>
				    <td>Abilene</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Lucille Sweet</td>
						<td></td>
				    <td>Strawn</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Agnes Delacruz</td>
						<td></td>
				    <td>Sonora</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Bart Greene</td>
						<td></td>
				    <td>South Point</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Delmer Wallace</td>
						<td></td>
				    <td>Rosenberg</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Major Sears</td>
						<td></td>
				    <td>Walnut Springs</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Titus Morris</td>
						<td></td>
				    <td>Laguna Seca</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Nolan Berg</td>
						<td></td>
				    <td>Cactus</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Cyrus Ervin</td>
						<td></td>
				    <td>Westdale</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Ted Patton</td>
						<td></td>
				    <td>Fritch</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Melody Becker</td>
						<td></td>
				    <td>Whitesboro</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Napoleon Field</td>
						<td></td>
				    <td>Slaton</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Dalia Monroe</td>
						<td></td>
				    <td>Taft</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Geoffrey Acevedo</td>
						<td></td>
				    <td>Zavalla</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Antonio Mckay</td>
						<td></td>
				    <td>Crystal City</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Nicholas Maddox</td>
						<td></td>
				    <td>Moran</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Joy Hicks</td>
						<td></td>
				    <td>Rockwall</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Katrina Ross</td>
						<td></td>
				    <td>Windcrest</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Ariel Kirkland</td>
						<td></td>
				    <td>O'Brien</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Jayne Higgins</td>
						<td></td>
				    <td>Rosita North</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Summer Mckay</td>
						<td></td>
				    <td>Mila Doce</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Allen Barrett</td>
						<td></td>
				    <td>Poynor</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Kaitlyn Rouse</td>
						<td></td>
				    <td>Kennard</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Pilar Sanford</td>
						<td></td>
				    <td>Villa Verde</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Caryn Pena</td>
						<td></td>
				    <td>Dalworthington Gardens</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Francisca Ray</td>
						<td></td>
				    <td>Andrews</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Willa Pickett</td>
						<td></td>
				    <td>San Manuel-Linn</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Gilda Woodard</td>
						<td></td>
				    <td>Fort Worth</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Cole Huffman</td>
						<td></td>
				    <td>Wyldwood</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Sondra Bolden</td>
						<td></td>
				    <td>Linden</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Fran Keller</td>
						<td>333.333.333-33</td>
				    <td>Uvalde Estates</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Mollie Hays</td>
						<td></td>
				    <td>Hickory Creek</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Wilda Harvey</td>
						<td></td>
				    <td>Menard</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Lea Boucher</td>
						<td></td>
				    <td>Anahuac</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Esteban Schmidt</td>
						<td></td>
				    <td>Galena Park</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Lynn Stout</td>
						<td></td>
				    <td>Douglassville</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Debby Werner</td>
						<td></td>
				    <td>Palacios</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Thad Crabtree</td>
						<td></td>
				    <td>Morales-Sanchez</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Sally Reilly</td>
						<td></td>
				    <td>Loraine</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Irma Clark</td>
						<td></td>
				    <td>Wild Peach Village</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Aline Velez</td>
						<td></td>
				    <td>Mineola</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Lidia Schultz</td>
						<td></td>
				    <td>San Diego</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Valeria Dodd</td>
						<td></td>
				    <td>Collinsville</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Rebeca Hale</td>
						<td></td>
				    <td>Doolittle</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Roberta Christian</td>
						<td></td>
				    <td>Big Sandy</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Kristine Branch</td>
						<td></td>
				    <td>Brownfield</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Nicole Hardy</td>
						<td></td>
				    <td>Amarillo</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Kermit Porter</td>
						<td></td>
				    <td>Log Cabin</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Chance Odom</td>
						<td></td>
				    <td>Rio Vista</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Zoe Clifton</td>
						<td></td>
				    <td>Rancho Banquete</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Kenny Riddle</td>
						<td></td>
				    <td>Pelican Bay</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Garth Zamora</td>
						<td></td>
				    <td>Midway North</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Emile Vega</td>
						<td></td>
				    <td>Stafford</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Noel Mcgowan</td>
						<td></td>
				    <td>Socorro</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
				  <tr>
				    <td>Melanie Hoffman</td>
						<td></td>
				    <td>Jolly</td>
						<td></td>
				    <td>Sim</td>
				  </tr>
			</table>
		</div>
		</div>
	</section>
	<!--================ End Team Area =================-->
	<!--================ Start Footer Area =================-->
	<footer class="footer-area section-gap static-bottom">
		<div class="container">
			<div class="row justify-content-md-center footer-inner">
				<div class="col-sm-2"><img src="img/logologin.png" alt="" style="width:40px; height:40px;"></div>
				<div class="col-sm-4">Sistema Healthcare Assessment</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area =================-->
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
