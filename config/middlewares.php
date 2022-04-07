<?php

use alkemann\h2l\{ Environment, Request, Response, util\Chain, response\Page };

// Add this middleware to all environments
Environment::addMiddle(function(Request $request, Chain $chain): Response {
    $response = $chain->next($request, $chain);
    if ($response instanceof Page && $request->header('HX-Request')) {
        $response->layout = false;
    }
    return $response;
}, Environment::ALL);