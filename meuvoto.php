<?php require_once 'utils/header.php' ?>
<?php require_once 'utils/menu.php' ?>

<link rel="stylesheet" href="./css/rd3w.css">
<link rel="shortcut icon" href="./assets/logo.jpeg" type="image/jpeg">

<header class="header-galeria-voto" id="header-galeria-3">
    <div class="header-galeria-container">
        <div>
            <h1>Meu Voto</h1>
            <h2>Escolha um projeto, digite sua matrícula e CPF, e clique em votar</h2>
        </div>
    </div>
</header>

<main class="container my-5 py-5">
    <section class="row">
        <div class="col-12 col-md-6">
            <h3>Instruções:</h3>
            <ul>
                <li>Escolha um dos projetos disponíveis.</li>
                <li>Digite sua matrícula e CPF (somente números).</li>
                <li>Clique em votar.</li>
            </ul>

            <form id="formVoto" method="post" action="votar.php">
                <div class="form-group py-2">
                    <label for="projeto">Projeto:</label>
                    <?php
                    include_once 'config/db.php';
                    $database = new Database();
                    $conn = $database->getConnection();
                    $query = "SELECT idProjeto, ProTitulo FROM tblProjeto";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        echo "<select name='projeto' class='form-control'>";
                        echo "<option value='0' selected>Selecione um projeto</option>";
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $idProjeto = htmlspecialchars($row['idProjeto']);
                            $proTitulo = htmlspecialchars($row['ProTitulo']);
                            echo "<option value='{$idProjeto}'>{$proTitulo}</option>";
                        }
                        echo "</select>";
                    } else {
                        echo "Nenhum projeto encontrado.";
                    }
                    $conn = null;
                    ?>
                </div>

                <div class="form-group py-2">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>

                <div class="form-group py-2">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>

                <div class="form-group py-2 text-center">
                    <button type="submit" class="btn btn-primary w-75">Votar</button>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-6 text-center d-flex align-items-center justify-content-center d-none d-md-block">
            <img src="./assets/projeto.png" alt="voto" class="w-50">
        </div>
    </section>
</main>

<?php require_once 'utils/footer.php' ?>
