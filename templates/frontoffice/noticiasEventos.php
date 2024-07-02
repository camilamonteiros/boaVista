<?php
require_once "header.php";
require_once "../controllers/noticia.php";
?>

  <main class="container">
<section class="row">
  <div class="cards-destaque  d-flex flex-wrap justify-content-center justify-content-md-between">
  <?php foreach ($news as $noticia) { ?>
    <div class="card-noticia noticia col-12 col-md-4">
      <div class="img-card-noticia">
        <img src="<?php echo ($noticia['img_capa']) ?>" alt="">
      </div>
      <div class="texto-card-noticia d-flex flex-column">
        <h3><?php echo ($noticia['titulo']) ?></h3>
        <span class="data-noticia"><?php echo (formatarData($noticia['data_noticia'])) ?></span>
        <div class="linhaCard"></div>
        <div class="texto" id="texto"><?php echo ($noticia['descricao_noticia']) ?></div>
        <a class="align-self-center" href="<?php echo url_generate(['route' => 'noticia', 'id' => $noticia['id_noticia']],true); ?>"><button class="botaoVerde">+ Ver Mais</button></a>
      </div>
    </div>
    <?php } ?>
  </div>
</section>
  </main>
<?php
require_once "footer.php"
?>