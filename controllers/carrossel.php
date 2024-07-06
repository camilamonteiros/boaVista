<?php
if (isset($_GET['route']) && $_GET['route'] === 'carrossel/criarCarrossel' ) {
  $query = 'SELECT projetos.*, carrossel.* FROM projetos LEFT JOIN carrossel ON projetos.id_projeto = carrossel.id_projeto;';
  $sql = $pdo->prepare($query);

  if ($sql->execute()) {
    $carrosseis = $sql->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $carrosseis = [];
  }
} elseif(isset($_GET['route']) && $_GET['route'] === 'carrossel/atualizarCarrossel' && isset($_GET['id'])){
  $query = 'SELECT projetos.*, carrossel.* FROM projetos LEFT JOIN carrossel ON projetos.id_projeto = carrossel.id_projeto WHERE carrossel.id_carrossel = ?;';
  $sql = $pdo->prepare($query);

  if (isset($_GET['id']) && $sql->execute([$_GET['id']])) {
    $carrossel = $sql->fetch(PDO::FETCH_ASSOC);
} else {
    $carrossel = [];
}
}

else {
  $query = 'SELECT projetos.*, carrossel.* FROM projetos INNER JOIN carrossel ON projetos.id_projeto = carrossel.id_projeto;';
  $sql = $pdo->prepare($query);

  if ($sql->execute()) {
    $carrosseis = $sql->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $carrosseis = [];
  }
}