<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LogIn::index');
$routes->post('/ceklogin', 'LogIn::ceklogin'); // Added login route
$routes->get('/dashboard', 'Home::index');
$routes->get('/anime', 'Anime::index');
$routes->get('/add_data_anime', 'Anime::add_data_anime');
$routes->post('/proses_data_anime', 'Anime::proses_data_anime');
$routes->get('/edit_data_anime/(:any)', 'Anime::edit_data_anime/$1');
$routes->post('/proses_edit_anime', 'Anime::proses_edit_anime');
$routes->get('/delete_data_anime/(:any)', 'Anime::delete_data_anime/$1');
$routes->get('/search', 'Anime::search');
$routes->get('/studio', 'Studio::index');
$routes->get('/add_data_studio', 'Studio::add_data_studio');
$routes->post('/proses_data_studio', 'Studio::proses_data_studio');
$routes->get('/edit_data_studio/(:any)', 'Studio::edit_data_studio/$1');
$routes->post('/proses_edit_studio', 'Studio::proses_edit_studio');
$routes->get('/delete_data_studio/(:any)', 'Studio::delete_data_studio/$1');
$routes->get('/searchs', 'Studio::searchs');
