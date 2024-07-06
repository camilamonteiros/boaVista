<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/carrossel.php";
?>
  <main class="container">
    <div class="row">
      <h1 class="mx-auto text-center">Carrossel</h1>
    </div>
    <a href="<?php echo url_generate(['route' => 'carrossel/criarCarrossel']); ?>"><button class="mb-5 btnAzul">Novo Carrossel</button></a>

    <table class="table table-md-striped table-hover">
      <thead>
        <tr class="tableHead">
          <th class="tableHead text-center" scope="col">Nome do Projeto</th>
          <th class="tableHead text-center" scope="col">Imagem Carrossel</th>
          <th class="tableHead text-center" scope="col">Ações</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($carrosseis as $carrossel) { ?>
          <tr>
            <td data-label="Nome do Projeto" class="tableText" scope="row"><?php echo ($carrossel['nome_projeto']) ?></td>
            <td data-label="Imagem Carrossel" class="tableText" scope="row"><img src="<?php echo ($carrossel['img_carrossel']) ?>" alt=""></td>
            <td data-label="Ações" class="tableText"><a href="<?php echo url_generate(['route' => 'carrossel/atualizarCarrossel', 'id' => $carrossel['id_carrossel']], true); ?>">Editar</a> | <a href="<?php echo url_generate(['route' => 'controllers/carrossel_apagar', 'id' => $carrossel['id_carrossel']], true); ?>">Apagar</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>