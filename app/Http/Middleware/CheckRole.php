<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role->name ?? 'Читатель';

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        abort(403, 'У вас нет прав для доступа к этой странице.');
    }
}