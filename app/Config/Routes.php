<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default route
$routes->group('/', ['namespace' => 'App\Controllers\Dashboard'], function($routes) {
    $routes->get('', 'HomePage_edit_cover::index');
});

// Grouped routes with a common namespace
$routes->group('dashboard/', ['namespace' => 'App\Controllers\Dashboard'], function($routes) {
    $routes->get('homepage/cover', 'HomePage_edit_cover::index');

    $routes->get('homepage/about', 'HomePage_edit_about::index');
    $routes->get('homepage/service', 'HomePage_edit_service::index');
    $routes->get('homepage/review', 'HomePage_edit_review::index');
    $routes->get('homepage/contact', 'HomePage_edit_contact::index');

});

// Another group with a different namespace
// $routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
//     $routes->get('users', 'Users::index');
//     $routes->post('users', 'Users::create');
//     $routes->put('users/(:segment)', 'Users::update/$1');
//     $routes->delete('users/(:segment)', 'Users::delete/$1');
// });

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. The
 * following file allows you to do that.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
