
    <?php include '../../utils/header.php'; ?>
    <?php include '../../utils/menu.php'; ?>

    <h1>Inserir Produto</h1>
    
    <form action="handlerInsert.php" method="POST">
        <label for="pro_nome">Nome do Produto:</label>
        <input type="text" name="pro_nome" required><br><br>

        <label for="pro_descricao">Descrição do Produto:</label>
        <textarea name="pro_descricao" required></textarea><br><br>

        <label for="pro_preco">Preço do Produto:</label>
        <input type="number" step="0.01" name="pro_preco" required><br><br>

        <label for="pro_url">URL da imagem:</label>
        <input type="text" name="pro_url" required><br><br>

        <input type="submit" value="Inserir Produto">
    </form>

    <?php include '../../utils/footer.php'; ?>
