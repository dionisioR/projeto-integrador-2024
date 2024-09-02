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
    <a class="navbar-brand" href="#">Navbar</a>
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
            Projetos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Projeto 01</a></li>
            <li><a class="dropdown-item" href="#">Projeto 02</a></li>
            <li><a class="dropdown-item" href="#">Projeto 03</a></li>
            <li><a class="dropdown-item" href="#">Projeto 04</a></li>
            <li><a class="dropdown-item" href="#">Projeto 05</a></li>
         
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Galeria</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="#" class="btn" id="btn-secundary-rd3w">
          Votar
          <i class="bi bi-ui-checks-grid"></i>
        </a>
      </div>
    </div>
  </div>
</nav>
