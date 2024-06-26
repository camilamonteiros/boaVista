<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contsrutora Boa Vista</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/variables.css?v=1.0" />
  <link rel="stylesheet" href="css/style.css?v=1.0" />
  <link rel="stylesheet" href="css/mobile.css?v=1.0" />
</head>

<body>
  <header>
    <!-- nav -->

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
            <li class="ativo"><a href="home.html" class="ativo navText">Home</a></li>
            <li><a href="quemSomos.html" class="navText">Quem Somos</a></li>
            <li><a href="projetos.html" class="navText">Projetos</a></li>
            <li>
              <a href="noticiasEventos.html" class="navText">Notícias e Eventos</a>
            </li>
            <li><a href="contatos.html" class="navText">Contatos</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <!-- nav -->

    <!-- banner -->

    <section class="container-fluid banner bannerNoticias d-flex justify-content-center align-items-center">
      <h1>Notícias e Eventos</h1>
    </section>

    <!-- banner -->

  </header>