<meta charset="utf-8">
<?php
$host = "localhost";
$user = "u442353995_ams";
$pass = "Uninove2024**";
$banco = "u442353995_localhost";
$conexao = new mysqli($host,$user,$pass,$banco);

if (mysqli_connect_errno()) {
    die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
    exit();
}
?>