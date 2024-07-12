<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Construtora Boa Vista</title>
  <script src="https://cdn.tiny.cloud/1/8b2sylktgn2tgkklvh57srkoarb79boj7i2itp73tfrioill/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/variables.css" />
  <link rel="stylesheet" href="css/backoffice.css" />
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
          <ul id="navMenu" class="navMenu col-12 col-lg-9 d-lg-flex justify-content-lg-between text-lg-center align-items-lg-center">
            <li class="ativo"><a href="<?php echo url_generate(['area' => 'admin', 'route' => 'carrossel']); ?>" class="ativo navText">Carrossel</a></li>
            <li><a href="<?php echo url_generate(['area' => 'admin', 'route' => 'quemSomos']); ?>" class="navText">Quem Somos</a></li>
            <li><a href="<?php echo url_generate(['area' => 'admin', 'route' => 'projetos']); ?>" class="navText">Projetos</a></li>
            <li>
              <a href="<?php echo url_generate(['area' => 'admin', 'route' => 'noticias']); ?>" class="navText">Notícias</a>
            </li>
            <li><a href="<?php echo url_generate(['area' => 'admin', 'route' => 'contatos']); ?>" class="navText">Contatos</a></li>
            <li><a href="<?php echo url_generate(['area' => 'admin', 'route' => 'clientes']); ?>" class="navText">Clientes</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>