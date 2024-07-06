<?php
if (isset($_GET['route']) && isset($_GET['id']) && $_GET['route'] !== 'carrossel/atualizarCarrossel') {
  $id_projeto = $_GET['id'];
  $projeto = null;
  $imagens = [];
  $caracteristicas = [];
  $error_message = '';
  
  try {
      // Consulta para obter informações do projeto
      $queryProjeto = "SELECT 
                         projetos.*, 
                         status_construcao.status_construcao AS status_construcao_nome,
                         status_construcao.tag_construcao,
                         status_venda.status_venda AS status_venda_nome,
                         status_venda.tag_venda
                       FROM 
                         projetos
                       JOIN 
                         status_construcao ON projetos.status_construcao = status_construcao.id_status_construcao
                       JOIN 
                         status_venda ON projetos.status_venda = status_venda.id_status_venda
                       WHERE 
                         projetos.id_projeto = :id_projeto";
      
      $stmtProjeto = $pdo->prepare($queryProjeto);
      $stmtProjeto->bindParam(':id_projeto', $id_projeto, PDO::PARAM_INT);
      $stmtProjeto->execute();
      $projeto = $stmtProjeto->fetch(PDO::FETCH_ASSOC);
      
      if (!$projeto) {
          $error_message = "Projeto não encontrado.";
      } else {
          // Consulta para obter imagens da galeria do projeto
          $queryImagens = "SELECT imagem FROM galerias_projetos WHERE id_projeto = :id_projeto";
          $stmtImagens = $pdo->prepare($queryImagens);
          $stmtImagens->bindParam(':id_projeto', $id_projeto, PDO::PARAM_INT);
          $stmtImagens->execute();
          $imagens = $stmtImagens->fetchAll(PDO::FETCH_COLUMN, 0);
          
          // Consulta para obter características do projeto
          $queryCaracteristicas = "SELECT caracteristica FROM carac_projetos WHERE id_projeto = :id_projeto";
          $stmtCaracteristicas = $pdo->prepare($queryCaracteristicas);
          $stmtCaracteristicas->bindParam(':id_projeto', $id_projeto, PDO::PARAM_INT);
          $stmtCaracteristicas->execute();
          $caracteristicas = $stmtCaracteristicas->fetchAll(PDO::FETCH_COLUMN, 0);
      }
  } catch (PDOException $e) {
      $error_message = "Erro ao obter dados do projeto: " . $e->getMessage();
  }
  $imagensJson = json_encode($imagens);
}else {
  $query = 'SELECT * FROM projetos;';
  $sql = $pdo->prepare($query);

  if ($sql->execute()) {
    $projetos = $sql->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $projetos = [];
  }
}
?>
