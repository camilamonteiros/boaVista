<?php
require_once '../config.php';

if (isset($_GET['id'])) {
    $id_carrossel = $_GET['id'];

    $query = "DELETE FROM carrossel WHERE id_carrossel = ?";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $id_carrossel);

    if ($stmt->execute()) {
      header('Location:' . PAGE_URL . '?area=admin&route=carrossel');
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&apagarCondominio='. false);
        exit;
    }
}