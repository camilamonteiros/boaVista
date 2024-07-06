<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/quemSomos.php";
?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Atualizar Notícia</h1>
    </div>

    <div class="row w-100 justify-content-center align-items-center">
      <div class="col-12 col-md-8 my-5">
        <a target="_blank" href="<?php echo url_generate(['route' => 'tfm']); ?>"><button class="btnAddImage">Gerenciador de Arquivos</button></a>
      </div>
      <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8" method="POST" action="<?php echo url_generate(['route' => 'controllers/quemSomos_atualizar']); ?>">
        <input type="hidden" name="id_quemSomos" id="id_quemSomos" value="<?php echo ($quemSomos['id_quemSomos']) ?>">
        <div class="formItens w-100">
          <label class="d-block" for="nossa_historia">Nossa História:</label>
          <textarea name="nossa_historia" id="nossa_historia"><?php echo ($quemSomos['nossa_historia']) ?></textarea>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="obra_limpa">Obra Limpa:</label>
          <textarea name="obra_limpa" id="obra_limpa"><?php echo ($quemSomos['obra_limpa']) ?></textarea>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="missao">Missão:</label>
          <textarea name="missao" id="missao"><?php echo ($quemSomos['missao']) ?></textarea>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="visao">Visão:</label>
          <textarea name="visao" id="visao"><?php echo ($quemSomos['visao']) ?></textarea>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="valores">Valores:</label>
          <textarea name="valores" id="valores"><?php echo ($quemSomos['valores']) ?></textarea>
        </div>
        <div class="formItens w-100">
          <button type="submit" class="botaoVerde my-5 w-100">Enviar</button>
        </div>
      </form>
    </div>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>