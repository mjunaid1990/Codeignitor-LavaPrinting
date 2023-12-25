<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
//$routes->get('/register', 'Auth::register');
//$routes->post('/register', 'Auth::register');

$routes->get('/about-us', 'Home::about_us');
$routes->get('/contact-us', 'Home::contact_us');
$routes->get('/privacy-policy', 'Home::privacy_policy');
$routes->get('/terms-and-conditions', 'Home::terms_and_conditions');
$routes->get('/faq', 'Home::faq');
$routes->post('/contact-message', 'Home::contact_message');

$routes->get('/quote', 'Home::quote');
$routes->post('/quote', 'Home::quote');
$routes->post('/quote-ajax', 'Home::quote_ajax');

$routes->get('/category/(:any)', 'Category::index/$1');
$routes->get('/product/(:any)', 'Product::index/$1');

$routes->get('/create_sitemap', 'Home::create_sitemap');

$routes->group('admin',['namespace'=>'App\Controllers\Admin'],function($routes){
    $routes->get('/', 'Dashboard::index');
    
    $routes->add('categories', 'Categories::index');
    $routes->add('products', 'Products::index');
    $routes->add('testimonials', 'Testimonials::index');
    $routes->add('settings', 'Settings::index');
    $routes->add('mybanners', 'Mybanners::index');
    $routes->add('pages', 'Pages::index');
    $routes->add('faqs', 'Faqs::index');
    $routes->add('blogs', 'Blogs::index');
    $routes->add('users', 'Users::index');
    $routes->add('quotes', 'Quotes::index');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
