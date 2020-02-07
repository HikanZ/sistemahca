<?php
  session_start();
//dataupdate.inc.php
$emailrequest = $_SESSION['emailchange'];
if (isset($_POST['alterar-cadastro'])) {
  var_dump($_POST);
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $dtnasc = $_POST['dtnasc'];
  $email = $_POST['email'];
  $cargo = $_POST['cargo'];
  $cpf = $_POST['cpf'];
  $tipousuario = $_POST['tipousuario'];

  $sql = "SELECT * FROM users WHERE emailUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../usuarios-pesquisa.php?error=sqlerror"); //Retornará à pag anterior
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "s", $emailrequest);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      header("Location: ../usuarios-pesquisa.php?error=emailinvalido"); //Retornará à pag anterior
      exit();
    }
  }





  //header("Location: ../visualizar-acc.php?search=success&fieldmail=$emailrequest"); //Retornará à pag anterior
  //exit();
}else{
  header("Location: ../visualizar-acc.php?search=success&fieldmail=$emailrequest"); //Retornará à pag anterior
  exit();
}
