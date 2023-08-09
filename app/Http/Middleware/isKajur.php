<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isKajur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role_name === 'kajur') {
            return $next($request);
        }

        return redirect('/login'); // Redirect ke halaman yang sesuai jika tidak memenuhi persyaratan akses
    }
}
