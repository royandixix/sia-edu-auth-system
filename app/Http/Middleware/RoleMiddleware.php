<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // cek login
        if (!session()->has('user_id')) {
            return redirect('/login')
                ->with('error', 'Silakan login terlebih dahulu');
        }

        // cek role
        if (session('role') !== $role) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini');
        }

        return $next($request);
    }
}