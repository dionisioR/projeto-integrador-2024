<?php
// Inclui o arquivo de conexão
include_once 'config/db.php';

// Cria uma instância da classe Database e obtém a conexão
$database = new Database();
$conn = $database->getConnection();

// Consulta para contar os votos por projeto
$query = "
    SELECT p.ProTitulo, COUNT(v.votIdProjeto) AS totalVotos
    FROM tblVotacao v
    JOIN tblProjeto p ON v.votIdProjeto = p.idProjeto
    GROUP BY v.votIdProjeto
    ORDER BY totalVotos DESC";
$stmt = $conn->prepare($query);
$stmt->execute();

$projetos = [];
$totalVotos = [];

// Itera pelos resultados e prepara os dados para os gráficos
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $projetos[] = $row['ProTitulo'];
    $totalVotos[] = $row['totalVotos'];
}

// Fecha a conexão com o banco de dados
$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.I.</title>
    <link rel="shortcut icon" href="./assets/logo.jpeg" type="image/jpeg">
    <!-- Inclui a biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Gráficos de Votos por Projeto</h1>

    <div style="width: 50%; margin: auto;">
        <!-- Gráfico de Pizza -->
        <h2>Gráfico de Pizza</h2>
        <canvas id="graficoPizza"></canvas>
    </div>

    <div style="width: 50%; margin: auto; margin-top: 50px;">
        <!-- Gráfico de Barras -->
        <h2>Gráfico de Barras</h2>
        <canvas id="graficoBarras"></canvas>
    </div>

    <script>
        // Dados para os gráficos
        const labels = <?php echo json_encode($projetos); ?>;
        const dataVotos = <?php echo json_encode($totalVotos); ?>;

        // Configuração do gráfico de pizza
        const configPizza = {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Votos por Projeto',
                    data: dataVotos,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribuição de Votos por Projeto'
                    }
                }
            }
        };

        // Configuração do gráfico de barras
        const configBarras = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total de Votos',
                    data: dataVotos,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Total de Votos por Projeto'
                    }
                }
            }
        };

        // Inicializa o gráfico de pizza
        const graficoPizza = new Chart(
            document.getElementById('graficoPizza'),
            configPizza
        );

        // Inicializa o gráfico de barras
        const graficoBarras = new Chart(
            document.getElementById('graficoBarras'),
            configBarras
        );
    </script>
</body>
</html>
