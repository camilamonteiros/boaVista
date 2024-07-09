<?php
function url_generate($values, $keep_id = false, $keep_page = false, $keep_order = false) {
    $urlQueryString = array_merge($_GET, $values);

    if (!$keep_id) {
        unset($urlQueryString['id']);
    }
    if (!$keep_page) {
        unset($urlQueryString['page']);
    }
    if (!$keep_order) {
        unset($urlQueryString['ordenar']);
    }
    return '?' . http_build_query($urlQueryString);
}

function url_redirect($values = []) {
    header('Location: '. PAGE_URL . url_generate($values));
    exit; 
}