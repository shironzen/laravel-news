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
        //чек если не авторизован - на стр входа
        if (!Auth::check()) {
            return redirect('/login');
        }
//берет роль юзера
        $userRole = Auth::user()->role->name ?? 'Читатель';
// если роль в разрешеннных - пускает
        if (in_array($userRole, $roles)) {
            return $next($request);
        }
//иначе 403 нет доступа
        abort(403, 'У вас нет прав для доступа к этой странице.');
    }
}