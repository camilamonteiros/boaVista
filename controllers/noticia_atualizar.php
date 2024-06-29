<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $titulo = filter_input(INPUT_POST, 'titulo');
    $img_capa = filter_input(INPUT_POST, 'img_capa');
    $data_noticia = filter_input(INPUT_POST, 'data_noticia');
    $descricao_noticia = filter_input(INPUT_POST, 'descricao_noticia');
    $atualizado_por = $_SESSION['id_usuario'];
    $id_noticia = $_GET['id'];


    $query = "UPDATE noticias SET titulo = ?, img_capa = ?, data_noticia = ?, descricao_noticia = ?, atualizado_por = ?, atualizado_em = NOW() WHERE id_noticia = ? ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $titulo);
    $stmt->bindParam(2, $img_capa);
    $stmt->bindParam(3, $data_noticia);
    $stmt->bindParam(4, $descricao_noticia);
    $stmt->bindParam(5, $atualizado_por);
    $stmt->bindParam(6, $id_noticia);

    if ($stmt->execute()) {
      header('Location:' . PAGE_URL . '?area=admin&route=noticias');
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&atualizarCondominio='. false);
        exit;
    }
}