<?php
// Redireciona para index.php após 3 segundos
header("refresh:5;url=index.php");
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
        <h1 class="display-3 mt-5">Voto registrado com sucesso!</h1>
        <p>Você será redirecionado para a página inicial em 5 segundos.</p>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>