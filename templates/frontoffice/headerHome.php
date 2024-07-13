<?php
require_once "../controllers/carrossel.php";
require_once "../controllers/contato.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Construtora Boa Vista</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/variables.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/mobile.css" />
</head>

<body>
  <a href="<?php echo $contatos['whatsapp']; ?>" class="whatsapp-button">
    <i class="bi bi-whatsapp whatsapp-icon"></i> 
    <span class="whatsapp-text">Fale conosco!</span>
  </a>
  <header>
    <div class="navBar d-flex align-items-center">
      <nav class="container-lg">
        <div class="row d-flex align-items-center">
          <div class="col-3 navLogo">
            <img src="img/logo.svg" alt="Logomarca" />
          </div>
          <div class="menuIcon col-9 d-flex d-lg-none justify-content-end">
            <div class="menu-toggle" id="menu-toggle" onclick="toggleMenu()">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </div>
          </div>
          <ul id="navMenu" class="navMenu col-12 col-lg-9 d-lg-flex justify-content-lg-between text-lg-center align-items-lg-center">
            <li id="nav-home"><a href="<?php echo url_generate(['route' => 'home']); ?>" class=" navText">Home</a></li>
            <li id="nav-quemSomos"><a href="<?php echo url_generate(['route' => 'quemSomos']); ?>" class="navText">Quem Somos</a></li>
            <li id="nav-projetos"><a href="<?php echo url_generate(['route' => 'projetos']); ?>" class="navText">Projetos</a></li>
            <li id="nav-noticiasEventos">
              <a href="<?php echo url_generate(['route' => 'noticiasEventos']); ?>" class="navText">Notícias e Eventos</a>
            </li>
            <li id="nav-contatos"><a href="<?php echo url_generate(['route' => 'contatos']); ?>" class="navText">Contatos</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div id="carrosselBoaVista" class="carousel slide carousel-fade">
      <div class="carousel-indicators indicadoresCarrossel">
        <?php foreach ($carrosseis as $index => $carrossel) : ?>
          <button type="button" data-bs-target="#carrosselBoaVista" data-bs-slide-to="<?= $index ?>" <?= $index === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $index + 1 ?>"></button>
        <?php endforeach; ?>
      </div>
      <div class="carousel-inner">
        <?php foreach ($carrosseis as $index => $carrossel) : ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="10000">
            <img src="<?= $carrossel['img_carrossel'] ?>" class="d-block" alt="...">
            <div class="carousel-caption">
              <div class="textoCarrossel container">
                <h1><?= $carrossel['nome_projeto'] ?></h1>
                <div class="linhaCarrossel"></div>
                <div class="texto textoBranco"><?= $carrossel['descricao_projeto'] ?></div>
                <a href="<?php echo url_generate(['route' => 'projeto', 'id' => $carrossel['id_projeto']], true); ?>"><button class="botaoBranco">+ Ver Mais</button></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </header>