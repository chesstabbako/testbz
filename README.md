<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this API

Download the project and you may run on the console "php artisan serve", it usually throws http://127.0.0.1:8000/ on local. You just need to add "api" after it and then use the diferent routes for the tasks.

Example:

- POST /tasks: Create a new task. Please, the only field you may create is a task with a name field.
- PUT /tasks/:id: update the task name. 
- DELETE /tasks/:id: delete the task using the id that task has.
- GET /tasks: List of all the tasks.
- PATCH /tasks/:id/complete: update the task to let the user known that the taks was completed... It has a "complete" field that is boolean. It accepts 1(true) or 0(false). By default, at the time to create the task is 0(no completed).

For instance: to take all the task you may use POSTMAN: and with the method "GET" use http://127.0.0.1:8000/api/tasks. It will show you all the tasks availables on the DataBase.
