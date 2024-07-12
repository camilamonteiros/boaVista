<?php
$query = 'SELECT nome, email, telefone
FROM clientes
WHERE id_cliente IN (
    SELECT MIN(id_cliente)
    FROM clientes
    GROUP BY email 
) ORDER BY nome ASC;';
$sql = $pdo->prepare($query);

if ($sql->execute()) {
    $clientes = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    $clientes = [];
}
