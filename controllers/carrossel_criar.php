<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $img_carrossel = filter_input(INPUT_POST, 'img_carrossel');
    $id_projeto = filter_input(INPUT_POST, 'id_projeto');


    $query = "INSERT INTO carrossel (img_carrossel, id_projeto)
          VALUES (?, ?)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $img_carrossel);
    $stmt->bindParam(2, $id_projeto);
    if ($stmt->execute()) {
        header('Location:' . url_generate(['route' => 'carrossel']));
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&criarCondominio='. false);
        exit;
    }
}