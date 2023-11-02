<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



$routes->get('/', 'Pages::index');

//rute buku
// Daftar buku
$routes->get('/buku', 'Buku::index');
// Tambah data
$routes->post('/buku', 'Buku::store');
$routes->get('/buku/create', 'Buku::create');
// Edit data
$routes->get('/buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('/buku/edit/(:num)', 'Buku::update/$1');
$routes->post('buku/update/(:num)', 'Buku::update/$1');

// detail
$routes->get('/buku/(:any)', 'Buku::detail/$1');
// hapus data
$routes->post('/buku/delete/(:any)', 'Buku::destory/$1');


//rute anggota
$routes->get('/anggota', 'Anggota::index');
// Tambah data
$routes->post('/anggota', 'Anggota::store');
$routes->get('/anggota/create', 'Anggota::create');
// Edit data
$routes->get('/anggota/edit/(:num)', 'Anggota::edit/$1');
$routes->post('/anggota/edit/(:num)', 'Anggota::update/$1');
$routes->post('anggota/update/(:num)', 'Anggota::update/$1');

// detail
$routes->get('/anggota/(:any)', 'Anggota::detail/$1');
// hapus data
$routes->post('/anggota/delete/(:any)', 'Anggota::destory/$1');
