<?php
if (isset($_GET['id'])) {
    $id_projeto = $_GET['id'];

  try {
    $pdo->beginTransaction();

    $query_delete_imagens = "DELETE FROM galerias_projetos WHERE id_projeto = ?";
    $stmt_delete_imagens = $pdo->prepare($query_delete_imagens);
    $stmt_delete_imagens->execute([$id_projeto]);

    $query_delete_caracteristicas = "DELETE FROM carac_projetos WHERE id_projeto = ?";
    $stmt_delete_caracteristicas = $pdo->prepare($query_delete_caracteristicas);
    $stmt_delete_caracteristicas->execute([$id_projeto]);

    $query_delete_projeto = "DELETE FROM projetos WHERE id_projeto = ?";
    $stmt_delete_projeto = $pdo->prepare($query_delete_projeto);
    $stmt_delete_projeto->execute([$id_projeto]);

    $pdo->commit();
    header('Location:' . PAGE_URL . '?area=admin&route=projetos' . '&status=success');
    exit();

  } catch (Exception $e) {
    $pdo->rollBack();

    header('Location:' . PAGE_URL . '?area=admin&route=projetos' . '&status=error');
    exit();
  }

} else {
  header('Location:' . PAGE_URL . '?area=admin&route=projetos');
  exit();
}
?>
