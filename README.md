# bt-interview
Binary Tree example with Symfony5
### Container
 - [nginx](https://pkgs.alpinelinux.org/packages?name=nginx&branch=v3.10) 1.16.+
 - [php-fpm](https://pkgs.alpinelinux.org/packages?name=php7&branch=v3.10) 7.3.+
    - [composer](https://getcomposer.org/) 
    - [yarn](https://yarnpkg.com/lang/en/) and [node.js](https://nodejs.org/en/) (if you will use [Encore](https://symfony.com/doc/current/frontend/encore/installation.html) for managing JS and CSS)
- [mysql](https://hub.docker.com/_/mysql/) 5.7.+

## Installation

run docker and connect to container:

```bash
docker-compose up --build
```
```bash
docker-compose exec php sh
```
install symfony vendors:
```bash
composer install
```
create DB with schema:
```bash
 php bin/console doctrine:schema:create
```
run fixtures:
```bash
 php bin/console doctrine:fixtures:load
```
run tests:
```bash
 php bin/phpunit
```

## Usage
Go to:
[localhost](http://localhost/)
