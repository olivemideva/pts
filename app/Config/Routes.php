<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Landing');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

$routes->get('/', 'Landing::index');

//prison module
$routes->get('prison_home', 'prison\Prison::index');
$routes->get('view_prisoners', 'prison\Prison::view_prisoners');
$routes->get('new_prisoners', 'prison\Prison::new_prisoners');
$routes->get('change_passwordp', 'prison\Prison::change_password');
$routes->get('prison_login', 'prison\Login::index');
$routes->get('prison_logout', 'prison\Login::logout');
$routes->get('fetch_prisoner/(:num)', 'prison\Prison::fetch_prisoner/$1');
$routes->get('Rfetch_prisoner/(:num)', 'prison\Prison::Rfetch_prisoner/$1');
//$routes->get('more_info/(:num)', 'prison\Prison::Mfetch_prisoner/$1');
$routes->get('charts/(:num)', 'prison\Prison::charts/$1');
$routes->post('prison_addinfo', 'prison\Prison::add_info');
$routes->post('prisoner_review', 'prison\Prison::prisoner_review');
$routes->post('recommend', 'prison\Prison::recommend');
$routes->post('login_prison','prison\Login::login');

//station module
$routes->get('station_home', 'station\Station::index');
$routes->get('view_detainees', 'station\Station::view_detainees');
$routes->get('change_passwordst', 'station\Station::change_password');
$routes->get('add_detainees', 'station\Station::add_detainee');
$routes->get('station_login','station\Login::index');
$routes->get('station_logout', 'station\Login::logout');
$routes->post('login_station','station\Login::login');
$routes->post('new_detainee','station\Station::new_detainee');

//court module
$routes->get('court_home', 'court\Court::index');
$routes->get('view_defendants', 'court\Court::view_defendants');
$routes->get('change_passwordc', 'court\Court::change_password');
$routes->get('court_login', 'court\Login::index');
$routes->get('court_logout', 'court\Login::logout');
$routes->get('fetch_detainee/(:num)', 'court\Court::fetch_detainee/$1');
$routes->post('add_info', 'court\Court::add_info');
$routes->post('login_court','court\Login::login');

//admin module
$routes->get('admin_home', 'admin\Admin::index');
$routes->get('user_registration', 'admin\Admin::user_reg');
$routes->get('change_passworda', 'admin\Admin::change_password');
$routes->get('manage_users', 'admin\Admin::manage_users');
$routes->get('admin_login', 'admin\Login::index');
$routes->get('admin_logout', 'admin\Login::logout');
$routes->post('login_admin','admin\Login::login');
$routes->post('add_user','admin\Admin::add_user');

//parole module
$routes->get('parole_home', 'parole\Parole::index');
$routes->get('suggested', 'parole\Parole::suggested');
$routes->get('approved', 'parole\Parole::approved');
$routes->get('parole_login', 'parole\Login::index');
$routes->get('parole_logout', 'parole\Login::logout');
$routes->get('fetch_recommended/(:num)', 'parole\Parole::charts/$1');
$routes->post('decision','parole\Parole::decision');
$routes->post('login_parole','parole\Login::login');


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
