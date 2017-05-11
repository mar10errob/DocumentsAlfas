<?php


require_once(dirname(__FILE__). '/app/Models/User.php');
require_once(dirname(__FILE__). '/app/Models/Document.php');

$user = new User();
$document = new Document();

/**
 * NO EJECUTA CORRECTAMENTE POR LOS ESPACIOS EN BLANCO
*/


foreach ($user->all() as $user) {
    foreach ($user as $item) {
        echo $item;
        echo '<br>';
    }
    echo '<br>';
}

/*if (! empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '. $uri .'/Proyecto-Final-PHP/resources/views/documents.php');

exit;*/

?>