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

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

$router->any('/api/login', 'ProductController::api_login');
$router->any('/api/logout', 'ProductController::api_logout');
$router->any('/api/refresh', 'ProductController::api_refresh');

$router->any('/api/products', 'ProductController::api_index');
$router->any('/api/products/create', 'ProductController::api_store');
$router->any('/api/products/{id}', 'ProductController::api_update');

/*
|--------------------------------------------------------------------------
| Migration Routes
|--------------------------------------------------------------------------
*/

$router->get('create-migration/{migration_class}', 'MigrationController::create_migration');
$router->get('migrate', 'MigrationController::migrate');
$router->get('rollback', 'MigrationController::rollback');
$router->get('rollback-all', 'MigrationController::rollback_all');
$router->get('refresh', 'MigrationController::refresh');
$router->get('status', 'MigrationController::status');