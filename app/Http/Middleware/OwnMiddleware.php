<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class OwnMiddleware
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
        if ($request->id != Auth::id()) {
            Session::flash('error', 'Akses tidak di izinkan');
            return redirect('/');
        }
        return $next($request);
    }
}
