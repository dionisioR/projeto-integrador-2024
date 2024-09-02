<?php
// Arquivo: view/produto/produtoUpdate.php

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

    // Se o formulário for enviado
    if ($_POST) {
        $produto->pro_nome = $_POST['pro_nome'];
        $produto->pro_descricao = $_POST['pro_descricao'];
        $produto->pro_preco = $_POST['pro_preco'];

        // Tenta atualizar o produto
        if ($produto->update()) {
            echo "Produto atualizado com sucesso!";
        } else {
            echo "Não foi possível atualizar o produto.";
        }
    }
} else {
    echo "Produto não encontrado.";
    exit();
}
?>


    <?php include '../../utils/header.php'; ?>
    <?php include '../../utils/menu.php'; ?>

    <h1>Atualizar Produto</h1>
    
    <form action="produtoUpdate.php?id=<?php echo $produto->pro_id; ?>" method="POST">
        <label for="pro_nome">Nome do Produto:</label>
        <input type="text" name="pro_nome" value="<?php echo $produto->pro_nome; ?>" required><br><br>

        <label for="pro_descricao">Descrição do Produto:</label>
        <textarea name="pro_descricao" required><?php echo $produto->pro_descricao; ?></textarea><br><br>

        <label for="pro_preco">Preço do Produto:</label>
        <input type="number" step="0.01" name="pro_preco" value="<?php echo $produto->pro_preco; ?>" required><br><br>

        <input type="submit" value="Atualizar Produto">
    </form>

    <?php include '../../utils/footer.php'; ?>
