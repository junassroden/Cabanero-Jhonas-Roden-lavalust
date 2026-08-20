<?php

$router->get('/student', 'StudentController::index');

$router->get('/student/profile', 'StudentController::profile', 
            ['middleware' => 'StudentMiddleware']);