<?php
    $query = 'SELECT * FROM quem_somos;';
    $sql = $pdo->prepare($query);

    if ($sql->execute()) {
        $quemSomos = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        $quemSomos = [];
    }