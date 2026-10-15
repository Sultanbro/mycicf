# Corporate Portal — Laravel & Vue

Корпоративный портал на **PHP / Laravel 6 и Vue 2**: справочник сотрудников, организационная структура, согласования, новости, документы, отчёты и внутренние баллы. В репозитории находятся backend, Blade-шаблоны, Vue-компоненты и административная часть.

## Основные модули

| Модуль | Где смотреть |
| --- | --- |
| Вход и сведения о сотруднике | [SiteController](app/Http/Controllers/SiteController.php) |
| Справочник коллег и структура | [ColleaguesController](app/Http/Controllers/ColleaguesController.php) |
| Согласования и вложения | [CoordinationController](app/Http/Controllers/CoordinationController.php) |
| Документация и новости | [DocumentationController](app/Http/Controllers/DocumentationController.php), [NewsController](app/Http/Controllers/NewsController.php) |
| Внутренние баллы и операции | [CentcoinsController](app/Http/Controllers/CentcoinsController.php) |
| Права и администрирование | [app/Http/Controllers/Admin](app/Http/Controllers/Admin) |
| Интерфейсы, в том числе мобильные | [resources/js/components](resources/js/components), [resources/views](resources/views) |
| Маршруты и middleware | [routes/web.php](routes/web.php), [app/Http/Middleware](app/Http/Middleware) |

## Технологии

- Laravel 6, PHP `^7.2` по `composer.json`, Eloquent, миграции.
- Vue 2, JavaScript, Blade, Sass, Laravel Mix 4.
- SOAP/XML-интеграции с корпоративной системой, HTTP-запросы.
- Excel, Pusher и Laravel Echo.

```text
Blade / Vue → Laravel routes → middleware → controller
                                            ├─ Eloquent / база
                                            └─ адаптер корпоративной системы / SOAP
```

Проект демонстрирует работу с существующей корпоративной инфраструктурой. Модули описаны по коду репозитория; это не перечень индивидуального авторства каждого компонента.

## Локальная подготовка

Исходный стек требует PHP 7.x с расширениями из `composer.json`, Composer, MySQL и Node.js для старой сборки Laravel Mix. Для рабочего входа и прикладных сценариев нужны локальные настройки либо тестовый аналог внешней корпоративной системы. Репозиторий не содержит самостоятельной демосреды с вымышленными данными.

```sh
git clone https://github.com/Sultanbro/mycicf.git
cd mycicf
cp .env.example .env
composer install
php artisan key:generate
```

Перед запуском настройте отдельную локальную базу `DB_*`, `APP_URL`, домены пользовательской и административной частей (`BACKEND_DOMAIN` и параметры в `routes/web.php`), а также используемые адаптерами интеграции. Не запускайте импорт и задачи интеграций с рабочими доступами ради просмотра проекта.

Миграции расположены в [database/migrations](database/migrations). Команды сборки интерфейса — `npm run development` и `npm run production`; зависимости и старый инструментарий указаны в `package.json`. Доступ к внешней системе не проверялся, поэтому эти шаги описывают подготовку, а не подтверждённый полный запуск.

## Для просмотра портфолио

Начните с маршрутов, контроллера согласований и Vue-компонентов: они показывают связи между интерфейсом, бизнес-операциями и внешней системой. Для проекта с самостоятельным запуском и автоматическими API-тестами см. [Post & Booking API](https://github.com/Sultanbro/post).

Обновление устаревших PHP/Laravel/Vue, изоляция корпоративных адаптеров и сквозные тесты необходимы перед новым производственным развёртыванием.

## Зависимости

Условия использования сторонних библиотек указаны в их пакетах и `composer.lock`. Laravel распространяется по лицензии MIT.
