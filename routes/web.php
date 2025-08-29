<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return 'ini adlaha halaman about';
// });
Route::get('/users/{id}', function($id){
    return "nilai id users adalah " .$id;
});

Route::get('/contact', function(){
    return 'ini adalah halaman contact';
})->name(name: 'contact');

Route::get('/user/{name?}',function($name = "guest"){
    return "hello, " .$name;
});

Route::prefix('manage')->group(function(){
    Route::get('/edit', function() {
        return 'ini adalah  halaman manage edit';
    });
    Route::get('/profile', function(){
        return 'ini adalah halaman profile';
    });
    Route::get('/settings', function(){
        return 'ini adalah halaman settings';
    });
});
