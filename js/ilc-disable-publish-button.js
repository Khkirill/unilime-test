jQuery(document).ready(function($) {
    // Функция для проверки количества внутренних ссылок
    function checkInternalLinksCount() {
        var content = $('#content').val(); // Замените #content на соответствующий селектор поля содержимого

        // Выполните AJAX-запрос для подсчета внутренних ссылок на сервере
        $.ajax({
            url: ilc_ajax_object.ajaxurl, // Используем локализованный AJAX URL
            type: 'POST',
            data: {
                action: 'ilc_count_internal_links', // Название действия обработчика AJAX
                content: content // Передаем содержимое записи/страницы
            },
            success: function(response) {
                var internalLinksCount = parseInt(response); // Получаем количество внутренних ссылок

                // Получаем минимальное количество ссылок из локализованных переменных
                var minLinks = $('#post_type').val() === 'post' ? ilc_ajax_object.min_post_links : ilc_ajax_object.min_page_links;

                // Если количество внутренних ссылок меньше минимального значения, блокируем кнопки "Обновить" и "Опубликовать"
                if (internalLinksCount < minLinks) {
                    $('#publish').prop('disabled', true); // Заблокировать кнопку "Опубликовать"
                    $('#save-post').prop('disabled', true); // Заблокировать кнопку "Обновить"
                    if ($('.ilc-warning-message').length === 0) {
                        $('#publish').after('<span class="ilc-warning-message">Недостаточно внутренних ссылок</span>'); // Добавить сообщение, если его нет
                    }
                } else {
                    $('#publish').prop('disabled', false); // Разблокировать кнопку "Опубликовать"
                    $('#save-post').prop('disabled', false); // Разблокировать кнопку "Обновить"
                    $('.ilc-warning-message').remove(); // Удалить сообщение, если оно было
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error); // Логирование ошибок AJAX
            }
        });
    }

    // Вызываем функцию при изменении содержимого поля или загрузке страницы
    $('#content').on('input', function() {
        checkInternalLinksCount(); // Проверка при изменении содержимого
    });

    // Вызываем функцию при загрузке страницы
    $(window).on('load', function() {
        checkInternalLinksCount(); // Проверка при загрузке
    });
});
