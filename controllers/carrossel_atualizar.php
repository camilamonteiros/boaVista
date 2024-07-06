<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $img_carrossel = filter_input(INPUT_POST, 'img_carrossel');
    $id_projeto = filter_input(INPUT_POST, 'id_projeto');
    $id_carrossel = $_GET['id'];


    $query = "UPDATE carrossel SET img_carrossel = ?, id_projeto = ? WHERE id_carrossel = ? ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $img_carrossel);
    $stmt->bindParam(2, $id_projeto);
    $stmt->bindParam(3, $id_carrossel);

    if ($stmt->execute()) {
      header('Location:' . PAGE_URL . '?area=admin&route=carrossel');
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&atualizarCondominio='. false);
        exit;
    }
}