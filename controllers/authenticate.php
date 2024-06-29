<?php
require_once '../config.php';
require_once '../functions/url.php';

if (empty($_POST['username']) || empty($_POST['senha'])) {
  set_flash_message("Todos os campos são de preenchimento obrigatório");
  url_redirect(['route' => 'login']);
  exit;
} else {
  $login = $_POST['username'];
  $password = $_POST['senha'];

  $query = "SELECT * FROM usuarios WHERE username = ?";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(1, $login);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    if (password_verify($password, $user['senha'])) {


      setcookie('id_usuario', $user['id_usuario'], time() + (24 * 3600), '/');
      setcookie('is_authenticated', 'true', time() + (24 * 3600), '/');
      $_SESSION['is_authenticated'] = true;
      $_SESSION['id_usuario'] = $user['id_usuario'];
    } else {
      echo ("Utilizador ou senha incorreta. Tente novamente.");
    }
  } else {
    echo "Utilizador não encontrado";
  }
  if ($_SESSION['is_authenticated'] === true) {
    url_redirect(['route' => 'carrossel']);
  }
}

//password_verify($password, $user['password']) 