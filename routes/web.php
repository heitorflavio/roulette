<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

    

//     // return Inertia::render('Welcome', [
//     //     'canLogin' => Route::has('login'),
//     //     'canRegister' => Route::has('register'),
//     //     'laravelVersion' => Application::VERSION,
//     //     'phpVersion' => PHP_VERSION,
//     // ]);
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/case/{name}', [App\Http\Controllers\HomeController::class, 'show'])->name('open_case');
Route::post('/open/{name}', [App\Http\Controllers\BoxController::class, 'open'])->name('open');


Route::get('/login', function(){ return Inertia::render('Auth/Login'); })->name('login');
Route::get('/register', function(){ return Inertia::render('Auth/Register'); })->name('register');

Route::get('/login', function(){ return Inertia::render('Auth/Login'); })->name('login');
Route::get('/register', function(){ return Inertia::render('Auth/Register'); })->name('register');
Route::post('/register',[App\Http\Controllers\HomeController::class, 'register'] )->name('register.post');
Route::post('/login',[App\Http\Controllers\HomeController::class, 'login'] )->name('login.post');


Route::post('/box/create',[App\Http\Controllers\BoxController::class, 'store'] )->name('create.box');
Route::post('/create/product',[App\Http\Controllers\ProductController::class, 'store'] )->name('create.product');

Route::get('/box/create',[App\Http\Controllers\BoxController::class, 'create'] )->name('create.boxs');
Route::get('/boxs',[App\Http\Controllers\HomeController::class, 'box'] )->name('boxs');

Route::get('/box/{id}',[App\Http\Controllers\BoxController::class, 'show'] )->name('products');

Route::get('/product/create',[App\Http\Controllers\ProductController::class, 'create'] );
Route::post('/product/create',[App\Http\Controllers\ProductController::class, 'store'] )->name('create.product');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });
