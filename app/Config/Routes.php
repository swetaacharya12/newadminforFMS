<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin/dashboard', 'Admin::dashboard');

$routes->get('/users', 'Users::index');
$routes->get('/users/create', 'Users::create');
$routes->post('/users/store', 'Users::store');
$routes->get('/users/edit/(:num)', 'Users::edit/$1');
$routes->post('/users/update/(:num)', 'Users::update/$1');
$routes->get('/users/delete/(:num)', 'Users::delete/$1');
$routes->get('/users/profile', 'Users::profile');

$routes->get('/folders', 'Folders::index');
$routes->get('/folders/create', 'Folders::create');
$routes->post('/folders/store', 'Folders::store');
$routes->get('/folders/edit/(:num)', 'Folders::edit/$1');
$routes->post('/folders/update/(:num)', 'Folders::update/$1');
$routes->get('/folders/delete/(:num)', 'Folders::delete/$1');

$routes->get('/files', 'Files::index');
$routes->get('/files/create', 'Files::create');
$routes->post('/files/store', 'Files::store');
$routes->get('/files/edit/(:num)', 'Files::edit/$1');
$routes->post('/files/update/(:num)', 'Files::update/$1');
$routes->get('/files/delete/(:num)', 'Files::delete/$1');


$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/loginAuth', 'Auth::loginAuth');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/registerUser', 'Auth::registerUser');

$routes->get('auth/forgotPassword', 'Auth::forgotPassword');
$routes->post('auth/sendOtp', 'Auth::sendOtp');
$routes->get('auth/verifyOtp', 'Auth::verifyOtp');
$routes->post('auth/verifyOtpProcess', 'Auth::verifyOtpProcess');
$routes->post('auth/resetPasswordProcess', 'Auth::resetPasswordProcess');



