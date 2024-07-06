<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/quemSomos.php";
?>
  <main class="container">
    <section class="row">
      
        <a class="my-5" href="<?php echo url_generate(['route' => 'quemSomos/atualizarQuemSomos']); ?>">
          <button class="btnAddImage">
            Editar Página
          </button>
        </a>
      
      <div class="col-12 col-lg-7">
        <h2>Nossa História</h2>
        <div class="linhaTitulo"></div>
      </div>
      <div class="texto col-12 quemSomos">
        <?php echo ($quemSomos['nossa_historia']) ?>
      </div>
    </section>
    <section class="row">
      <div>
        <h2>Obra Limpa</h2>
        <div class="linhaTitulo"></div>
      </div>
      <div class="texto quemSomos">
        <?php echo ($quemSomos['obra_limpa']) ?>
      </div>
    </section>
    <section class="row noQueAcreditamos">
      <div>
        <h2>No que acreditamos</h2>
        <div class="linhaTitulo"></div>
      </div>
      <div class="missao col-lg-4 col-12">
        <h5>Nossa Missão</h5>
        <div class="texto"><?php echo ($quemSomos['missao']) ?></div>
      </div>
      <div class="missao col-lg-4 col-12">
        <h5>Nossa Visão</h5>
        <div class="texto"><?php echo ($quemSomos['visao']) ?></div>
      </div>
      <div class="missao col-lg-4 col-12">
        <h5>Nossos Valores</h5>
        <div class="texto"><?php echo ($quemSomos['valores']) ?></div>
      </div>
    </section>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>