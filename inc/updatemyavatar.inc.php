<?php
if (isset($_POST['trocar-img'])) {
  session_start();
  require 'dbh.inc.php';
  $newlink = $_POST['link_avat'];

  ///////////////
  $sql = "UPDATE users SET avatarLinkUser=? WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../minha-acc.php?error=sqlerror");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "si", $newlink, $_SESSION['userId']);
    mysqli_stmt_execute($stmt); // Executa o statement
  }
  ///////////////
  $_SESSION['userAvatar'] = $newlink;
  header("Location: ../minha-acc.php?avatar=success"); //
  exit();
}else{
  header("Location: ../minha-acc.php?error=wrongaccess");
  exit();
}
?>
