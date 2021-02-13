<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Registrasi
$router->post('/registrasi', 'Authcontroller@register');
// Login
$router->post('/login', 'Authcontroller@login');

$router->group(['middleware' => 'auth'], function() use($router){
    // Management User
    $router->group(['prefix' => 'user'], function () use ($router) {
        $router->get('/', 'Authcontroller@show');
        $router->post('/update', 'Authcontroller@update');
    });
    // Kategori alat berat
    $router->group(['prefix' => 'kategori'], function () use ($router) {
        $router->get('/', 'Kategoricontroller@getkategori');
    });
    // Alat Berat
    $router->group(['prefix' => 'alatberat'], function () use ($router) {
        $router->get('/', 'Alatberatcontroller@getalatberat');
    });
    // Transaksi
    $router->group(['prefix' => 'transaksi'], function () use ($router) {
        $router->post('/', 'Transaksicontroller@store');
    });
    // Logout
    $router->post('/logout','Authcontroller@logoutApi');
});