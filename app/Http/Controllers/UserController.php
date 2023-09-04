<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $req) {
    	$userData = [
			'first_name' => $req->input('txtFname'),
			'last_name' => $req->input('txtLname'),
			'email' => $req->input('txtEmail'),
			'password' => $req->input('txtPassword')
    	];

    	$user = User::create($userData);

    	$user->roles()->attach(4); // BAD: This might break in the future

    	return redirect()->route('login_page')->with([
    		'level' => 'INFO',
    		'message' => 'Registration is successful.'
    	]);
    }

    public function authenticate(Request $request) {
    	echo("Authenticate method works!");
    }
}
