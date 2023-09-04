<?php

use App\Http\Controllers\UserController;
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

// Login page
Route::get('/login', function() {
	return view('auth/login');
})->name('login_page');

Route::controller(UserController::class)
	->prefix('user')
	// ->middleware(['auth.authorize:admin,root'])
	->group(function() {
		// Process login
		Route::post('/authenticate', 'authenticate')
			->name('authenticate_user');
		
		// Process registration
		Route::post('/register', 'register')
			->name('register_user');
	});

// Registration page
Route::get('/register', function() {
	return view('auth/register');
})->name('register_page');

Route::get('/', function () {
    return view('welcome');
});
