<?php
    $query = 'SELECT * FROM contatos;';
    $sql = $pdo->prepare($query);

    if ($sql->execute()) {
        $contatos = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        $contatos = [];
    }


