<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resources([
    '/manufacturers' => 'ManufacturerController',
    '/spareparts' => 'SparepartController',
    '/news' => 'NewsController',
]);
