<?php
if (isset($_POST['signup-submit-pub'])) {
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
  $cpfUser = $_POST['cpfUser'];
  $avatarlink = "img/avatarreset.png";
  $activeUsers = 0;
  var_dump($_POST);

  // Verifica algum dos quatro campos estão vazios
  if (empty($username) || empty($userlast) || empty($email) || empty($password) || empty($passwordRepeat || empty($admincheck)) ){
    //Se algum estiver vazio retorna à pag anterior enviando o que foi digitado menos a senha
    header("Location: ../pub-cadastro.php?error=emptyfields&uid=".$username."&uidlast=".$userlast."&birthdayuid=".$birth."&email=".$email."&functionuid=".$func);
    exit();
  // Se tudo estiver preenchido, validará se o email digitado é um email válido
  }//FIM if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ){
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //Se não for válido retorna à pag anterior enviando o nome
      header("Location: ../pub-cadastro.php?error=invalidmail&uid=".$username);
      exit();
    // Se o email for válido, verificará se as senhas digitadas são iguais
  }// FIM if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  else if ($password !== $passwordRepeat) {
    //Se não forem iguais, retornará à pag enviando o que foi preenchido sem a senha
    header("Location: ../pub-cadastro.php?error=passwordcheck&uid=".$username."&email=".$email);
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
      header("Location: ../pub-cadastro.php?error=sqlerror1"); //Retornará à pag anterior
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
        header("Location: ../pub-cadastro.php?error=emailtaken&uid=".$username);
        exit();
      }
      else{//Se depois de todas as verificações e chegou aqui, significa que está tudo ok

        $sql = "INSERT INTO users (uidUsers, uidLastUsers, emailUsers, pwdUsers, roleUsers, birthUsers, adminSystem, cpfUser, createDate, avatarLinkUser, activeUsers) VALUES (?, ?, ?, ?, ?, ?, ?, ?, DATE(NOW()), ?, ? )";
        $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
        if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
          header("Location: ../pub-cadastro.php?error=sqlerror2"); //Retornará à pag anterior
          exit();
        }
        else { //Se a conexão for bem sucedida, fará a inclusão de usuário
          $adminbin = 0;
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ssssssissi", $username, $userlast, $email, $hashedPwd, $func, $birth, $adminbin, $cpfUser, $avatarlink, $activeUsers);
          mysqli_stmt_execute($stmt); // Executa o statement

          $sql = "SELECT idUsers FROM users WHERE emailUsers=?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pub-cadastro.php?error=sqlerror3");
            exit();
          }else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $idnovo = $row['idUsers'];
          }
          $motiveDeactivate = "Bloqueio automático pelo sistema. Conta criada pelo cadastro público na tela inicial (login).";
          try{
              $DT = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo') );
          }catch( Exception $e )
          {
              exit();
          }
          $dateDeactivate = $DT->format('Y-m-d H:i:s');
          $sql = "UPDATE users SET createBy=?, motiveDeactivate=?, dateDeactivate=?, whoDeactivate=?  WHERE idUsers=?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../minha-acc.php?error=sqlerror4");
            exit();
          }else{
            mysqli_stmt_bind_param($stmt, "issii", $idnovo, $motiveDeactivate, $dateDeactivate, $idnovo, $idnovo);
            mysqli_stmt_execute($stmt); // Executa o statement
          }

          header("Location: ../pub-cadastro.php?signup=success"); //Retorna à pag anterior com sucesso
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
