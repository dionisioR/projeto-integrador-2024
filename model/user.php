<?php
// Arquivo: model/user.php

class User {
    private $conn;
    private $table_name = "user";

    public $user_id;
    public $user_nome;
    public $user_email;
    public $user_pwd;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Função de criação de usuário
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (user_nome, user_email, user_pwd) VALUES (:nome, :email, :senha)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->user_nome);
        $stmt->bindParam(":email", $this->user_email);
        $stmt->bindParam(":senha", $this->user_pwd);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Verifica login
    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_email = :email LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->user_email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if (password_verify($this->user_pwd, $row['user_pwd'])) {
                $this->user_id = $row['user_id'];
                $this->user_nome = $row['user_nome'];
                return true;
            }
        }
        return false;
    }
}
