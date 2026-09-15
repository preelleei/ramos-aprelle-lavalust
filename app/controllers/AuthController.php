<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('UsersModel');
    }

    // Display login page
    public function login()
    {
        if ($this->session->userdata('logged_in') === true) {
            redirect('/products');
            return;
        }

        $data['error'] = '';

        $this->call->view('auth/login', $data);
    }

    // Process login
    public function authenticate()
    {
        $username = trim($this->io->post('username'));
        $password = $this->io->post('password');

        if ($username === '' || $password === '') {

            $data['error'] = 'Please enter your username and password.';

            $this->call->view('auth/login', $data);
            return;
        }

        $user = $this->UsersModel->find_by('username', $username);

        if (!$user) {

            $data['error'] = 'Invalid username or password.';

            $this->call->view('auth/login', $data);
            return;
        }

        if (
            isset($user['is_active']) &&
            (int) $user['is_active'] !== 1
        ) {

            $data['error'] = 'This account is inactive.';

            $this->call->view('auth/login', $data);
            return;
        }

        if (!password_verify($password, $user['password'])) {

            $data['error'] = 'Invalid username or password.';

            $this->call->view('auth/login', $data);
            return;
        }

        // Store authenticated user information
        $this->session->set_userdata('logged_in', true);
        $this->session->set_userdata('user_id', $user['id']);
        $this->session->set_userdata('username', $user['username']);

        if (isset($user['role'])) {
            $this->session->set_userdata('role', $user['role']);
        }

        $this->session->set_flashdata(
            'success',
            'Login successful.'
        );

        redirect('/products');
    }

    // Logout
    public function logout()
    {
        $this->session->unset_userdata([
            'logged_in',
            'user_id',
            'username',
            'role'
        ]);

        redirect('/login');
    }
}