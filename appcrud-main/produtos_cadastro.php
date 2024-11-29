<?php
include 'produtos_controller.php'; // Inclui o controlador de produtos
include 'header.php';

// Pega todos os produtos para preencher os dados da tabela
$produtos = getProdutos();

// Variável que guarda o ID do produto que será editado
$produtoParaEditar = null;

// Verifica se existe o parâmetro edit pelo método GET
if (isset($_GET['edit'])) {
    $produtoParaEditar = getProduto($_GET['edit']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <script>
        function clearForm() {
            document.getElementById('nome').value = '';
            document.getElementById('descricao').value = '';
            document.getElementById('marca').value = '';
            document.getElementById('modelo').value = '';
            document.getElementById('valorunitario').value = '';
            document.getElementById('categoria').value = '';
            document.getElementById('url_img').value = '';
            document.getElementById('id').value = '';
        }
    </script>
</head>
<body>
    <h2>Cadastro de Produtos</h2>
    
    <form method="POST" action="">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo isset($produtoParaEditar['nome']) ? $produtoParaEditar['nome'] : ''; ?>" required class="form-control" style="width: 300px;">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required class="form-control" style="width: 300px;"><?php echo isset($produtoParaEditar['descricao']) ? $produtoParaEditar['descricao'] : ''; ?></textarea>
    </div>

    <div class="form-group">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo isset($produtoParaEditar['marca']) ? $produtoParaEditar['marca'] : ''; ?>" required class="form-control" style="width: 300px;">
    </div>

    <div class="form-group">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo isset($produtoParaEditar['modelo']) ? $produtoParaEditar['modelo'] : ''; ?>" required class="form-control" style="width: 300px;">
    </div>

    <div class="form-group">
        <label for="valorunitario">Valor Unitário:</label>
        <input type="number" step="0.01" id="valorunitario" name="valorunitario" value="<?php echo isset($produtoParaEditar['valorunitario']) ? $produtoParaEditar['valorunitario'] : ''; ?>" required class="form-control" style="width: 300px;">
    </div>

    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo isset($produtoParaEditar['categoria']) ? $produtoParaEditar['categoria'] : ''; ?>" required class="form-control" style="width: 300px;">
    </div>

    <div class="form-group">
        <label for="url_img">URL da Imagem:</label>
        <input type="text" id="url_img" name="url_img" value="<?php echo isset($produtoParaEditar['url_img']) ? $produtoParaEditar['url_img'] : ''; ?>" required class="form-control" style="width: 500px;">
    </div>

    <button type="submit" name="<?php echo isset($produtoParaEditar) ? 'update' : 'save'; ?>" class="btn btn-primary">
        <?php echo isset($produtoParaEditar) ? 'Atualizar Produto' : 'Cadastrar Produto'; ?>
    </button>
    <button type="button" onclick="clearForm()" class="btn btn-secondary">Limpar</button>
</form>


    <h3>Lista de Produtos</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Valor Unitário</th>
            <th>Categoria</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?php echo $produto['id']; ?></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['marca']; ?></td>
            <td><?php echo $produto['modelo']; ?></td>
            <td><?php echo $produto['valorunitario']; ?></td>
            <td><?php echo $produto['categoria']; ?></td>
            <td><img src="<?php echo $produto['url_img']; ?>" alt="Imagens do produto" style="width: 100px;"></td>
            <td>
                <a href="?edit=<?php echo $produto['id']; ?>" class="btn btn-warning">Editar</a>
                <a href="?delete=<?php echo $produto['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>