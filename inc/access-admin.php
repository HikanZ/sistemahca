<?php

unset($_SESSION['emailchange']);
unset($_SESSION['cpfchange']);

if (empty($_SESSION['userId'])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['admincheck']==1 || $_SESSION['admincheck']==7){
  }else{
    header("Location: login.php");
    exit();
  }
?>
