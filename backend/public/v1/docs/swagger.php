<?php


require __DIR__ . '/../../../../vendor/autoload.php';

define('BASE_URL', 'http://localhost:5503/backend/');

error_reporting(0);

<<<<<<< HEAD
$openapi = \OpenApi\Generator::scan(['../../../rest/routes', './']);
=======
$openapi = \OpenApi\Generator::scan(['../../../../rest/routes', './']);
>>>>>>> e082f59b2adb0523db37e4deb2aa36e48a364ba6
header('Content-Type: application/x-yaml');
echo $openapi->toYaml();
?>
