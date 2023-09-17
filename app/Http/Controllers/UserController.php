<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use \Throwable;

class UserController extends Controller
{
	public function register(Request $req) {
		$responseData = [
			'level' => 'INFO',
			'message' => 'Registration is successful.'
		];

		try {
			DB::beginTransaction(); // Begin a transaction
			
			$userData = [
				'first_name' => $req->input('txtFname'),
				'last_name' => $req->input('txtLname'),
				'email' => $req->input('txtEmail'),
				'password' => $req->input('txtPassword')
			];

			// Role::where('name', 'USER') == SELECT * FROM roles WHERE name='USER'
			$role_user = Role::where('name', 'USER')->first();

			$user = User::create($userData);

			$user->roles()->attach($role_user->id);

			DB::commit(); // End the started transaction
		} catch (Throwable $e) {
			DB::rollBack(); // Rollback the already started transaction
			
			report($e);
			
			$responseData = [
				'level' => 'ERROR',
				'message' => 'An internal error occurred!'
			];
		}

		return redirect()->route('login_page')->with($responseData);
	}

	public function authenticate(Request $req) {
		$targetRoute = 'welcome_page';
		$responseData = [];

		try {	
			$email = $req->input('txtEmail');
			$password = $req->input('txtPassword');

			$user = User::where('email', $email)->first();

			if ($user != null && password_verify($password, $user->password)) {
				// Valid user
				// Set the sessions
				Auth::login($user);
				// Redirect the user to the target location or home page
			} else {
				$targetRoute = 'login_page';
				$responseData = [
					'level' => 'ERROR',
					'message' => 'Invalid credentials!'
				];
			}

		} catch (Throwable $e) {
			report($e);
			
			$targetRoute = 'login_page';
			$responseData = [
				'level' => 'ERROR',
				'message' => 'An internal error occurred!'
			];
		}
		
		return redirect()->route($targetRoute)->with($responseData);
	}

	public function resetPassword(Request $req) {
		$status = 200;
		$responseData = [
			'message' => 'Please check your email!'
		];

		try {
			$email = $req->json()->all()['email'];

			if (User::where('email', $email)->exists()) {
				$status = Password::sendResetLink(
					$request->only('email')
				);
			}
		} catch (Throwable $e) {
			report($e);
			
			$status = 500;
			$responseData = [
				'message' => 'An internal error occurred!'
			];
		}

		return response()->json($responseData, $status);
	}

	public function sign_out(Request $req) {
		$targetRoute = 'welcome_page';
		$responseData = [];

		Auth::logout();
		$req->session()->invalidate();
		$req->session()->regenerateToken();
		
		return redirect()->route($targetRoute)->with($responseData);
	}
}
