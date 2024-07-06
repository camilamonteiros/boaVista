<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_quemSomos = filter_input(INPUT_POST, 'id_quemSomos');
    $nossa_historia = filter_input(INPUT_POST, 'nossa_historia');
    $obra_limpa = filter_input(INPUT_POST, 'obra_limpa');
    $missao = filter_input(INPUT_POST, 'missao');
    $visao = filter_input(INPUT_POST, 'visao');
    $valores = filter_input(INPUT_POST, 'valores');


    $query = "UPDATE quem_somos SET nossa_historia = ?, obra_limpa = ?, missao = ?, visao = ?, valores = ? WHERE id_quemSomos = ? ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $nossa_historia);
    $stmt->bindParam(2, $obra_limpa);
    $stmt->bindParam(3, $missao);
    $stmt->bindParam(4, $visao);
    $stmt->bindParam(5, $valores);
    $stmt->bindParam(6, $id_quemSomos);

    if ($stmt->execute()) {
      header('Location:' . PAGE_URL . '?area=admin&route=quemSomos');
        exit;
    } else {
        $pdo->rollBack();
        header('Location:' . PAGE_URL . '?route=admin/condominio&atualizarCondominio='. false);
        exit;
    }
}