<?php
// Arquivo: view/produto/produtoDelete.php

require_once '../../config/db.php';
require_once '../../model/produto.php';

// Verifica se o ID do produto foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexão com a base de dados
    $database = new Database();
    $db = $database->getConnection();

    // Instancia o objeto Produto
    $produto = new Produto($db);
    $produto->pro_id = $id;

    // Verifica se o formulário de confirmação foi enviado
    if ($_POST) {
        // Tenta excluir o produto
        if ($produto->delete()) {
            echo "Produto excluído com sucesso!";
            // Redireciona para a lista de produtos
            header("Location: produtoSelectAll.php");
            exit();
        } else {
            echo "Erro ao excluir o produto.";
        }
    }
} else {
    echo "Produto não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <?php include '../../utils/menu.php'; ?>

    <h1>Excluir Produto</h1>

    <!-- Confirmação de exclusão -->
    <p>Você tem certeza que deseja excluir o produto de ID: <?php echo $produto->pro_id; ?>?</p>

    <form method="POST" action="produtoDelete.php?id=<?php echo $produto->pro_id; ?>">
        <input type="submit" value="Confirmar Exclusão">
    </form>

    <a href="produtoSelectAll.php">Cancelar</a>

    <?php include '../../utils/footer.php'; ?>
</body>
</html>
