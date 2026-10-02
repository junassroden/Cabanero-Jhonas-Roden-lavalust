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
$router->any('/', 'AuthController::login');
$router->get('/logout', 'AuthController::logout');

$router->group(['middleware' => 'AuthMiddleware'], function ($router) {

    $router->get('/product/display', 'ProductController::read');
    $router->any('/product/create', 'ProductController::create');
    $router->any('/product/edit/{id}', 'ProductController::edit');
    $router->get('/product/delete/{id}', 'ProductController::delete');

    $router->get('/products', 'ProductController::read');
    $router->any('/products/create', 'ProductController::create');
    $router->any('/products/edit/{id}', 'ProductController::edit');
    $router->get('/products/delete/{id}', 'ProductController::delete');
});

$router->post('/api/login', 'ProductController::api_login');
$router->options('/api/login', 'ProductController::api_login');
$router->post('/api/logout', 'ProductController::api_logout');
$router->options('/api/logout', 'ProductController::api_logout');
$router->post('/api/refresh', 'ProductController::api_refresh');
$router->options('/api/refresh', 'ProductController::api_refresh');

$router->get('/api/products', 'ProductController::api_index');
$router->options('/api/products', 'ProductController::api_index');
$router->post('/api/products', 'ProductController::api_store');
$router->options('/api/products', 'ProductController::api_store');
$router->put('/api/products/{id}', 'ProductController::api_update');
$router->options('/api/products/{id}', 'ProductController::api_update');
$router->delete('/api/products/{id}', 'ProductController::api_delete');
$router->options('/api/products/{id}', 'ProductController::api_delete');

$router->get('create-migration/{migration_class}', 'MigrationController::create_migration');
$router->get('migrate', 'MigrationController::migrate');
$router->get('rollback', 'MigrationController::rollback');
$router->get('rollback-all', 'MigrationController::rollback_all');
$router->get('refresh', 'MigrationController::refresh');
$router->get('status', 'MigrationController::status');