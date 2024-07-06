<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/noticia.php";
?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Atualizar Notícia</h1>
    </div>

    <div class="row w-100 justify-content-center align-items-center">
      <div class="col-12 col-md-8 my-5">
        <a target="_blank" href="<?php echo url_generate(['route' => 'tfm']); ?>"><button class="btnAddImage">Gerenciador de Arquivos</button></a>
      </div>
      <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8" method="POST" action="<?php echo url_generate(['route' => 'controllers/noticia_atualizar', 'id' => $_GET['id']],true); ?>">
        <div class="formItens w-100">
          <label class="d-block" for="titulo">Título:</label>
          <input type="text" id="titulo" value="<?php echo ($news['titulo']) ?>" name="titulo" required>
        </div>
        <div class="form-group formItens formImg w-100">
          <label for="img_capa">Imagem de Capa</label>
          <div class="input-group">
            <input type="text" class="form-control" id="img_capa" name="img_capa" required readonly value="<?php echo htmlspecialchars($news['img_capa'], ENT_QUOTES, 'UTF-8'); ?>">
            <div class="input-group-append">
              <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('img_capa')"><i class="bi bi-image"></i></button>
            </div>
          </div>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="data_noticia">Data:</label>
          <input type="date" id="data_noticia" value="<?php echo ($news['data_noticia']) ?>" name="data_noticia" required>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="descricao_noticia">Descrição:</label>
          <textarea name="descricao_noticia" id="descricao_noticia"><?php echo ($news['descricao_noticia']) ?></textarea>
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