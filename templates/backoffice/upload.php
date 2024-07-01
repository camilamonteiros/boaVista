<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Upload de Imagens</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
</head>
<body>
    <h1>Upload de Imagens</h1>
    <form action="<?= url_generate(['route' => 'admin/upload']) ?>" class="dropzone" id="myDropzone"></form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
</body>
</html>
