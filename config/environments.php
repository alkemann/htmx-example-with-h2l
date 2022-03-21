<?php

use alkemann\h2l\{ Environment, Request, Response, util\Chain, response\Page };

Environment::set([
    Environment::DEV => [
        'debug' => true,
        'content_path' => $ROOT . 'content' . DIRECTORY_SEPARATOR,
        'layout_path' => $ROOT . 'layouts' . DIRECTORY_SEPARATOR,
    ],
    Environment::PROD => [
        'debug' => false,
        'content_path' => $ROOT . 'content' . DIRECTORY_SEPARATOR,
        'layout_path' => $ROOT . 'layouts' . DIRECTORY_SEPARATOR,

    ]
], Environment::ALL);

$no_layout_for_HX_requests = function(Request $request, Chain $chain): Response {
    $response = $chain->next($request, $chain);
    if ($response instanceof Page && $request->header('HX-Request')) {
        $response->layout = false;
    }
    return $response;
};

Environment::addMiddle($no_layout_for_HX_requests, Environment::ALL);