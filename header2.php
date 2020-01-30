<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Sistema Healthcare Assessment">
    <meta name="viewport"    content="width=device-width , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/logotemp.ico" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
  </head>
<body>
  <nav class="navig">
    <div class="logo1">
        <a href="index.php">SISTEMA HcA</a>
    </div>
    <?php
    $link_menu = 'menu.php';
    $link_pubcontato = 'pub-rop.php';
    $link_pubproj = 'pub-proj.php';
    $link_pubsobre = 'pub-sobre.php';
    $link_logout = 'includes/logout.inc.php';
      if (isset($_SESSION['userId'])) { ?>
        <ul class="nav-links">
          <a href=" <?php echo $link_menu; ?>     ">Home</a>
          <a href=" <?php echo $link_pubproj; ?>  ">Projeto</a>
          <a href=" <?php echo $link_pubcontato; ?>   ">Contato</a>
          <a href=" <?php echo $link_pubsobre; ?> ">Sobre</a>
          <a class='sair' href=" <?php echo $link_logout; ?> ">Sair</a>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      <?php }else { ?>
        <ul class="nav-links">
        <a href=" <?php echo $link_pubproj; ?>  ">Projeto</a>
        <a href=" <?php echo $link_pubcontato; ?>   ">Contato</a>
          <a href=" <?php echo $link_pubsobre; ?> ">Sobre</a>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
    <?php
      }
    ?>

  </nav>
  <div class="verticalspace"></div>
  <script src="js/app.js"></script>

</body>

</html>
