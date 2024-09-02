<?php
// Arquivo: view/produto/produtoInsert.php

require_once '../../config/db.php';
require_once '../../model/Produto.php';

if ($_POST) {
    // Conexão com a base de dados
    $database = new Database();
    $db = $database->getConnection();

    // Instancia o objeto Produto
    $produto = new Produto($db);

    // Define os atributos do produto com os valores do formulário
    $produto->pro_nome = $_POST['pro_nome'];
    $produto->pro_descricao = $_POST['pro_descricao'];
    $produto->pro_preco = $_POST['pro_preco'];
    $produto->pro_url = $_POST['pro_url'];

    // Tenta criar o produto
    if ($produto->create()) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Não foi possível cadastrar o produto.";
    }
}
?>