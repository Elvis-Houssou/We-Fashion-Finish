<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/homme', [ProductController::class, 'homme'])->name('homme');
    Route::get('/femme', [ProductController::class, 'femme'])->name('femme');
    Route::match(['get', 'post'], 'show/{id}', [ProductController::class, 'show'])->name('show');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->group(function () {
    Route::match(['get', 'post'], '/admin', [AdminController::class, 'produit'])->name('product');
    Route::match(['get', 'post'], '/admin/catégorie', [AdminController::class, 'category'])->name('category');

    Route::match(['get', 'post'], '/admin/product/create', [AdminController::class, 'createProduct'])->name('createProduct');
    Route::match(['get', 'post'], '/admin/categorie/create', [AdminController::class, 'createCategory'])->name('createCategory');
    Route::match(['get', 'post'], '/admin/edit/product/{id}', [AdminController::class, 'editProduct'])->name('editProduct');
    Route::match(['get', 'post'], '/admin/edit/catégorie/{id}', [AdminController::class, 'editCategory'])->name('editCategory');
    // Route::match(['get', 'post'], '/admin/create/', [ProductController::class, 'store'])->name('create');


    //? Store
    Route::post('/admin/product/store', [ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::post('/admin/category/store', [CategoryController::class, 'storeCategory'])->name('storeCategory');

    //? Update
    Route::post('/admin/product/update/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');

    //? Delete
    Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroyProduct'])->name('destroyProduct');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroyCategory'])->name('destroyCategory');
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
