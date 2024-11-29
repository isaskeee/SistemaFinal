<?php
include 'db.php';

// Função para salvar um novo produto
function saveProduto($nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $url_img) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, marca, modelo, valorunitario, categoria, url_img) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $url_img);
    return $stmt->execute();
}

// Função para obter todos os produtos
function getProdutos() {
    global $conn;
    $result = $conn->query("SELECT * FROM produtos");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Função para obter um produto específico
function getProduto($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Função para atualizar um produto
function updateProduto($id, $nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $url_img) {
    global $conn;
    $stmt = $conn->prepare("UPDATE produtos SET nome = ?, descricao = ?, marca = ?, modelo = ?, valorunitario = ?, categoria = ?, url_img = ? WHERE id = ?");
    $stmt->bind_param("ssssiisi", $nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $url_img, $id);
    return $stmt->execute();
}

// Função para excluir um produto
function deleteProduto($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save'])) {
        saveProduto($_POST['nome'], $_POST['descricao'], $_POST['marca'], $_POST['modelo'], $_POST['valorunitario'], $_POST['categoria'], $_POST['url_img']);
    } elseif (isset($_POST['update'])) {
        updateProduto ($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['marca'], $_POST['modelo'], $_POST['valorunitario'], $_POST['categoria'], $_POST['url_img']);
    }
}

// Processamento da exclusão
if (isset($_GET['delete'])) {
    deleteProduto($_GET['delete']);
}
?>