<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Jika pengguna belum login
        if (!Auth::check()) {
            // Redirect ke halaman login jika belum login
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Jika pengguna sudah login dan memiliki role yang berbeda
        if (Auth::user()->role != $role) {
            // Jika sudah login tapi mengakses role yang tidak sesuai, tampilkan halaman 404
            abort(404);
        }

        // Jika role cocok, lanjutkan request
        return $next($request);
    }
}
