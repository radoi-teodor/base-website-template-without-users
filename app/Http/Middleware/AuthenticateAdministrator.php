<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class AuthenticateAdministrator
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {



      if(!Auth::check())
        return redirect('/administrator')->with('status', 'Not an admin.');

      $user = Auth::user();

      if ($user->administrator!=1) {
          return redirect('/administrator')->with('status', 'Not an admin.');
      }

      return $next($request);
    }
}
