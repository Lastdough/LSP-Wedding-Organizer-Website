<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// Auth 
$routes->get('/login', 'AuthController::loginView');
$routes->post('/login', 'AuthController::login');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/register', 'AuthController::registerView');
$routes->post('/register', 'AuthController::register');


$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('', 'AdminController::index');
    $routes->get('package', 'AdminController::index');


    $routes->get('orders', 'AdminController::orders');
    $routes->post('order/update-status', 'AdminController::updateOrderStatus');

    $routes->get('package/create', 'AdminController::createPackage');
    $routes->post('package/store', 'AdminController::storePackage');
    $routes->get('package/edit', 'AdminController::editPackage');
    $routes->post('package/update', 'AdminController::updatePackage');
    $routes->post('package/delete', 'AdminController::deletePackage');
    $routes->get('logout', 'AuthController::logout');
});

// $routes->group('user', ['filter' => 'role:user'], function ($routes) {
//     $routes->get('dashboard', 'Home::udashboard');
// });

$routes->get('unauthorized', "AuthController::Unauthorized");

//Debugging
$routes->get('logs', "LogViewerController::index");
