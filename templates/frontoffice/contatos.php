<?php
require_once "header.php"
?>
<main class="container">
  <section class="row">
    <div>
      <h2>Fale Conosco</h2>
      <div class="linhaTitulo"></div>
    </div>
    <div class="col-12 col-md-6 contatos-pagina">
      <div class="endereco-box d-flex">
        <i class="bi bi-geo-alt-fill"></i>
        <div class="endereco">
          <p>Rua Taumaturgo de Azevedo, 3237</p>
          <p>Ilhotas, Teresina - PI</p>
          <p>64001-340</p>
        </div>
      </div>
      <div class="endereco-box d-flex">
        <i class="bi bi-telephone-fill"></i>
        <div class="endereco">
          <p>(86) 3221-8064</p>
        </div>
      </div>
      <div class="socialMedia-contatos d-flex w-100">
        <a href="#"><i class="bi bi-whatsapp"></i></a>
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
    <form class="formContatos col-12 col-md-6">
      <div class="formItens col-12">
        <label class="d-block" for="nome">*Nome:</label>
        <input type="text" id="nome" placeholder="Digite aqui seu nome" name="nome">
      </div>
      <div class="formItens col-12">
        <label class="d-block" for="email">*E-mail:</label>
        <input type="text" id="email" placeholder="Digite aqui seu email" name="email">
      </div>
      <div class="col-12 d-flex justify-content-between flex-wrap">
        <div class="formItens col-12 col-md-6 formColuna">
          <label class="d-block" for="telefone">*Telefone:</label>
          <input type="text" id="telefone" placeholder="Digite aqui seu telefone" name="telefone">
        </div>
        <div class="formItens col-12 col-md-6">
          <label class="d-block" for="setor">*Desejo falar com:</label>
          <select name="setor" id="setor">
            <option value="">Escolha o setor</option>
            <option value="">Administrativo</option>
            <option value="">Vendas</option>
            <option value="">Engenharia</option>
          </select>
        </div>
      </div>
      <div class="formItens col-12">
        <label class="d-block" for="assunto">*Assunto:</label>
        <input type="text" id="assunto" placeholder="Digite aqui seu assunto" name="assunto">
      </div>
      <div class="formItens col-12">
        <label class="d-block" for="mensagem">*Mensagem:</label>
        <textarea name="mensagem" id="mensagem" placeholder="Digite aqui a sua mensagem"></textarea>
      </div>
      <div class="formRequired col-12">
        *Campos obrigatórios
      </div>
      <div class="col-12 privacidade d-flex align-items-center">
        <input type="checkbox" id="privacidade" name="privacidade" />
        <label for="privacidade">Estou de acordo com a Política de Privacidade</label>
      </div>
      </div>
    </form>
  </section>
</main>
<?php
require_once "footer.php"
?>