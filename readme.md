# Решение тестовой задачи

- git clone https://github.com/egolife/bart.git
- cd bart
- cp .env.example .env
- php artisan key:generate
- Создать базу
- Прописать доступы к базе в .env
- composer install
- php artisan migrate
- Настроить web-server или запустить php artisan serve
- Открыть в браузере страницу localhost:8000

- Для запуска тестов использовать команду vendor/bin/phpunit

С помощью фреймоворка Laravel (любой версии, лучше посденей) https://laravel.com/ реализовать следующий функционал:

Создать сайт со страницей на которой будет форма для приема заявки.

Заявка состоит из email’а и текста (необязательное поле, максимум 5000 символов)
Все заявки необходимо сохранять в базу данных, вместе с датой создания этой заявки и номером заявки (должен генерироваться автоматически).

В случае, если пользователь оставляет более одной заявки, то все предыдущие его заявки должны удаляться.

Также у пользователя должна быть возможность видеть  что он уже оставил заявку и ее номер.

Авторизация и регистрация пользователей не требуется. Предполагается что у пользователя самый современный браузер и исправно работаю cookies.

Выбор базы данных и необходимых компонентов на ваше усмотрение. 
Код и инструкцию по развертыванию необходимо залить в публичный репозиторий на Github или Bitbucked и выслать ссылку на it@batnorton.com с темой письма “Тестовое задание (Ваше имя)”


