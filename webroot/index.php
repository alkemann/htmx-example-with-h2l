<?php
// ***********
$ROOT = realpath(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR;
$VENDOR_PATH = $ROOT . 'vendor' . DIRECTORY_SEPARATOR;
// ***********

require_once($VENDOR_PATH . 'autoload.php');
require_once($ROOT . 'config' . DIRECTORY_SEPARATOR . 'environments.php');
require_once($ROOT . 'config' . DIRECTORY_SEPARATOR . 'routes.php');

$dispatch = new alkemann\h2l\Dispatch($_REQUEST, $_SERVER, $_GET, $_POST);
$dispatch->setRouteFromRouter();
$dispatch->registerMiddle(...alkemann\h2l\Environment::middlewares());

$response = $dispatch->response();
if ($response) {
    echo $response->render();
}

