<?php

namespace B2B\Models\Cartalyst;

use Cartalyst\Sentinel\Users\EloquentUser;

use B2B\Traits\Cartalyst\User\Attributes;
use B2B\Traits\Cartalyst\User\Login;
use B2B\Traits\Cartalyst\User\Logout;
use B2B\Traits\Cartalyst\User\ForgotPassword;
use B2B\Traits\Cartalyst\User\ResetPassword;
use B2B\Traits\Cartalyst\User\Actions;
use B2B\Traits\Cartalyst\User\GetUserById;
use B2B\Traits\Cartalyst\User\GetUsers;

class User extends EloquentUser {

    use Attributes, Login, Logout, Actions, GetUserById, ForgotPassword, ResetPassword, GetUsers;
        
    protected $casts = [
        'avatar' => 'json',
        'id' => 'integer',
        'editable' => 'integer',
        'deletable' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'permissions' => 'json',
    ];

    protected $fillable = [
        'id',
        'email',
        'phone',
        'password',
        'permissions',
        'last_login',
        'first_name',
        'last_name',
        'type',
        'avatar',
        'editable',
        'deletable',
        'created_by',
        'updated_by',
    ];

    protected $appends  = ['full_name', 'active', 'role', 'icon', 'initials'];



}