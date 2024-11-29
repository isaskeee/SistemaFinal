<?php
$servername = "localhost"; // ou end do servidor
$username = "root"; // substitui pelo seu usuário
$password = "Root123"; // substitua pela sua senha
$dbname = "sistema"; // substitua pelo nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>