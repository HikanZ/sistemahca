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
//var_dump($_POST);
if (isset($_POST['cadastrar-rop'])) {}else{
  header("Location: ../rop-ano.php?error=wrongaccess3");
  exit();
}

require 'dbh.inc.php';
$version = $_POST['ano_rop'];
$numgroup = $_POST['num_group'];
$active = "1";

for ($i= 1; $i <= $numgroup; $i++ ){
  $sql = "INSERT INTO ropgroup (numGroup, versionGroup, nameGroup, qtropGroup, versionActive) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    //echo "erro 2";
    header("Location: ../rop-ano.php?error=sqlerror3"); //Retornará à pag anterior
    exit();
  }else{ //Se a conexão for bem sucedida, fará a inclusão do numgrouprop
    mysqli_stmt_bind_param($stmt, "iisii", $i, $version, $_POST['nomegrupo'.$i], $_POST['numropgrupo'.$i], $active );
    mysqli_stmt_execute($stmt); // Executa o statement
  }
}
// Depois de passar por esse laço for, finaliza a inserção dos Grupos
$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
// evitando que o mesmo seja corrompido ou destruído
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: ../rop-ano.php?error=sqlerror4"); //Retornará à pag anterior
  exit();
}else{ //Se a conexão for bem sucedida, fará a consulta
  mysqli_stmt_bind_param($stmt, "i", $version);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while ($row = mysqli_fetch_assoc($result)){
    for ($i = 1; $i <= $row['qtropGroup']; $i++){
      $sql = "INSERT INTO rop (numRop, versionRop, idGroup, labelRop, classRop) VALUES ( ?, ?, ?, ?, ? )";
      $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../rop-ano.php?error=sqlerror5"); //Retornará à pag anterior
        exit();
      }else{//Se a conexão for bem sucedida, fará a inclusão da rop
        mysqli_stmt_bind_param($stmt, "iiisi", $i, $version, $row['idGroup'], $_POST['rop'.$row['numGroup'].'_'.$i], $_POST['radio'.$row['numGroup'].'_'.$i] );
        mysqli_stmt_execute($stmt); // Executa o statement
      }
    }
  }
}

//echo "erro4";
mysqli_stmt_close($stmt);
mysqli_close($conn);


header("Location: ../rop.php?success=newversion");
exit();
?>
