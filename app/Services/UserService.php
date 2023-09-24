<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use \Throwable;

class UserService {
  protected $session;
  protected $instance;

  public function __construct(SessionManager $session) {
    $this->session = $session;
  }

  public function register(Request $req) {
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

      throw $e; // Throw the exception up the call stack. Let the caller method handle it.
    }
  }

  public function authenticate(Request $req) {
    $email = $req->input('txtEmail');
    $password = $req->input('txtPassword');

    $user = User::where('email', $email)->first();

    if ($user != null && password_verify($password, $user->password)) {
      // Valid user
      // Set the sessions
      Auth::login($user);
      // Redirect the user to the target location or home page
    } else {
      throw NotFoundException::new("USER", $email);
    }
  }

  public function initiatePasswordReset(Request $req) {
    $email = $req->json()->all()['email'];

    if (User::where('email', $email)->exists()) {
      $status = Password::sendResetLink(
        $request->only('email')
      );
    }
  }

  public function signOut(Request $req) {
    Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();
  }
}