<?php
include_once 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $cpf = $_POST['cpf'];
    $projeto = $_POST['projeto'];

    // Verifica se o projeto foi selecionado
    if ($projeto == '0') {
        header("Location: erro.php?msg=" . urlencode("Por favor, selecione um projeto."));
        exit;
    }

    try {
        $database = new Database();
        $conn = $database->getConnection();

        // Verifica se o eleitor existe com a matrícula e CPF informados
        $query = "SELECT idEleitor FROM tblEleitor WHERE eleRM = :matricula AND eleCPF = :cpf";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $eleitor = $stmt->fetch(PDO::FETCH_ASSOC);
            $idEleitor = $eleitor['idEleitor'];

            // Verifica se o eleitor já votou
            $query = "SELECT ifVotacao FROM tblVotacao WHERE votIdEleitor = :idEleitor";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idEleitor', $idEleitor);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Eleitor já votou, redireciona para a página de erro com mensagem
                header("Location: erro.php?msg=" . urlencode("Você já votou! Cada eleitor pode votar apenas uma vez."));
                exit;
            }

            // Insere o voto
            $query = "INSERT INTO tblVotacao (votIdEleitor, votIdProjeto) VALUES (:idEleitor, :projeto)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idEleitor', $idEleitor);
            $stmt->bindParam(':projeto', $projeto);

            if ($stmt->execute()) {
                // Voto registrado com sucesso, redireciona para a página de sucesso
                header("Location: sucesso.php");
                exit;
            } else {
                // Erro ao registrar o voto
                header("Location: erro.php?msg=" . urlencode("Erro ao registrar o voto. Tente novamente mais tarde."));
                exit;
            }
        } else {
            // Eleitor não encontrado
            header("Location: erro.php?msg=" . urlencode("Eleitor não encontrado. Verifique sua matrícula e CPF."));
            exit;
        }

        $conn = null;
    } catch (PDOException $e) {
        header("Location: erro.php?msg=" . urlencode("Erro no sistema: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: erro.php?msg=" . urlencode("Método de requisição inválido."));
    exit;
}
?>
