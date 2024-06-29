<?php
require_once "headerLogin.php";
?>
<main class="row justify-content-center align-items-center w-100">
  <form class="formContatos col-md-6" method="POST" action="<?php echo url_generate(['route' => 'controllers/authenticate']); ?>">
    <div class="formItens">
      <label class="d-block" for="username">Usuário:</label>
      <input type="text" id="username" placeholder="Nome de Usuário" name="username" required>
    </div>
    <div class="formItens">
      <label class="d-block" for="senha">Senha:</label>
      <input type="password" id="senha" placeholder="Sua senha" name="senha" required>
    </div>
    <div class="formItens">
      <button type="submit" class="botaoVerde">Login</button>
    </div>
  </form>
</main>
<?php
require_once "footer.php";
?>