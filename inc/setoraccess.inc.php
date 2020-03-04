<?php
if (isset($_POST['confirmar-setor-access'])) {
    require 'dbh.inc.php';
}else{
  header("Location: ../setor-remove.php?error=wrongaccess2");
  exit();
}
var_dump($_POST);
if ($_POST['box_de_confirmacao']=="Confirma"){
  $idsetor = $_POST['idsetor'];
  $active = $_POST['active'];
  if ($active) {
    $active = 0;
  }else{
    $active = 1;
  }
  echo $active;
  $sql = "UPDATE setor SET stateSetor=? WHERE idSetor=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../setor-remove.php?error=sqlerrorla");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "ii", $active, $idsetor);
    mysqli_stmt_execute($stmt); // Executa o statement
    if ($active) {
      header("Location: ../setor-remove.php?success=setoractive");
    }else{
      header("Location: ../setor-remove.php?success=setorblock");
    }

    exit();
  }


}else{
  header("Location: ../setor-remove.php?error=notconfirmed");
  exit();
}
?>
