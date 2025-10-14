<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index');
$routes->get('products', 'Products::index');
$routes->get('products/new', 'Products::new');
$routes->get('products/edit/(:num)', 'Products::edit/$1');
$routes->post('products/save', 'Products::save');
$routes->put('products/update/(:num)', 'Products::update/$1');
$routes->post('products/update/(:num)', 'Products::update/$1');
$routes->get('movements', 'Movements::index');
$routes->get('movements/create', 'Movements::create');
$routes->get('disposal', 'Disposal::index');
$routes->get('inventory_adjustment', 'InventoryAdjustment::index');
$routes->get('inventory_adjustment/create', 'InventoryAdjustment::create');
$routes->get('settings', 'Settings::index');
$routes->get('user', 'User::index');