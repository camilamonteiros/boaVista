<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // O ID do projeto vem da URL
  $id_projeto = $_GET['id'];

  $nome_projeto = $_POST['nome_projeto'];
  $img_capa = $_POST['img_capa'];
  $status_construcao = $_POST['status_construcao'];
  $status_venda = $_POST['status_venda'];
  $descricao_projeto = $_POST['descricao_projeto'];
  $carac_projeto = $_POST['carac_projeto']; // Capturar como array
  $imagens = $_POST['imagem']; // Capturar como array
  $atualizado_por = $_SESSION['id_usuario'];
  $banner_projeto = $_POST['banner_projeto'];

  // Atualizar os dados do projeto na tabela `projetos`
  $query = "UPDATE projetos SET 
              status_construcao = ?, 
              status_venda = ?, 
              img_capa = ?, 
              atualizado_por = ?, 
              nome_projeto = ?, 
              descricao_projeto = ?, 
              banner_projeto = ?
            WHERE id_projeto = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$status_construcao, $status_venda, $img_capa, $atualizado_por, $nome_projeto, $descricao_projeto, $banner_projeto, $id_projeto]);

  // Remover as imagens antigas associadas ao projeto
  $query_delete_imagens = "DELETE FROM galerias_projetos WHERE id_projeto = ?";
  $stmt_delete_imagens = $pdo->prepare($query_delete_imagens);
  $stmt_delete_imagens->execute([$id_projeto]);

  // Inserir as novas imagens
  $query_imagens = "INSERT INTO galerias_projetos (imagem, id_projeto) VALUES (?, ?)";
  $stmt_imagens = $pdo->prepare($query_imagens);

  foreach ($imagens as $imagem) {
    $stmt_imagens->execute([$imagem, $id_projeto]);
  }

  // Remover as características antigas associadas ao projeto
  $query_delete_caracteristicas = "DELETE FROM carac_projetos WHERE id_projeto = ?";
  $stmt_delete_caracteristicas = $pdo->prepare($query_delete_caracteristicas);
  $stmt_delete_caracteristicas->execute([$id_projeto]);

  // Inserir as novas características
  $query_caracteristicas = "INSERT INTO carac_projetos (caracteristica, id_projeto) VALUES (?, ?)";
  $stmt_caracteristicas = $pdo->prepare($query_caracteristicas);

  foreach ($carac_projeto as $carac) {
    $stmt_caracteristicas->execute([$carac, $id_projeto]);
  }

  // Fechar a conexão
  $pdo = null;

  // Redirecionar para a página de projetos
  header('Location:' . url_generate(['route' => 'projetos']));
  exit();
} else {
  // Se não for um POST, redirecionar para a página de projetos
  header('Location:' . url_generate(['route' => 'projetos']));
  exit();
}
?>
