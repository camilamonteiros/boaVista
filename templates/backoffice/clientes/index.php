<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/clientes.php";
?>
  <main class="container">
    <div class="row">
      <h1 class="mx-auto text-center">Clientes</h1>
    </div>
    <table class="table table-md-striped table-hover">
      <thead>
        <tr class="tableHead">
          <th class="tableHead text-center" scope="col">Nome</th>
          <th class="tableHead text-center" scope="col">E-mail</th>
          <th class="tableHead text-center" scope="col">Telefone</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($clientes as $cliente) { ?>
          <tr>
            <td data-label="Nome" class="tableText" scope="row"><?php echo ($cliente['nome']) ?></td>
            <td data-label="E-mail" class="tableText" scope="row"><?php echo ($cliente['email']) ?></td>
            <td data-label="Telefone" class="tableText" scope="row"><?php echo ($cliente['telefone']) ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>