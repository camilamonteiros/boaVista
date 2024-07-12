<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/contato.php";
?>
  <main class="container">
    <section class="row">
      
        <a class="my-5" href="<?php echo url_generate(['route' => 'contatos/atualizarContatos']); ?>">
          <button class="btnAddImage">
            Editar Página
          </button>
        </a>
    </section>
    <section class="row noQueAcreditamos">
      

      <div class="missao mb-5 col-lg-6 col-12">
        <h5>Instagram:</h5>
        <div class="texto"><a href="<?php echo ($contatos['instagram']) ?>">Link do Instagram</a></div>
      </div>
      <div class="missao mb-5 col-lg-6 col-12">
        <h5>Facebook:</h5>
        <div class="texto"><a href="<?php echo ($contatos['facebook']) ?>">Link do Facebook</a></div>
      </div>
      <div class="missao mb-5 col-lg-6 col-12">
        <h5>WhatsApp:</h5>
        <div class="texto"><a href="<?php echo ($contatos['whatsapp']) ?>">Link do WhatsApp</a></div>
      </div>
      <div class="missao mb-5 col-lg-6 col-12">
        <h5>E-mail para envio de formulário:</h5>
        <div class="texto"><?php echo ($contatos['email_form']) ?></div>
      </div>
      <div class="missao mb-5 col-lg-6 col-12">
        <h5>Telefone:</h5>
        <div class="texto"><?php echo ($contatos['telefone']) ?></div>
      </div>
      <div class=" col-12 col-lg-6">
        <h5>Endereço:</h5>
        <div class="texto"><?php echo ($contatos['endereco']) ?></div>
      </div>
    </section>
  </main>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>