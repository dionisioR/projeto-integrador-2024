<?php
// Obtém a mensagem de erro da URL, se existir
$mensagemErro = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : 'Erro desconhecido.';

// Define o tempo de redirecionamento (5 segundos)
$tempoRedirecionamento = 5;
header("refresh:$tempoRedirecionamento;url=index.php");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.I.</title>
    <link rel="shortcut icon" href="./assets/logo.jpeg" type="image/jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        // Script para exibir a contagem regressiva
        let tempo = <?php echo $tempoRedirecionamento; ?>;

        function contagemRegressiva() {
            if (tempo > 0) {
                document.getElementById('contagem').innerHTML = tempo;
                tempo--;
                setTimeout(contagemRegressiva, 1000);
            }
        }
        window.onload = contagemRegressiva;
    </script>

    <style>
        img {
            width: 100%;
            height: 30vh;
            display: block;
        }

        main {
            background-color: #343a40;
            color: #fff;
            padding: 50px;
            text-align: center;
            min-height: 80vh;
        }

        body {
            background-color: rgb(253, 239, 239);
        }

    </style>
</head>

<body>

    <img src="./assets/voto_1.jpg" alt="voto">
    <main>
        <h1 class="display-3">OPS! Algo deu errado.</h1>
   

        <div class="m-5 px-5">

            <p>
                <?php
                // Exibe uma mensagem especial caso o eleitor já tenha votado
                if ($mensagemErro == 'Você já votou! Cada eleitor pode votar apenas uma vez.') {
                    echo "Você já participou dessa votação! <br>Cada pessoa pode votar uma única vez, e parece que você já registrou o seu voto.<hr>";
                    echo "Agradecemos pela sua participação!";
                } else {
                    echo $mensagemErro;
                }
                ?>
            </p>
            <p>Você será redirecionado para a página inicial em <span id="contagem"><?php echo $tempoRedirecionamento; ?></span> segundos.</p>

        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>