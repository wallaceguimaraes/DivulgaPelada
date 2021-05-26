## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

Technologies in project:

Composer version 1.10.15
BootstrapCDN version 4.6
Laravel version 4.2.5
PHP version 8.0.6
MYSQL version 5.6

Download and install Xampp in site:

https://www.apachefriends.org/pt_br/download.html

Install Composer in comand line:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"


Install Laravel in comand line:

To configure file .env

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:0w1FIY2Pztkypn+owt0I5dST33KDfOyG5E8bw1cajCw=
APP_DEBUG=true
APP_URL=http://divulgapelada.test

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=divulgapelada
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

JWT_SECRET=CR6WXQvpIwBaUPcDnEuKHUrn2QIoFHcuk8NgTs6QfSQGwmvkxsqEdh5Xmhf2QYZi



To use the JWT token install JWT in comand line:

composer require tymon/jwt-auth:dev-develop --prefer-source

Case memory limit excedded, run comand line to verify memory limit size:

php -r"echo ini_get('memory_limit').PHP_EQL;"

After, set value in file php.ini:
memory_limit=2G

You need to publish the config file for JWT using the following comand:
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

When that is done, set the jwt-auth secret by running the following comand:

php artisan jwt:secret


