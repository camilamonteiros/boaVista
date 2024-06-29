<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/noticia.php";
?>
  <main class="container">
    <div class="row">
      <h1 class="mx-auto text-center">Notícias</h1>
    </div>
    <a href="<?php echo url_generate(['route' => 'noticias/criarNoticia']); ?>"><button class="mb-5 btnAzul">Nova Notícia</button></a>

    <table class="table table-md-striped table-hover">
      <thead>
        <tr class="tableHead">
          <th class="tableHead text-center" scope="col">Título</th>
          <th class="tableHead text-center" scope="col">Data</th>
          <th class="tableHead text-center" scope="col">Imagem Capa</th>
          <th class="tableHead text-center" scope="col">Ações</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($news as $noticia) { ?>
          <tr>
            <td data-label="Título" class="tableText" scope="row"><?php echo ($noticia['titulo']) ?></td>
            <td data-label="Data" class="tableText" scope="row"><?php echo ($noticia['data_noticia']) ?></td>
            <td data-label="Nome" class="tableText" scope="row"><?php echo ($noticia['img_capa']) ?></td>
            <td data-label="Ações" class="tableText"><a href="<?php echo url_generate(['route' => 'noticias/atualizarNoticia', 'id' => $noticia['id_noticia']]); ?>">Editar</a> | <a href="<?php echo url_generate(['route' => 'controllers/noticia_apagar', 'id' => $noticia['id_noticia']]); ?>">Apagar</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>