<?php

require_once(dirname(__FILE__). '/../../app/Models/User.php');
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Request.php');
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Redirect.php');


$request = new Request();
$user = new User();

$data = $request->all();

$created = $user->create([
    $data['name'],
    $data['user'],
    $data['email'],
    $data['password']
]);


if ($created) {
    return Redirect::view('login.php');
} else {
    return Redirect::view('register.php');
}

exit;

