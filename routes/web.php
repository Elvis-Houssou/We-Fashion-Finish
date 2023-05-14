<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::prefix('/')->group(function () {
    Route::match(['get', 'post'], '/', [ProductController::class, 'solde'])->name('solde');

    // Route::get('/solde', [ProductController::class, 'solde'])->name('solde');
    // Route::get('/homme', [ProductController::class, 'homme'])->name('homme');
    // Route::get('/femme', [ProductController::class, 'femme'])->name('femme');
    // Route::match(['get', 'post'], '/{id}', [ProductController::class, 'show'])->name('show');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->group(function () {
    Route::match(['get', 'post'], '/admin', [AdminController::class, 'produit'])->name('admin');
    Route::match(['get', 'post'], '/admin/catégorie', [AdminController::class, 'category'])->name('admin');
    // Route::get('/admin/catégories', [AdminController::class, 'categories'])->name('categories');
    Route::match(['get', 'post'], '/admin/create', [AdminController::class, 'create'])->name('create');
    Route::match(['get', 'post'], '/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    // Route::match(['get', 'post'], '/admin/create/', [ProductController::class, 'store'])->name('create');
    // Route::post('/admin/create/store', [ProductController::class, 'store'])->name('store');

    Route::post('/admin/create', [ProductController::class, 'store'])->name('store');
    Route::post('/admin/edit/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/admin/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
})->middleware(['auth', 'verified']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
