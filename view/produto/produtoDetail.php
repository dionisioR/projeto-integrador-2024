<?php
// Arquivo: view/produto/produtoDetail.php

require_once '../../config/db.php';
require_once '../../model/produto.php';

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexão com a base de dados
    $database = new Database();
    $db = $database->getConnection();

    // Instancia o objeto Produto
    $produto = new Produto($db);
    $produto->pro_id = $id;

    // Chama o método para obter detalhes do produto
    $produto->readOne();
} else {
    echo "Produto não encontrado.";
    exit();
}
?>

    <?php include '../../utils/header.php'?>
    <?php include '../../utils/menu.php'; ?>

    <h1>Detalhes do Produto</h1>

    <p><strong>Nome:</strong> <?php echo $produto->pro_nome; ?></p>
    <p><strong>Descrição:</strong> <?php echo $produto->pro_descricao; ?></p>
    <p><strong>Preço:</strong> R$ <?php echo $produto->pro_preco; ?></p>

    <a href="produtoUpdate.php?id=<?php echo $produto->pro_id; ?>">Editar</a> |
    <a href="produtoDelete.php?id=<?php echo $produto->pro_id; ?>">Excluir</a>

    <?php include '../../utils/footer.php'; ?>

