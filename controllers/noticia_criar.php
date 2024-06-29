<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = filter_input(INPUT_POST, 'titulo');
    $img_capa = filter_input(INPUT_POST, 'img_capa');
    $data_noticia = filter_input(INPUT_POST, 'data_noticia');
    $descricao_noticia = filter_input(INPUT_POST, 'descricao_noticia');
    $criado_por = $_SESSION['id_usuario'];
    $atualizado_por = $_SESSION['id_usuario'];


    $query = "INSERT INTO noticias (titulo, img_capa, data_noticia, descricao_noticia, criado_por, atualizado_por)
          VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $titulo);
    $stmt->bindParam(2, $img_capa);
    $stmt->bindParam(3, $data_noticia);
    $stmt->bindParam(4, $descricao_noticia);
    $stmt->bindParam(5, $criado_por);
    $stmt->bindParam(6, $atualizado_por);
    if ($stmt->execute()) {
        header('Location:' . url_generate(['route' => 'noticias']));
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&criarCondominio='. false);
        exit;
    }
}