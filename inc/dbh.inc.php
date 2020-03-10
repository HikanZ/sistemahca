<?php

/* Go to Dashboard Heroku to the Settings tab
In the Config Vars click on the button Reveal Config Vars
and you will get this:
mysql://b6410e88315b1f:62903730@us-cdbr-iron-east-04.cleardb.net/heroku_7a83877cb41c4ba?reconnect=true

where
b6410e88315b1f -> This is USER = $dBUsername
: -> Separator
62903730 -> This is PASSWORD = $dBPassword
@ -> Separator
us-cdbr-iron-east-04.cleardb.net -> This is SERVERNAME = $servername
/ -> Separator
heroku_7a83877cb41c4ba -> This is dBName = $dBName
?reconnect=true -> Nothing
*/

$servername = "us-cdbr-iron-east-04.cleardb.net";
$dBUsername = "b6410e88315b1f";
$dBPassword = "62903730";
$dBName = "heroku_7a83877cb41c4ba";
/* Schema: heroku_b18e7cb99c18ea3
*/

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
mysqli_set_charset($conn,"utf8");

if (!$conn){
  echo "<br><br>";
  die("Conexão com o banco de dados falhou. Código do erro: ". mysqli_connect_error());
}

?>
