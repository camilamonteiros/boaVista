<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/carrossel.php";
  require_once "../controllers/projeto.php";

?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Atualizar Carrossel</h1>
    </div>

    <div class="row w-100 justify-content-center align-items-center">
      <div class="col-12 col-md-8 my-5">
        <a target="_blank" href="<?php echo url_generate(['route' => 'tfm']); ?>"><button class="btnAddImage">Gerenciador de Arquivos</button></a>
      </div>
      <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8 dropzone" method="POST" action="<?php echo url_generate(['route' => 'controllers/carrossel_atualizar'],true); ?>">
        <div class="form-group formItens formImg w-100">
          <label for="img_carrossel">Imagem do Carrossel</label>
          <div class="input-group">
            <input type="text" class="form-control" id="img_carrossel" name="img_carrossel" required readonly value="<?php echo htmlspecialchars($carrossel['img_carrossel'], ENT_QUOTES, 'UTF-8'); ?>">
            <div class="input-group-append">
              <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('img_carrossel')"><i class="bi bi-image"></i></button>
            </div>
          </div>
        </div>
        <div class="formItens col-12">
          <label class="d-block" for="id_projeto">Projeto Relacionado:</label>
          <select name="id_projeto" id="id_projeto">
            <option value="">Escolha o projeto</option>
            <?php foreach ($projetos as $projeto) { ?>
              <option value="<?php echo $projeto['id_projeto'] ?>"><?php echo $projeto['nome_projeto'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="formItens w-100">
          <button type="submit" class="botaoVerde my-5 w-100">Enviar</button>
        </div>
      </form>
    </div>
    <div class="modal fade" id="fileManagerModal" tabindex="-1" role="dialog" aria-labelledby="fileManagerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fileManagerModalLabel">Selecione uma Imagem</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <iframe id="fileManagerIframe" src="plugins/tinyfilemanager/tinyfilemanager.php" width="100%" height="400px" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>