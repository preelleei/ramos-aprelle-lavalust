<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| Middleware Registration
|--------------------------------------------------------------------------
*/


// Student middleware
require_once APP_DIR . 'middlewares/StudentMiddleware.php';


// Authentication middleware
require_once APP_DIR . 'middlewares/AuthMiddleware.php';


$config['middlewares'] = [

    'student' => new StudentMiddleware(),

    'auth' => new AuthMiddleware(),

];