<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// // Verifica se a rota é para o FileGator antes de iniciar a sessão
if (isset($_GET['route']) && $_GET['route'] == 'tfm') {
    header('Location: plugins/tinyfilemanager/tinyfilemanager.php?p=' . $_GET['p']);
    exit();
}

session_start();

require_once '../config.php';
require_once '../functions/url.php';
require_once '../functions/menssage.php';
require_once '../functions/auth.php';
require_once '../functions/caracther.php';
require_once '../functions/format.php';

if (empty($_GET['route'])) {
    $page = 'home';
} else {
    $page = $_GET['route'];
}

if (!empty($_GET['area']) && $_GET['area'] == 'admin') {
    $layout_folder = 'backoffice';
} else {
    $layout_folder = 'frontoffice';
}

// Função para encontrar o template correto ou o controller correto
function find_file($base_dir, $route, $is_controller = false) {
    $path_parts = explode('/', $route);
    $current_path = $base_dir;

    foreach ($path_parts as $part) {
        $current_path .= '/' . $part;
    }

    if ($is_controller) {
        // Verifica se o caminho encontrado é um arquivo de controller
        if (is_file($current_path . '.php')) {
            return $current_path . '.php';
        }
    } else {
        // Verifica se o caminho encontrado é um arquivo de template
        if (is_file($current_path . '.php')) {
            return $current_path . '.php';
        }

        // Verifica se existe um index.php na última pasta
        if (is_dir($current_path) && is_file($current_path . '/index.php')) {
            return $current_path . '/index.php';
        }
    }

    return false;
}

// Determinar se a rota é para um controller
$is_controller = false;
if (strpos($page, 'controllers/') === 0) {
    $is_controller = true;
    $controller_base_dir = '../controllers';
    $controller_route = str_replace('controllers/', '', $page);
    $page_file = find_file($controller_base_dir, $controller_route, true);
} else {
    $template_base_dir = '../templates/' . $layout_folder;
    $page_file = find_file($template_base_dir, $page);
}

// Adicionar logs para depuração
error_log("Base directory: " . ($is_controller ? $controller_base_dir : $template_base_dir));
error_log("Route: " . $page);
error_log("Computed file path: " . $page_file);

if ($page_file) {
    require_once $page_file;
} else {
    require_once '../templates/' . $layout_folder . '/page_not_found.php';
}
