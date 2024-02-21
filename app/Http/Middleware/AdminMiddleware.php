<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario tiene el rol de administrador
        if ($request->user() && $request->user()->hasRole('admin')) {
            return $next($request);
        }

        // Si el usuario no tiene el rol de administrador, redirigirlo o realizar alguna otra acción
        return redirect()->route('dashboard'); // Cambia 'unauthorized' por la ruta que desees
    }
}
