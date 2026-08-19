<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle($next)
    {
        if (!$this->access_allowed()) {
            redirect('student');
            return;
        }

        return $next();
    }

    private function access_allowed()
    {
        $session = load_class('session', 'libraries');

        return isset($_SESSION['student_access']) && $_SESSION['student_access'] === true;
    }
}
