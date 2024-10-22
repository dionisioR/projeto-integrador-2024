<?php
// Inclui o arquivo de conexão
include_once 'config/db.php';

try {
    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores do formulário
        $projeto = $_POST['projeto'];
        $matricula = $_POST['matricula'];

        // Verifica se o projeto foi selecionado
        if ($projeto == '0') {
            throw new Exception('Nenhum projeto selecionado.');
        }

        // Verifica se a matrícula foi preenchida
        if (empty($matricula)) {
            throw new Exception('Matrícula não informada.');
        }

        // Cria uma instância da classe Database e obtém a conexão
        $database = new Database();
        $conn = $database->getConnection();

        // Consulta para verificar se a matrícula existe na tabela tblEleitor
        $query = "SELECT idEleitor FROM tblEleitor WHERE eleRM = :matricula";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();

        // Verifica se a matrícula existe
        if ($stmt->rowCount() == 0) {
            throw new Exception('Matrícula não encontrada.');
        }

        // Obtém o idEleitor
        $eleitor = $stmt->fetch(PDO::FETCH_ASSOC);
        $idEleitor = $eleitor['idEleitor'];

        // Verifica se o eleitor já votou na tabela tblVotacao
        $query = "SELECT * FROM tblVotacao WHERE votIdEleitor = :idEleitor";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idEleitor', $idEleitor);
        $stmt->execute();

        // Se já houver um registro, significa que o eleitor já votou
        if ($stmt->rowCount() > 0) {
            throw new Exception('Você já votou! Cada eleitor pode votar apenas uma vez.');
        }

        // Insere o voto na tabela tblVotacao
        $query = "INSERT INTO tblVotacao (votIdEleitor, votIdProjeto) VALUES (:idEleitor, :idProjeto)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idEleitor', $idEleitor);
        $stmt->bindParam(':idProjeto', $projeto);
        $stmt->execute();

        // Se tudo correr bem, redireciona para a página de sucesso
        header("Location: sucesso.php");
        exit();
    } else {
        throw new Exception('Método de requisição inválido.');
    }
} catch (Exception $e) {
    // Redireciona para a página de erro com a mensagem de erro
    header("Location: erro.php?msg=" . urlencode($e->getMessage()));
    exit();
}
