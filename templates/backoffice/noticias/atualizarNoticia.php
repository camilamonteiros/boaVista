<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/noticia.php";
?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Criar Notícia</h1>
    </div>
    <div class="row w-100 justify-content-center align-items-center">
    <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8" method="POST" action="<?php echo url_generate(['route' => 'controllers/noticia_atualizar', 'id' => $_GET['id']]); ?>">
      <div class="formItens w-100">
        <label class="d-block" for="titulo">Título:</label>
        <input type="text" id="titulo" value="<?php echo ($news['titulo']) ?>" name="titulo" required>
      </div>
      <div class="formItens w-100">
        <label class="d-block" for="img_capa">Imagem de Capa:</label>
        <input type="text" id="img_capa" value="<?php echo ($news['img_capa']) ?>" name="img_capa" required>
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
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>