<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('products', 'Products::index');
$routes->get('products/create', 'Products::create');
$routes->get('transfers', 'Transfers::index');
$routes->get('disposal', 'Disposal::index');
$routes->get('inventory_adj', 'InventoryAdjustment::index');
$routes->get('settings', 'Settings::index');
$routes->get('user', 'User::index');