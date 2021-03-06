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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Usuario</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/register.css">
</head>
<body>
    <div class="image-background">
        <img src="../../public/images/balloon.jpg">
    </div>
    <div class="title">
        <h1>Regis</h1>
        <h2>tro</h2>
    </div>
 	<div class="container">
        <form action="../../app/Contorllers/RegisterController.php" method="post">
            <input type="text" name="name" id="name" placeholder="Nombre Completo"">
            <input type="text" name="user" id="user" placeholder=" Usuario" onblur="validate('user');">
            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Correo Electronico">
            <input type="password" name="password" id="password" placeholder="Contraseña">
            <input type="password" name="password_confirm" id="password_confirm" placeholder="Confirmar contraseña">
            <input type="submit" value="Regístrate" id="register">
        </form>
		<div class="log">
            <p>¿Ya tienes cuenta? <a href="login.php"> Ingresa</a></p>
        </div>
 	</div>
</body>
</html>