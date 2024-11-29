<?php
$servername = "localhost"; // Altere conforme necessário
$username = "root"; // Altere conforme necessário
$password = "Root123"; // Altere conforme necessário
$dbname = "sistema"; // Altere conforme necessário

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>