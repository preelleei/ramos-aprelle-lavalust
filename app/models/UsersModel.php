<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';

    protected $fillable = [
        'username',
        'password'
    ];

    protected $guarded = [
        'id'
    ];

    protected $soft_delete = true;
}