<?php

namespace App\Http\Middleware;

use App\Services\PermissionService;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermissions
{
    public function handle($request, Closure $next, $menuRoute, $permission)
    {
        $isDevUser = PermissionService::isDevUser();
        $hasPermission = Auth::user()->hasPermission($menuRoute, $permission);

        if (!$isDevUser && !$hasPermission) {
            return response()->json([
                'error' => 'Usuário sem permissão para acessar este recurso!'
            ], 403);
        }

        return $next($request);
    }

}
