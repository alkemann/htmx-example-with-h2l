<?php
// ***********
$ROOT = realpath(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR;
$VENDOR_PATH = $ROOT . 'vendor' . DIRECTORY_SEPARATOR;
// ***********

require_once($VENDOR_PATH . 'autoload.php');

alkemann\h2l\Environment::set([
    alkemann\h2l\Environment::DEV => [
        'debug' => true,
        'content_path' => $ROOT . 'content' . DIRECTORY_SEPARATOR,
        'layout_path' => $ROOT . 'layouts' . DIRECTORY_SEPARATOR,
    ],
    alkemann\h2l\Environment::PROD => [
        'debug' => false,
        'content_path' => $ROOT . 'content' . DIRECTORY_SEPARATOR,
        'layout_path' => $ROOT . 'layouts' . DIRECTORY_SEPARATOR,

    ]
], alkemann\h2l\Environment::ALL);

require_once($ROOT . 'config' . DIRECTORY_SEPARATOR . 'middlewares.php');

\alkemann\h2l\Router::addViaAttributes([\app\ContactController::class]);

$dispatch = new alkemann\h2l\Dispatch($_REQUEST, $_SERVER, $_GET, $_POST);
$dispatch->setRouteFromRouter();
$dispatch->registerMiddle(...alkemann\h2l\Environment::middlewares());

$response = $dispatch->response();
if ($response) {
    echo $response->render();
}

