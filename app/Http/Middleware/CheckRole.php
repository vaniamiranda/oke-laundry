<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request -> user() -> role == $role) {
            return $next($request);
        }else{
            if ($request -> user() -> role == "user") {
                return redirect('/');
            }else if ($request -> user() -> role == "laundry") {
                return redirect('laundry');
            }else if ($request -> user() -> role == "pending_laundry") {
                return redirect('laundry-pending');
            }else if ($request -> user() -> role == "admin") {
                return redirect('admin');
            }else{
                return redirect('/');
            }
        }
    }
}
