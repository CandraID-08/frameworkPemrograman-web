<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UtsController;
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
    return view('section_utama');
});

Route::get('/uts', [UtsController::class, 'index'])->name('uts');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/rahasigma', function () {
    return 'this is a secret page';
    // return view('dashboard');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('rahasigma');

Route::get('/produk',[ProductController::class, 'index']);


Route::middleware(['auth', 'role:admin,owner'])->group(function () {
    Route::get('/products/{angka}', [ProductController::class, 'index'])
        ->name('products.index');
});



require __DIR__.'/auth.php';