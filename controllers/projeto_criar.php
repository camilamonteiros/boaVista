<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $nome_projeto = $_POST['nome_projeto'];
  $img_capa = $_POST['img_capa'];
  $status_construcao = $_POST['status_construcao'];
  $status_venda = $_POST['status_venda'];
  $descricao_projeto = $_POST['descricao_projeto'];
  $carac_projeto = $_POST['carac_projeto']; // Capturar como array
  $imagens = $_POST['imagem']; // Capturar como array
  $criado_por = $_SESSION['id_usuario'];
  $atualizado_por = $criado_por;
  $banner_projeto = $_POST['banner_projeto'];

  $query = "INSERT INTO projetos (status_construcao, status_venda, img_capa, criado_por, atualizado_por, nome_projeto, descricao_projeto, banner_projeto) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$status_construcao, $status_venda, $img_capa, $criado_por, $atualizado_por, $nome_projeto, $descricao_projeto, $banner_projeto]);

  $id_projeto = $pdo->lastInsertId();

  $query_imagens = "INSERT INTO galerias_projetos (imagem, id_projeto) VALUES (?, ?)";
  $stmt_imagens = $pdo->prepare($query_imagens);

  // Inserir múltiplas imagens
  foreach ($imagens as $imagem) {
    $stmt_imagens->execute([$imagem, $id_projeto]);
  }

  $query_caracteristicas = "INSERT INTO carac_projetos (caracteristica, id_projeto) VALUES (?, ?)";
  $stmt_caracteristicas = $pdo->prepare($query_caracteristicas);

  // Inserir múltiplas características
  foreach ($carac_projeto as $carac) {
    $stmt_caracteristicas->execute([$carac, $id_projeto]);
  }

  // Fechar a conexão
  $pdo = null;

  header('Location:' . url_generate(['route' => 'projetos']));
  exit();
}
?>
