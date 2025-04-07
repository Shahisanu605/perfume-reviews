<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default Home Route
$routes->get('/', 'PerfumeController::home');
$routes->get('perfumes/home', 'PerfumeController::home');

// Perfume CRUD Routes
$routes->get('perfumes', 'PerfumeController::index');
$routes->get('perfumes/create', 'PerfumeController::create');
$routes->post('perfumes/store', 'PerfumeController::store');
$routes->get('perfumes/(:num)', 'PerfumeController::show/$1');
$routes->get('perfumes/edit/(:num)', 'PerfumeController::edit/$1');
$routes->post('perfumes/update/(:num)', 'PerfumeController::update/$1');
$routes->get('perfumes/delete/(:num)', 'PerfumeController::delete/$1');
$routes->get('perfumes/search', 'PerfumeController::search');
$routes->get('perfumes/explore', 'PerfumeController::explore');
// Authentication Routes
$routes->get('register', 'UsersController::register');
$routes->post('register', 'UsersController::register');
$routes->get('login', 'UsersController::login');
$routes->post('login', 'UsersController::login');
$routes->get('logout', 'UsersController::logout');

// Dashboard after login (only use this one)
$routes->get('dashboard', 'UsersController::dashboard');

// Contact Form Routes
$routes->match(['get', 'post'], 'contact', 'PerfumeController::contact');
$routes->get('contact/messages', 'PerfumeController::viewMessages');
$routes->get('contact/messages/delete/(:num)', 'PerfumeController::deleteMessage/$1');

// Static Pages
$routes->get('about', 'PerfumeController::about');

// API Integration
$routes->get('api-page', 'PerfumeController::apiPage');
$routes->get('get-products', 'PerfumeController::getProducts');

// Test Route
$routes->get('test', function () {
    echo "✅ Routes working!";
});

// Disable legacy auto-routing (recommended)
$routes->setAutoRoute(false);
