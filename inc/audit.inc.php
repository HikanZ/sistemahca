<?php
session_start();
if (empty($_SESSION['userId'])) {
  header("Location: login.php");
  exit();
}
if (isset($_POST['auditar'])) {
}else{
  header("Location: ../index.php?error=wrongaccessaudit");
  exit();
}
if (empty($_POST['setor'])){
  header("Location: ../audit.php?emptySetor");
  exit();
}
try{
    $DT = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo') );
}catch( Exception $e )
{
    exit();
}
//var_dump($_POST);

$idUsers = $_SESSION['userId'];
$uidUsers = $_POST['uidfullUser'];
$idSetor = $_POST['setor'];
$version = $_POST['version'];
$startAudit = $_POST['startAudit'];
$endAudit = $DT->format('Y-m-d H:i:s');
$commentAudit = $_POST['comment'];

require 'dbh.inc.php';

// Trecho para consultar o nome do setor
$sql = "SELECT uidSetor FROM setor WHERE idSetor = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: ../audit.php?error=sqlerror1"); //Retornará à pag anterior
  exit();
}else{
  mysqli_stmt_bind_param($stmt, "i", $idSetor);
  mysqli_stmt_execute($stmt); // Executa o statement
  $resultuidSetor = mysqli_stmt_get_result($stmt);
  $rowuidSetor = mysqli_fetch_assoc($resultuidSetor);
  $uidSetor = $rowuidSetor['uidSetor'];
}
// Depois de conseguir inserir, será feita a inserção da auditoria
// Trecho para inserção da auditoria
$sql = "INSERT INTO audit (idUsers, uidfullUsers, idSetor, uidSetor, versionRop, commentAudit, startAudit, endAudit, yearAudit, monthAudit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: ../audit.php?error=sqlerror2"); //Retornará à pag anterior
  exit();
}else { //Se a conexão for bem sucedida, fará a inclusão do numgrouprop
  $yearAudit = date("Y");
  $monthAudit = date("m");
  mysqli_stmt_bind_param($stmt, "isisisssss", $idUsers, $uidUsers, $idSetor, $uidSetor, $version, $commentAudit, $startAudit, $endAudit, $yearAudit, $monthAudit);
  mysqli_stmt_execute($stmt); // Executa o statement
}
// Feito a inserção, devemos consultar o id da auditoria para adicioná-lo nas respostas
// Trecho para consulta do id da auditoria
$sql = "SELECT idAudit FROM audit WHERE idUsers=? AND uidfullUsers=? AND idSetor=? AND versionRop=? AND startAudit=? AND endAudit=?;";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: ../audit.php?error=sqlerror3"); //Retornará à pag anterior
  exit();
}
else { //Se a conexão for bem sucedida, fará a inclusão do numgrouprop
  mysqli_stmt_bind_param($stmt, "isiiss", $idUsers, $uidUsers, $idSetor, $version, $startAudit, $endAudit);
  mysqli_stmt_execute($stmt); // Executa o statement
  $resultRop = mysqli_stmt_get_result($stmt);
}
$rowAudit = mysqli_fetch_assoc($resultRop);
$idAudit = $rowAudit['idAudit'];
///// Carrega os grupos dessa versão

$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: ../audit.php?error=sqlerror4"); //Retornará à pag anterior
  exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
  mysqli_stmt_bind_param($stmt, "i", $version);
  mysqli_stmt_execute($stmt);
  $resultGroup = mysqli_stmt_get_result($stmt);
}
// Inicialização para inserção das respostas
while($rowGroup = mysqli_fetch_assoc($resultGroup)){
  //var_dump($rowGroup); echo " 1<br>";
  ///// Carrega os ROPs dessa versão
  $sql = "SELECT * FROM rop WHERE versionRop=? AND idGroup=?";
  $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../audit.php?error=sqlerror5"); //Retornará à pag anterior
    exit();
  }else{ //Se a conexão for bem sucedida, fará a verificação
    mysqli_stmt_bind_param($stmt, "ii", $version, $rowGroup['idGroup']);
    mysqli_stmt_execute($stmt);
    $resultRop = mysqli_stmt_get_result($stmt);
    while($rowRop = mysqli_fetch_assoc($resultRop)){
      $arr_lenght = count($_POST["rop".$rowGroup['numGroup'].$rowRop['numRop']]);
      $k2 = 0;
      for ($k = 0; $k < $arr_lenght; $k++){
        //while(empty($_POST["rop".$i.$j][$k2])){$k2++;}
        $sql = "INSERT INTO answer (idAudit, idRop, idGroup, numGroup, numRop, classRop, resultAnswer, infoAnswer, versionAudit, yearAudit, monthAudit)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
        if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
          header("Location: ../audit.php?error=sqlerror6"); //Retornará à pag anterior
          exit();
        }else{//Se a conexão for bem sucedida, fará a inclusão da rop
          mysqli_stmt_bind_param($stmt, "iiiiiississ", $idAudit, $rowRop['idRop'], $rowGroup['idGroup'],
          $rowGroup['numGroup'], $rowRop['numRop'], $rowRop['classRop'], $_POST["rop".$rowGroup['numGroup'].$rowRop['numRop']][$k],
          $_POST["info".$rowGroup['numGroup'].$rowRop['numRop']][$k], $version, $yearAudit, $monthAudit);
          mysqli_stmt_execute($stmt); // Executa o statement
        }// else do SQL insert
        //$k2++;
      }// Fim do for
    }// Fim while $rowRop
  }// else do SQL select
}// Fim while $rowGroup

header("Location: ../audit.php?success");
exit();
?>
