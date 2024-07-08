<?php
require_once "header.php";
require_once "../controllers/projeto.php";
?>

<main class="container">
  <section class="row filterOptions g-4 align-items-end">
    <div class="col-md-4 filtragemBox">
      <label class="d-block" for="procurar_projeto">Pesquisar:</label>
      <div class="input-group filtragem">
        <span class="input-group-text" id="procurar_projeto"><i class="bi bi-search"></i></span>
        <input id="searchInput" type="text" class="form-control" placeholder="Nome do Condomínio" aria-label="procurar_projeto" aria-describedby="procurar_projeto">
      </div>
    </div>
    <div class="col-md-4 filtragemBox">
      <label class="d-block" for="filtrar_construcao">Filtrar:</label>
      <div class="input-group filtragem">
        <span class="input-group-text" id="filtrar_construcao"><i class="bi bi-buildings"></i></span>
        <select id="statusConstrucao" class="form-control" aria-label="filtrar_construcao" aria-describedby="procurar_projeto">
          <option value="">Status de Construção</option>
          <option value="1">Pré-Lançamento</option>
          <option value="2">Lançamento</option>
          <option value="3">Em Obras</option>
          <option value="4">Obras Concluídas</option>
        </select>
      </div>
    </div>
    <div class="col-md-4 filtragemBox">
      <div class="input-group filtragem">
        <span class="input-group-text" id="filtrar_venda"><i class="bi bi-houses"></i></span>
        <select id="statusVenda" class="form-control" aria-label="filtrar_venda" aria-describedby="procurar_projeto">
          <option value="">Status</option>
          <option value="1">Compre Já</option>
          <option value="2">Últimas Unidades</option>
          <option value="3">100% Vendido</option>
        </select>
      </div>
    </div>
  </section>
  <section class="row">
    <div id="projectContainer" class="cards-destaque d-flex flex-wrap justify-content-center justify-content-md-between">
      <?php foreach ($projetos as $projeto) { ?>
        <div class="card-noticia noticia col-12 col-md-4" data-nome="<?php echo strtolower($projeto['nome_projeto']) ?>" data-status-construcao="<?php echo $projeto['status_construcao'] ?>" data-status-venda="<?php echo $projeto['status_venda'] ?>">
          <div class="img-card-noticia">
            <img src="<?php echo ($projeto['img_capa']) ?>" alt="">
            <div class="tagVendas <?php if ($projeto['status_venda'] == 1) {
                                    echo "compreJa";
                                  } elseif ($projeto['status_venda'] == 2) {
                                    echo "ultimasUnidades";
                                  } else {
                                    echo "vendido";
                                  } ?>"></div>
          </div>
          <div class="texto-card-noticia d-flex flex-column">
            <h3><?php echo ($projeto['nome_projeto']) ?></h3>
            <div class="linhaCard"></div>
            <div class="tagConstrucao <?php if ($projeto['status_construcao'] == 1) {
                                        echo "preLancamento";
                                      } elseif ($projeto['status_construcao'] == 2) {
                                        echo "lancamento";
                                      } elseif ($projeto['status_construcao'] == 3) {
                                        echo "emObras";
                                      } else {
                                        echo "concluidas";
                                      } ?>"></div>
            <div class="texto"><?php echo ($projeto['descricao_projeto']) ?></div>
            <a class="align-self-center" href="<?php echo url_generate(['route' => 'projeto', 'id' => $projeto['id_projeto']], true); ?>"><button class="botaoVerde">+ Ver Mais</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php
      $totalPages = ceil($total / $perPage);
      for ($i = 1; $i <= $totalPages; $i++) {
        $active = $i == $page ? 'active' : '';
        echo "<li class='page-item $active'><a class='page-link' href='?route=projetos&page=$i'>$i</a></li>";
      }
      ?>
    </ul>
  </nav>
</main>

<?php
require_once "footer.php"
?>
