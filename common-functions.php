<?php

// Минимальные значения по умолчанию
define('DEFAULT_MIN_POST_LINKS', 3);
define('DEFAULT_MIN_PAGE_LINKS', 2);

// Функция для получения настроек минимального количества ссылок
function ilc_get_min_links($post_type) {
    $options = get_option('ilc_settings');
    if ($post_type == 'post') {
        return isset($options['min_post_links']) ? $options['min_post_links'] : DEFAULT_MIN_POST_LINKS;
    } elseif ($post_type == 'page') {
        return isset($options['min_page_links']) ? $options['min_page_links'] : DEFAULT_MIN_PAGE_LINKS;
    }
    return DEFAULT_MIN_POST_LINKS;
}


// Функция для подсчета внутренних ссылок
function count_internal_links($content) {
    if (empty($content)) {
        return 0;
    }
    
    // Используем HTML5-парсер для более надежной работы с HTML
    $internal_links = 0;
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);

    // Находим все ссылки и проверяем их href
    foreach ($xpath->query('//a') as $link) {
        $href = $link->getAttribute('href');
        if (strpos($href, home_url()) !== false) {
            $internal_links++;
        }
    }

    return $internal_links;
}

// Обработчик AJAX для подсчета внутренних ссылок
add_action('wp_ajax_ilc_count_internal_links', 'ilc_count_internal_links_callback');
function ilc_count_internal_links_callback() {
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $internal_links_count = count_internal_links($content); // Функция для подсчета внутренних ссылок

        echo $internal_links_count; // Возвращаем количество внутренних ссылок
    }
    wp_die();
}
