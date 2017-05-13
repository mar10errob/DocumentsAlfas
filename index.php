<?php


require_once(dirname(__FILE__). '/app/Models/User.php');
require_once(dirname(__FILE__). '/app/Models/Document.php');

$user = new User();
$document = new Document();

/**
*/

echo $user->create([
    'Marco',
    'Athinor',
    'marco@bluebeanmx.com',
    password_hash('athinor.1993',PASSWORD_DEFAULT)
]);
echo '<br>';

echo $document->create([
    'Marco',
    'Athinor',
    'La super wea super mega boladora',
    4
]);

return;


/*if (! empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '. $uri .'/Proyecto-Final-PHP/resources/views/documents.php');

exit;*/

?>