<?php
if (isset($_POST['usuario-alterar'])) {
  //Verifica se alguem chegou nessa página sem que tenha sido pelo submit do botão do da  minha acc senha
  //Se chegou por aqui pelo botão, tudo bem, executará o código abaixo
  //Detalhe que as funções exit garante que se houver um erro terminará a execução no momento
  //Evitando que haja a conexão e execução de forma ilegal ou erronea.

  session_start();
  require 'dbh.inc.php';
  $nome = $_POST['first_name'];
  $sobrenome = $_POST['last_name'];
  $dtnasc = $_POST['birth_date'];
  $email = $_POST['email'];
  $cargo = $_POST['cargo'];
  $cpf = $_POST['cpf'];

  $sql = "SELECT * FROM users WHERE emailUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../minha-acc.php?error=sqlerror"); //Retornará à pag anterior
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      header("Location: ../minha-acc.php?error=emailinvalido"); //Retornará à pag anterior
      exit();
    }
  }

  if (!empty($nome) && $nome != $_SESSION['userUid']){
    if (!empty($sobrenome) && $sobrenome != $_SESSION['userLastUid']){
      if (!empty($dtnasc) && $dtnasc != $_SESSION['userBirth']){
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome dtnasc email cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $sobrenome, $dtnasc, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome dtnasc email cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, emailUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssssi", $nome, $sobrenome, $dtnasc, $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome dtnasc email cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssssi", $nome, $sobrenome, $dtnasc, $email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome dtnasc email
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $sobrenome, $dtnasc, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome dtnasc cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssssi", $nome, $sobrenome, $dtnasc, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome dtnasc cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $sobrenome, $dtnasc, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome dtnasc cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $sobrenome, $dtnasc, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome dtnasc
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $sobrenome, $dtnasc, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      }else{ // else dtnasc
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome email cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssssi", $nome, $sobrenome, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome email cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, emailUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $sobrenome, $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome email cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $sobrenome, $email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome email
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $sobrenome, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $sobrenome, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, birthUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $sobrenome, $dtnasc, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome sobrenome cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, uidLastUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $sobrenome, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome sobrenome
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      } // fim else dtnasc
    }else{ // else sobrenome
      if (!empty($dtnasc) && $dtnasc != $_SESSION['userBirth']){
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome dtnasc email cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssssi", $nome, $dtnasc, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome dtnasc email cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, emailUsers=?, roleUsers=?  WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $dtnasc, $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome dtnasc email cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome,$dtnasc, $email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome dtnasc email
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $dtnasc, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome dtnasc cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $sobrenome, $dtnasc, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome dtnasc cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $dtnasc, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome dtnasc cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $dtnasc, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome dtnasc
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $nome, $dtnasc, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      }else{ // else dtnasc
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome email cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome email cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, emailUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome email cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome email
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $nome, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $nome, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $nome, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome
              ///////////////
              $sql = "UPDATE users SET uidUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "si", $nome, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      } // fim else dtnasc
    } // fim else sobrenome
  }else{ // else nome
    if (!empty($sobrenome) && $sobrenome != $_SESSION['userLastUid']){
      if (!empty($dtnasc) && $dtnasc != $_SESSION['userBirth']){
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome dtnasc email cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssssi", $sobrenome, $dtnasc, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome dtnasc email cargo
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=?, emailUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $sobrenome, $dtnasc, $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome dtnasc email cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=?, emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $sobrenome, $dtnasc, $email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome dtnasc email
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=?, emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $sobrenome, $dtnasc, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome dtnasc cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $sobrenome, $dtnasc, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome dtnasc cargo
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $sobrenome, $dtnasc, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome dtnasc cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $sobrenome, $dtnasc, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome dtnasc
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, birthUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $sobrenome, $dtnasc, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      }else{ // else dtnasc
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome email cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $sobrenome, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome email cargo
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, emailUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $sobrenome, $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome email cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $sobrenome, $email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome email
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $sobrenome, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome cargo cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $sobrenome, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome cargo
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $sobrenome, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // sobrenome cpf
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $sobrenome, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // sobrenome
              ///////////////
              $sql = "UPDATE users SET uidLastUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "si", $sobrenome, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      } // fim else dtnasc
    }else{ // else sobrenome
      if (!empty($dtnasc) && $dtnasc != $_SESSION['userBirth']){
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // dtnasc email cargo cpf
              ///////////////
              $sql = "UPDATE users SET birthUsers=?, emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $dtnasc, $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // dtnasc email cargo
              ///////////////
              $sql = "UPDATE users SET birthUsers=?, emailUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $dtnasc, $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // nome dtnasc email cpf
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssssi", $nome, $dtnasc, $email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // dtnasc email
              ///////////////
              $sql = "UPDATE users SET birthUsers=?, emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $dtnasc, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // dtnasc cargo cpf
              ///////////////
              $sql = "UPDATE users SET birthUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $dtnasc, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nome dtnasc cargo
              ///////////////
              $sql = "UPDATE users SET uidUsers=?, birthUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $nome, $dtnasc, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // dtnasc cpf
              ///////////////
              $sql = "UPDATE users SET birthUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $dtnasc, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // dtnasc
              ///////////////
              $sql = "UPDATE users SET birthUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "si", $dtnasc, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      }else{ // else dtnasc
        if (!empty($email) && $email != $_SESSION['userMail']){
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // email cargo cpf
              ///////////////
              $sql = "UPDATE users SET emailUsers=?, roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "sssi", $email, $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // email cargo
              ///////////////
              $sql = "UPDATE users SET emailUsers=?, roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $email, $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // email cpf
              ///////////////
              $sql = "UPDATE users SET emailUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi",$email, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // email
              ///////////////
              $sql = "UPDATE users SET emailUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "si", $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          } // fim else cargo
        }else{ //else email
          if (!empty($cargo) && $cargo != $_SESSION['userCargo']){
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // cargo cpf
              ///////////////
              $sql = "UPDATE users SET roleUsers=?, cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "ssi", $cargo, $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // cargo
              ///////////////
              $sql = "UPDATE users SET roleUsers=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "si", $cargo, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            } // fim else cpf
          }else{ // else cargo
            if (!empty($cpf) && $cpf != $_SESSION['usercpf']){
              // cpf
              ///////////////
              $sql = "UPDATE users SET cpfUser=? WHERE idUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../minha-acc.php?error=sqlerror");
                exit();
              }else{
                mysqli_stmt_bind_param($stmt, "si", $cpf, $_SESSION['userId']);
                mysqli_stmt_execute($stmt); // Executa o statement
              }
              ///////////////
            }else{ // else cpf
              // nothing
              header("Location: ../minha-acc.php?error=samecontent");
              exit();
            } // fim else cpf
          } // fim else cargo
        } // fim else email
      } // fim else dtnasc
    } // fim else sobrenome
  } // fim else nome

  $sql = "SELECT * FROM users WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) { //Se houver algum erro de sql
    header("Location: ../minha-acc.php?error=sqlerror"); //Retornará à pag anterior
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['userId']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['userUid'] = $row['uidUsers'];
      $_SESSION['userLastUid'] = $row['uidLastUsers'];
      $_SESSION['userBirth'] = $row['birthUsers'];
      $_SESSION['userMail'] = $row['emailUsers'];
      $_SESSION['userCargo'] = $row['roleUsers'];
      $_SESSION['usercpf'] = $row['cpfUser'];

      header("Location: ../minha-acc.php?dados=success"); //
      exit();
    }else{
      header("Location: ../minha-acc.php?error=sqlerror"); //Retornará à pag anterior
      exit();
    }
  }
}else{
  header("Location: ../index.php?error=wrongaccess");
  exit();
}
?>
