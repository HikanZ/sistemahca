<?php
//ropversion.inc.php
session_start();
require "links.php";
if (empty($_SESSION['userId'])) {
  header("Location: ../login.php");
  exit();
}

if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
}else{
  header("Location: ../login.php");
  exit();
}
if (isset($_POST['cadastrar-setor'])) {}else{
  header("Location: ../setor-cadastro.php?error=wrongaccess3");
  exit();
}

require 'dbh.inc.php';
$uidSetor = $_POST['nome_setor'];
$stateSetor = "1";

//Verifica se já tem um setor repetido
$sql = "SELECT * FROM setor WHERE uidSetor=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
  header("Location: ../setor-cadastro.php?error=sqlerror1");
  exit();
}else{
  mysqli_stmt_bind_param($stmt, "s", $uidSetor);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  if ($row['uidSetor']==$uidSetor){

    If ($row['stateSetor'] == 0){
      $sql = "UPDATE setor SET stateSetor=? WHERE idSetor=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../setor-cadastro.php?error=sqlerror1");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "ii", $stateSetor, $row['idSetor']);
        mysqli_stmt_execute($stmt);
        header("Location: ../setor-cadastro.php?success=setoractave");
        exit();
      }
    }else{
      header("Location: ../setor-cadastro.php?error=repeatsetor");
      exit();
    }
  }else{
    $sql = "INSERT INTO setor (uidSetor, stateSetor) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../setor-cadastro.php?error=sqlerror1");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "si", $uidSetor, $stateSetor);
      mysqli_stmt_execute($stmt);
      header("Location: ../setor-cadastro.php?success=setornew");
      exit();
    }
  }
}
?>
