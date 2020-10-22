<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class Maintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $settings = \UI::get_settings();

      if($settings['maintenance']->value==1){
        return new Response(view('errors.maintenance'));
      }
      return $next($request);
    }
}
