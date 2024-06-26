<?php
session_start();

require_once '../config.php';
require_once '../functions/url.php';
require_once '../functions/menssage.php';
require_once '../functions/auth.php';
require_once '../functions/caracther.php';



if (empty($_GET['route'])){
    $page = 'home';
}else{
    $page = $_GET['route'];
}
if (!empty($_GET['area']) && $_GET['area'] == 'admin') {
    $layout_folder = 'backoffice';
} else {
    $layout_folder = 'frontoffice';
}
switch ($page) {
    case 'dashboard':
        require_once 'controllers/dashboard.php';
        break;

    case 'authenticate':
        require_once 'controllers/authenticate.php';
        break;

    case 'logout':
        require_once 'controllers/logout.php';
        break;
    
    default:
        break;
}

$page_template = '../templates/'.$layout_folder.'/' . $page . '.php';

if (file_exists($page_template)) {
    require_once $page_template;
} else {
    echo $page_template;
    require_once '../templates/'.$layout_folder.'/page_not_found.php';
}



?>