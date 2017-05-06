<?php
use App\Structure\Model;

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