<?php

$router->get('/student', 'StudentController::index', 
            ['middleware' => 'StudentMiddleware']);

$router->get('/student/profile', 'StudentController::profile', 
            ['middleware' => 'StudentMiddleware']);

$router->get('/users', 'UserController::showUsers');

$router->get('/', 'Welcome::index');