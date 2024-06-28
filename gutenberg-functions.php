<?php



// Отключение Gutenberg для всех типов постов
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Отключение стилей Gutenberg
function disable_gutenberg_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // WooCommerce блоки
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront тема блоки
}
add_action('wp_enqueue_scripts', 'disable_gutenberg_styles', 100);


