<?php

class User extends Model
{
    protected $table = 'users';

    protected $fillables = [
        'name',
        'nickname',
        'email',
        'password',

    ];
}