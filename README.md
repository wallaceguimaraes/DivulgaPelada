# DivulgaPelada
Aplicativo web desenvolvido com Laravel 4.2.5, com ele é possível cadastrar várias 'peladas' e convidar outros usuários que também se cadastraram no app.

Version Composer in project: 1.10.15
BootstrapCDN 4.6

Install Composer:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

Install Laravel

composer global require laravel/installer

CREATE LARAVEL PROJECT

laravel new my-project

To Configure file .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=divulgapelada
DB_USERNAME=root
DB_PASSWORD=


Install JWT

composer require tymon/jwt-auth:dev-develop --prefer-source

Case memory limit excedded, run comand line to verify memory limit size:
php -r "echo ini_get('memory_limit').PHP_EOL;"

After, set value in file pnp.ini:
memory_limit=2G

You need to publish the config file for JWT using the following command:

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

When that is done, set the jwt-auth secret by running the following command:

php artisan jwt:secret
