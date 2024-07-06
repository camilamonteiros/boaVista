<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/projeto.php";
?>
  <main class="container">
    <div class="row">
      <h1 class="mx-auto text-center">Notícias</h1>
    </div>
    <a href="<?php echo url_generate(['route' => 'projetos/criarProjeto']); ?>"><button class="mb-5 btnAzul">Novo Projeto</button></a>

    <table class="table table-md-striped table-hover">
      <thead>
        <tr class="tableHead">
          <th class="tableHead text-center" scope="col">Nome do Projeto</th>
          <th class="tableHead text-center" scope="col">Imagem Capa</th>
          <th class="tableHead text-center" scope="col">Ações</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($projetos as $projeto) { ?>
          <tr>
            <td data-label="Nome do Projeto" class="tableText" scope="row"><?php echo ($projeto['nome_projeto']) ?></td>
            <td data-label="Imagem Capa" class="tableText" scope="row"><img src="<?php echo ($projeto['img_capa']) ?>" alt=""></td>
            <td data-label="Ações" class="tableText"><a href="<?php echo url_generate(['route' => 'projetos/atualizarProjeto', 'id' => $projeto['id_projeto']], true); ?>">Editar</a> | <a href="<?php echo url_generate(['route' => 'controllers/projeto_apagar', 'id' => $projeto['id_projeto']], true); ?>">Apagar</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>