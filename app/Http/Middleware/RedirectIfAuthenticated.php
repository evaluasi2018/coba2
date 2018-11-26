<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'dosen':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('dosen.dashboard');
                }
                break;

            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;

            case 'mahasiswa':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('mahasiswa.dashboard');
                }
                break;
            
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
        }

        return $next($request);
    }
}
