<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next, ...$allowedRoles): Response
	{
    $user = Auth::user();

    if ($user == null) {
      echo("Not Authenticated");
    } else {
      $userRoles = [];

      foreach ($user->roles->all() as $key => $role) {
        $userRoles[] = $role->name;
      }

      $permissions = array_intersect($allowedRoles, $userRoles);

      if (count($permissions) < 1) {
        abort(403);
      }
    }

		return $next($request);
	}
}
