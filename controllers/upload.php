<?php
require_once '../config.php'; // Ajuste o caminho conforme necessário

$targetDir = "../public/uploads/";
$targetFile = $targetDir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

$check = getimagesize($_FILES["file"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo json_encode(["error" => "Arquivo não é uma imagem."]);
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo json_encode(["error" => "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos."]);
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo json_encode(["error" => "Desculpe, seu arquivo não foi enviado."]);
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo json_encode(["path" => "uploads/" . basename($_FILES["file"]["name"])]);
    } else {
        echo json_encode(["error" => "Desculpe, ocorreu um erro ao enviar seu arquivo."]);
    }
}
?>
