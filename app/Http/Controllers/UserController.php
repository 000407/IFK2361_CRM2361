<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use \Throwable;

class UserController extends Controller
{
  protected $userService;
  
  public function __construct(UserService $userService)
  {
      $this->userService = $userService;
  }

	public function register(Request $req) {
		$responseData = [
			'level' => 'INFO',
			'message' => 'Registration is successful.'
		];

		try {
			$this->userService->register($req);
		} catch (Throwable $e) {
      report($e);
			$responseData = [
				'level' => 'ERROR',
				'message' => 'An internal error occurred!'
			];
		}

		return redirect()->route('login_page')->with($responseData);
	}

	public function authenticate(Request $req) {
		$targetRoute = 'login_page';
		$responseData = [];

		try {	
			$this->userService->authenticate($req);
      $targetRoute = 'welcome_page';
		} catch (NotFoundException $e) {
      report($e);

      $responseData = [
        'level' => 'ERROR',
        'message' => 'Invalid credentials!'
      ];
    } catch (Throwable $e) {
			report($e);

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
			$this->userService->initiatePasswordReset($req);
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
		$this->userService->signOut();
		
		return redirect()->route('welcome_page')->with($[]);
	}
}
