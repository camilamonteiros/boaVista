<?php
function url_generate($values, $keep_id = false, $keep_page = false) {
    // Merge GET parameters with the new values
    $urlQueryString = array_merge($_GET, $values);

    // Remove the 'id' parameter if $keep_id is false
    if (!$keep_id) {
        unset($urlQueryString['id']);
    }
    if (!$keep_page) {
        unset($urlQueryString['page']);
    }

    // Return the new URL query string
    return '?' . http_build_query($urlQueryString);
}

function url_redirect($values = []) {
    header('Location: '. PAGE_URL . url_generate($values));
    exit; 
}