<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "header.php"
?>
  <main class="container">
    <div class="row">
      <h1 class="footerTitle mx-auto text-center">Carrossel</h1>
    </div>
    <a href="?route=admin/novoBeneficio"><button class="mb-5 modalBtn">Novo Carrossel</button></a>

    <table class="table table-md-striped table-hover">
      <thead>
        <tr class="tableHead">
          <th class="tableHead text-center" scope="col">Nome</th>
          <th class="tableHead text-center" scope="col">Imagem</th>
          <th class="tableHead text-center" scope="col">Ações</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($beneficiosAdmin as $beneficio) { ?>
          <tr>
            <td data-label="Número" class="tableText" scope="row"><?php echo ($beneficio['token_ben']) ?></td>
            <td data-label="Nome" class="tableText" scope="row"><?php echo ($beneficio['ben_nome']) ?></td>
            <td data-label="Ações" class="tableText"><a href="<?php echo (PAGE_URL . '?route=admin/atualizarBeneficio&id=' . $beneficio['id']); ?>">Editar</a> | <a href="<?php echo ('controller.php?task=apagarBeneficio&id=' . $beneficio['id']); ?>">Apagar</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
<?php
  require_once "footer.php";
}
?>