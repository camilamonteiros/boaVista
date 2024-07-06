<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Criar Projeto</h1>
    </div>
    <div class="row w-100 justify-content-center align-items-center">
      <div class="col-12 col-md-8 my-5">
        <a target="_blank" href="<?php echo url_generate(['route' => 'tfm']); ?>"><button class="btnAddImage">Gerenciador de Arquivos</button></a>
      </div>
      <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8 dropzone" method="POST" action="<?php echo url_generate(['route' => 'controllers/projeto_criar']); ?>">
        <div class="formItens w-100">
          <label class="d-block" for="nome_projeto">Nome:</label>
          <input type="text" id="nome_projeto" placeholder="Nome do Projeto" name="nome_projeto" required>
        </div>
        <div class="form-group formItens formImg w-100">
          <label for="img_capa">Imagem de Capa</label>
          <div class="input-group">
            <input type="text" class="form-control" id="img_capa" name="img_capa" required readonly placeholder="Clique no ícone e escolha a imagem">
            <div class="input-group-append">
              <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('img_capa')"><i class="bi bi-image"></i></button>
            </div>
          </div>
        </div>
        <div class="form-group formItens formImg w-100">
          <label for="banner_projeto">Imagem do Banner</label>
          <div class="input-group">
            <input type="text" class="form-control" id="banner_projeto" name="banner_projeto" required readonly placeholder="Clique no ícone e escolha a imagem">
            <div class="input-group-append">
              <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('banner_projeto')"><i class="bi bi-image"></i></button>
            </div>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-between flex-wrap">
          <div class="formItens col-12 col-md-6 formColuna">
            <label class="d-block" for="status_construcao">Status de Construção:</label>
            <select name="status_construcao" id="status_construcao">
              <option value="">Escolha o status</option>
              <option value="1">Pré-Lançamento</option>
              <option value="2">Lançamento</option>
              <option value="3">Em Obras</option>
              <option value="4">Obras Concluídas</option>
            </select>
          </div>
          <div class="formItens col-12 col-md-6">
            <label class="d-block" for="status_venda">Status de Venda:</label>
            <select name="status_venda" id="status_venda">
              <option value="">Escolha o status</option>
              <option value="1">Compre Já</option>
              <option value="2">Últimas Unidades</option>
              <option value="3">100% Vendido</option>
            </select>
          </div>
        </div>
        <div class="formItens w-100 my-4">
          <label class="d-block" for="descricao_projeto">Descrição:</label>
          <textarea name="descricao_projeto" id="descricao_projeto" placeholder="Descrição do Projeto"></textarea>
        </div>
        <div class="formItens w-100 my-4">
          <label class="d-block" for="carac_projeto">Características:</label>
          <div id="caracteristicas">
            <textarea name="carac_projeto[]" class="carac_projeto" placeholder="Características do Projeto"></textarea>
          </div>
          <button type="button" id="addCaracteristica" class="btn btn-secondary mt-2">Adicionar Característica</button>
        </div>
        <div class="form-group formItens formImg w-100">
          <label for="imagem">Galeria de Imagens:</label>
          <div class="input-group">
            <input type="text" class="form-control" id="imagem" name="imagem[]" required readonly placeholder="Clique no ícone e escolha a imagem">
            <div class="input-group-append">
              <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('imagem')"><i class="bi bi-image"></i></button>
            </div>
            <div class="ms-3 mais"><i class="bi bi-plus-circle" id="addImage"></i></div>
          </div>
        </div>
        <div id="extraImages"></div>
        <div class="formItens w-100">
          <button type="submit" class="botaoVerde my-5 w-100">Enviar</button>
        </div>
      </form>
    </div>
    <!--File Manager Modal-->
    <div class="modal fade" id="fileManagerModal" tabindex="-1" role="dialog" aria-labelledby="fileManagerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fileManagerModalLabel">Selecione uma Imagem</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <iframe id="fileManagerIframe" src="plugins/tinyfilemanager/tinyfilemanager.php" width="100%" height="400px" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
    <!--File Manager Modal-->
  </main>

  <script>
    var currentInput = null;

    function setCurrentInput(inputId) {
      currentInput = document.getElementById(inputId);
    }

    function selectFile(fileUrl) {
      if (currentInput) {
        currentInput.value = fileUrl;
        $('#fileManagerModal').modal('hide');
      }
    }

    function initializeTinyMCE(selector) {
      tinymce.init({
        selector: selector,
        menubar: false,
        plugins: 'link image code',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code'
      });
    }

    document.addEventListener('DOMContentLoaded', function() {
      initializeTinyMCE('#descricao_projeto');
      initializeTinyMCE('.carac_projeto');
    });

    document.getElementById('addImage').addEventListener('click', function() {
      var extraImagesDiv = document.getElementById('extraImages');
      var newInputGroup = document.createElement('div');
      newInputGroup.className = 'form-group formItens formImg w-100';
      var uniqueId = 'imagem' + (document.querySelectorAll('[id^=imagem]').length + 1);
      newInputGroup.innerHTML = `
        <div class="input-group mt-2">
          <input type="text" class="form-control" id="${uniqueId}" name="imagem[]" required readonly placeholder="Clique no ícone e escolha a imagem">
          <div class="input-group-append">
            <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('${uniqueId}')"><i class="bi bi-image"></i></button>
          </div>
          <div class="ms-3 mais">
            <i class="bi bi-dash-circle removeImage" style="cursor: pointer;"></i>
          </div>
        </div>`;

      extraImagesDiv.appendChild(newInputGroup);

      newInputGroup.querySelector('.removeImage').addEventListener('click', function() {
        extraImagesDiv.removeChild(newInputGroup);
      });
    });

    document.getElementById('addCaracteristica').addEventListener('click', function() {
      var caracteristicasDiv = document.getElementById('caracteristicas');
      var newTextareaGroup = document.createElement('div');
      newTextareaGroup.className = 'textarea-group mt-2';
      var uniqueId = 'carac_projeto' + (document.querySelectorAll('.carac_projeto').length + 1);
      newTextareaGroup.innerHTML = `
        <textarea id="${uniqueId}" name="carac_projeto[]" class="carac_projeto" placeholder="Características do Projeto"></textarea>
        <button type="button" class="btn btn-danger removeCaracteristica mt-2">Remover</button>`;

      caracteristicasDiv.appendChild(newTextareaGroup);

      initializeTinyMCE('#' + uniqueId);

      newTextareaGroup.querySelector('.removeCaracteristica').addEventListener('click', function() {
        caracteristicasDiv.removeChild(newTextareaGroup);
      });
    });
  </script>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>
