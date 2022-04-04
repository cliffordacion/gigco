# Cigco
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)


## Features/API endpoints
-  GET|HEAD        api/songs  ...  songs.index › SongController@index
-  POST            api/songs  ...  songs.store › SongController@store
-  GET|HEAD        api/songs/{song}  ...  songs.show › SongController@show
-  PUT|PATCH       api/songs/{song}  ...  songs.update › SongController@update
-  DELETE          api/songs/{song}  ...  songs.destroy › SongController@destroy

## Requirements
- PHP8+
- laravel 9
- docker/docker-compose
## Installation
1. pull repository
   ```
   git clone git@github.com:cliffordacion/gigco.git
   ```
2. Setup .env variables. *sensitive files not hidden for ease
   ```
   cp .env.example .env
   ```
3. run docker 
   ```
   docker-compose up -d
   ```
4. "SSH" to docker container running the app
   ```
   docker exec -it gigco_web_1 /bin/sh
   ```
5. Go to the installation directory
   ```
   /var/www/html/gigco/app
   ```
6. install/update compoer
   ```
   composer update
   ```
7. Run migration
   ```
   php artisan migrate
   ```
8. access http://localhost:8090 and API endpoints

## Running tests
   ```
       php vendor/phpunit/phpunit/phpunit tests
   ```


