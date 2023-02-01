<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
//$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

//Rutas Index
$routes->get('/', 'IndexController::index');
$routes->post('logIn','IndexController::login');
$routes->get('logOut','IndexController::logout');

//Inventario
$routes->get('Inventario', 'InventarioController::index');
$routes->group('petInventario', function ($routes) {
    $routes->get('getAll', 'InventarioController::getAll');
    $routes->post('new', 'InventarioController::new');
    $routes->get('show/(:num)', 'InventarioController::show/$1');
    $routes->post('update', 'InventarioController::update');
});

//Prestamos
$routes->get('Prestamos', 'PrestamosController::index');
$routes->group('petPrestamos', function ($routes) {
    $routes->get('getAll', 'PrestamosController::getAll');
    $routes->post('new', 'PrestamosController::new');
    $routes->get('show/(:num)', 'PrestamosController::show/$1');
    $routes->post('update', 'PrestamosController::update');
});

//Incidencias
$routes->get('Incidencias', 'IncidenciasController::index');
$routes->group('petIncidencias', function ($routes) {
    $routes->get('getAll', 'IncidenciasController::getAll');
    $routes->post('new', 'IncidenciasController::new');
    $routes->get('show/(:num)', 'IncidenciasController::show/$1');
    $routes->post('update', 'IncidenciasController::update');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
