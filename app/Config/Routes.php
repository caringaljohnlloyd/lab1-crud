<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->post('/save', 'MainController::save');
$routes->get('/delete/(:any)', 'MainController::delete/$1');
$routes->get('/edit/(:any)', 'MainController::edit/$1');
$routes->get('/add', 'MainController::add');
$routes->post('/category/add', 'MainController::add');
$routes->get('/deletecateg/(:any)', 'MainController::deletecateg/$1');
$routes->get('back', 'MainController::back');










