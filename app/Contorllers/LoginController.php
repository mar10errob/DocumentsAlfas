<?php

require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Request.php');
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Authenticate.php');
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Redirect.php');
require_once(dirname(__FILE__). '/../../app/Models/User.php');

$request = new Request();
$user = new User();

$user = $user->findByEmail($request->get('email'));

$auth = new Authenticate($user);

if ($auth->isCorrectPassword($request)) {
    $auth->guard();

    return Redirect::view('documents.php');
} else {
    return Redirect::view('login.php');
}


print_r($user);

return ;




