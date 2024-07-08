<?php
require_once "../controllers/projeto.php";
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
  <style>
    .bannerProjeto {
      background-image: linear-gradient(rgba(4, 41, 64, 0.8), rgba(4, 41, 64, 0.8)), url("<?php echo ($projeto['banner_projeto']) ?>")
    }
  </style>
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
    <!-- banner -->
    <section class="container-fluid banner bannerProjeto d-flex justify-content-center align-items-center">
      <h1>
        <?php echo ($projeto['nome_projeto']) ?>
      </h1>
    </section>
  </header>
  <main class="container">
    <section class="row">
      <div class="col-12 col-lg-7">
        <h2>Descrição</h2>
        <div class="linhaTitulo"></div>
      </div>
      <div class="texto col-12 quemSomos"><?php echo ($projeto['descricao_projeto']); ?></div>
      <div class="gallery">
        <img id="gallery-img" src="" alt="Imagem da galeria">
        <div class="buttons">
          <button id="prev-btn"><i class="bi bi-chevron-left"></i></button>
          <button id="next-btn"><i class="bi bi-chevron-right"></i></button>
        </div>
      </div>
      <div class="modal">
        <img src="" alt="Imagem em destaque">
        <div class="modal-buttons">
          <button id="modal-prev-btn"><i class="bi bi-chevron-left"></i></button>
          <button id="modal-next-btn"><i class="bi bi-chevron-right"></i></button>
        </div>
        <button id="close-modal"><i class="bi bi-x-lg"></i></button>
      </div>
    </section>
    <section class="row">
      <div class="col-12 col-lg-7">
        <h2>Características</h2>
        <div class="linhaTitulo"></div>
      </div>
      <div class="texto col-12 quemSomos d-flex flex-wrap">
        <?php
        foreach ($caracteristicas as $caracteristica) { ?>
          <div class="col-md-4 col-12 caracProjeto p-3">
            <?php echo ($caracteristica); ?>
          </div>
        <?php }
        ?>
      </div>
      <div class="d-flex justify-content-md-end justify-content-center w-100">
      <a href="<?php echo url_generate(['route' => 'projetos']); ?>">
        <button class="botaoVerde mb-5">
          <i class="bi bi-arrow-left"></i> Voltar para Projetos
        </button>
      </a>
    </div>
    </section>

  </main>
  <script>
    const images = <?php echo $imagensJson; ?>;
  </script>
  <?php
  require_once "footer.php"
  ?>