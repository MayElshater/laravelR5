<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\Studentcontroller;
Route::get("form1",[MyController::class,'info']);

Route::post('insertclient', [Clientcontroller::class,'store'])->name('insertclient');
Route::get('clientForm', [Clientcontroller::class, 'create']);

Route::post('insertstudent', [Studentcontroller::class,'store'])->name('insertstudent');
Route::get('studentForm', [Studentcontroller::class, 'create']);

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('May/{id?}', function ($id =0) {
    return ('welcome to the fist page'. $id);
})->whereNumber('id');
#->where(['id' => '[0-9]+']);*/
/*Route::get('course/{name}', function ($name) {
    return ('My name is '. $name);
})->whereAlpha('name');*/
/*Route::get('course/{name}', function ($name) {
    return ('My name is '. $name);
})->whereIn('name',['may','mohamed','doaa','safaa']);*/

Route::prefix('cars')->group(function() {
    Route::get('bmw', function () {
        return 'category is BMW';
    });
    Route::get('mercedes', function () {
        return 'category is Mercedes';
    });
});
/*
Route::fallback(function() {
   // return "the page not found";
   return redirect('/');
});*/
/*Route::get('test',function(){
    return view("test");

});*/
/*
Route::get('form1', function () {
    return view("form1");
});
*/
Route::post('recform1', function () {
    $fname = request('fname'); 
    $lname = request('lname'); 
    return $fname . ' ' . $lname; 
})->name('receiveform1');
