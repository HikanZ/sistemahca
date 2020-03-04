<?php
  session_start();
  if (!empty($_SESSION['liberaoubloqueia'])){
    unset($_SESSION['liberaoubloqueia']);
  }
  if (empty($_SESSION['userId'])) {
    header("Location: ../login.php");
    exit();
  }

  if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
  }else{
    header("Location: ../login.php");
    exit();
  }

  //passwordreset.inc.php
  $cpf = $_SESSION['cpfchange'];
  $idacc = $_SESSION['idchange'];
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
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
  $sql = "UPDATE users SET pwdUsers=? WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../visualizar-acc.php?error=sqlerror"); //Retornará à pag anterior
    exit();
  }else { //Se a conexão for bem sucedida, fará a atualização da senha
    mysqli_stmt_bind_param($stmt, "si", $hashedPwd, $idacc);
    mysqli_stmt_execute($stmt); // Executa o statement

    //echo "<br><br>CHEGOU<br>";
    //echo $password;
    header("Location: ../visualizar-acc.php?search=success&fieldmail=$idacc"); //Retornará à pag anterior
    exit();
  }
?>
