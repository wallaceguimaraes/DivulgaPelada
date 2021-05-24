## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

Technologies in project:

Composer version 1.10.15
BootstrapCDN version 4.6
Laravel version 4.2.5
PHP version 8.0.6
MYSQL version

Download and install Xampp in site:

https://www.apachefriends.org/pt_br/download.html

Install Composer in comand line:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"


Install Laravel in comand line:

To configure file .env

DB_CONNECTION=MYSQL
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=divulgapelada
DB_USERNAME=root
DB_PASSWORD=

To use the JWT token install JWT in comand line:

composer require tymon/jwt-auth:dev-develop --prefer-source


