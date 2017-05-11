<?php
require_once(dirname(__FILE__). '/../Structure/Model.php');


class User extends Model
{
    protected $table = 'users';

    protected $fillabels = [
        'id',
        'name',
        'nickname',
        'email',
        'password',
    ];

}
