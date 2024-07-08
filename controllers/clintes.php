<?php
 $query = 'SELECT * FROM clientes ORDER BY data_noticia ASC;';
 $sql = $pdo->prepare($query);

 if ($sql->execute()) {
     $news = $sql->fetchAll(PDO::FETCH_ASSOC);
 } else {
     $news = [];
 }