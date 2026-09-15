<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** @var object $router */


// ==============================
// Welcome
// ==============================

$router->get('/', 'Welcome::index');


// ==============================
// Authentication
// ==============================

$router->get('/login', 'AuthController::login');

$router->post('/login', 'AuthController::authenticate');

$router->get('/logout', 'AuthController::logout');


// ==============================
// Student
// ==============================

$router->get('/student', 'StudentController::index');

$router->get('/student/profile', 'StudentController::profile')
       ->middleware('student');

$router->post('/student/profile', 'StudentController::profile')
       ->middleware('student');


// ==============================
// Users CRUD
// ==============================

$router->get('/users', 'UsersController::index');

$router->get('/users/create', 'UsersController::create');

$router->post('/users/store', 'UsersController::store');

$router->get('/users/edit/{id}', 'UsersController::edit');

$router->post('/users/update/{id}', 'UsersController::update');

$router->get('/users/delete/{id}', 'UsersController::delete');


// ==============================
// Products CRUD - AUTHENTICATED
// ==============================

$router->get('/products', 'ProductController::index')
       ->middleware('auth');

$router->get('/products/create', 'ProductController::create')
       ->middleware('auth');

$router->post('/products/store', 'ProductController::store')
       ->middleware('auth');

$router->get('/products/edit/{id}', 'ProductController::edit')
       ->middleware('auth');

$router->post('/products/update/{id}', 'ProductController::update')
       ->middleware('auth');

$router->get('/products/delete/{id}', 'ProductController::delete')
       ->middleware('auth');