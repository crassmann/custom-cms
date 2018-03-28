<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require __DIR__ . '/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('core\error::errorHandler');
set_exception_handler('core\error::exceptionHandler');

/**
 * Routing
 */
$router = new core\router();

// Add the routes
//$router->add('{request:(^$)}', ['controller' => 'page', 'action' => 'show']);
$router->add('{request:login(.*)}', ['controller' => 'user', 'action' => 'login', 'template' => 'default']);
$router->add('{request:logout(.*)}', ['controller' => 'user', 'action' => 'logout']);
$router->add('{controller}/{action}/{request:(.*)}', ['namespace' => 'admin', 'template' => 'default']);
$router->add('{request:(.*)}', ['controller' => 'page', 'action' => 'show', 'template' => 'page']);
// $router->add('{request:([a-z0-9\-]+)}', ['controller' => 'page', 'action' => 'show']);
// $router->add('admin', ['controller' => 'admin', 'action' => 'index']);
// $router->add('{controller}/{action}/{id:\d+}');
// $router->add('{controller}/{action}');
// $router->add('{request:(.*)}', ['controller' => 'page', 'action' => 'error']);

// Set request & filter if exists
if ( isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) ) {
 $request = filter_var($_SERVER['QUERY_STRING'], FILTER_SANITIZE_URL);
} else {
 $request  = '';
}

// Dispatch the URL
$router->dispatch($request);
