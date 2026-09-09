<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('UsersModel');
        $this->call->library('form_validation');
    }

    // READ - Display all users
    public function index()
    {
        $users = $this->UsersModel->all();

        $data['users'] = $users;

        $this->call->view('users/index', $data);
    }

    // CREATE - Display create form
    public function create()
    {
        $this->call->view('users/create');
    }

    // CREATE - Save new user
    public function store()
    {
        // Form validation rules
        $this->form_validation->set_rules(
            'firstname',
            'First Name',
            'required'
        );

        $this->form_validation->set_rules(
            'lastname',
            'Last Name',
            'required'
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email'
        );

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[5]'
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[5]'
        );

        $this->form_validation->set_rules(
            'confirm_password',
            'Confirm Password',
            'required|matches[password]'
        );

        // If validation fails
        if ($this->form_validation->run() == FALSE) {
            $this->call->view('users/create');
            return;
        }

        // Data to insert
        $data = [
            'firstname' => $this->io->post('firstname'),
            'lastname'  => $this->io->post('lastname'),
            'email'     => $this->io->post('email'),
            'username'  => $this->io->post('username'),
            'password'  => password_hash(
                $this->io->post('password'),
                PASSWORD_DEFAULT
            )
        ];

        // Insert into database
        $this->UsersModel->insert($data);

        // Success message
        $this->session->set_flashdata(
            'success',
            'Username created successfully.'
        );

        redirect('/users');
    }

    // UPDATE - Display edit form
    public function edit($id)
    {
        $user = $this->UsersModel->find($id);

        if (!$user) {
            redirect('/users');
            return;
        }

        $data['user'] = $user;

        $this->call->view('users/edit', $data);
    }

    // UPDATE - Save edited user
    public function update($id)
    {
        // Form validation rules
        $this->form_validation->set_rules(
            'firstname',
            'First Name',
            'required'
        );

        $this->form_validation->set_rules(
            'lastname',
            'Last Name',
            'required'
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email'
        );

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[5]'
        );

        // Password is optional when updating
        if ($this->io->post('password')) {

            $this->form_validation->set_rules(
                'password',
                'Password',
                'min_length[5]'
            );

            $this->form_validation->set_rules(
                'confirm_password',
                'Confirm Password',
                'matches[password]'
            );
        }

        // If validation fails
        if ($this->form_validation->run() == FALSE) {

            $user = $this->UsersModel->find($id);

            $data['user'] = $user;

            $this->call->view('users/edit', $data);
            return;
        }

        // Data to update
        $data = [
            'firstname' => $this->io->post('firstname'),
            'lastname'  => $this->io->post('lastname'),
            'email'     => $this->io->post('email'),
            'username'  => $this->io->post('username')
        ];

        // Only update password if a new password was entered
        if ($this->io->post('password')) {

            $data['password'] = password_hash(
                $this->io->post('password'),
                PASSWORD_DEFAULT
            );
        }

        // Update database
        $this->UsersModel->update($id, $data);

        // Success message
        $this->session->set_flashdata(
            'success',
            'Account updated.'
        );

        redirect('/users');
    }

    // DELETE - Soft delete user
    public function delete($id)
    {
        $this->UsersModel->delete($id);

        // Success message
        $this->session->set_flashdata(
            'success',
            'Account deleted.'
        );

        redirect('/users');
    }
}