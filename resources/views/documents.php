<?php
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Redirect.php');
require_once(dirname(__FILE__). '/../../app/Contorllers/Http/Session.php');

$redirect = new Redirect();
$session = new Session();

if (! $session->exists('user')) {
    $redirect->view('login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/css/app.css">
    <title>Documentos</title>
</head>
<body>
    <div class="header">
        <div class="position">
            <a href="/">
                <img src="../../public/images/pacman.png"> Editor
            </a>
        </div>

        <div class="user">
            <h5>
                <?php echo $session->get('user')['name'] ?>
            </h5>
        </div>
    </div>

    <div class="information">
        <div class="icono"><img src="../../public/images/user.png"></div>
        <div id="sub_nombre"></div>
        <div id="cerrar">
            <img onclick="out()" src="../../public/images/logoutc.png">
            <h4 onclick="out()">Cerrar Sesión</h4>
        </div>
    </div>

    <div>
    </div>

</body>
</html>