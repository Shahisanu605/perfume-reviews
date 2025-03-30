<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default Home Route (Landing Page)
$routes->get('/', 'PerfumeController::home');
$routes->get('perfumes/home', 'PerfumeController::home');

// Perfume CRUD Routes
$routes->get('perfumes', 'PerfumeController::index');                        // List perfumes
$routes->get('perfumes/create', 'PerfumeController::create');                // Add perfume form
$routes->post('perfumes/store', 'PerfumeController::store');                 // Store perfume
$routes->get('perfumes/(:num)', 'PerfumeController::show/$1');               // Single perfume view
$routes->get('perfumes/edit/(:num)', 'PerfumeController::edit/$1');          // Edit form
$routes->post('perfumes/update/(:num)', 'PerfumeController::update/$1');     // Update perfume
$routes->get('perfumes/delete/(:num)', 'PerfumeController::delete/$1');      // Delete perfume

// Contact Form Routes
$routes->match(['get', 'post'], 'contact', 'PerfumeController::contact'); // 🛠️ Route to contact page
$routes->get('contact/messages', 'PerfumeController::viewMessages');      // View submitted messages
$routes->get('contact/messages/delete/(:num)', 'PerfumeController::deleteMessage/$1'); // Delete a message

// Static Pages
$routes->get('about', 'PerfumeController::about');

// API Integration
$routes->get('api-page', 'PerfumeController::apiPage');
$routes->get('get-products', 'PerfumeController::getProducts');

// Test Route
$routes->get('test', function () {
    echo "✅ Routes working!";
});

// Security: Disable legacy auto-routing
$routes->setAutoRoute(false);
