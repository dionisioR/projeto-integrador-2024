<?php
// Arquivo: config/db.php

class Database {
    private $host = "br612.hostgator.com.br";
    private $db_name = "hubsap45_bd_projeto";
    private $username = "hubsap45_rodbrid";
    private $password = "Bl@ck"."$"."kull-project";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
