<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route: homepage shows perfume list
// $routes->get('/', 'PerfumeController::index');
$routes->get('/', 'Home::index');


// Perfume routes (CRUD structure)
$routes->get('perfumes', 'PerfumeController::index'); 
$routes->get('perfumes/home', 'PerfumeController::home');                // Show all perfumes
               // Show all perfumes
$routes->get('perfumes/create', 'PerfumeController::create');        // Show create form
$routes->post('perfumes/store', 'PerfumeController::store');         // Save new perfume
$routes->get('perfumes/(:num)', 'PerfumeController::show/$1');       // View single perfume
$routes->get('perfumes/edit/(:num)', 'PerfumeController::edit/$1');  // Edit perfume
$routes->post('perfumes/update/(:num)', 'PerfumeController::update/$1'); // Update
$routes->get('perfumes/delete/(:num)', 'PerfumeController::delete/$1'); // Delete

// Test route to make sure routing works
$routes->get('test', function () {
    echo "✅ Routes are working!";
});

// Disable auto-routing (use defined routes only)
$routes->setAutoRoute(false);
