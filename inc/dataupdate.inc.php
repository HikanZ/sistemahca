<?php
  session_start();
  if (!empty($_SESSION['liberaoubloqueia'])){
    unset($_SESSION['liberaoubloqueia']);
  }
//dataupdate.inc.php
$emailrequest = $_SESSION['emailchange'];
if (isset($_POST['alterar-cadastro'])) {
  require 'dbh.inc.php';
  var_dump($_POST);
  if (isset($_POST['idusuarioacc'])) $idacc = $_POST['idusuarioacc'];
  if (isset($_POST['nome'])) $nome = $_POST['nome'];
  if (isset($_POST['sobrenome'])) $sobrenome = $_POST['sobrenome'];
  if (isset($_POST['dtnasc'])) $dtnasc = $_POST['dtnasc'];
  if (isset($_POST['email'])) $email = $_POST['email'];
  if (isset($_POST['cargo'])) $cargo = $_POST['cargo'];
  if (isset($_POST['cpf'])) $cpf = $_POST['cpf'];
  if (isset($_POST['tipousuario'])) $tipousuario = $_POST['tipousuario'];


  $sql = "SELECT * FROM users WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../usuarios-pesquisa.php?error=sqlerror"); //Retornará à pag anterior
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "i", $idacc);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if ( $row['emailUsers'] == $email){ // Aqui faz a verificação se o email digitado é o mesmo do já cadastrado desse usuário
      /////////////// Se for o mesmo, fará a atualização dos dados
      $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, roleUsers=?, cpfUser=?, adminSystem=? WHERE idUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../minha-acc.php?error=sqlerror");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "sssssii", $nome, $sobrenome, $dtnasc, $cargo, $cpf, $tipousuario, $idacc);
        mysqli_stmt_execute($stmt); // Executa o statement
        header("Location: ../visualizar-acc.php?search=success&fieldmail=".$idacc.""); //Retornará à pag anterior
        exit();
      }
      ///////////////
    }else{ // Se não for o mesmo, procurará se o email não está cadastrado
      $sql = "SELECT * FROM users WHERE emailUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
        header("Location: ../usuarios-pesquisa.php?error=sqlerror"); //Retornará à pag anterior
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "s", $emailrequest);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          header("Location: ../usuarios-pesquisa.php?error=emailinvalido"); //Retornará à pag anterior
          exit();
        }else{
          /////////////// Se não encontrar nenhum email cadastrado, fará a atualização
          $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, emailUsers=?, roleUsers=?, cpfUser=?, adminSystem=? WHERE idUsers=?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../minha-acc.php?error=sqlerror");
            exit();
          }else{
            mysqli_stmt_bind_param($stmt, "ssssssii", $nome, $sobrenome, $dtnasc, $email, $cargo, $cpf, $tipousuario, $idacc);
            mysqli_stmt_execute($stmt); // Executa o statement
            header("Location: ../visualizar-acc.php?search=success&fieldmail=$idacc"); //Retornará à pag anterior
            exit();
          }
          ///////////////
        }
      }
    }
  }









  //header("Location: ../visualizar-acc.php?search=success&fieldmail=$emailrequest"); //Retornará à pag anterior
  //exit();
}else{
  header("Location: ../visualizar-acc.php?search=success&fieldmail=$emailrequest"); //Retornará à pag anterior
  exit();
}
?>
