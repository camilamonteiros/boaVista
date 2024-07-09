<?php
require_once "header.php";

$ordenar = isset($_GET['ordenar']) ? $_GET['ordenar'] : 'data_desc';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$results_per_page = 9;
$offset = ($page - 1) * $results_per_page;

switch ($ordenar) {
    case 'data_asc':
        $orderBy = 'data_noticia ASC';
        break;
    case 'titulo_asc':
        $orderBy = 'titulo ASC';
        break;
    case 'titulo_desc':
        $orderBy = 'titulo DESC';
        break;
    case 'data_desc':
    default:
        $orderBy = 'data_noticia DESC';
        break;
}

// Primeiro, pegamos o número total de notícias para calcular o número de páginas
$queryTotal = "SELECT COUNT(*) as total FROM noticias;";
$sqlTotal = $pdo->prepare($queryTotal);
$sqlTotal->execute();
$totalNoticias = $sqlTotal->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($totalNoticias / $results_per_page);

// Consulta para pegar as notícias da página atual
$query = "SELECT * FROM noticias ORDER BY $orderBy LIMIT :limit OFFSET :offset;";
$sql = $pdo->prepare($query);
$sql->bindValue(':limit', $results_per_page, PDO::PARAM_INT);
$sql->bindValue(':offset', $offset, PDO::PARAM_INT);

if ($sql->execute()) {
    $news = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    $news = [];
}
?>

<main class="container">
  <section class="row filterOptions g-4 align-items-end">
    <div class="col-md-4 filtragemBox">
      <label class="d-block" for="ordenar_noticias">Ordenar:</label>
      <div class="input-group filtragem">
        <span class="input-group-text" id="ordenar_noticias_label"><i class="bi bi-arrow-left-right"></i></span>
        <select id="ordenar_noticias" class="form-control" aria-label="ordenar_noticias" aria-describedby="ordenar_noticias_label" onchange="ordenarNoticias()">
          <option value="data_desc" <?php echo $ordenar == 'data_desc' ? 'selected' : ''; ?>>Mais Recente - Mais Antigo</option>
          <option value="data_asc" <?php echo $ordenar == 'data_asc' ? 'selected' : ''; ?>>Mais Antigo - Mais Recente</option>
          <option value="titulo_asc" <?php echo $ordenar == 'titulo_asc' ? 'selected' : ''; ?>>A - Z</option>
          <option value="titulo_desc" <?php echo $ordenar == 'titulo_desc' ? 'selected' : ''; ?>>Z - A</option>
        </select>
      </div>
    </div>
  </section>
  <section class="row">
    <div class="cards-destaque d-flex flex-wrap justify-content-center justify-content-md-between">
      <?php foreach ($news as $noticia) { ?>
        <div class="card-noticia noticia col-12 col-md-4">
          <div class="img-card-noticia">
            <img src="<?php echo ($noticia['img_capa']) ?>" alt="">
          </div>
          <div class="texto-card-noticia d-flex flex-column">
            <h3><?php echo ($noticia['titulo']) ?></h3>
            <span class="data-noticia"><?php echo (formatarData($noticia['data_noticia'])) ?></span>
            <div class="linhaCard"></div>
            <div class="texto" id="texto"><?php echo ($noticia['descricao_noticia']) ?></div>
            <a class="align-self-center" href="<?php echo url_generate(['route' => 'noticia', 'id' => $noticia['id_noticia']], true); ?>"><button class="botaoVerde">+ Ver Mais</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <section class="row">
    <div class="col-12">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <?php if ($page > 1): ?>
            <li class="page-item"><a class="page-link" href="?route=noticiasEventos&page=<?php echo $page - 1; ?>&ordenar=<?php echo $ordenar; ?>"><i class="bi bi-chevron-left"></i></a></li>
          <?php endif; ?>
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="?route=noticiasEventos&page=<?php echo $i; ?>&ordenar=<?php echo $ordenar; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
          <?php if ($page < $totalPages): ?>
            <li class="page-item"><a class="page-link" href="?route=noticiasEventos&page=<?php echo $page + 1; ?>&ordenar=<?php echo $ordenar; ?>"><i class="bi bi-chevron-right"></i></a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </section>
</main>

<script>
  function ordenarNoticias() {
    const ordenar = document.getElementById('ordenar_noticias').value;
    if (ordenar) {
      const params = new URLSearchParams(window.location.search);
      params.set('ordenar', ordenar);
      params.set('page', '1');
      params.set('route', 'noticiasEventos');
      window.location.search = params.toString();
    } else {
      console.error('Valor de ordenação indefinido');
    }
  }
</script>

<?php
require_once "footer.php";
?>
