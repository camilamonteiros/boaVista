<?php
require_once "../controllers/contato.php";
?>
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
<a href="<?php echo $contatos['whatsapp']; ?>" class="whatsapp-button">
    <i class="bi bi-whatsapp whatsapp-icon"></i> 
    <span class="whatsapp-text">Fale conosco!</span>
  </a>
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

    <!-- nav -->

    <!-- banner -->
    <section class="container-fluid banner banner-<?php if ($_GET['route'] == 'noticia') {
                                                    echo 'noticiasEventos';
                                                  } else {
                                                    echo $_GET['route'];
                                                  } ?> d-flex justify-content-center align-items-center">
      <h1>
        <?php
        if (isset($_GET['route'])) {
          if ($_GET['route'] === "quemSomos") {
            echo "Quem Somos";
          } elseif ($_GET['route'] === "projetos") {
            echo "Projetos";
          } elseif ($_GET['route'] === "noticiasEventos" || $_GET['route'] === "noticia") {
            echo "Notícias e Eventos";
          } elseif ($_GET['route'] === "contatos") {
            echo "Contatos";
          } else {
            echo "Página Desconhecida"; // Texto padrão se a rota não corresponder a nenhuma das opções
          }
        } else {
          echo "Página Desconhecida"; // Texto padrão se a rota não estiver definida
        }
        ?>
      </h1>
    </section>

    <!-- banner -->

  </header>