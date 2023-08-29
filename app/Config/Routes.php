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
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::index');

$routes->get('login', 'AuthController::login');
$routes->post('process', 'AuthController::loginProcess');
$routes->get('out', 'AuthController::logout');

$routes->get('/home', 'Home::index');

// daging
$routes->get('daging', 'DagingController::index');
$routes->get('addDaging', 'DagingController::add');
$routes->post('saveDaging', 'DagingController::save');
$routes->get('deleteDaging/(:num)', 'DagingController::delete/$1');
$routes->get('editDaging/(:segment)', 'DagingController::edit/$1');
$routes->post('/updateDaging/(:any)', 'DagingController::update/$1');


// daging masuk
$routes->get('masuk', 'MasukController::index');
$routes->get('addMasuk', 'MasukController::add');
$routes->post('saveMasuk', 'MasukController::save');
$routes->get('deleteMasuk/(:num)', 'MasukController::delete/$1');
$routes->get('editMasuk/(:segment)', 'MasukController::edit/$1');
$routes->post('/updateMasuk/(:any)', 'MasukController::update/$1');



// daging Keluar
$routes->get('keluar', 'KeluarController::index');
$routes->get('addKeluar', 'KeluarController::add');
$routes->post('saveKeluar', 'KeluarController::save');
$routes->get('deleteKeluar/(:num)', 'KeluarController::delete/$1');
$routes->get('editKeluar/(:segment)', 'KeluarController::edit/$1');
$routes->post('/updateKeluar/(:any)', 'KeluarController::update/$1');

// stok
$routes->get('/stok', 'StokController::index');
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
