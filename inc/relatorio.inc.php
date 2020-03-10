<?php
///// Busca o setor ou verifica se são todos
if (isset($_POST['setor'])){
  if ($_POST['setor']=='ALL'){
    $uidSetor = "Todos os setores";
  }else{
    $idSetor = $_POST['setor'];
    $sql = "SELECT uidSetor FROM setor WHERE idSetor=?";
    $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
    if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
      header("Location: relatorio-anual.php?error=connectionerror3"); //Retornará à pag anterior
      exit();
    }
    else{ //Se a conexão for bem sucedida, fará a consulta
      mysqli_stmt_bind_param($stmt, "i", $idSetor);
      mysqli_stmt_execute($stmt);
      $resultSetor = mysqli_stmt_get_result($stmt);
      $rowSetor = mysqli_fetch_assoc($resultSetor);
      $uidSetor = $rowSetor['uidSetor'];
    }
  }
}else{
  $uidSetor = "Todos os setores";
}
//echo "<br>";
//echo $uidSetor;

///// Define o ano para o relatório
if (!isset($_POST['anoSelecionado'])){
  $anoSelecionado = date("Y");
}else{
  $anoSelecionado = $_POST['anoSelecionado'];
}
//echo "<br>";
//echo $anoSelecionado;

///// Busca a última versão
$sql = "SELECT versiongroup FROM ropgroup ORDER BY versiongroup DESC LIMIT 1;";
// Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
// evitando que o mesmo seja corrompido ou destruído
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: relatorio-anual.php?error=connectionerror4"); //Retornará à pag anterior
  exit();
}
else{ //Se a conexão for bem sucedida, fará a consulta
  mysqli_stmt_execute($stmt);
  $resultVersion = mysqli_stmt_get_result($stmt);
  $rowVersion = mysqli_fetch_assoc($resultVersion);
  $version = $rowVersion['versiongroup'];
}
//echo "<br>";
//echo $version;

///// Carrega os grupos dessa versão
$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
$stmtG = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmtG, $sql)) { //Se houver algum erro de sql
  header("Location: relatorio-anual.php?error=sqlerror5"); //Retornará à pag anterior
  exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
  mysqli_stmt_bind_param($stmtG, "i", $version);
  mysqli_stmt_execute($stmtG);
  $resultGroup = mysqli_stmt_get_result($stmtG);
/*	while($rowGroup = mysqli_fetch_assoc($resultGroup)){
    echo $rowGroup['nameGroup'];
  }*/
  $resultCountGroup = $resultGroup;
  $numGroup = 0;
  $numTotalRop = 0;
  while($rowCountGroup = mysqli_fetch_assoc($resultCountGroup)){
        $numGroup++;
        $numRopPerGroup[$numGroup] = $rowCountGroup['qtropGroup'];
        $numTotalRop = $numTotalRop + $rowCountGroup['qtropGroup'];
        $nameGroup[$numGroup] = $rowCountGroup['nameGroup'];
        //echo "<br> Grupo ".$numGroup.": ";
        //echo $numRopPerGroup[$numGroup];
  }
}
//echo "<br>";
//echo $numTotalRop;

///// Carrega os grupos dessa versão e realiza a contagem de ROPs
$sql = "SELECT * FROM rop WHERE versionRop=?";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: relatorio-anual.php?error=sqlerror6"); //Retornará à pag anterior
  exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
  mysqli_stmt_bind_param($stmt, "i", $version);
  mysqli_stmt_execute($stmt);
  $resultRop = mysqli_stmt_get_result($stmt);
/*	while($rowGroup = mysqli_fetch_assoc($resultGroup)){
    echo $rowGroup['nameGroup'];
  }*/
  $resultCountRop = $resultRop;
  $i = 0;
  $j = 1;
  $t = 0;
  $numMaiorGroup[$j] = 0;
  $numMenorGroup[$j] = 0;
  $totalMaior = 0;
  $totalMenor = 0;
  $numMaiorGroup[$j] = 0;
  $numMenorGroup[$j] = 0;
  $numAnswerMaior[$j]["C"]=0;
  $numAnswerMaior[$j]["NC"]=0;
  $numAnswerMaior[$j]["P"]=0;
  $numAnswerMaior[$j]["NA"]=0;
  $numAnswerMenor[$j]["C"]=0;
  $numAnswerMenor[$j]["NC"]=0;
  $numAnswerMenor[$j]["P"]=0;
  $numAnswerMenor[$j]["NA"]=0;
  while($rowCountRop = mysqli_fetch_assoc($resultCountRop)){
        $i++;
        $t++;
        if ($rowCountRop['classRop']=="1"){
          $numMaiorGroup[$j]++;
          $totalMaior++;
        }else{
          $numMenorGroup[$j]++;
          $totalMenor++;
        }
        if ($t == $numRopPerGroup[$j]) {
          $j++;
          $t=0;
          if ($j <= $numGroup){
            $numMaiorGroup[$j] = 0;
            $numMenorGroup[$j] = 0;
            $numAnswerMaior[$j]["C"]=0;
            $numAnswerMaior[$j]["NC"]=0;
            $numAnswerMaior[$j]["P"]=0;
            $numAnswerMaior[$j]["NA"]=0;
            $numAnswerMenor[$j]["C"]=0;
            $numAnswerMenor[$j]["NC"]=0;
            $numAnswerMenor[$j]["P"]=0;
            $numAnswerMenor[$j]["NA"]=0;
          }
        }

  }
}
//echo "<br>";
//var_dump($numMaiorGroup);
//echo "<br>";
//var_dump($numMenorGroup);

