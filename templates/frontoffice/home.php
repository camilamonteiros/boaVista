<?php
require_once "headerHome.php";
require_once "../controllers/noticia.php";
require_once "../controllers/quemSomos.php";
?>
<main class="container">
  <section class="row quemSomos-home">
    <div class="col-12 col-lg-7 textoQuemSomos">
      <h2>Quem Somos</h2>
      <div class="linhaTitulo"></div>
      <span class="slogan">Há 40 anos realizando sonhos...</span>
      <div class="texto">
        <?php echo $quemSomos['nossa_historia']; ?>
      </div>
      <div class="col-12 dadosEmpresa d-flex flex-wrap w-100 align-items-center">
        <div class="col-6 d-flex align-items-center flex-column mb-5">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="40">0</h4>
            <span class="slogan">anos</span>
          </div>
          <div class="slogan">de trabalho</div>
        </div>
        <div class="col-6 d-flex align-items-center flex-column mb-5">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="510000">0</h4>
            <span class="slogan">m<sup>2</sup></span>
          </div>
          <div class="slogan">construídos</div>
        </div>
        <div class="col-6 d-flex align-items-center flex-column">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="5200">0</h4>
            <span class="slogan">obras</span>
          </div>
          <div class="slogan">entregues</div>
        </div>
        <div class="col-6 d-flex align-items-center flex-column">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="25000">0</h4>
            <span class="slogan">sonhos</span>
          </div>
          <div class="slogan">realizados</div>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-12">
      <img src="img/obraLimpa.png" alt="" class="imagem-ajustada ">
    </div>
  </section>
  <section class="destaques-home row">
    <div>
      <h2>Destaques</h2>
      <div class="linhaTitulo"></div>
    </div>
    <div class="cards-destaque d-flex flex-wrap justify-content-md-between justify-content-center">
      <?php foreach ($news as $noticia) { ?>
        <div class="card-noticia g-5 col-12 col-md-4">
          <div class="img-card-noticia">
            <img src="<?php echo ($noticia['img_capa']) ?>" alt="">
          </div>
          <div class="texto-card-noticia d-flex flex-column">
            <h3><?php echo ($noticia['titulo']) ?></h3>
            <span class="data-noticia"><?php echo (formatarData($noticia['data_noticia'])) ?></span>
            <div class="linhaCard"></div>
            <div id="texto" class="texto"><?php echo ($noticia['descricao_noticia']) ?></div>
            <a class="align-self-center" href="<?php echo url_generate(['route' => 'noticia', 'id' => $noticia['id_noticia']], true); ?>"><button class="botaoVerde">+ Ver Mais</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</main>

<?php
require_once "footerHome.php";
?>