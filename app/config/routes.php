<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/** @var object $router */

$router->get('/', 'Welcome::index');
$router->get('/student', 'StudentController::index');
$router->get('/student/profile', 'StudentController::profile')->middleware('student');
$router->post('/student/profile', 'StudentController::profile')->middleware('student');
$router->get('/users', 'UsersController::index');
$router->get('/users', 'UsersController::index');
$router->get('/users/create', 'UsersController::create');
$router->post('/users/store', 'UsersController::store');
$router->get('/users/edit/(:num)', 'UsersController::edit');
$router->post('/users/update/(:num)', 'UsersController::update');
$router->get('/users/delete/(:num)', 'UsersController::delete');