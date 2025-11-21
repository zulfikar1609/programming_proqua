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
$routes->post('/pendaftaran/tambah', 'DashboardController::simpanPendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pendaftaran/update', 'DashboardController::updatePendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pendaftaran/hapus', 'DashboardController::hapusPendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->get('/pendaftaran/cetak/(:num)', 'DashboardController::cetakPendaftaran/$1', ['filter' => 'role:superadmin,admisi,perawat']);

$routes->get('/pasien', 'DashboardController::pasien', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pasien/tambah', 'DashboardController::simpanpasien', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pasien/update', 'DashboardController::updatePasien', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pasien/hapus', 'DashboardController::hapusPasien', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->get('/pasien/import-dummy', 'DashboardController::importDummy', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->get('/pasien/cetak/(:num)', 'DashboardController::cetakPasien/$1', ['filter' => 'role:superadmin,admisi,perawat']);

$routes->get('/kunjungan', 'DashboardController::kunjungan', ['filter' => 'role:superadmin,admisi,perawat']);

