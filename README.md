# Разработайте собственный плагин для WordPress на PHP

**Автор:** Kirill
**Теги:** внутренние ссылки, проверка ссылок, публикация, обновление, редактор блоков, классический редактор  
**Стабильная версия:** 1.0.0  
**URI лицензии:** https://www.gnu.org/licenses/gpl-2.0.html  

Плагин для подсчета количества внутренних ссылок на странице/записи и блокировки публикации/обновления, если количество внутренних ссылок ниже определенного числа.

## Описание

Этот плагин разработан для подсчета количества внутренних ссылок в содержимом страницы или записи WordPress. Если количество внутренних ссылок меньше определенного значения, плагин не позволит публиковать или обновлять страницу/запись и отобразит пользователю сообщение с просьбой добавить больше внутренних ссылок.

### Особенности
- Подсчитывает количество внутренних ссылок в содержимом страницы/записи.
- Блокирует публикацию или обновление, если количество внутренних ссылок ниже заданного минимума.
- Отображает сообщение с предупреждением и инструкциями под кнопкой "Опубликовать".


## Установка

1. Загрузите файлы плагина в каталог `/wp-content/plugins/your-plugin-name`.
2. Активируйте плагин через экран "Плагины" в WordPress.
3. Настройте минимальное количество внутренних ссылок в настройках плагина.

## Часто задаваемые вопросы

### Зачем нужно ограничение на количество внутренних ссылок?

Ограничение на количество внутренних ссылок помогает улучшить SEO вашего сайта, облегчая навигацию для пользователей и поисковых систем.

### Как настроить минимальное количество ссылок?

Вы можете настроить минимальное количество внутренних ссылок в настройках плагина после его активации.

### Можно ли отключить эту функцию?

Да, вы можете отключить эту функцию, деактивировав плагин.

## Журнал изменений

### 1.0.0
- Первоначальный выпуск.

## Уведомление об обновлении

### 1.0.0
- Первоначальный выпуск.

## Лицензия

Этот плагин лицензирован по GPLv2 или более поздней версии. Подробнее см. [GNU General Public License](https://www.gnu.org/licenses/gpl-2.0.html).

## Инструкция
![image](https://github.com/Khkirill/unilime-test/assets/97744368/ed210adb-85db-456c-8259-858a696690dc)
После активации плагина появится страница в админке WordPress под названием "Internal Link Checker"
![image](https://github.com/Khkirill/unilime-test/assets/97744368/aaa288f6-01f0-4af4-afbf-d56f984a17f3)
Перейдите на страницу плагина и установите минимальное количество ссылок для страниц и постов.
![image](https://github.com/Khkirill/unilime-test/assets/97744368/2a8701f5-8551-49ba-915e-ced50804495d)
![image](https://github.com/Khkirill/unilime-test/assets/97744368/1c34899a-d8a8-425d-a302-ec2c19680b61)
При попытке публикации или обновления записи, если количество внутренних ссылок ниже заданного минимума, появится сообщение: "Недостаточно внутренних ссылок. Пожалуйста, добавьте больше внутренних ссылок перед публикацией."
В случае недостаточного количества ссылок, кнопка "Обновить" будет заблокирована, и вы не сможете опубликовать запись или страницу, пока не добавите необходимые ссылки.
![image](https://github.com/Khkirill/unilime-test/assets/97744368/e406f1bd-55a0-49ee-bcef-44d9fb451557)
Если у вас уже были созданы записи или страницы, то после активации плагина вы не сможете их обновить, пока не добавите достаточное количество внутренних ссылок.




