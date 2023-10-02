<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRoleId = auth()->user()->role_id;

        if ($userRoleId == $role) {
            return $next($request);
        }

        if ($userRoleId == 1) {
            return redirect('/dashboard/super-admin');
        } elseif ($userRoleId == 2) {
            return redirect('/dashboard/admin');
        }

        return redirect('/');
    }


}
