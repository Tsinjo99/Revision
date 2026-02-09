<?php

use app\controllers\DashboardController;
use app\controllers\MessagesController;
use app\controllers\AuthController;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

	$router->get('/', [AuthController::class, 'showLogin']);  // juste afficher
	$router->post('/', [AuthController::class, 'login']);     // traiter


	$router->get('/dashboard', function() {
	    $controller = new DashboardController();
	    $controller->index();
	});


	// Exemple simple d'un mini-routeur
	$router->get('/messages', [MessagesController::class, 'messages']);
	Flight::route('GET /conversation', [MessagesController::class, 'loadConversation']);
	Flight::route('POST /message/send', [MessagesController::class, 'sendMessage']);



});
