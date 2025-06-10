<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Controlador::index');

$routes->get('/controlador/mostrarUsuarios', 'Controlador::mostrarUsuarios');
$routes->get('/controlador/iniciosesion', 'Controlador::iniciosesion');

$routes->post('/controlador/iniciosesion', 'Controlador::iniciosesion');

$routes->get('controlador/principalU', 'Controlador::principalU');
$routes->get('controlador/principalA', 'Controlador::principalA');

$routes->get('trabajador/inicio', 'trabajador::inicio');
$routes->get('admin/inicio', 'admin::inicio');









/*
$routes->get('/', 'Auth::index');
$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('principalA', 'Auth::principalA');
$routes->get('principalU', 'Auth::principalU');

*/

/*
$routes->get('/', 'Crud::index');
$routes->get('/obtenerNombre/(:any)', 'Crud::obtenerNombre/$1');
$routes->get('/eliminar/(:any)', 'Crud::eliminar/$1');
$routes->post('/crear', 'Crud::crear');
$routes->post('/actualizar', 'Crud::actualizar');

*/