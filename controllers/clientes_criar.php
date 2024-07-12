<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $email = filter_input(INPUT_POST, 'email');
    $setor = filter_input(INPUT_POST, 'setor');
    $assunto = filter_input(INPUT_POST, 'assunto');
    $mensagem = filter_input(INPUT_POST, 'mensagem');
    $privacidadeValue = filter_input(INPUT_POST, 'privacidade');
    if ($privacidadeValue === 'on') {
        $privacidade = 1;
    } else {
        $privacidade = 0;
    }

    $query = "INSERT INTO clientes (nome, telefone, email, setor, assunto, mensagem, privacidade)
          VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $telefone);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $setor);
    $stmt->bindParam(5, $assunto);
    $stmt->bindParam(6, $mensagem);
    $stmt->bindParam(7, $privacidade);
    if ($stmt->execute()) {
        header('Location:' . url_generate(['route' => 'contatos']));
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&criarCondominio=' . false);
        exit;
    }
}
