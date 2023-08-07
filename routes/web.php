<?php

use App\Http\Controllers\ListingController;
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

Route::get('/listings/create', [ListingController::class, 'create']); // Show Create Form

Route::post('/listings', [ListingController::class, 'store']); // Store

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']); // Show Edit Form

Route::put('/listings/{listing}', [ListingController::class, 'update']); // Edit

Route::delete('/listings/{listing}', [ListingController::class, 'destroy']); // Delete


Route::get('/listings/{listing}', [ListingController::class, 'show']);
