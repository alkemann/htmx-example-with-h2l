<?php

use alkemann\h2l\{ Router, util\Http };
use app\ContactController;

Router::alias('/', '/contact');

Router::add('|/contact$|', 					[ContactController::class, 'index'], 	Http::GET);
Router::add('|/contact/(?<id>\d+)$|', 		[ContactController::class, 'view'], 	Http::GET);
Router::add('|/contact/(?<id>\d+)/edit$|', 	[ContactController::class, 'form'], 	Http::GET);
Router::add('|/contact/(?<id>\d+)$|', 		[ContactController::class, 'update'], 	Http::POST);
