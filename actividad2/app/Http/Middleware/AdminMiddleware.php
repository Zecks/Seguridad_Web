<?php

// Ubicación: app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Verificar si el usuario tiene el rol 'admin'
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'No tienes permisos de administrador.');
        }

        // Permitir el acceso si el usuario es administrador
        return $next($request);
    }
}
