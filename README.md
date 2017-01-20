## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Laradock Setup Guide

A step by step series of to run this Laravel web app in Docker.

### Install Docker Compose

#### Mac OS X

Install Docker for Mac. Follow instructions here: https://docs.docker.com/docker-for-mac/

### Setup Laradock

Navigate to your project folder

```
cd /path/to/project/folder
```

Clone Laradock

```
git submodule add https://github.com/LaraDock/laradock.git
```

Copy this web app's docker-compose.yml to the laradock folder

```
mv docker-compose.yml laradock
```

### Run Laradock

Navigate to your project's laradock folder

```
cd /path/to/project/folder/laradock
```

Run the project's docker-compose.yml

```
docker-compose up -d nginx hhvm postgres workspace
docker-compose stop && docker-compose up -d nginx hhvm postgres workspace
```

### Install Laravel

Install composer dependencies

```
docker-compose exec workspace composer install
```

Run migrations

```
docker-compose exec workspace php artisan migrate
```

### Setup hostname

Add hostname for site to /etc/hosts

```
sudo vim /etc/hosts
```

```
Add this line: 127.0.0.1 project.host.name
```