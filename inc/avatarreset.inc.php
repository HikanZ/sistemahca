<?php
  session_start();
  if (empty($_SESSION['userId'])) {
    header("Location: ../login.php");
    exit();
  }

  if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
  }else{
    header("Location: ../login.php");
    exit();
  }

  //avatarreset.inc.php
  $cpf = $_SESSION['cpfchange'];
  $clear = array(".", "-");
  $password = str_replace($clear, "", $cpf);
  /*
  echo $password;
  echo $_SERVER['REQUEST_URI'];
  $findme = "/hca/";
  $pos = stripos($_SERVER['REQUEST_URI'], $findme);
  if ($pos === false) {$emailrequest = str_replace("inc/passwordreset.inc.php?password=reset&fieldmail=", "", $_SERVER['REQUEST_URI']);
  }else{ $emailrequest = str_replace("/hca/inc/passwordreset.inc.php?password=reset&fieldmail=", "", $_SERVER['REQUEST_URI']);}
  echo $emailrequest;
  */
  $emailrequest = $_SESSION['emailchange'];
  require 'dbh.inc.php';
  $resetavatar = "img/avatarreset.png";

  echo $emailrequest;
  echo "<br><br>";
  echo $resetavatar;
  $sql = "UPDATE users SET avatarLinkUser=? WHERE emailUsers=?";
  $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../visualizar-acc.php?error=sqlerror"); //Retornará à pag anterior
    exit();
  }
  else { //Se a conexão for bem sucedida, fará a atualização da senha
    mysqli_stmt_bind_param($stmt, "ss", $resetavatar, $emailrequest);
    mysqli_stmt_execute($stmt); // Executa o statement

    //echo "<br><br>CHEGOU<br>";
    //echo $password;
    $_SESSION['userAvatar'] = $resetavatar;
    unset($_SESSION['emailchange']);
    unset($_SESSION['cpfchange']);
    header("Location: ../visualizar-acc.php?search=success&fieldmail=$emailrequest"); //Retornará à pag anterior
    exit();
  }