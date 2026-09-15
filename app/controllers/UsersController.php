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

    // ==============================
    // READ - Display all users
    // ==============================

    public function index()
    {
        $users = $this->UsersModel->all();

        $data['users'] = $users;
        $data['success'] = $this->session->flashdata('success');

        $this->call->view('users/index', $data);
    }


    // ==============================
    // CREATE - Display create form
    // ==============================

    public function create()
    {
        $data['errors'] = '';

        $this->call->view('users/create', $data);
    }


    // ==============================
    // CREATE - Save new user
    // ==============================

    public function store()
    {
        if ($this->form_validation->validate([

            'firstname|First Name' =>
                'required',

            'lastname|Last Name' =>
                'required',

            'email|Email' =>
                'required|valid_email',

            'username|Username' =>
                'required|min_length[5]',

            'password|Password' =>
                'required|min_length[5]',

            'confirm_password|Confirm Password' =>
                'required|matches[password]'

        ])) {

            $data = [

                'firstname' =>
                    $this->io->post('firstname'),

                'lastname' =>
                    $this->io->post('lastname'),

                'email' =>
                    $this->io->post('email'),

                'username' =>
                    $this->io->post('username'),

                'password' =>
                    password_hash(
                        $this->io->post('password'),
                        PASSWORD_DEFAULT
                    )

            ];

            $this->UsersModel->insert($data);

            $this->session->set_flashdata(
                'success',
                'Username created successfully.'
            );

            redirect('/users');

        } else {

            $data['errors'] =
                $this->form_validation->errors();

            $this->call->view(
                'users/create',
                $data
            );
        }
    }


    // ==============================
    // UPDATE - Display edit form
    // ==============================

    public function edit($id)
    {
        $user = $this->UsersModel->find($id);

        if (!$user) {

            redirect('/users');

            return;
        }

        $data['user'] = $user;
        $data['errors'] = '';

        $this->call->view(
            'users/edit',
            $data
        );
    }


    // ==============================
    // UPDATE - Save edited user
    // ==============================

    public function update($id)
    {
        $rules = [

            'firstname|First Name' =>
                'required',

            'lastname|Last Name' =>
                'required',

            'email|Email' =>
                'required|valid_email',

            'username|Username' =>
                'required|min_length[5]'

        ];


        if ($this->io->post('password')) {

            $rules['password|Password'] =
                'min_length[5]';

            $rules['confirm_password|Confirm Password'] =
                'matches[password]';
        }


        if ($this->form_validation->validate($rules)) {

            $data = [

                'firstname' =>
                    $this->io->post('firstname'),

                'lastname' =>
                    $this->io->post('lastname'),

                'email' =>
                    $this->io->post('email'),

                'username' =>
                    $this->io->post('username')

            ];


            if ($this->io->post('password')) {

                $data['password'] =
                    password_hash(
                        $this->io->post('password'),
                        PASSWORD_DEFAULT
                    );
            }


            $this->UsersModel->update(
                $id,
                $data
            );


            $this->session->set_flashdata(
                'success',
                'Account updated.'
            );


            redirect('/users');

        } else {

            $user =
                $this->UsersModel->find($id);

            $data['user'] = $user;

            $data['errors'] =
                $this->form_validation->errors();

            $this->call->view(
                'users/edit',
                $data
            );
        }
    }


    // ==============================
    // DELETE - Soft delete user
    // ==============================

    public function delete($id)
    {
        $this->UsersModel->delete($id);

        $this->session->set_flashdata(
            'success',
            'Account deleted.'
        );

        redirect('/users');
    }
}