<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/shop', 'Home::shop');
$routes->get('/footwear', 'AdminController::index');
$routes->post('/admins/insert', 'AdminController::FootwearProduct');
$routes->post('/products', 'AdminController::products');
$routes->get('/admins/deleteProduct/(:num)', 'AdminController::deleteProduct/$1');
$routes->get('/admins/editfootwear', 'AdminController::editfootwear');
$routes->post('/admins/updatefootwearProduct/(:num)', 'AdminController::updatefootwearProduct/$1');
$routes->get('/register', '\App\Controllers\UserController::register');
$routes->post('/user/store', '\App\Controllers\UserController::store');
$routes->get('/', '\App\Controllers\SigninController::login');
$routes->post('/signin/loginAuth', '\App\Controllers\SigninController::loginAuth', ['filter' => 'authGuard']);
