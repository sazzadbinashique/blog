<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Auth;

class Admin
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
        if (!Auth::user()->admin){

            Session::flash('success', 'You don\'t have permission to change ' );

            return redirect()->back();
        }
        return $next($request);
    }
}
