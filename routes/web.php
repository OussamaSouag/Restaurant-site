<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Models\Commande;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('roles', RoleController::class);
    Route::post('/product/{product}/buy', [ProductController::class, 'buyProduct'])->name('product.buy');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');

    Route::get('/product/{product}/buy', function (App\Models\Product $product) {
        return view('products.buyForm', compact('product'));
    })->name('product.buyForm');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/AdminPanel', [AdminController::class, 'index'])->name('AdminPanel');
});


Route::get('/adminProduct', function () {
$products = Product::paginate(10); 
    return view('admin.AdminProduct', compact('products'));
})->name('adminProduct');
Route::get('/adminCommande', function () {
    return view('admin.adminCommande', compact('commandes'));
})->name('adminCommande');
Route::get('/mes-commandes', [ProductController::class, 'myOrders'])->name('commandes');

require __DIR__.'/auth.php';
