Имитация чата, общение с сервером посредством AJAX с сохранением сообщений в БД.
===

Приложение написано на Laravel

## Особенности приложения:
* Отправка на сервер сообщений и получение сгенерированных сервером сообщений.
* AJAX взаимодействие с сервером.
* Просмотр всех сообщений на отдельной странице. Хранение сообщений в БД (изначально SQLite).

--

## Установка

Склонировать репозиторий

Начальная установка
```sh
composer install
cp .env.example .env
php artisan key:generate
```
Создание БД
```sh
touch database/database.sqlite
chmod o+w database database/database.sqlite
```
Настройка файла .env
```sh
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```
Миграция
```sh
php artisan migrate
```
Донастройка
```sh
chmod o+w storage bootstrap/cache
```
--

## Автор

Зырянов Константин Викторович
konstantinzirjanov@gmail.com