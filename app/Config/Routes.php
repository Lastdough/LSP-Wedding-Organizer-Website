<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/about', 'HomeController::about');
$routes->get('/packages', 'HomeController::packages');
$routes->get('/package/view', 'HomeController::viewPackage');

$routes->get('/orders', 'OrderController::viewOrders');
$routes->get('/order/form', 'OrderController::orderForm');
$routes->post('/order/submit', 'OrderController::submit');

// Auth 
$routes->get('/login', 'AuthController::loginView');
$routes->post('/login', 'AuthController::login');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/register', 'AuthController::registerView');
$routes->post('/register', 'AuthController::register');

$routes->get('unauthorized', "AuthController::Unauthorized");

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('', 'AdminController::index');
    $routes->get('package', 'AdminController::index');

    $routes->get('settings', 'AdminController::settings');
    $routes->post('settings/update', 'SettingsController::update');


    $routes->get('orders', 'AdminController::orders');
    $routes->post('order/update-status', 'AdminController::updateOrderStatus');
    $routes->post('order/delete', 'AdminController::deleteOrder');

    $routes->get('package/create', 'AdminController::createPackage');
    $routes->post('package/store', 'AdminController::storePackage');
    $routes->get('package/edit', 'AdminController::editPackage');
    $routes->post('package/update', 'AdminController::updatePackage');
    $routes->post('package/delete', 'AdminController::deletePackage');
    $routes->get('logout', 'AuthController::logout');
});



//Debugging
$routes->get('logs', "LogViewerController::index");
