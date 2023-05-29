<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "lojaweb";

// Criar a conexão
$conn = mysqli_connect($host, $user, $password, $db);

// Verificar a conexão
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}
//echo "Conexão estabelecida com sucesso";
?>