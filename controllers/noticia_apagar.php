<?php
require_once '../config.php';

if (isset($_GET['id'])) {
    $id_noticia = $_GET['id'];

    $query = "DELETE FROM noticias WHERE id_noticia = ?";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $id_noticia);

    if ($stmt->execute()) {
      header('Location:' . PAGE_URL . '?area=admin&route=noticias');
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&apagarCondominio='. false);
        exit;
    }
}