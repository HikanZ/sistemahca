<?php
if (isset($_POST['usuario-alterar'])) {
  session_start();
  require 'dbh.inc.php';
  $nome = $_POST['first_name'];
  $sobrenome = $_POST['last_name'];
  $dtnasc = $_POST['birth_date'];
  $email = $_POST['email'];
  $cargo = $_POST['cargo'];
  $cpf = $_POST['cpf'];

  $sql = "SELECT * FROM users WHERE emailUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../minha-acc.php?error=sqlerror"); //Retornará à pag anterior
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      header("Location: ../minha-acc.php?error=emailinvalido"); //Retornará à pag anterior
      exit();
    }
  }

  if (empty($nome)){
    $nome = $_SESSION['userUid'];
  }

  if (empty($sobrenome)){
    $sobrenome = $_SESSION['userLastUid'];
  }

  if (empty($dtnasc)){
    $dtnasc = $_SESSION['userBirth'];
  }

  if (empty($email)){
    $email = $_SESSION['userMail'];
  }

  if (empty($cargo)){
    $cargo = $_SESSION['userCargo'];
  }

  if (empty($cpf)){
    $cpf = $_SESSION['usercpf'];
  }
  ///////////////
  $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../minha-acc.php?error=sqlerror");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $sobrenome, $dtnasc, $email, $cargo, $cpf, $_SESSION['userId']);
    mysqli_stmt_execute($stmt); // Executa o statement
  }
  ///////////////
  $_SESSION['userUid'] = $nome;
  $_SESSION['userLastUid'] = $sobrenome;
  $_SESSION['userBirth'] = $dtnasc;
  $_SESSION['userMail'] = $email;
  $_SESSION['userCargo'] = $cargo;
  $_SESSION['usercpf'] = $cpf;

  header("Location: ../minha-acc.php?dados=success"); //
  exit();
}else{
  header("Location: ../minha-acc.php?error=wrongaccess");
  exit();
}
?>
