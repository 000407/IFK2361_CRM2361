<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

Route::group([], function() {
	// Login page
	Route::get('/login', function() {
		return view('auth/login');
	})->name('login_page');

	// Password reset page
	Route::get('/password/reset', function() {
		return view('auth/pw_reset');
	})->name('pw_reset_page');

	// Registration page
	Route::get('/register', function() {
		return view('auth/register');
	})->name('register_page');
});

Route::controller(UserController::class)
	->prefix('user')
	->group(function() {
		// Process login
		Route::post('/authenticate', 'authenticate')
			->name('authenticate_user');
		
		// Process registration
		Route::post('/register', 'register')
			->name('register_user');

		// Sign out
		Route::get('/logout', 'sign_out')
			->name('sign_out');

		// Process password reset
		Route::post('/password/reset', 'resetPassword')
			->name('reset_password');
	});

Route::controller(AdminController::class)
	->prefix('administration')
	->middleware(['auth.authorize:ADMIN,ROOT'])
	->group(function() {
		// Dashboard
		Route::get('/', function() {
			return view('admin/dashboard');
		})->name('dashboard_page');
	});

Route::controller(ProductController::class)
	->prefix('products')
	->group(function() {
		Route::prefix('api')
			->group(function() {
				Route::get('/all', 'getAllProducts')->name('get_all_products');
			});
	});


Route::get('/', function () {
    return view('welcome');
})->name('welcome_page');
