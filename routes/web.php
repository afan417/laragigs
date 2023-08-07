<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth'); // Show Create Form

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth'); // Store

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth'); // Show Edit Form

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth'); // Edit

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth'); // Delete


Route::get('/listings/{listing}', [ListingController::class, 'show']);


// SHOW REGISTER CREATE FORM
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// STORE NEW USER
Route::post('/users', [UserController::class, 'store']);

// LOG OUT
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// SHOW LOG IN FORM
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// LOG IN
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
