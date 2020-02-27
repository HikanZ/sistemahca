<?php
  var_dump($_POST);
  echo "<br>";
  $id = $_POST['idaudit1'];
  echo $id;
  //$linkaccview = "window.location.href='visualizar-acc.php?search=success&fieldmail=".$rowUser['emailUsers']."'";
  header("Location: ../relatorio-audit-id.php?id=".$id); //Retornará à pag anterior
?>
