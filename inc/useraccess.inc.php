<?php
  if (isset($_POST['liberar-bloquear-acesso'])) {} else{
    header("Location: ../usuarios-acesso.php?error=wrongaccesspost");
    exit();
  }
  require 'dbh.inc.php';
  var_dump($_POST);
  $idusuarioaction = $_POST['idusuarioacc'];

  $action = $_POST['action']; // if ==0 está bloqueado e é preciso liberar, senão está bloqueado e é preciso bloquear
  if ($action){
    // Se $action == 1, está liberado e a ação é bloquear.
    $motiveDeactivate = $_POST['motiveDeactivate'];
    $whoDeactivate = $_POST['whoDeactivate'];
    try{
        $DT = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo') );
    }catch( Exception $e )
    {
        exit();
    }
    $dateDeactivate = $DT->format('Y-m-d H:i:s');
    $active = 0;
  }else{
    //Senão, $action será igual a 0, e está bloqueado e será preciso liberar
    $motiveDeactivate = "";
    $whoDeactivate = "";
    $dateDeactivate = "";
    $active = 1;
  }




  $sql = "UPDATE users SET activeUsers=?, motiveDeactivate=?, dateDeactivate=?, whoDeactivate=? WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../usuarios-acesso.php?error=sqlerror");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "isssi",$active, $motiveDeactivate, $dateDeactivate, $whoDeactivate, $idusuarioaction );
    mysqli_stmt_execute($stmt); // Executa o statement
  }
  if ($action){
    header("Location: ../usuarios-acesso.php?success=accessblocked");
    exit();
  }else{
    header("Location: ../usuarios-acesso.php?success=accessgranted");
    exit();
  }
?>
