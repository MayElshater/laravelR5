<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('May {id}', function ($id) {
    return ('welcome the first page' . $id);
});
