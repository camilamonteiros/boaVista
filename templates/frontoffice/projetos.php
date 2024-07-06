<?php
require_once "header.php";
require_once "../controllers/projeto.php";
?>
<main class="container">
  <section class="row">
    <div class="cards-destaque  d-flex flex-wrap justify-content-center justify-content-md-between">
      <?php foreach ($projetos as $projeto) { ?>
        <div class="card-noticia noticia col-12 col-md-4">
          <div class="img-card-noticia">
            <img src="<?php echo ($projeto['img_capa']) ?>" alt="">
            <div class="tagVendas <?php if ($projeto['status_venda'] == 1) {
                                    echo "compreJa";
                                  } elseif ($projeto['status_venda'] == 2) {
                                    echo "ultimasUnidades";
                                  } else {
                                    echo "vendido";
                                  } ?>"></div>
          </div>
          <div class="texto-card-noticia d-flex flex-column">
            <h3><?php echo ($projeto['nome_projeto']) ?></h3>
            <div class="linhaCard"></div>
            <div class="tagConstrucao <?php if ($projeto['status_construcao'] == 1) {
                                    echo "preLancamento";
                                  } elseif ($projeto['status_construcao'] == 2) {
                                    echo "lancamento";
                                  } elseif ($projeto['status_construcao'] == 3) {
                                    echo "emObras";
                                  } else {
                                    echo "concluidas";
                                  } ?>"></div>
            <div class="texto"><?php echo ($projeto['descricao_projeto']) ?></div>
            <a class="align-self-center" href="<?php echo url_generate(['route' => 'projeto', 'id' => $projeto['id_projeto']], true); ?>"><button class="botaoVerde">+ Ver Mais</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</main>
<?php
require_once "footer.php"
?>