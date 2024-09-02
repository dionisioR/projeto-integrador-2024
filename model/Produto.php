<?php
// Arquivo: model/produto.php

class Produto {
    private $conn;
    private $table_name = "produto";

    public $pro_id;
    public $pro_nome;
    public $pro_descricao;
    public $pro_preco;
    public $pro_url;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar Produto
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (pro_nome, pro_descricao, pro_preco, pro_url) VALUES (:nome, :descricao, :preco, :url)";
        
        $stmt = $this->conn->prepare($query);

        // Bind dos parâmetros
        $stmt->bindParam(":nome", $this->pro_nome);
        $stmt->bindParam(":descricao", $this->pro_descricao);
        $stmt->bindParam(":preco", $this->pro_preco);
        $stmt->bindParam(":url", $this->pro_url);

        // Executa a query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Listar todos os produtos
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    // Exibir detalhes de um produto
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE pro_id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->pro_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Define propriedades
        $this->pro_nome = $row['pro_nome'];
        $this->pro_descricao = $row['pro_descricao'];
        $this->pro_preco = $row['pro_preco'];
        $this->pro_url = $row['pro_url'];
    }

    // Atualizar produto
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET pro_nome = :nome, pro_descricao = :descricao, pro_preco = :preco, pro_url = :url WHERE pro_id = :id";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->pro_nome);
        $stmt->bindParam(":descricao", $this->pro_descricao);
        $stmt->bindParam(":preco", $this->pro_preco);
        $stmt->bindParam(":url", $this->pro_url);
        $stmt->bindParam(":id", $this->pro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Excluir produto
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE pro_id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->pro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

