<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index');
$routes->get('products', 'Products::index');
$routes->get('products/create', 'Products::create');
$routes->get('movements', 'Movements::index');
$routes->get('movements/create', 'Movements::create');
$routes->get('disposal', 'Disposal::index');
$routes->get('inventory_adjustment', 'InventoryAdjustment::index');
$routes->get('inventory_adjustment/create', 'InventoryAdjustment::create');
$routes->get('settings', 'Settings::index');
$routes->get('user', 'User::index');