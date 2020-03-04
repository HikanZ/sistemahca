<?php
if (isset($_POST['confirmar-rop-access'])) {
    require 'dbh.inc.php';
}else{
  header("Location: ../rop-remove.php?error=wrongaccess2");
  exit();
}
var_dump($_POST);
if ($_POST['box_de_confirmacao']=="Confirma"){
  $version = $_POST['version'];
  $active = $_POST['active'];
  if ($active) {
    $active = 0;
  }else{
    $active = 1;
  }
  echo $active;
  $sql = "UPDATE ropgroup SET versionActive=? WHERE versionGroup=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../rop-remove.php?error=sqlerrorla");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "ii", $active, $version);
    mysqli_stmt_execute($stmt); // Executa o statement
    if ($active) {
      header("Location: ../rop-remove.php?success=versionactive");
    }else{
      header("Location: ../rop-remove.php?success=versionblock");
    }

    exit();
  }


}else{
  header("Location: ../rop-remove.php?error=notconfirmed");
  exit();
}
?>
