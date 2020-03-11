<?php
  session_start();
  if (isset($_POST['antiauditar'])) {} else{
    header("Location: ../relatorio.php?error=wrongaccesspost");
    exit();
  }

  if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
    $idauditoria = $_POST['idauditoriadel'];

    require 'dbh.inc.php';

    $sql = "DELETE FROM audit WHERE idAudit=?";
    $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
    if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
      header("Location: ../relatorio.php?error=sqlerror1"); //Retornará à pag anterior
      exit();
    }
    else{ //Se a conexão for bem sucedida, fará a verificação
      mysqli_stmt_bind_param($stmt, "i", $idauditoria);
      mysqli_stmt_execute($stmt);
    }
    header("Location: ../relatorio.php?success=audit".$idauditoria."deleted");
    exit();
  }else{
    header("Location: ../relatorio.php?error=nopermission");
    exit();
  }
?>
