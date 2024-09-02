<?php
// Arquivo: view/produto/produtoSelectAll.php

require_once '../../config/db.php';
require_once '../../model/produto.php';

// Conexão com a base de dados
$database = new Database();
$db = $database->getConnection();

// Instancia o objeto Produto
$produto = new Produto($db);

// Chama o método para listar todos os produtos
$stmt = $produto->readAll();
$num = $stmt->rowCount();

?>


<?php include '../../utils/header.php'; ?>
<?php include '../../utils/menu.php'; ?>

<h1>Lista de Produtos</h1>

<?php
if ($num > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Descrição</th>";
    echo "<th>Preço</th>";
    echo "<th>Ações</th>";
    echo "<th>url</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        echo "<tr>";
        echo "<td>{$pro_id}</td>";
        echo "<td>{$pro_nome}</td>";
        echo "<td>{$pro_descricao}</td>";
        echo "<td>R$ {$pro_preco}</td>";
        echo "<td>{$pro_url}</td>";
        echo "<td>";
        echo "<a href='produtoDetail.php?id={$pro_id}'>Detalhes</a> | ";
        echo "<a href='produtoUpdate.php?id={$pro_id}'>Editar</a> | ";
        echo "<a href='produtoDelete.php?id={$pro_id}'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum produto cadastrado.</p>";
}
?>

<?php include '../../utils/footer.php'; ?>