<?php
if (isset($_POST['pass-change'])) {
  //Verifica se alguem chegou nessa página sem que tenha sido pelo submit do botão do da  minha acc senha
  //Se chegou por aqui pelo botão, tudo bem, executará o código abaixo
  //Detalhe que as funções exit garante que se houver um erro terminará a execução no momento
  //Evitando que haja a conexão e execução de forma ilegal ou erronea.

  session_start();
  require 'dbh.inc.php';
  $senhaatual = $_POST['now-pass'];
  $senhanova1 = $_POST['password'];
  $senhanova2 = $_POST['passwordConfirm'];
  //$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

  if (empty($senhaatual) || empty($senhanova1) || empty($senhanova2)){
    header("Location: ../minha-acc-senha.php?error=emptyfields");
    exit();
  }// FIM if (empty($mailuid) || empty($password)){
  else {
    if ($senhanova1 != $senhanova2){
      header("Location: ../minha-acc-senha.php?error=newpwddiff");
      exit();
    }else{
      $sql ="SELECT * FROM users WHERE idUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql) ){
        header("Location: ../minha-acc-senha.php?error=sqlerror");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "i", $_SESSION['userId']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)){
          if (password_verify($senhaatual, $row['pwdUsers'])){
            //if TRUE
            $hashedPwd = password_hash($senhanova1, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET pwdUsers=? WHERE idUsers=?";
            $stmt = mysqli_stmt_init($conn); //Aqui faz a conexão com o banco
            if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
              header("Location: ../minha-acc-senha.php?error=sqlerror"); //Retornará à pag anterior
              exit();
            }
            else { //Se a conexão for bem sucedida, fará a inclusão do numgrouprop
              mysqli_stmt_bind_param($stmt, "si", $hashedPwd, $_SESSION['userId']);
              mysqli_stmt_execute($stmt); // Executa o statement
            }
            header("Location: ../minha-acc.php?pwd=success"); //
            exit();
          }else{
            header("Location: ../login.php?error=wrongpwd"); //Retornará à pag anterior
            exit();
          }
        }
      }
    }
  }
}else{
  header("Location: ../index.php?error=wrongaccess");
  exit();
}
?>
