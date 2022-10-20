<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Home Page
Route::get('/', [ListingController::class, 'index']);

// Manage Listing Page
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Create Listing Page
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Edit Listing Page
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Show Listing Page
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Register Page
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Login Page
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Create Listing Endpoint
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Update Listing Endpoint
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing Endpoint
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Create New User Endpoint
Route::post('/users', [UserController::class, 'store']);

// Logout Endpoint
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Authenticate User Endpoint
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
