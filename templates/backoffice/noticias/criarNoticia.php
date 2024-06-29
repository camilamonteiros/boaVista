<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Criar Notícia</h1>
    </div>
    <div class="row w-100 justify-content-center align-items-center">
    <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8" method="POST" action="<?php echo url_generate(['route' => 'controllers/noticia_criar']); ?>">
      <div class="formItens w-100">
        <label class="d-block" for="titulo">Título:</label>
        <input type="text" id="titulo" placeholder="Título da Notícia" name="titulo" required>
      </div>
      <div class="formItens w-100">
        <label class="d-block" for="img_capa">Imagem de Capa:</label>
        <input type="text" id="img_capa" placeholder="Caminho da Imagem de Capa" name="img_capa" required>
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
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>