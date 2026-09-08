<?php

/*
$router->get('/student', 'StudentController::index', 
            ['middleware' => 'StudentMiddleware']);

$router->get('/student/profile', 'StudentController::profile', 
            ['middleware' => 'StudentMiddleware']);
3rd acivity
*/

/*
4th lab activity
$router->get('/users', 'UserController::showUsers');
$router->get('/', 'Welcome::index');

*/

$router->get('/product/display', 'ProductController::read');
$router->post('/product/create', 'ProductController::create');
