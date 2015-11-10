## [RTAPI] Raft API

RTAPI is the laravel backend for the raft platform. It's REST api is consumed by the [RTUI](https://github.com/badleyy/rtui) and other cosumers.

## Installation

The API is a [laravel](https://laravel.com) php application built only to provide an http api interface to the RAFT platform.

### Clone the repository

```
$ git clone https://github.com/badleyy/rtapi.git
```

### Install dependencies 

```
$ cd rtapi
$ composer update
```

### Generate a site key and update the .env file

```
$ cp ./.env.example ./.env
$ php artisan key:generate
$ vim ./.env
```

### Generate a jwt key for authentication

```
$ php artisan jwt:generate
# update the jwt config file with the generated key
$ vim ./config/jwt.php
```
  
## Running

There are many options for running RTAPI for development.

### Buit-in php server

<talk about using the buit in php server>

### Apache

<talk about running the app under apache>

### Nginx

<talk about running the app under apache>
  
### Migrating the database

This codebase houses the laravel [schema builder](http://laravel.com/docs/5.1/migrations) migrations that provide a self-documenting approach to database schema updates. Running these migrations is necessary to run the application; they can be executed by running:

```
$ php artisan migrate:refresh --seed
```
  
## API Documentation

In a seperate shared document

  
