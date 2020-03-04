<?php

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if (isset($_POST['pass-change-abc'])) {
  //Verifica se alguem chegou nessa página sem que tenha sido pelo submit do botão do login
  //Se chegou por aqui pelo botão, tudo bem, executará o código abaixo
  //Detalhe que as funções exit garante que se houver um erro terminará a execução no momento
  //Evitando que haja a conexão e execução de forma ilegal ou erronea.

  require 'dbh.inc.php';
  $mailuid   = $_POST['email'];
  $dtnasc    = $_POST['dtnasc'];
  $cpf       = $_POST['cpf'];
  $password  = $_POST['password'];
  $passwordConfirm = $_POST['passwordConfirm'];
  //$password2 = $_POST['loginpwd'];
  //$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

  if ($password!=$passwordConfirm){
    header("Location: ../pub-esquecisenha.php?error=difpass");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE emailUsers=? AND birthUsers=? AND cpfUser=?"; //Verifica se o email confere
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
      header("Location: ../pub-esquecisenha.php?error=sqlerror1"); //Retornará à pag anterior
      exit();
    }
    else { //Se o email conferir e não tiver erro de sql, a senha será conferida
      mysqli_stmt_bind_param($stmt, "sss", $mailuid, $dtnasc, $cpf);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        if ($row['activeUsers']!=1){
          //Verifica se a conta está ativa, se for diferente de 1, significa que não está ativa
          header("Location: ../pub-esquecisenha.php?error=accnotfound");
          exit();
        }else{
          $idacc = $row['idUsers'];
          $active = 0;
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          $motive = "Bloqueio automático pelo sistema trocar a senha pelo página pública (Esqueci a minha senha).";
          $who = $idacc;
          try{
              $DT = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo') );
          }catch( Exception $e )
          {
              exit();
          }
          $dateDeactivate = $DT->format('Y-m-d H:i:s');
          $sql = "UPDATE users SET pwdUsers=?, activeUsers=?, motiveDeactivate=?, dateDeactivate=?, whoDeactivate=? WHERE emailUsers=? AND birthUsers=? AND cpfUser=? AND idUsers=?";
          $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
          if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
            header("Location: ../pub-esquecisenha.php?error=sqlerror"); //Retornará à pag anterior
            exit();
          }else { //Se a conexão for bem sucedida, fará a atualização da senha
            mysqli_stmt_bind_param($stmt, "sississsi", $hashedPwd, $active, $motive, $dateDeactivate, $who, $mailuid, $dtnasc, $cpf, $idacc);
            mysqli_stmt_execute($stmt); // Executa o statement

            header("Location: ../pub-esquecisenha.php?newpassword=success"); //
            exit();
          }

        }//Fim do else verificação de conta ativa
      }else {
        header("Location: ../pub-esquecisenha.php?error=accnotfound"); //Retornará à pag anterior
        exit();
      }
    }
  }

}
else{//Se chegou nessa pág de forma ilegal ou erronea (que não tenha sido pelo button)
  //Será expulso dessa pág retornando à pág que deveria ter vindo.
  header("Location: ../pub-esquecisenha.php");
  exit();
}

echo "FIM";
?>
