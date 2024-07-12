<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $endereco = filter_input(INPUT_POST, 'endereco');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $instagram = filter_input(INPUT_POST, 'instagram');
    $facebook = filter_input(INPUT_POST, 'facebook');
    $whatsapp = filter_input(INPUT_POST, 'whatsapp');
    $email_form = filter_input(INPUT_POST, 'email_form');
    $atualizado_por = $_SESSION['id_usuario'];
    $id_contatos = filter_input(INPUT_POST, 'id_contatos');


    $query = "UPDATE contatos SET endereco = ?, telefone = ?, instagram = ?, facebook = ?, whatsapp = ?, email_form =?, atualizado_por = ?, atualizado_em = NOW() WHERE id_contatos = ? ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $endereco);
    $stmt->bindParam(2, $telefone);
    $stmt->bindParam(3, $instagram);
    $stmt->bindParam(4, $facebook);
    $stmt->bindParam(5, $whatsapp);
    $stmt->bindParam(6, $email_form);
    $stmt->bindParam(7, $atualizado_por);
    $stmt->bindParam(8, $id_contatos);

    if ($stmt->execute()) {
      header('Location:' . PAGE_URL . '?area=admin&route=contatos');
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&atualizarCondominio='. false);
        exit;
    }
}