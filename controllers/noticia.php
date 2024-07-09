<?php
if (isset($_GET['id'])) {
    $query = 'SELECT * FROM noticias WHERE id_noticia = ? ORDER BY data_noticia ASC;';
    $sql = $pdo->prepare($query);

    if ($sql->execute([$_GET['id']])) {
        $news = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        $news = [];
    }
}elseif(!isset($_GET['route']) || (isset($_GET['route']) && $_GET['route'] === 'home')){
    $query = 'SELECT * FROM noticias ORDER BY data_noticia ASC LIMIT 3;';
    $sql = $pdo->prepare($query);

    if ($sql->execute()) {
        $news = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $news = [];
    }
}else{
    $query = 'SELECT * FROM noticias;';
    $sql = $pdo->prepare($query);

    if ($sql->execute()) {
        $news = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $news = [];
    }
     json_encode($news);
}
