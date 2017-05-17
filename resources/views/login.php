<?php
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Redirect.php');
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Session.php');

$redirect = new Redirect();
$session = new Session();

if ($session->exists('user')) {
    $redirect->view('documents.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesion</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/login.css">
	<script type="text/javascript" src="../../public/js/login.js"></script>
</head>
<body onload="setTimeout(function(){load();},200);">

	<div class="image-background">
        <img src="../../public/images/mountains.jpg">
    </div>

    <div>
        <div class="title" id="title">
            <h1>Log</h1>
            <h2>in</h2>
        </div>

        <div class="container" id="inputs">
            <form action="../../app/Contorllers/LoginController.php" method="POST">
                <input type="text" name="email" placeholder="Correo electronico" id="user" onblur="">
                <input type="password" name="password" placeholder="Password" id="password" onblur="validate('password');">
                <input type="submit" value="Iniciar Sesión">
            </form>
            <p>¿Eres nuevo?<a href="register.php"> Regístrate</a></p>
        </div>
    </div>
</body>
