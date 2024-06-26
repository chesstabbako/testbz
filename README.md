<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this API

-It's recommended to use PHP version laravel 8, 9 0r 10. (php 8 version).

Download the project and you may run on the console "php artisan serve", it usually throws http://127.0.0.1:8000/ on local. You just need to add "api" after it and then use the diferent routes for the tasks.

-Please, don't forget to run the migrations to avoid issues: "php artisan migrate". Continue reading for more datails...

The DB used for this project was MySql. 

- Please, do not forget to use the db name for phpmyadmin: here, the name I used was "todo". Be careful with the env file and see very well what port you're using for the connection with phpmyadmin on your local machine. In my case was 3307 but it's usually 3306.

-You can use the env.example file and create the .env. You just need to use the "todo" name for database. 

Example:

- POST /tasks: Create a new task. Please, the only field you may create is a task with a name field.
- PUT /tasks/:id: update the task name. 
- DELETE /tasks/:id: delete the task using the id that task has.
- GET /tasks: List of all the tasks.
- PATCH /tasks/:id/complete: update the task to let the user known that the taks was completed... It has a "complete" field that is boolean. It accepts 1(true) or 0(false). By default, at the time to create the task is 0(no completed).

For instance: to take all the task you may use POSTMAN: and with the method "GET" use http://127.0.0.1:8000/api/tasks. It will show you all the tasks availables on the DataBase.

# Google Calendar API

Please, read this for Laravel https://packagist.org/packages/google/apiclient

# POSTMAN and testing

-use the routes for CRUD.

for testing you can use the command "vendor/bin/phpunit"

