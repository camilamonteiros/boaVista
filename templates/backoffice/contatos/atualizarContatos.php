<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/contato.php";
?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Atualizar Notícia</h1>
    </div>

    <div class="row w-100 justify-content-center align-items-center">
      <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8" method="POST" action="<?php echo url_generate(['route' => 'controllers/contato_atualizar']); ?>">
      <input type="hidden" name="id_contatos" id="id_contatos" value="<?php echo ($contatos['id_contatos']) ?>">

        <div class="formItens w-100">
          <label class="d-block" for="instagram">Link para o Instagram:</label>
          <input type="text" id="instagram" value="<?php echo ($contatos['instagram']) ?>" name="instagram" required>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="facebook">Link para o Facebook:</label>
          <input type="text" id="facebook" value="<?php echo ($contatos['facebook']) ?>" name="facebook" required>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="whatsapp">Link para o WhatsApp:</label>
          <input type="text" id="whatsapp" value="<?php echo ($contatos['whatsapp']) ?>" name="whatsapp" required>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="email_form">E-mail para envio dos formulários:</label>
          <input type="text" id="email_form" value="<?php echo ($contatos['email_form']) ?>" name="email_form" required>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="telefone">Telefone:</label>
          <input type="text" id="telefone" value="<?php echo ($contatos['telefone']) ?>" name="telefone" required>
        </div>
        <div class="formItens w-100">
          <label class="d-block" for="endereco">Endereço:</label>
          <textarea name="endereco" id="endereco"><?php echo ($contatos['endereco']) ?></textarea>
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