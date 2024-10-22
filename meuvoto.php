<?php require_once 'utils/header.php' ?>
<?php require_once 'utils/menu.php' ?>

<link rel="stylesheet" href="./css/rd3w.css">
<link rel="shortcut icon" href="./assets/logo.jpeg" type="image/jpeg">

<header class="header-galeria-voto" id="header-galeria-3">
    <div class="header-galeria-container">
        <div>
            <h1>Meu Voto </h1>
            <h2>Escolha um projeto, digite sua matrícula e clique em votar</h2>
        </div>
    </div>
</header>


<!----------------------------------------------------------------------- -->
<main class="container my-5 py-5">

    <section class="row">

        <div class="col-12 col-md-6">

            <h3>Instruções:</h3>
            <ul>
                <li>Escolha um dos projetos disponíveis.</li>
                <li>Digite sua matrícula.</li>
                <li>Clique em votar.</li>
            </ul>

            <form id="formVoto" method="post" action="votar.php">


                <div class="form-group py-2">
                    <label for="projeto">Projeto:</label>
                    <!-- Select para escolher o projeto - INICIO-->
                    <?php
                    // Inclui o arquivo de conexão
                    include_once 'config/db.php';

                    // Cria uma instância da classe Database e obtém a conexão
                    $database = new Database();
                    $conn = $database->getConnection();

                    // Consulta SQL para selecionar o idProjeto e ProTitulo
                    $query = "SELECT idProjeto, ProTitulo FROM tblProjeto";

                    // Prepara a consulta
                    $stmt = $conn->prepare($query);

                    // Executa a consulta
                    $stmt->execute();

                    // Verifica se retornou algum resultado
                    if ($stmt->rowCount() > 0) {
                        // Cria o componente <select>
                        echo "<select name='projeto' class='form-control'>";
                        echo "<option value='0' selected>Selecione um projeto</option>";
                        // Loop pelos resultados da consulta
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            // Extrai os valores do array associativo
                            $idProjeto = $row['idProjeto'];
                            $proTitulo = $row['ProTitulo'];

                            // Cria cada opção do select
                            echo "<option value='" . htmlspecialchars($idProjeto) . "'>" . htmlspecialchars($proTitulo) . "</option>";
                        }

                        echo "</select>";
                    } else {
                        echo "Nenhum projeto encontrado.";
                    }

                    // Fecha a conexão (opcional, pois PDO encerra automaticamente no final do script)
                    $conn = null;
                    ?>
                    <!-- Select para escolher o projeto - FIM-->
                </div>


                <div class="form-group py-2">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>

                <div class="form-group py-2 text-center">
                    <button type="submit" class="btn btn-primary w-75 ">Votar</button>
                </div>
            </form>
        </div>
        </div>


        <div class="col-12 col-md-6 text-center d-flex align-items-center justify-content-center d-none d-md-block">
            <img src="./assets/projeto.png" alt="voto" class="w-50">
        </div>
    </section>




</main>



<?php require_once 'utils/footer.php' ?>