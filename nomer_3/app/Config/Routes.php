<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'LoginController::index');
$routes->get('/asesmen', 'DashboardController::asesmen');
$routes->get('/pendaftaran', 'DashboardController::pendaftaran');
$routes->get('/pasien', 'DashboardController::pasien');
$routes->get('/kunjungan', 'DashboardController::kunjungan');
