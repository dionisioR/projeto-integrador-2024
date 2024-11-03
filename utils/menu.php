<?php
// Define o caminho base relativo ao documento atual
$base_url = dirname($_SERVER['PHP_SELF']);

// Corrige o caminho base se necessário
$base_url = rtrim($base_url, '/view/produto');

// Gera o menu com links dinâmicos
?>
<!-- <nav>
    <ul>
        <li><a href="<?php echo $base_url; ?>/index.php">Início</a></li>
        <li><a href="<?php echo $base_url; ?>/view/produto/produtoInsert.php">Inserir Produto</a></li>
        <li><a href="<?php echo $base_url; ?>/view/produto/produtoSelectAll.php">Listar Produtos</a></li>
    </ul>
</nav> -->


<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?php echo $base_url; ?>/assets/logo.jpeg" alt="logo" class="logo" style="width: 32px; border-radius: 50%;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $base_url; ?>/index.php">Projeto Integrador 2024</a>
        </li>
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Galeria de projetos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $base_url; ?>/galeria_segundo_ano.php">Galeria 2º ano</a></li>
            <li><a class="dropdown-item" href="<?php echo $base_url; ?>/galeria_primeiro_ano.php">Galeria 1º ano</a></li>
       
         
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Galeria</a>
        </li> -->
      </ul>
      <div class="d-flex">
        <!-- <a href="<?php echo $base_url; ?>/view/votacao_aluno.php" target="_blank" class="btn" id="btn-secundary-rd3w"> -->
        <a href="<?php echo $base_url; ?>/meuvoto.php" target="_blank" class="btn" id="btn-secundary-rd3w">
          Votar
          <i class="bi bi-ui-checks-grid"></i>
        </a>
      </div>
    </div>
  </div>
</nav>
