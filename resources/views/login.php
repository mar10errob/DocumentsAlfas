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
            <input type="text" name="user" placeholder="usuario" id="user" onblur="validate('user');">
            <input type="password" name="password" placeholder="password" id="password" onblur="validate('password');">
            <input type="submit" value="Iniciar Sesión" onclick="login();">
            <p>¿Eres nuevo?<a href="register.php"> Regístrate</a></p>
        </div>
    </div>
</body>
