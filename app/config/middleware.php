<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Middleware registration for the student laboratory activity.
 */
require_once APP_DIR . 'middlewares/StudentMiddleware.php';

$config['middlewares'] = [
    'student' => new StudentMiddleware(),
];
