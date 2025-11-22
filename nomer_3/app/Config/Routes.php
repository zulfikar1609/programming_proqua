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
$routes->post('/asesmen/tambah', 'DashboardController::simpanAsesmen', ['filter' => 'role:superadmin,perawat']);
$routes->post('/asesmen/update', 'DashboardController::updateAsesmen', ['filter' => 'role:superadmin,perawat']);
$routes->post('/asesmen/hapus', 'DashboardController::hapusAsesmen', ['filter' => 'role:superadmin,perawat']);
$routes->get('/asesmen/cetak/(:num)', 'DashboardController::cetakAsesmen/$1', ['filter' => 'role:superadmin,perawat']);

$routes->get('/diagnosis', 'DashboardController::diagnosis', ['filter' => 'role:superadmin,perawat']);
$routes->post('/diagnosis/tambah', 'DashboardController::simpanDiagnosis', ['filter' => 'role:superadmin,perawat']);
$routes->post('/diagnosis/update', 'DashboardController::updateDiagnosis', ['filter' => 'role:superadmin,perawat']);
$routes->post('/diagnosis/hapus', 'DashboardController::hapusDiagnosis', ['filter' => 'role:superadmin,perawat']);
$routes->get('/diagnosis/cetak/(:num)', 'DashboardController::cetakDiagnosis/$1', ['filter' => 'role:superadmin,perawat']);

$routes->get('/pendaftaran', 'DashboardController::pendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pendaftaran/tambah', 'DashboardController::simpanPendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pendaftaran/update', 'DashboardController::updatePendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/pendaftaran/hapus', 'DashboardController::hapusPendaftaran', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->get('/pendaftaran/cetak/(:num)', 'DashboardController::cetakPendaftaran/$1', ['filter' => 'role:superadmin,admisi,perawat']);

$routes->get('/pasien', 'DashboardController::pasien', ['filter' => 'role:superadmin']);
$routes->post('/pasien/tambah', 'DashboardController::simpanpasien', ['filter' => 'role:superadmin']);
$routes->post('/pasien/update', 'DashboardController::updatePasien', ['filter' => 'role:superadmin']);
$routes->post('/pasien/hapus', 'DashboardController::hapusPasien', ['filter' => 'role:superadmin']);
$routes->get('/pasien/import-dummy', 'DashboardController::importDummy', ['filter' => 'role:superadmin']);
$routes->get('/pasien/cetak/(:num)', 'DashboardController::cetakPasien/$1', ['filter' => 'role:superadmin']);

$routes->get('/kunjungan', 'DashboardController::kunjungan', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/kunjungan/tambah', 'DashboardController::simpanKunjungan', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/kunjungan/update', 'DashboardController::updateKunjungan', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->post('/kunjungan/hapus', 'DashboardController::hapusKunjungan', ['filter' => 'role:superadmin,admisi,perawat']);
$routes->get('/kunjungan/cetak/(:num)', 'DashboardController::cetakKunjungan/$1', ['filter' => 'role:superadmin,admisi,perawat']);

