<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
?>
  <main class="container">
    <button><a target="_blank" href="<?php echo url_generate(['route' => 'tfm']); ?>">aqui</a></button>
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Criar Notícia</h1>
    </div>
    <div class="row w-100 justify-content-center align-items-center">
      <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8 dropzone" method="POST" action="<?php echo url_generate(['route' => 'controllers/noticia_criar']); ?>">
        <div class="formItens w-100">
          <label class="d-block" for="titulo">Título:</label>
          <input type="text" id="titulo" placeholder="Título da Notícia" name="titulo" required>
        </div>
        <div class="form-group">
                <label for="img_capa">Imagem de Capa</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="img_capa" name="img_capa" required readonly>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fileManagerModal">Escolher Imagem</button>
                    </div>
                </div>
            </div>
        <div class="formItens w-100">
          <label class="d-block" for="data_noticia">Data:</label>
          <input type="date" id="data_noticia" placeholder="Data da Notícia" name="data_noticia" required>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="descricao_noticia">Descrição:</label>
          <textarea name="descricao_noticia" id="descricao_noticia" placeholder="Descrição da Notícia"></textarea>
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
<!--
<div class="formItens w-100">
          <label class="d-block" for="img_capa">Imagem de Capa:</label>
          <input type="file" id="img_capa" placeholder="Caminho da Imagem de Capa" name="img_capa" required>
        </div>
        <input type="hidden" id="img_capa" name="img_capa">