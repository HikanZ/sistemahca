<?php
if (empty($_SESSION['userId'])) {
  header("Location: login.php");
  exit();
}
?>