///// Início da apuração e contagem das respostas
if ($uidSetor == "Todos os setores"){
  $sql = "SELECT * FROM answer WHERE versionAudit=? AND yearAudit=?";
}else{
  $sql = "SELECT * FROM answer INNER JOIN audit ON answer.idAudit = audit.idAudit WHERE versionAudit=? AND answer.yearAudit=? AND idSetor=?";
}

$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: relatorio-anual.php?error=sqlerror7"); //Retornará à pag anterior
  exit();
}else{ //Se a conexão for bem sucedida, fará a verificação
  if ($uidSetor == "Todos os setores"){
    mysqli_stmt_bind_param($stmt, "is", $version, $anoSelecionado);
  }else{
    mysqli_stmt_bind_param($stmt, "isi", $version, $anoSelecionado, $idSetor);
  }

  mysqli_stmt_execute($stmt);
  $resultAnswer = mysqli_stmt_get_result($stmt);
  $resultCountAnswer = $resultAnswer;
  $numAnswerMaiorTotal["C"]=0;
  $numAnswerMaiorTotal["NC"]=0;
  $numAnswerMaiorTotal["P"]=0;
  $numAnswerMaiorTotal["NA"]=0;
  $numAnswerMenorTotal["C"]=0;
  $numAnswerMenorTotal["NC"]=0;
  $numAnswerMenorTotal["P"]=0;
  $numAnswerMenorTotal["NA"]=0;
  //echo "<br><br>";
  //var_dump($resultCountAnswer);
  //echo "<br><br>";
  $token = 1;
  while($rowCountRop = mysqli_fetch_assoc($resultCountAnswer)){
    if ($token){
        $token = 0;
        $numAnswerMaiorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["C"] = 0;
        $numAnswerMaiorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["NC"] = 0;
        $numAnswerMaiorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["P"] = 0;
        $numAnswerMaiorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["NA"] = 0;
        $numAnswerMenorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["C"] = 0;
        $numAnswerMenorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["NC"] = 0;
        $numAnswerMenorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["P"] = 0;
        $numAnswerMenorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ]["NA"] = 0;
        $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ]["C"] = 0;
        $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ]["NC"] = 0;
        $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ]["P"] = 0;
        $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ]["NA"] = 0;
        $numAnswerMenorMes[ $rowCountRop['monthAudit'] ]["C"] = 0;
        $numAnswerMenorMes[ $rowCountRop['monthAudit'] ]["NC"] = 0;
        $numAnswerMenorMes[ $rowCountRop['monthAudit'] ]["P"] = 0;
        $numAnswerMenorMes[ $rowCountRop['monthAudit'] ]["NA"] = 0;
    }

    // New feature
    if( !isset($rop[ $rowCountRop['numGroup'] ][ $rowCountRop['numRop'] ][ $rowCountRop['resultAnswer'] ]) ){
      $rop[ $rowCountRop['numGroup'] ][ $rowCountRop['numRop'] ][ $rowCountRop['resultAnswer'] ]=1;
    }else{
      $rop[ $rowCountRop['numGroup'] ][ $rowCountRop['numRop'] ][ $rowCountRop['resultAnswer'] ]++;
    }
    // End new feature


    if ($rowCountRop['classRop']){
      $numAnswerMaior[ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
      $numAnswerMaiorTotal[ $rowCountRop['resultAnswer'] ]++;
      if (!isset( $numAnswerMaiorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] )){
        $numAnswerMaiorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] = 1;
      }else{
        $numAnswerMaiorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
      }

      if (!isset( $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['resultAnswer'] ] )){
        $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['resultAnswer'] ] = 1;
      }else{
        $numAnswerMaiorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['resultAnswer'] ]++;
      }

    }else{
      $numAnswerMenor[ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
      $numAnswerMenorTotal[ $rowCountRop['resultAnswer'] ]++;
      if (!isset( $numAnswerMenorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] )){
        $numAnswerMenorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ] = 1;
      }else{
        $numAnswerMenorMesG[ $rowCountRop['monthAudit'] ][ $rowCountRop['numGroup'] ][ $rowCountRop['resultAnswer'] ]++;
      }

      if (!isset( $numAnswerMenorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['resultAnswer'] ] )){
        $numAnswerMenorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['resultAnswer'] ] = 1;
      }else{
        $numAnswerMenorMes[ $rowCountRop['monthAudit'] ][ $rowCountRop['resultAnswer'] ]++;
      }
    }



  }// Fim while fetch
}
//echo "<br>";
//var_dump($numAnswerMaior);
//echo "<br>";
//echo "<br>";
//var_dump($numAnswerMenor);
//var_dump($numAnswerMaiorTotal);
//echo "<br>";
//var_dump($numAnswerMenorTotal);

