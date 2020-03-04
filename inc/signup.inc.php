<?php
session_start();
if (isset($_POST['signup-submit'])) {
  //Verifica se alguem chegou nessa página sem que tenha sido pelo submit do botão do Signup
  //Se chegou por aqui pelo botão, tudo bem, executará o código abaixo
  //Detalhe que as funções exit garante que se houver um erro terminará a execução no momento
  //Evitando que haja a conexão e execução de forma ilegal ou erronea.

  require 'dbh.inc.php';
  $username = $_POST['uid'];
  $userlast = $_POST['uidlast'];
  $birth = $_POST['birthdayuid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  $func = $_POST['functionuid'];
  $admincheck = $_POST['checkadmin'];
  $cpfUser = $_POST['cpfUser'];
  $avatarlink = "img/avatarreset.png";
  $activeUsers = 1;
  var_dump($_POST);

  // Verifica algum dos quatro campos estão vazios
  if (empty($username) || empty($userlast) || empty($email) || empty($password) || empty($passwordRepeat || empty($admincheck)) ){
    //Se algum estiver vazio retorna à pag anterior enviando o que foi digitado menos a senha
    header("Location: ../usuarios-cadastro.php?error=emptyfields&uid=".$username."&uidlast=".$userlast."&birthdayuid=".$birth."&email=".$email."&functionuid=".$func);
    exit();
  // Se tudo estiver preenchido, validará se o email digitado é um email válido
  }//FIM if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ){
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //Se não for válido retorna à pag anterior enviando o nome
      header("Location: ../usuarios-cadastro.php?error=invalidmail&uid=".$username);
      exit();
    // Se o email for válido, verificará se as senhas digitadas são iguais
  }// FIM if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  else if ($password !== $passwordRepeat) {
    //Se não forem iguais, retornará à pag enviando o que foi preenchido sem a senha
    header("Location: ../usuarios-cadastro.php?error=passwordcheck&uid=".$username."&email=".$email);
    exit();
    // Se nenhum campo for vazio, o email for válido e as senhas forem iguais
    // Irá verificar se o email não foi utilizado ainda
  }//FIM if ($password !== $passwordRepeat) {
  else {
    $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
    // Esse ? é uma questão de segurança para ngm injetar código SQL dentro do nosso banco
    // evitando que o mesmo seja corrompido ou destruído
    $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
    if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
      header("Location: ../usuarios-cadastro.php?error=sqlerror"); //Retornará à pag anterior
      exit();
    }
    else{ //Se a conexão for bem sucedida, fará a verificação
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      // A variável $resultCheck armazena a qtde de linha que retornou da consulta
      $resultCheck = mysqli_stmt_num_rows($stmt);
      // Se houver mais do que 0 resultados (ou seja 1 ou mais)
      // Significa que o email já foi utilizado, retornando à pag anterior
      if ($resultCheck > 0) {
        header("Location: ../usuarios-cadastro.php?error=emailtaken&uid=".$username);
        exit();
      }
      else{//Se depois de todas as verificações e chegou aqui, significa que está tudo ok
        $sql = "INSERT INTO users (uidUsers, uidLastUsers, emailUsers, pwdUsers, roleUsers, birthUsers, adminSystem, cpfUser, createBy, createDate, avatarLinkUser, activeUsers) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, DATE(NOW()), ?, ? )";
        $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
        if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
          header("Location: ../usuarios-cadastro.php?error=sqlerror"); //Retornará à pag anterior
          exit();
        }
        else { //Se a conexão for bem sucedida, fará a inclusão de usuário
          if ($_POST['checkadmin']=="on") $adminbin = 1;
          else {
            $adminbin = 0;
          }
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ssssssisssi", $username, $userlast, $email, $hashedPwd, $func, $birth, $adminbin, $cpfUser, $_SESSION['userUid'], $avatarlink, $activeUsers);
          mysqli_stmt_execute($stmt); // Executa o statement
          header("Location: ../usuarios-cadastro.php?signup=success"); //Retorna à pag anterior com sucesso
          exit();
        }
      }

    }


  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}else { //Se chegou nessa pág de forma ilegal ou erronea (que não tenha sido pelo button)
  //Será expulso dessa pág retornando à pág que deveria ter vindo.
  header("Location: ../usuarios-cadastro.php");
  exit();
}
?>
