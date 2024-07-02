<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contsrutora Boa Vista</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/variables.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/mobile.css" />
</head>

<body>
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
          <ul id="navMenu"
            class="navMenu col-12 col-lg-9 d-lg-flex justify-content-lg-between text-lg-center align-items-lg-center">
            <li class="ativo"><a href="<?php echo url_generate(['route' => 'home']); ?>" class="ativo navText">Home</a></li>
            <li><a href="<?php echo url_generate(['route' => 'quemSomos']); ?>" class="navText">Quem Somos</a></li>
            <li><a href="<?php echo url_generate(['route' => 'projetos']); ?>" class="navText">Projetos</a></li>
            <li>
              <a href="<?php echo url_generate(['route' => 'noticiasEventos']); ?>" class="navText">Notícias e Eventos</a>
            </li>
            <li><a href="<?php echo url_generate(['route' => 'contatos']); ?>" class="navText">Contatos</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div id="carrosselBoaVista" class="carousel slide carousel-fade ">
      <div class="carousel-indicators indicadoresCarrossel">
        <button type="button" data-bs-target="#carrosselBoaVista" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carrosselBoaVista" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carrosselBoaVista" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carrosselBoaVista" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carrosselBoaVista" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carrosselBoaVista" data-bs-slide-to="5" aria-label="Slide 6"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="img/carrossel/carrossel1.png" class="d-block" alt="...">
          <div class="carousel-caption">
            <div class="textoCarrossel container">
              <h1>Carnaúba Palace</h1>
              <div class="linhaCarrossel"></div>
              <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in
                hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.
                Maecenas vitae mattis...
              </p>
              <a href="#"><button class="botaoBranco">+ Ver Mais</button></a>
            </div>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="img/carrossel/carrossel2.png" class="d-block" alt="...">
          <div class="carousel-caption">
            <div class="textoCarrossel container">
              <h1>Bosque São Cristovão</h1>
              <div class="linhaCarrossel"></div>
              <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in
                hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.
                Maecenas vitae mattis...
              </p>
              <a href="#"><button class="botaoBranco">+ Ver Mais</button></a>
            </div>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="img/carrossel/carrossel3.png" class="d-block" alt="...">
          <div class="carousel-caption">
            <div class="textoCarrossel container">
              <h1>Alameda Dirceu</h1>
              <div class="linhaCarrossel"></div>
              <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in
                hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.
                Maecenas vitae mattis...
              </p>
              <a href="#"><button class="botaoBranco">+ Ver Mais</button></a>
            </div>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="img/carrossel/carrossel4.png" class="d-block" alt="...">
          <div class="carousel-caption">
            <div class="textoCarrossel container">
              <h1>Cajuína Residence</h1>
              <div class="linhaCarrossel"></div>
              <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in
                hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.
                Maecenas vitae mattis...
              </p>
              <a href="#"><button class="botaoBranco">+ Ver Mais</button></a>
            </div>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="img/carrossel/carrossel5.png" class="d-block" alt="...">
          <div class="carousel-caption">
            <div class="textoCarrossel container">
              <h1>Brisa Sul Residence</h1>
              <div class="linhaCarrossel"></div>
              <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in
                hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.
                Maecenas vitae mattis...
              </p>
              <a href="#"><button class="botaoBranco">+ Ver Mais</button></a>
            </div>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="img/carrossel/carrossel6.png" class="d-block" alt="...">
          <div class="carousel-caption">
            <div class="textoCarrossel container">
              <h1>Rio Poty Boulevard</h1>
              <div class="linhaCarrossel"></div>
              <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in
                hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.
                Maecenas vitae mattis...
              </p>
              <a href="#"><button class="botaoBranco">+ Ver Mais</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>