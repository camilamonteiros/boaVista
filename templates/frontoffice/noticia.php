<?php
require_once "header.php";
require_once "../controllers/noticia.php";
?>
<main class="container">
  <section class="row">
    <div class="col-12 col-lg-7">
      <h2><?php echo ($news['titulo']) ?></h2>
      <div class="linhaTitulo"></div>
    </div>
    <div class="texto col-12 textoLivre">
    <?php echo ($news['descricao_noticia']) ?>
    </div>
    <div class="d-flex justify-content-md-end justify-content-center w-100">  <a href="<?php echo url_generate(['route' => 'noticiasEventos']); ?>"><button class="botaoVerde mb-5" ><i class="bi bi-arrow-left"></i> Voltar para Notícias e Eventos</button></a>
    </div>
  </section>
</main>
<?php
require_once "footer.php"
?>