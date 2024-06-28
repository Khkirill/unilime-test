<?php
// Добавление страницы в админке
function ilc_add_admin_page() {
    add_menu_page(
        'Internal Link Checker',
        'Internal Link Checker',
        'manage_options',
        'ilc-admin-page',
        'ilc_render_admin_page',
        'dashicons-admin-links',
        6
    );
}
add_action('admin_menu', 'ilc_add_admin_page');

// Функция для отображения страницы в админке
function ilc_render_admin_page() {
    ?>
    <div class="wrap">
        <h1>Internal Link Checker Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ilc_settings_group');
            do_settings_sections('ilc-admin-page');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Регистрация настроек
function ilc_register_settings() {
    register_setting('ilc_settings_group', 'ilc_settings');

    add_settings_section(
        'ilc_settings_section',
        'Настройки минимального количества ссылок',
        null,
        'ilc-admin-page'
    );

    add_settings_field(
        'min_post_links',
        'Минимальное количество ссылок для постов',
        'ilc_min_post_links_callback',
        'ilc-admin-page',
        'ilc_settings_section'
    );

    add_settings_field(
        'min_page_links',
        'Минимальное количество ссылок для страниц',
        'ilc_min_page_links_callback',
        'ilc-admin-page',
        'ilc_settings_section'
    );
}
add_action('admin_init', 'ilc_register_settings');

// Callback функции для вывода полей настроек
function ilc_min_post_links_callback() {
    $options = get_option('ilc_settings');
    $min_post_links = isset($options['min_post_links']) ? $options['min_post_links'] : DEFAULT_MIN_POST_LINKS;
    echo '<input type="number" name="ilc_settings[min_post_links]" value="' . esc_attr($min_post_links) . '">';
}

function ilc_min_page_links_callback() {
    $options = get_option('ilc_settings');
    $min_page_links = isset($options['min_page_links']) ? $options['min_page_links'] : DEFAULT_MIN_PAGE_LINKS;
    echo '<input type="number" name="ilc_settings[min_page_links]" value="' . esc_attr($min_page_links) . '">';
}