<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        $session = load_class('session', 'libraries');

        if (!$this->access_allowed($session)) {
            redirect('/login');
            return;
        }

        return $next();
    }

    private function access_allowed($session)
    {
        return $session->userdata('logged_in') === true;
    }
}