if ($uidSetor == "Todos os setores"){
  $sql = "SELECT * FROM audit WHERE versionRop=? AND yearAudit=?";
}else{
  $sql = "SELECT * FROM audit WHERE versionRop=? AND idSetor=? AND yearAudit=?";
}
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: relatorio-anual.php?error=sqlerror8"); //Retornará à pag anterior
  exit();
}else{ //Se a conexão for bem sucedida, fará a verificação
  if ($uidSetor == "Todos os setores"){
    mysqli_stmt_bind_param($stmt, "ii", $version, $anoSelecionado);
  }else{
    mysqli_stmt_bind_param($stmt, "iii", $version, $idSetor, $anoSelecionado);
  }
  mysqli_stmt_execute($stmt);
  $resultAudit = mysqli_stmt_get_result($stmt);
  $resultidAudit = $resultAudit;
}


///// Início da apuração e contagem das respostas
if ($uidSetor == "Todos os setores"){
  $sql = "SELECT answer.monthAudit FROM answer WHERE versionAudit=? AND yearAudit=? GROUP BY answer.monthAudit ORDER BY answer.monthAudit ASC";
}else{
  $sql = "SELECT answer.monthAudit FROM answer INNER JOIN audit ON answer.idAudit = audit.idAudit WHERE versionAudit=? AND answer.yearAudit=? AND idSetor=? GROUP BY answer.monthAudit ORDER BY answer.monthAudit ASC";
}

$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: relatorio-anual.php?error=sqlerror9"); //Retornará à pag anterior
  exit();
}else{ //Se a conexão for bem sucedida, fará a verificação
  if ($uidSetor == "Todos os setores"){
    mysqli_stmt_bind_param($stmt, "is", $version, $anoSelecionado);
  }else{
    mysqli_stmt_bind_param($stmt, "isi", $version, $anoSelecionado, $idSetor);
  }
  mysqli_stmt_execute($stmt);
  $resultMonth = mysqli_stmt_get_result($stmt);
}


///// Carrega os grupos
$sql = "SELECT * FROM ropgroup WHERE versionGroup=?";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: rop-remove.php?error=sqlerror2"); //Retornará à pag anterior
  exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
  mysqli_stmt_bind_param($stmt, "i", $version);
  mysqli_stmt_execute($stmt);
  $resultGrupo = mysqli_stmt_get_result($stmt);
  $nGrupo = 1;
  while($rowGroup = mysqli_fetch_assoc($resultGrupo)){
    $gruponome[$rowGroup['numGroup']]=$rowGroup['nameGroup'];
    $grupoqtrops[$rowGroup['numGroup']]=$rowGroup['qtropGroup'];
    $nGrupo++;
  }
}

///// Carrega os rops
$sql = "SELECT * FROM rop INNER JOIN ropgroup ON rop.idGroup = ropgroup.idGroup WHERE versionRop =?";
$stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
  header("Location: rop-remove.php?error=sqlerror2"); //Retornará à pag anterior
  exit();
}
else{ //Se a conexão for bem sucedida, fará a verificação
  mysqli_stmt_bind_param($stmt, "i", $version);
  mysqli_stmt_execute($stmt);
  $resulRop = mysqli_stmt_get_result($stmt);
  while($rowRop = mysqli_fetch_assoc($resulRop)){
    $ropnome[$rowRop['numGroup']][$rowRop['numRop']] = $rowRop['labelRop'];
    $class[$rowRop['numGroup']][$rowRop['numRop']] = $rowRop['classRop'];
    $resp[$rowRop['numGroup']][$rowRop['numRop']]['C'] = 0;
    $resp[$rowRop['numGroup']][$rowRop['numRop']]['NC'] = 0;
    $resp[$rowRop['numGroup']][$rowRop['numRop']]['P'] = 0;
    $resp[$rowRop['numGroup']][$rowRop['numRop']]['NA'] = 0;
    $respinfo[$rowRop['numGroup']][$rowRop['numRop']] = "";
  }
}
?>
