<?php

// Вывод сообщения перед редактором записи (только для классического редактора)
function ilc_add_editor_notice() {
    global $post;

    // Проверяем, что это страница или пост
    if ($post && ($post->post_type == 'post' || $post->post_type == 'page')) {
        $content = $post->post_content;
        $internal_links = count_internal_links($content);
        $min_links = ilc_get_min_links($post->post_type);

        // Проверяем, если внутренних ссылок меньше, чем минимально требуемое количество
        if ($internal_links < $min_links) {
            echo '<div class="notice notice-warning is-dismissible"><p>Недостаточно внутренних ссылок. Пожалуйста, добавьте больше внутренних ссылок перед публикацией.</p></div>';
        }
    }
}

// Для классического редактора
add_action('admin_notices', 'ilc_add_editor_notice');


// Регистрация скрипта и локализация переменных для JavaScript
function ilc_enqueue_scripts() {
    wp_enqueue_script('ilc-disable-publish-button', plugins_url('/js/ilc-disable-publish-button.js', __FILE__), array('jquery'), null, true);

    // Получаем минимальное количество ссылок из настроек
    $options = get_option('ilc_settings');
    $min_post_links = isset($options['min_post_links']) ? $options['min_post_links'] : DEFAULT_MIN_POST_LINKS;
    $min_page_links = isset($options['min_page_links']) ? $options['min_page_links'] : DEFAULT_MIN_PAGE_LINKS;

    // Локализация переменных для JavaScript
    wp_localize_script('ilc-disable-publish-button', 'ilc_ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'min_post_links' => $min_post_links,
        'min_page_links' => $min_page_links,
    ));
}
add_action('admin_enqueue_scripts', 'ilc_enqueue_scripts');




