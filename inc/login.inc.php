<?php
if (isset($_POST['login2-submit'])) {
  //Verifica se alguem chegou nessa página sem que tenha sido pelo submit do botão do login
  //Se chegou por aqui pelo botão, tudo bem, executará o código abaixo
  //Detalhe que as funções exit garante que se houver um erro terminará a execução no momento
  //Evitando que haja a conexão e execução de forma ilegal ou erronea.

  require 'dbh.inc.php';
  $mailuid   = $_POST['loginmail'];
  $password2 = $_POST['loginpwd'];
  //$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

  if (empty($mailuid) || empty($password2)){
    var_dump($password2);
    echo $mailuid;
    echo $password2;
    if (!empty($mailuid) )
      header("Location: ../login.php?error=loginemptyfields&loginmail=".$mailuid);
    else
      header("Location: ../login.php?error=loginemptyfields");
    exit();
  }// FIM if (empty($mailuid) || empty($password)){
  else {
    $sql = "SELECT * FROM users WHERE emailUsers=?"; //Verifica se o email confere
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
      header("Location: ../login.php?error=sqlerror"); //Retornará à pag anterior
      exit();
    }
    else { //Se o email conferir e não tiver erro de sql, a senha será conferida
      mysqli_stmt_bind_param($stmt, "s", $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        if ($row['activeUsers']!=1){
          //Verifica se a conta está ativa, se for diferente de 1, significa que não está ativa
          header("Location: ../login.php");
        }else{
          $pwdCheck = password_verify($password2, $row['pwdUsers']);
          if ($pwdCheck == false) { //Se a senha não for igual ao email usado
            header("Location: ../login.php?error=wrongpwd"); //Retornará à pag anterior
            exit();
          }
          else if ($pwdCheck == true) {
            session_start();
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['userUid'] = $row['uidUsers'];
            $_SESSION['userLastUid'] = $row['uidLastUsers'];
            $_SESSION['admincheck'] = $row['adminSystem'];
            $_SESSION['lastLogin'] = $row['lastLogin'];
            $_SESSION['countLogin'] = ++$row['countLogin'];
            $_SESSION['userBirth'] = $row['birthUsers'];
            $_SESSION['userMail'] = $row['emailUsers'];
            $_SESSION['userCargo'] = $row['roleUsers'];
            $_SESSION['usercpf'] = $row['cpfUser'];
            $_SESSION['userAvatar'] = $row['avatarLinkUser'];
            //$_SESSION[''] =$row
            $sql = "UPDATE users SET countLogin=? , lastLogin=NOW() WHERE idUsers=?";
            $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
            if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
              header("Location: ../login.php?error=sqlerror"); //Retornará à pag anterior
              exit();
            }
            else { //Se a conexão for bem sucedida, fará a inclusão do numgrouprop
              mysqli_stmt_bind_param($stmt, "ii", $_SESSION['countLogin'], $_SESSION['userId']);
              mysqli_stmt_execute($stmt); // Executa o statement
            }
            header("Location: ../index.php?login=success"); //
            exit();
          }else {
            header("Location: ../login.php?error=nouser"); //Retornará à pag anterior
            exit();
          }
        }//Fim do else verificação de conta ativa
      }
      else {
        header("Location: ../login.php?error=nouser"); //Retornará à pag anterior
        exit();
      }
    }
  }

}
else{//Se chegou nessa pág de forma ilegal ou erronea (que não tenha sido pelo button)
  //Será expulso dessa pág retornando à pág que deveria ter vindo.
  header("Location: ../login.php");
  exit();

}
?>
