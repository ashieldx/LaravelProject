<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;

Route::resource('products', ProductController::class,[
   'only' => ['index', 'show']
]);

Route::group(['middleware' => ['auth', 'security']], function(){
    Route::resource('products', ProductController::class,[
        'except' => [
            'index', 'show'
        ]
    ]);
    Route::get('add-product', [ProductController::class, 'create']);
    Route::post('add-product', [ProductController::class, 'store']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::resource('cart', CartController::class);
    Route::post('/add-cart', [CartController::class, 'store']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/edit-profile', [ProfileController::class, 'edit']);
    Route::patch('/edit-profile', [ProfileController::class, 'update']);
    Route::resource('/transaction', TransactionController::class,[
        'only' => 'index'
    ]);

    Route::get('/checkout', [TransactionController::class, 'create']);
    Route::post('/checkout', [TransactionController::class, 'store']);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

