<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateFaculty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->session()->get('user');
        if($user && $user->usertype == 'faculty'){
            return $next($request);
        }
        else {
            $request->session()->flash('error', 'You do not have permission to access this page.');
            return redirect('login');
        }
    }
}
