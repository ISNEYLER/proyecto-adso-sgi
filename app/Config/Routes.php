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
$routes->post('products/delete/(:num)','Products::delete/$1');
$routes->get('movements', 'Movements::index');
$routes->get('movements/new', 'Movements::new');
$routes->post('movements/save', 'Movements::save');
$routes->get('stocks', 'Stocks::index');
$routes->get('disposal', 'Disposal::index');
$routes->get('inventory_adjustment', 'InventoryAdjustment::index');
$routes->get('inventory_adjustment/create', 'InventoryAdjustment::create');
$routes->get('settings', 'Settings::index');
$routes->get('inventory/products-by-location/(:num)', 'InventoryAdjustment::obtenerProductosPorUbicacion/$1');
$routes->get('inventory/stock/(:num)/(:num)','InventoryAdjustment::obtenerCantidadPorProductoYUbicacion/$1/$2');
$routes->post('inventory_adjustment/save', 'InventoryAdjustment::save');

$routes->get('categories','Categories::index');
$routes->get('categories/new', 'Categories::new');
$routes->post('categories/save', 'Categories::save');
$routes->get('categories/edit/(:num)', 'Categories::edit/$1');
$routes->post('categories/update/(:num)', 'Categories::update/$1');

$routes->get('locations', 'Locations::index');
$routes->get('locations/new', 'Locations::new');
$routes->post('locations/save', 'Locations::save');
$routes->get('locations/edit/(:num)', 'Locations::edit/$1');
$routes->post('locations/update/(:num)', 'Locations::update/$1');

$routes->get('storages', 'Storages::index');
$routes->get('storages/new', 'Storages::new');
$routes->get('storages/edit/(:num)', 'Storages::edit/$1');


service('auth')->routes($routes);
$routes->get('user', 'User::index');