# php-word-counter
Simple Word Counter API written in PHP/Symfony 4

## Setting up

- git clone https://github.com/ibosca/php-word-counter.git
- cd php-word-counter/
- composer install
- php bin/console server:run
- Access on http://127.0.0.1:8000

Note: Composer is required to setting up the project. Get it on: https://getcomposer.org/doc/00-intro.md#globally


## Setting up with Docker
- git clone https://github.com/ibosca/php-word-counter.git
- cd php-word-counter/docker
- docker-compose build
- docker-compose up -d
- Access on http://127.0.0.1:8080

Based on https://blog.rafalmuszynski.pl/how-to-configure-docker-for-symfony-4-applications/
