<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'LoginController::index');
$routes->post('/auth', 'LoginController::auth');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/asesmen', 'DashboardController::asesmen', ['filter' => 'role:superadmin,perawat']);
$routes->get('/pendaftaran', 'DashboardController::pendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->get('/pasien', 'DashboardController::pasien', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->get('/kunjungan', 'DashboardController::kunjungan', ['filter' => 'role:superadmin,admisi,perawat']);

