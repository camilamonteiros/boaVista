<?php
if (!is_authenticated()) {
  url_redirect(['route' => 'login']);
} else {
  require_once "../templates/backoffice/header.php";
  require_once "../controllers/projeto.php";
  var_dump($projeto)
?>
  <main class="container">
    <div class="row d-flex justify-content-center align-items-center w-100">
      <h1 class="mx-auto text-center my-5">Atualizar Projeto</h1>
    </div>
    <div class="row w-100 justify-content-center align-items-center">
      <div class="col-12 col-md-8 my-5">
        <a target="_blank" href="<?php echo url_generate(['route' => 'tfm']); ?>"><button class="btnAddImage">Gerenciador de Arquivos</button></a>
      </div>
      <form class="formContatos d-flex flex-column justify-content-center align-items-center col-12 col-md-8" method="POST" action="<?php echo url_generate(['route' => 'controllers/projeto_atualizar'], true); ?>">
        <div class="formItens w-100">
          <label class="d-block" for="nome_projeto">Nome:</label>
          <input type="text" id="nome_projeto" value="<?php echo htmlspecialchars($projeto['nome_projeto'], ENT_QUOTES, 'UTF-8'); ?>" name="nome_projeto" required>
        </div>
        <div class="form-group formItens formImg w-100">
          <label for="img_capa">Imagem de Capa</label>
          <div class="input-group">
            <input type="text" class="form-control" id="img_capa" name="img_capa" required readonly value="<?php echo htmlspecialchars($projeto['img_capa'], ENT_QUOTES, 'UTF-8'); ?>">
            <div class="input-group-append">
              <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('img_capa')"><i class="bi bi-image"></i></button>
            </div>
          </div>
        </div>
        <div class="form-group formItens formImg w-100">
          <label for="banner_projeto">Imagem do Banner</label>
          <div class="input-group">
            <input type="text" class="form-control" id="banner_projeto" name="banner_projeto" required readonly value="<?php echo htmlspecialchars($projeto['banner_projeto'], ENT_QUOTES, 'UTF-8'); ?>">
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
              <option value="1" <?php echo $projeto['status_construcao'] == 1 ? 'selected' : ''; ?>>Pré-Lançamento</option>
              <option value="2" <?php echo $projeto['status_construcao'] == 2 ? 'selected' : ''; ?>>Lançamento</option>
              <option value="3" <?php echo $projeto['status_construcao'] == 3 ? 'selected' : ''; ?>>Em Obras</option>
              <option value="4" <?php echo $projeto['status_construcao'] == 4 ? 'selected' : ''; ?>>Obras Concluídas</option>
            </select>
          </div>
          <div class="formItens col-12 col-md-6">
            <label class="d-block" for="status_venda">Status de Venda:</label>
            <select name="status_venda" id="status_venda">
              <option value="">Escolha o status</option>
              <option value="1" <?php echo $projeto['status_venda'] == 1 ? 'selected' : ''; ?>>Compre Já</option>
              <option value="2" <?php echo $projeto['status_venda'] == 2 ? 'selected' : ''; ?>>Últimas Unidades</option>
              <option value="3" <?php echo $projeto['status_venda'] == 3 ? 'selected' : ''; ?>>100% Vendido</option>
            </select>
          </div>
        </div>
        <div class="formItens w-100 my-4">
          <label class="d-block" for="descricao_projeto">Descrição:</label>
          <textarea name="descricao_projeto" id="descricao_projeto"><?php echo htmlspecialchars($projeto['descricao_projeto'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div class="formItens w-100 my-4">
          <label class="d-block" for="carac_projeto">Características:</label>
          <div id="caracteristicas">
            <?php
            foreach ($caracteristicas as $carac) {
              echo '<div class="textarea-group mt-2">';
              echo '  <textarea name="carac_projeto[]" class="carac_projeto" placeholder="Características do Projeto">' . htmlspecialchars($carac, ENT_QUOTES, 'UTF-8') . '</textarea>';
              echo '  <button type="button" class="btn btn-danger removeCaracteristica mt-2">Remover</button>';
              echo '</div>';
            }
            ?>
          </div>
          <button type="button" id="addCaracteristica" class="btn btn-secondary mt-2">Adicionar Característica</button>
        </div>
        <div class="form-group formItens formImg w-100">
          <label for="imagem">Galeria de Imagens:</label>
          <div class="maisAtualizar" id="addImage"><i class="me-3 bi bi-plus-circle"></i> Adicionar Imagem</div>
          <div id="extraImages" class="col-12 col-md-6 w-100">
            <?php
            foreach ($imagens as $index => $imagem) {
              echo '<div class="form-group formItens formImg w-100">';
              echo '  <div class="input-group mt-2">';
              echo '    <input type="text" class="form-control" id="imagem' . ($index + 1) . '" name="imagem[]" required readonly value="' . htmlspecialchars($imagem, ENT_QUOTES, 'UTF-8') . '" placeholder="Clique no ícone e escolha a imagem">';
              echo '    <div class="input-group-append">';
              echo '      <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput(\'imagem' . ($index + 1) . '\')"><i class="bi bi-image"></i></button>';
              echo '    </div>';
              echo '    <div class="ms-3 mais"><i class="bi bi-dash-circle removeImage" style="cursor: pointer;"></i></div>';
              echo '  </div>';
              echo '</div>';
            }
            ?>
          </div>
        </div>
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
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                alignleft aligncenter alignright alignjustify | \
                bullist numlist outdent indent | removeformat | help'
      });
    }

    $(document).ready(function () {
      // Initialize TinyMCE for existing textareas
      initializeTinyMCE('#descricao_projeto');
      $('.carac_projeto').each(function () {
        initializeTinyMCE('#' + $(this).attr('id'));
      });

      // Add new characteristic textarea
      $('#addCaracteristica').click(function () {
        var id = 'carac_projeto_' + Math.random().toString(36).substring(7);
        var newCaracteristica = `<div class="textarea-group mt-2">
                                   <textarea id="${id}" name="carac_projeto[]" class="carac_projeto" placeholder="Características do Projeto"></textarea>
                                   <button type="button" class="btn btn-danger removeCaracteristica mt-2">Remover</button>
                                 </div>`;
        $('#caracteristicas').append(newCaracteristica);
        initializeTinyMCE('#' + id);
      });

      // Remove characteristic textarea
      $(document).on('click', '.removeCaracteristica', function () {
        $(this).parent('.textarea-group').remove();
      });

      // Add new image input
      $('#addImage').click(function () {
        var id = 'imagem' + ($('.formItens.formImg .input-group').length + 1);
        var newImage = `<div class="form-group formItens formImg w-100">
                          <div class="input-group mt-2">
                            <input type="text" class="form-control" id="${id}" name="imagem[]" required readonly placeholder="Clique no ícone e escolha a imagem">
                            <div class="input-group-append">
                              <button type="button" class="btnAddImage" data-toggle="modal" data-target="#fileManagerModal" onclick="setCurrentInput('${id}')"><i class="bi bi-image"></i></button>
                            </div>
                            <div class="ms-3 mais"><i class="bi bi-dash-circle removeImage" style="cursor: pointer;"></i></div>
                          </div>
                        </div>`;
        $('#extraImages').append(newImage);
      });

      // Remove image input
      $(document).on('click', '.removeImage', function () {
        $(this).closest('.form-group').remove();
      });
    });
  </script>
<?php
  require_once "../templates/backoffice/footer.php";
}
?>
